<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store($order_id)
    {
        return $order_id;
    }
}
