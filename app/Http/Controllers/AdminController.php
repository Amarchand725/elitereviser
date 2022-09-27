<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\MaxJobLmit;
use App\Models\ContactUs;
class AdminController extends Controller
{
    public function login()
    {
        if(Auth::user()){
            $user = User::findOrFail(Auth::user()->id);
            if($user->hasRole('admin')){
                return view('backend.admin.dashboard.dashboard');
            }else if($user->hasRole('editor')){
                return view('backend.editor.dashboard.dashboard');
            }else{
                return redirect('customer-place-order');
            }
        }
        return view('backend.admin.login.login');
    }
    public function setLogin(Request $request)
    {
       # check request...
       $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->hasRole('admin')){
                return json_encode('admin');
            }else if(Auth::user()->hasRole('editor')){
                return json_encode('editor');
            }else{
                return json_encode('customer');
            }
        }
        return 'false';
    }

    /**
    * Admin Dashboard
    **/
    public function dashboard(){
        if(!Auth::user()){
            return redirect('admin/login');
        }
        if(Auth::user()->hasRole('admin')){
            return view('backend.admin.dashboard.dashboard');
        }else if(Auth::user()->hasRole('editor')){
            return view('backend.editor.dashboard.dashboard');
        }
    }

    /* *
   *
   *
   * ************************ Customer Section Start *************************
   *
   *
   * */

    /**
    * All Customer
    **/
    public function allCustomers()
    {
        if(!Auth::user()){
           return view('backend.admin.login.login');
        }else{
            $user = User::findOrFail(Auth::user()->id);
            if($user->hasRole('admin')){
                $models = User::whereRoleIs('User')->orderby('id', 'desc')->paginate(5); //3=Audience
               return view('backend.admin.users.customer.index', compact('models'));
            }else{
                return view('backend.admin.login.login');
            }
        }

    }

    /**
    * Update Customer Status
    **/

    public function statusCustomer(Request $request)
    {
        if(!Auth::user()){
           return redirect('/admin');
        }
        $model = User::findOrFail($request->customer_id);
        $model->status = $request->status;
        $model->status_reason = $request->reason;
        $model->save();

        if($model){
            if($request->status==1){
                Session::flash('message', 'Customer Activated successfully!');
            }elseif($request->status==2){
                Session::flash('message', 'Customer Inactivated successfully!');
            }elseif($request->status==3){
                Session::flash('message', 'Editor Blocked successfully!');
            }
            return redirect()->back();
        }
    }


    /**
    * Search Customer
    **/
    public function allSearchedCustomer(Request $request)
    {
        if(!Auth::user()){
           return redirect('/admin');
        }

       //pagination & search songs
       if($request->ajax()){

            $query = User::where('id', '>', 0);
            if($request['search_by_all'] != ""){
                $query->where(function ($qry) use ($request) {
                    $qry->where('name', 'LIKE', "%". $request['search_by_all']."%")
                        ->orWhere('email', 'LIKE', "%". $request['search_by_all']."%")
                        ->orWhere('phone_number', 'LIKE', "%". $request['search_by_all']."%");
                });
            }
            if($request['search_status'] != "All"){
                $query->where('status', $request['search_status']);
            }
            $models = $query->whereRoleIs('User')->orderby('id', 'desc')->paginate(5);
            return  view('backend.admin.users.customer.ajax', compact('models'));
        }

    }

   /* *
   *
   *
   * ************************ Editors Section Start *************************
   *
   *
   * */
    /**
    * All Editors
    **/
    public function allEditors()
    {
        if(!Auth::user()){
           return view('backend.admin.login.login');
        }else{
            $user = User::findOrFail(Auth::user()->id);
            if($user->hasRole('admin')){
                $models = User::whereRoleIs('Editor')->orderby('id', 'desc')->paginate(5); //3=Audience
               return view('backend.admin.users.editors.index', compact('models'));
            }else{
                return view('backend.admin.login.login');
            }
        }

    }

    /**
    * Update Editor Status
    **/

    public function statusEditor(Request $request)
    {
        if(!Auth::user()){
           return redirect('/admin');
        }
        $model = User::findOrFail($request->editor_id);
        $model->status = $request->status;
        $model->status_reason = $request->reason;
        $model->save();

        if($model){
            if($request->status==1){
                Session::flash('message', 'Editor Activated successfully!');
            }elseif($request->status==2){
                Session::flash('message', 'Editor Inactivated successfully!');
            }elseif($request->status==3){
                Session::flash('message', 'Editor Blocked successfully!');
            }
            return redirect()->back();
        }
    }


    /**
    * Approve Editor
    **/
    public function approveEditor(Request $request){

        if(!Auth::user()){
            return redirect('/admin');
         }
         $model = User::findOrFail($request->editor_id);
         $model->is_approved = $request->approve_status;
         $model->approved_reason = $request->reason;
         $model->save();

         if($model){
             if($request->approve_status==2){
                 Session::flash('message', 'Editor Approved successfully!');
             }elseif($request->approve_status==3){
                 Session::flash('message', 'Editor Rejected successfully!');
             }
             return redirect()->back();
         }
    }

    /**
    * Search Editors
    **/
    public function allSearchedEditor(Request $request)
    {
        if(!Auth::user()){
           return redirect('/admin');
        }

       //pagination & search songs
       if($request->ajax()){

            $query = User::where('id', '>', 0);
            if($request['search_by_all'] != ""){
                $query->where(function ($qry) use ($request) {
                    $qry->where('name', 'LIKE', "%". $request['search_by_all']."%")
                        ->orWhere('email', 'LIKE', "%". $request['search_by_all']."%")
                        ->orWhere('phone_number', 'LIKE', "%". $request['search_by_all']."%");
                });
            }

            if($request['approve_status'] != "All"){
                $query->where('is_approved', $request['approve_status']);
            }
            if($request['search_status'] != "All"){
                $query->where('status', $request['search_status']);
            }



            $models = $query->whereRoleIs('Editor')->orderby('id', 'desc')->paginate(5);
            return  view('backend.admin.users.editors.ajax', compact('models'));
        }

    }




     /* *
   *
   *
   * ************************ Subscribers Section Start *************************
   *
   *
   * */
    /**
    * All Subscribers
    **/
    public function allSubscribers()
    {
        if(!Auth::user()){
           return view('backend.admin.login.login');
        }else{
            $user = User::findOrFail(Auth::user()->id);
            if($user->hasRole('admin')){
                $models = Subscribe::orderby('id', 'desc')->paginate(5);
                return view('backend.admin.users.subscribers.index', compact('models'));
            }else{
                return view('backend.admin.login.login');
            }
        }

    }

    /**
    * Update Subscribers Status
    **/

    public function statusSubscriber(Request $request)
    {
        if(!Auth::user()){
           return redirect('/admin');
        }
        $model = Subscribe::findOrFail($request->editor_id);
        $model->status = $request->status;
        $model->status_reason = $request->reason;
        $model->save();

        if($model){
            if($request->status==1){
                Session::flash('message', ' Activated successfully!');
            }elseif($request->status==2){
                Session::flash('message', ' Inactivated successfully!');
            }elseif($request->status==3){
                Session::flash('message', 'Editor Blocked successfully!');
            }
            return redirect()->back();
        }
    }



    /**
    * Search Subscribers
    **/
    public function allSearchedSubscriber(Request $request)
    {
        if(!Auth::user()){
           return redirect('/admin');
        }

       //pagination & search songs
       if($request->ajax()){

            $query = Subscribe::where('id', '>', 0);
            if($request['search_by_all'] != ""){
                $query->where(function ($qry) use ($request) {
                    $qry->where('name', 'LIKE', "%". $request['search_by_all']."%")
                        ->orWhere('email', 'LIKE', "%". $request['search_by_all']."%");
                });
            }
            if($request['search_status'] != "All"){
                $query->where('status', $request['search_status']);
            }



            $models = $query->orderby('id', 'desc')->paginate(5);
            return  view('backend.admin.users.subscribers.ajax', compact('models'));
        }

    }

      /* *
   *
   *
   * ************************ Contact Us Section Start *************************
   *
   *
   * */
    /**
    * All ContactUs
    **/
    public function allContactUs()
    {
        if(!Auth::user()){
           return view('backend.admin.login.login');
        }else{
            $user = User::findOrFail(Auth::user()->id);
            if($user->hasRole('admin')){
                $models = ContactUs::orderby('id', 'desc')->paginate(5);
                return view('backend.admin.contact-us.index', compact('models'));
            }else{
                return view('backend.admin.login.login');
            }
        }

    }

    /**
    * Update ContactUs Status
    **/

    public function statusContactUs(Request $request)
    {
        $model = ContactUs::findOrFail($request->contact_us_id);
        $model->is_read = $request->status;
        $model->save();

        if($model){
            Session::flash('message', 'Status updated successfully!');
            return 1;
        }
    }



    /**
    * Search ContactUs
    **/
    public function allSearchedContactUs(Request $request)
    {
        if(!Auth::user()){
           return redirect('/admin');
        }

       //pagination & search songs
       if($request->ajax()){

            $query = ContactUs::where('id', '>', 0);
            if($request['search_by_all'] != ""){
                $query->where(function ($qry) use ($request) {
                    $qry->where('name', 'LIKE', "%". $request['search_by_all']."%")
                        ->orWhere('email', 'LIKE', "%". $request['search_by_all']."%");
                });
            }
            if($request['search_status'] != "All"){
                $query->where('status', $request['search_status']);
            }



            $models = $query->orderby('id', 'desc')->paginate(5);
            return  view('backend.admin.contact-us.ajax', compact('models'));
        }

    }
    
    public function setJobLimit()
    {
        $details = MaxJobLmit::orderby('id', 'desc')->first();
        if(!empty($details)){
            return view('backend.admin.job-limit.job-limit', compact('details'));
        }else{
            return view('backend.admin.job-limit.job-limit');
        }
    }
    public function setJobLimitUpdate(Request $request, $id)
    {
        $model = MaxJobLmit::where('id', $id)->first(); 
        $model->max_jobs_allowed = $request->max_job_limit;
        $model->save(); 
        
        if($model){
            Session::flash('message', 'You have updated max job limit successfully.');
            return redirect()->back();
        }
       
    }
    public function setJobLimitStore(Request $request)
    {
        $model = MaxJobLmit::create([
            'max_jobs_allowed' => $request->max_job_limit,
        ]);

        if($model){
            Session::flash('message', 'You have added max job limit successfully.');
            return redirect()->route('admin.job_limit.update', ['id'=>$model->id]);
        }
    }

}
