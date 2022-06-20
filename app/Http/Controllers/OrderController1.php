<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Auth;
use App\Models\Commission;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()){
           return redirect('/admin');
        }
        $models = Order::orderby('id', 'desc')->paginate(10);
        return view('backend.admin.orders.index', compact('models'));
    }
    
    public function orderInvoice($id){
         if(!Auth::user()){
           return redirect('/admin');
        }
        $order = Order::where('id', $id)->first();
        return view('frontEnd.customer.order-invoice', compact('order'));
    }

    public function ArtistOrderInvoice($id){
         if(!Auth::user()){
           return redirect('/admin');
        }
        $order = Order::where('order_number', $id)->first();
        return view('backend.artist.orders.order-invoice', compact('order'));
    }

    //search ajax
    public function getAllOrders(Request $request)
    {
        if(!empty($request['status'])){
            $query = Order::with('hasUser');
            if($request['order_no'] != ""){
                $query->where('order_number', $request['order_no']);
            } 
            if($request['date'] != ""){
                $query->where('order_date', $request['date']);
            } 
            if($request['status']!="All"){
                $query->where('order_status', $request['status']);
            }

           $models = $query->get();
        }

        return (string) view('backend.admin.orders.ajax', compact('models'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         if(!Auth::user()){
           return redirect('/admin');
        }
        $model = Order::with('hasItems')->findOrFail($id);
        return view('backend.admin.orders.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    //Artist orders
    public function artistOrders()
    {
         if(!Auth::user()){
           return redirect('/admin');
        }
        $models = OrderDetail::where('artist_id', Auth::user()->id)->groupBy('order_id')
        ->selectRaw('*, sum(sub_total) as sum')
        ->paginate(10);
        
        $commission = Commission::where('status', 1)->first()->percentage;

        return view('backEnd.artist.orders.index', compact('models', 'commission'));
    }

    public function orderDetails($id)
    {
         if(!Auth::user()){
           return redirect('/admin');
        }
        $models = OrderDetail::where('artist_id', Auth::user()->id)->where('order_id', $id)->get();
        // $commission = Commission::where('status', 1)->first()->percentage;
        return view('backend.artist.orders.show', compact('models'));
    }

    public function getAllArtistOrders(Request $request)
    {
         if(!Auth::user()){
           return redirect('/admin');
        }
        if(!empty($request['status'])){
            $query = OrderDetail::where('artist_id', Auth::user()->id)->groupBy('order_id')->selectRaw('*, sum(sub_total) as sum');
            if($request['order_no'] != ""){
                $query->where('order_number', $request['order_no']);
            } 
            if($request['date'] != ""){
                $query->where('order_date', $request['date']);
            } 
            if($request['status']!="All"){
                $query->where('order_status', $request['status']);
            }

           $models = $query->paginate(10);
        }
        
        $commission = Commission::where('status', 1)->first()->percentage;

        return (string) view('backend.artist.orders.ajax', compact('models', 'commission'));
    }
}
