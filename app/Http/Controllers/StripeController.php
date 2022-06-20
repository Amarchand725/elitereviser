<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Payment;
use Auth;
    
class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $data = Session::get('data');
        $document = Session::get('document');

        $total_amount = round($data['total_amount']);
        if(Session::get('discount')){
            $details = Session::get('discount');
            $coupon_id = $details['coupon_id'];
            $coupon_type = $details['type'];
            $discount = $details['discount'];
            $total_amount = round($details['net_amount']);
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $response  = Stripe\Charge::create ([
            "amount" => 100 * $total_amount,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "You have paid amount ".$total_amount,
        ]);
        $net_amount = isset($discount)?$discount:0;
        if($response){
            $model = Order::create([
                'user_id' => Auth::user()->id,
                'coupon_id' => isset($coupon_id)?$coupon_id:null,
                'order_number' => 100000 + Order::all()->count() + 1,
                'payment_method' => 'stripe',
                'discount_type' => isset($coupon_type)?$coupon_type:null,
                'discount_amount' => isset($discount)?$discount:null,
                'total_amount' => $total_amount,
                'net_amount' => $total_amount-$net_amount,
                'order_status' => $response['status'],
                'order_date' => date('Y/m/d'),
                'payment_status' => 'paid',
                'client_note' => $data['client_note'],
                'document' => $document,
            ]);

            if($model){
                OrderDetail::create([
                    'order_id' => $model->id,
                    'service_id' => $data['service_id'],
                    'sub_service_id' => $data['sub_service'],
                    'language' => isset($data['language'])?$data['language']:null,
                    'total_words' => isset($data['total_words'])?$data['total_words']:null,
                    'total_pages' => isset($data['total_pages'])?$data['total_pages']:null,
                    'service_type' => isset($data['service_type'])?$data['service_type']:null,
                    'trunarround_time' => isset($data['trunaround_time'])?$data['trunaround_time']:null,
                    'currency' => $data['currency'],
                    'sub_amount' => $net_amount,
                    'total_amount' => $net_amount,
                ]);

                Payment::create([
                    'order_id' => $model->order_number,
                    'transaction_id' => $response['source']['id'],
                    'transaction_status' => $response['status'],
                    'name_on_card' => $request->name_on_card,
                    'expiration_month' => $response['source']['exp_month'],
                    'expiration_year' => $response['source']['exp_year'],
                    'transaction_date' => date('Y/m/d'),
                    'total_amount' => $net_amount,
                    'card_number' => null,
                    'cvc' => null,
                ]);
                
                Session::flash('success', 'You have completed order process successfuly.');

                Session::forget('data');
                Session::forget('discount');
                Session::forget('document');

                return redirect()->route('my_orders');
            }
            
        }else{
            Session::flash('failed_message', 'Your order failed try again.');  
            return back();       
        }
    }
}