<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\WishListModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function __construct()
    {
        if(!Auth::user()){
           return redirect('/admin');
        }
    }
    public function forgotPassword()
    {
        $token = '';
        do {
            $token = random_int(100000, 999999);
        } while (User::where("password_reset_token", "=", $token)->first());

        return view('frontEnd.customer.passwords.reset-password', compact('token'));
    }
    public function resetPassword(Request $request, $code=null)
    {
        if(!empty($code)){
            return view('frontEnd.customer.passwords.confirm-password', compact('code'));
        }else{
            $this->validate($request, ['email'=>'required']);
            $model = User::where('email', $request->email)->first();

            if(empty($model)){
                Session::flash('message', 'Email is invalid.');
                return redirect()->back();
            }elseif($model->status==0){
                Session::flash('message', 'You are blocked please contact admin.');
                return redirect()->back();
            }else{
                $model->password_reset_token = $request->token;
                $model->update();

                $code = 422;

                $details = [
                    'from' => 'update-new-password',
                    'title' => 'Pasword reset token',
                    'body' => 'Here is your password reset token: '.$request->token,
                ];

                \Mail::to($model->email)->send(new \App\Mail\RegisterationEmail($details));
                Session::flash('message-success', 'We have sent you token in your email address.');
                return view('frontEnd.customer.passwords.confirm-password', compact('code'));
            }
        }
    }

    //update new password
    public function changePassword(Request $request)
    {
        $model = User::where('password_reset_token', $request->rand_code)->first();
        if(empty($model)){
            Session::flash('message', 'Code is invalid');
            return redirect('audience/reset-password/'.$request->code);
        }
        if($request->new_password != $request->confirm_password){
            Session::flash('message', 'Confirm password not matched');
            return redirect('audience/reset-password/'.$request->code);
        }else{
            $model->password_reset_token = null;
            $model->password = Hash::make($request->new_password);
            $model->update();

            $details = [
                'from' => 'update-new-password',
                'title' => 'Password updated',
                'body' => 'Password is updated successfully.',
            ];

            \Mail::to($model->email)->send(new \App\Mail\RegisterationEmail($details));

            Session::flash('message-success', 'You have updated password successfully!');
            return redirect('/login');
        }
    }
    public function profile()
    {
        if(!Auth::user()){
            return redirect('/login');
        }
        if(Auth::user() && Auth::user()->role_id == 3 || Auth::user()->role_id==2 && Auth::user()->is_approved==0 || Auth::user()->is_approved==3){ //3=customer/audience & 2=artist
            $orders = Order::orderby('id', 'desc')->where('user_id', Auth::user()->id)->where('order_status', 'succeeded')->paginate(10);
            $purchased_data = OrderDetail::orderby('id', 'desc')->where('user_id', Auth::user()->id)->where('product_type', 'item')->where('order_status', 'succeeded')->where('is_deleted', 0)->paginate(10);
            $wishlist = WishListModel::orderby('id', 'desc')->where('user_id', Auth::user()->id)->where('is_deleted', 0)->paginate(2);
            $comments = [];
            $artists = User::where('role_id', 2)->where('is_approved', 1)->where('status', 1)->get();
            return view('frontEnd.customer.profile', compact('orders', 'purchased_data', 'wishlist', 'comments', 'artists'));
        }else{
            return redirect('login');
        }
    }

    public function purchasedOrders(Request $request)
    {
        $orders = Order::orderby('id', 'desc')->where('user_id', Auth::user()->id)->where('order_status', 'succeeded')->paginate(10);
        return view('frontEnd.customer.orders-paginate', compact('orders'));
    }
    public function purchasedSongs(Request $request)
    {
        $purchased_data = OrderDetail::orderby('id', 'desc')->where('user_id', Auth::user()->id)->where('product_type', 'item')->where('order_status', 'succeeded')->where('is_deleted', 0)->paginate(10);

        return view('frontEnd.customer.purchased-songs-paginate', compact('purchased_data'));
    }
    public function wishlistSongs(Request $request)
    {
        $wishlist = WishListModel::orderby('id', 'desc')->where('user_id', Auth::user()->id)->where('is_deleted', 0)->paginate(2);
        return view('frontEnd.customer.wishlist-paginate', compact('wishlist'));
    }
    public function signOut()
    {
        if(!Auth::user()){
           return redirect('/login');
        }

        $role_id = Auth::user()->role_id;


        Auth::logout();
        Session::flush();
        if($role_id==1){ //1=Admin
            return redirect('/admin');
        }else{
            return redirect('/');
        }
    }
}
