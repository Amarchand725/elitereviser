<?php

namespace App\Http\Controllers;

use App\Models\AcceptedJob;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Order;
use App\Models\MaxJobLmit;

class AcceptedJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //3=completed jobs
        //2=rejected jobs
        $active_jobs = AcceptedJob::where('editor_id', Auth::user()->id)->where('status', '!=', 3)->where('status', '!=', 2)->count();
        $max = MaxJobLmit::first();
        if($active_jobs <= $max->max_jobs_allowed){
            $model = AcceptedJob::create([
                'editor_id' => Auth::user()->id,
                'order_number' => $request->order_no,
                'accepted_date' => date('Y/m/d'),
                'status' => 1,
            ]);

            if($model){
                $order = Order::where('order_number', $request->order_no)->first();
                $order->acceptance = 1;
                $order->save();

                Session::flash('message', 'You have accepted order successfully.');
                return back();
            }
        }else{
            Session::flash('message', 'You have already three jobs are going complete first than can be eligible to accept new job.');
            return back();
        }
    }

    public function status(Request $request)
    {
        $order = Order::where('id', $request->job_id)->first();
        $accepted = AcceptedJob::where('order_number', $order->order_number)->first();

        if($file = $request->file('attachment')){
            $fileName = $file->getClientOriginalName().uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('assets/editor/job-documents'), $fileName);

            $accepted->document = $fileName;
        }

        $accepted->status = $request->status;
        if(isset($request->editor_note)){
            $accepted->editor_note = $request->editor_note;
        }
        if($request->status==3){ //3=completed job from editor
            $accepted->completed_date = date('Y-m-d');
        }
        $accepted->save();

        if($accepted){
            $order->save();

            Session::flash('message', 'You have updated your status successfully.');
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcceptedJob  $acceptedJob
     * @return \Illuminate\Http\Response
     */
    public function show(AcceptedJob $acceptedJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcceptedJob  $acceptedJob
     * @return \Illuminate\Http\Response
     */
    public function edit(AcceptedJob $acceptedJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcceptedJob  $acceptedJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcceptedJob $acceptedJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcceptedJob  $acceptedJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcceptedJob $acceptedJob)
    {
        //
    }
}
