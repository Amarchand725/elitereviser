<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\CPU\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Service::orderby('id', 'desc')->paginate(10);
        return view('backend.admin.services.index', compact('models'));
    }

    /**
    * Search Service
    **/
    public function search(Request $request)
    {
       if($request->ajax()){
            $query = Service::with('hasParent')->where('id', '>', 0);
            if($request['search_by_all'] != ""){
                $query->where(function ($qry) use ($request) {
                    $qry->where('title', 'LIKE', "%". $request['search_by_all']."%");
                });
            }
            if($request['search_status'] != "All"){
                $query->where('status', $request['search_status']);
            }
            $models = $query->orderby('id', 'desc')->paginate(10);
            return view('backend.admin.services.ajax', compact('models'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::orderby('id', 'desc')->where('status', 1)->get();
        return view('backend.admin.services.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ], [
            'title.required' => 'Service title is required!',
        ]);

        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $result = Service::create([
            'user_id' => Auth::user()->id,
            'parent_id' => $request->parent_id!=null?$request->parent_id:null,
            'title' => $request->title,
            'short_description' => $request->description,
        ]);
        if($result){
            return response()->json([], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service, $id)
    {
        $details = $service->findOrFail($id);
        $services = Service::orderby('id', 'desc')->where('status', 1)->get();
        return view('backend.admin.services.edit', compact('details', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ], [
            'title.required' => 'Service title is required!',
        ]);

        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $details = $service->find($id);
        $details->user_id = Auth::user()->id;
        $details->parent_id = $request->parent_id!=null?$request->parent_id:null;
        $details->title = $request->title;
        $details->short_description = $request->description;
        $details->status = $request->status;
        $details->save();

        if($details){
            return response()->json([], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, $id)
    {
        $result = $service->find($id)->delete();
        if($result){
            return response()->json([], 200);
        }
    }
}
