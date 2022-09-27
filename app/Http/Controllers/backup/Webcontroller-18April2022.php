<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Coupon;
use App\Models\CouponUsageModel;
use App\Models\MaxJobLmit;
use Session;
use Validator;

class Webcontroller extends Controller
{
    // Index Page
    public function index()
    {
        $main_services = Service::where('parent_id', null)->take(6)->get();
        return view('website.index', compact('main_services'));
    }

    // Services Page
    public function services()
    {   
        $main_services = Service::where('parent_id', null)->take(6)->get();
        return view('website.services', compact('main_services'));
    }

    //placeorder
    public function placeOrder($id)
    {
        $service = Service::find($id);
        $sub_services =Service::where('parent_id', $service->id)->get();
        return view('website.place-order.placeorder', compact('sub_services', 'service'));
    }

    //upload file and count words
    public function fileUploadPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file'=>'required|mimes:pdf,docx,doc,xlsx,txt,ods',
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all()[0];
        }
        $file_ext = $request->file->extension();
        if($request->file->extension() == 'pdf'){
            $fName = $request->file->getClientOriginalName();
            
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('assets/website/documents/'), $fileName);
            //store file name in session
            Session::put('document', $fileName);

            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile("public/assets/website/documents/".$fileName);
            $text = $pdf->getText();
            $text = trim($text);
            $data = explode(" ",str_replace(array("-", "\n")," ",$text));

            $filtered = array_filter($data, fn($value) => !is_null($value) && $value !== "-" && $value !== "" && $value !== " " && $value !== "\t" && $value !== "\n" && $value !== "\r" && $value !== "\r\t" && $value !== "\r\n" && $value !== "\r\r" && $value !== "\t\r" && $value !== "\t\n" && $value !== "\t\t" && $value !== "\n\r" && $value !== "\n\t" && $value !== "\n\n");
            $countFiltered = count($filtered);
            return json_encode(array('word_cont'=>$countFiltered,'file_ext'=>$fName));
        }

        if($request->file->extension() == 'docx'){
            $fName = $request->file->getClientOriginalName();
            $request->file->move(public_path('/'), 'temp.docx');
            /* Set the PDF Engine Renderer Path */
            $domPdfPath = base_path('vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

            //Load word file
            $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('temp.docx'));

            //Save it into PDF
            $fileName = time();
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
            $PDFWriter->save(public_path('assets/website/documents/'.$fileName.'.pdf'));

            //store file name in session
            Session::put('document', $fileName);

            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile("public/assets/website/documents/".$fileName.".pdf");
            $text = $pdf->getText();
            $text = trim($text);
            // $data = explode(" ", $text);
            $data = explode(" ",str_replace(array("-", "\n")," ",$text));

            $filtered = array_filter($data, fn($value) => !is_null($value) && $value !== "-" && $value !== "" && $value !== " " && $value !== "\t" && $value !== "\n" && $value !== "\r" && $value !== "\r\t" && $value !== "\r\n" && $value !== "\r\r" && $value !== "\t\r" && $value !== "\t\n" && $value !== "\t\t" && $value !== "\n\r" && $value !== "\n\t" && $value !== "\n\n");
            $countFiltered = count($filtered);
            return json_encode(array('word_cont'=>$countFiltered,'file_ext'=>$fName));
           // return $countFiltered;
        }
        if($request->file->extension() == 'txt'){
            $fName = $request->file->getClientOriginalName();
            $request->file->move(public_path('/'), 'temp.docx');
            /* Set the PDF Engine Renderer Path */
            $domPdfPath = base_path('vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

            //Load word file
            $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('temp.docx'));

            //Save it into PDF
            $fileName = time();
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
            $PDFWriter->save(public_path('assets/website/documents/'.$fileName.'.pdf'));

            //store file name in session
            Session::put('document', $fileName);

            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile("public/assets/website/documents/".$fileName.".pdf");
            $text = $pdf->getText();
            $text = trim($text);
            // $data = explode(" ", $text);
            $data = explode(" ",str_replace(array("-", "\n")," ",$text));

            $filtered = array_filter($data, fn($value) => !is_null($value) && $value !== "-" && $value !== "" && $value !== " " && $value !== "\t" && $value !== "\n" && $value !== "\r" && $value !== "\r\t" && $value !== "\r\n" && $value !== "\r\r" && $value !== "\t\r" && $value !== "\t\n" && $value !== "\t\t" && $value !== "\n\r" && $value !== "\n\t" && $value !== "\n\n");
            $countFiltered = count($filtered);
            return json_encode(array('word_cont'=>$countFiltered,'file_ext'=>$fName));
           // return $countFiltered;
        }
        if($request->file->extension() == 'xlsx'){
            $fName = $request->file->getClientOriginalName();
            $request->file->move(public_path('/'), 'temp.docx');
            /* Set the PDF Engine Renderer Path */
            $domPdfPath = base_path('vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

            //Load word file
            $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('temp.docx'));

            //Save it into PDF
            $fileName = time();
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
            $PDFWriter->save(public_path('assets/website/documents/'.$fileName.'.pdf'));

            //store file name in session
            Session::put('document', $fileName);

            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile("public/assets/website/documents/".$fileName.".pdf");
            $text = $pdf->getText();
            $text = trim($text);
            // $data = explode(" ", $text);
            $data = explode(" ",str_replace(array("-", "\n")," ",$text));

            $filtered = array_filter($data, fn($value) => !is_null($value) && $value !== "-" && $value !== "" && $value !== " " && $value !== "\t" && $value !== "\n" && $value !== "\r" && $value !== "\r\t" && $value !== "\r\n" && $value !== "\r\r" && $value !== "\t\r" && $value !== "\t\n" && $value !== "\t\t" && $value !== "\n\r" && $value !== "\n\t" && $value !== "\n\n");
            $countFiltered = count($filtered);
            return json_encode(array('word_cont'=>$countFiltered,'file_ext'=>$fName));
           // return $countFiltered;
        }
        if($request->file->extension() == 'ods'){
            $fName = $request->file->getClientOriginalName();
            $request->file->move(public_path('/'), 'temp.docx');
            /* Set the PDF Engine Renderer Path */
            $domPdfPath = base_path('vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

            //Load word file
            $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('temp.docx'));

            //Save it into PDF
            $fileName = time();
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
            $PDFWriter->save(public_path('assets/website/documents/'.$fileName.'.pdf'));

            //store file name in session
            Session::put('document', $fileName);

            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile("public/assets/website/documents/".$fileName.".pdf");
            $text = $pdf->getText();
            $text = trim($text);
            // $data = explode(" ", $text);
            $data = explode(" ",str_replace(array("-", "\n")," ",$text));

            $filtered = array_filter($data, fn($value) => !is_null($value) && $value !== "-" && $value !== "" && $value !== " " && $value !== "\t" && $value !== "\n" && $value !== "\r" && $value !== "\r\t" && $value !== "\r\n" && $value !== "\r\r" && $value !== "\t\r" && $value !== "\t\n" && $value !== "\t\t" && $value !== "\n\r" && $value !== "\n\t" && $value !== "\n\n");
            $countFiltered = count($filtered);
            return json_encode(array('word_cont'=>$countFiltered,'file_ext'=>$fName));
           // return $countFiltered;
        }
        
        
        
        
        
        
        
        //return json_encode(array('word_cont'=>$countFiltered,'file_ext'=>$file_ext));
    }
    
    public function removefileUploadPost(Request $request){
        Session::forget('document');
        return json_encode(array('word_cont'=>'00','file_ext'=>'Upload File'));
    }
    
    

    public function confirmOrder(Request $request)
    {
        if($file = $request->file('file')){
            $fileName = $file->getClientOriginalName().uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('assets/website/documents'), $fileName);
        }else{
            $request->validate([
            'file' => 'required']);
        }
        

        $data = $request->except('file');
        // $data['document_name'] = isset($fileName)?$fileName:'';
        if(!empty($fileName)){

            Session::put('document', $fileName);
        }
        
        Session::put('data', $data);
        return redirect('order');

        /* if(Auth::check()){
            $model = Order::create([
                'user_id' => Auth::user()->id,
                'order_number' => 100000 + Order::all()->count() + 1,
                'total_amount' => $request->total_amount,
                'order_date' => date('Y-m-d'),
                'order_status' => 'success',
                'payment_status' => 'unpaid',
                'client_note' => $request->client_note,
                'document' => isset($fileName)?$fileName:NULL
            ]);

            if($model){
                OrderDetail::create([
                    'order_id' => $model->id,
                    'service_id' => $request->service_id,
                    'sub_service_id' => $request->sub_service,
                    'language' => $request->language,
                    'total_words' => $request->total_words,
                    'service_type' => $request->service_type,
                    'trunarround_time' => $request->trunaround_time,
                    'currency' => $request->currency,
                    'sub_amount' => $request->total_amount,
                    'total_amount' => $request->total_amount,
                ]);

                return redirect()->route('customer.payment', ['id'=>$model->order_number])->with('message','Order placed Successfully');
            } 
        }else{
            $data = $request->except('file');
            $data['document_name'] = isset($fileName)?$fileName:'';
            Session::put('data', $data);
            return redirect('login');
        } */
    }

    public function confirmSessionOrder(Request $request)
    {
        if($request->session()->has('data'))
        {
            $data = $request->session()->get('data');

            $model = Order::create([
                'user_id' => Auth::user()->id,
                'order_number' => 100000 + Order::all()->count() + 1,
                'total_amount' => $data['total_amount'],
                'order_date' => date('Y-m-d'),
                'order_status' => 'success',
                'payment_status' => 'unpaid',
                'client_note	' => $data['client_note'],
            ]);

            if($model){
                OrderDetail::create([
                    'order_id' => $model->id,
                    'service_id' => $data['service_id'],
                    'sub_service_id' => $data['sub_service'],
                    'language' => $data['language'],
                    'total_words' => $data['total_words'],
                    'service_type' => $data['service_type'],
                    'trunarround_time' => $data['trunaround_time'],
                    'currency' => $data['currency'],
                    'sub_amount' => $data['total_amount'],
                    'total_amount' => $data['total_amount'],
                ]);

                return redirect()->route('customer.payment', ['id'=>$model->order_number])->with('message','Order placed Successfully');
            }
        }
    }

    // Academic Service Page
    public function academic_service()
    {
        return view('website.academic');
    }
    public function terms()
    {
        return view('website.terms');
    }
    public function privacy()
    {
        return view('website.privacy');
    }

    // Business Corporate Service Page
    public function business_corporate()
    {
        return view('website.business_corporate');
    }
    

     // Non English Speaker Service Page
     public function non_english_speaker()
     {
         return view('website.non_english_speaker');
     }

     // Professional Service Page
     public function professional()
     {
         return view('website.professional');
     }

     // Student Service Page
     public function student()
     {
         return view('website.student');
     }

     // Writer Service Page
     public function writer()
     {
         return view('website.writer');
     }

     // Contact us Page
     public function contact_us()
     {
         return view('website.contact_us');
     }

     // Login  Page
     public function login()
     {
         return view('website.login');
     }

     // Sign up  Page
     public function sign_up()
     {
         return view('website.sign_up');
     }
    
     // My Orders  Page
     public function my_orders()
     {
        if(Auth::user()){
            $user = User::findOrFail(Auth::user()->id);
            if($user->hasRole('user')){
                $orders = Order::orderby('id', 'Desc')->where('user_id', Auth::user()->id)->get();
                return view('website.my_orders', compact('orders'));
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
     }

     public function orderDetails(Request $request)
     {
        $details = Order::where('order_number', $request->order_id)->first();
        return (string) view('website.order-details', compact('details'));
     }

    // My Orders  Page
    public function order()
    {
        return view('website.order');
    }

    // My Checkout  Page
    public function checkout(){
        return view('website.checkout');
    }

    //apply coupon
    public function AppliedCoupon(Request $request)
    {
        $order_data = Session::get('data');
        $total = $order_data['total_amount'];
        $details = Coupon::where('coupon_code', $request->coupon_code)->first();
        if($details){
            if($details->expire_date < date('Y-m-d')){
                return response()->json([
                    'status' => 'expired',
                ]);
            }else if($details->status==0 ){
                return response()->json([
                    'status' => 'in-active',
                ]);
            }else if($details->max_purchase){
                $usages = CouponUsageModel::where('user_id', Auth::user()->id)->where('coupon_code', $request->coupon_code)->get();
                if(!empty($usages) && sizeof($usages)>=$details->max_purchase ){
                    return response()->json([
                        'status' => 'used',
                    ]);
                }else{
                    $model = CouponUsageModel::create([
                        'user_id' => Auth::user()->id,
                        'coupon_code' => $request->coupon_code,
                        'usages' => 1,
                    ]);
                    
                    if($details->coupon_type=='fix'){

                        $discount_details = ([
                            'coupon_usage_id' => $model->id,
                            'coupon_id' => $details->id,
                            'coupon' => $details->coupon_code,
                            'type' => $details->coupon_type,
                            'tot_discount' => $details->discount,
                            'discount' => $details->discount,
                            'net_amount' => $total-$details->discount,
                        ]);

                        Session::put('discount', $discount_details);

                        return response()->json([
                            'status'=> 'true',
                        ]);
                    }else if($details->coupon_type=='percent'){
                        if($order_data){
                            $discount = $total*$details->discount/100;
                            $discount_details = ([
                                'coupon_usage_id' => $model->id,
                                'coupon_id' => $details->id,
                                'coupon' => $details->coupon_code,
                                'type' => $details->coupon_type,
                                'tot_discount' => $details->discount,
                                'discount' => $discount,
                                'net_amount' => $total-$discount,
                            ]);

                            Session::put('discount', $discount_details);                              

                            return response()->json([
                                'status'=> 'true', 
                            ]);
                        }
                    }
                }
            }
        }else{
            return response()->json([
                'status' => 'not-found',
            ]);
        }
    }

    //remove coupon
    public function removeCoupon(Request $request)
    {
        $data = Session::get('discount');
        if($data){
            CouponUsageModel::where('id', $data['coupon_usage_id'])->delete();
            Session::forget($request->session_key);
        }
        
        return response()->json([
            'status'=> 'true',
        ]);
    }

    public function paymentBy(Request $request)
    {
        if($request->method=='stripe'){
            return (string) view('website.payment-methods.stripe');
        }elseif($request->method=='paypal'){
            return (string) view('website.payment-methods.paypal');
        }
    }

    // Cv  Service Page
    public function cv(){
        $service_id = Service::where('title', 'Resume/CV')->first()->id;
        $sub_services = Service::where('status', 1)->where('parent_id', $service_id)->get();
        return view('website.cv', compact('sub_services', 'service_id'));
    }

    public function search(Request $request)
    {
       if($request->ajax()){
            $query = Order::where('id', '>', 0);
            if($request['search_by_all'] != ""){
                $query->where('id', 'LIKE', $request['search_by_all'])->
                orWhere('order_date', $request['date']);
            }
            if($request['search_status'] != "All"){
                $query->where('acceptance', $request['search_status']);
            }
            $models = $query->orderby('id', 'desc')->paginate(10);
            return view('backend.admin.orders.ajax', compact('models'));
        }
    }
    
    // About Us Page
    public function aboutUs(){
        return view('website.about');
    }
    
     // About Us Page
    public function career(){
        return view('website.career');
    }
    
    
    
}