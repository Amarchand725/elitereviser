<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $models = Order::latest()->paginate(10);
        return view('backend.admin.orders.index', compact('models'));
    }
    public function show($id)
    {
        $model = Order::findOrFail($id);
        return view('backend.admin.orders.show', compact('model'));
    }
}