<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use App\Models\Order;
use Auth;

class CustomerChatController extends Controller
{
    public function chatRoom($order_number)
    {
        $iffound = Order::where('order_number', $order_number)->where('user_id', Auth::user()->id)->first();
        if(!empty($iffound)){
            $admin_id = User::whereRoleIs('admin')->first()->id;
            $models = Chat::where('order_number', $order_number)->where('reciever_id', $admin_id)->where('sender_id', Auth::user()->id)->orWhere('reciever_id', Auth::user()->id)->where('sender_id', $admin_id)->get();
            return view('website.chat.chat', compact('models', 'order_number', 'admin_id'));
        }else{
            return redirect()->route('my_orders');
        }
    }

    public function store(Request $request)
    {
        $generated_name = null;
        if (isset($_FILES['filename'])) { 
            $generated_name = time().'.'.request()->filename->getClientOriginalExtension();
            request()->filename->move(public_path('assets/files'), $generated_name);
        }

        $admin_id = User::whereRoleIs('admin')->first()->id;
        $chat = Chat::create([
            'order_number' => $request->order_number,
            'user' => 'customer',
            'sender_id' => Auth::user()->id,
            'reciever_id' => $admin_id,
            'message' => $request->message,
            'attachment' => $generated_name,
            'date' => date('Y-m-d'),
            'status' => 1,
        ]);

        if($chat){
            $userDetails = User::whereRoleIs('admin')->first();
            
            $details = [
                'from' => 'customer-to-admin-chat-email',
                'title' => 'Chat Messages',
                'customer' => $userDetails->name,
                'body' => $request->message,
            ];

            \Mail::to($userDetails->email)->send(new \App\Mail\mailNotification($details));
            $models = Chat::where('order_number', $request->order_number)->where('user', 'customer')->get();
            return view('website.chat.ajax', compact('models', 'admin_id'));
        }
    }

    public function show(Request $request)
    {
        // return $request->order_id;
        $admin_id = User::whereRoleIs('admin')->first()->id;
        $models = Chat::where('order_number', $request->order_id)->where('user', 'customer')->get();
        return (string) view('website.chat.ajax', compact('models', 'admin_id'));
    }
}
