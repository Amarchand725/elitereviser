<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Auth;
use Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Coupon::orderby('id', 'desc')->paginate(10);
        return view('backend.admin.coupons.index', compact('models'));
    }

    //search by ajax
    public function allCoupons(Request $request)
    {
        if(!empty($request['status'])){
            $query = Coupon::with('hasUser');
            if($request['title'] != ""){
                $query->where('title', 'like', '%'. $request['title'].'%');
            } 
            if($request['start_date']!=""){
                $query->where('start_date', $request['start_date']);
            } 
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            
            $models = $query->paginate(10);
        }

        return (string) view('backend.admin.coupons.ajax', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if(!Auth::user()){
           return redirect('/admin');
        }
        $rules = ([
            'title' => 'required',
            'coupon_type' => 'required',
            'discount' => 'required',
            'coupon_code' => 'required',
            'start_date'  => 'required|date',
            'expire_date' => 'required|date|after_or_equal:start_date',
            'max_purchase' => 'required',
        ]);

        $this->validate($request, $rules);

        $model = Coupon::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'coupon_type' => $request->coupon_type,
            'discount' => $request->discount,
            'coupon_code' => $request->coupon_code,
            'start_date'  => $request->start_date,
            'expire_date' => $request->expire_date,
            'max_purchase' => $request->max_purchase,
            'status' => $request->status,
            '_token' => $request->_token,
        ]);
        if($model){
            Session::flash('message', 'Coupon created successfully!');
            return redirect()->back();   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if(!Auth::user()){
           return redirect('/admin');
        }
        $details = Coupon::findOrFail($id);
        return view('backend.admin.coupons.edit', compact('details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         if(!Auth::user()){
           return redirect('/admin');
        }
        $rules = ([
            'title' => 'required',
            'coupon_type' => 'required',
            'discount' => 'required',
            'coupon_code' => 'required',
            'start_date'  => 'required|date',
            'expire_date' => 'required|date|after_or_equal:start_date',
            'max_purchase' => 'required',
        ]);

        $this->validate($request, $rules);

        $details = Coupon::where('id', $request->coupon_id)->first();
        $details->title = $request->title;
        $details->coupon_type = $request->coupon_type;
        $details->discount = $request->discount;
        $details->coupon_code = $request->coupon_code;
        $details->start_date = $request->start_date;
        $details->expire_date = $request->expire_date;
        $details->max_purchase = $request->max_purchase;
        $details->status = $request->status;
        $details->update();

        if($details){
            Session::flash('message', 'Coupon updated successfully!');
            return redirect()->back();   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Coupon::findOrFail($id)->delete();
        if($deleted){
            return true;
        }else{
            return false;
        }
    }

    public function couponStatus(Request $request)
    {
        $model = Coupon::findOrFail($request->coupon_id);
        $model->status = $request->status;
        $model->save();

        if($model){
            if($request->status==1){//1=Active
                Session::flash('message', 'Coupon Activited successfully!');
            }elseif($request->status==0){//In-Active
                Session::flash('message', 'Coupon In-activited successfully!');
            }
            return redirect('/admin/coupons');
        }
    }
}
