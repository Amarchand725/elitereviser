<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\AcceptedJob;
use App\Models\Service;
use App\Models\OrderDetail;
use Auth;

class EditorController extends Controller
{
    public function newJobs()
    {
        $services = Service::where('status', 1)->get();
        $models = Order::orderby('id', 'desc')->where('acceptance', null)->paginate();
        return view('backend.editor.new-jobs.index', compact('models', 'services'));
    }
    public function jobDetails(Request $request)
    {
        $model = Order::findOrFail($request->id);
        return (string) view('backend.editor.new-jobs.show', compact('model'));
    }
    public function yourJobs()
    {
        $accepted_jobs = AcceptedJob::where('editor_id', Auth::user()->id)->get(['order_number']);
        $models = Order::orderby('id', 'desc')->whereIn('order_number', $accepted_jobs)->paginate(10);
        return view('backend.editor.your-jobs.index', compact('models'));
    }
    public function acceptJob()
    {
        $models = Order::orderby('id', 'desc')->paginate(5);
        return redirect()->route('editor.your-jobs')->with('message', 'You have accepted this job, Thanks');
    }
    public function showJob($id)
    {
        $job_details = Order::orderby('id', 'desc')->where('id', $id)->first();
        return view('backend.editor.your-jobs.show', compact('job_details'));
    }

    public function search(Request $request)
    {
       if($request->ajax()){
            $query = Order::where('id', '>', 0);
            
            $order_id = OrderDetail::where('service_id', $request['title'])->orwhere('sub_service_id', $request['title'])->first();
            if(!empty($order_id)){
                $query->where('id', $order_id->order_id);
            }
            if($request['date'] != ""){
                $query->where('order_date', $request['date']);
            }
            $models = $query->orderby('id', 'desc')->paginate(10);
            return view('backend.editor.new-jobs.ajax', compact('models'));
        }
    }
}
