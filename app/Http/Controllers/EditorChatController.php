<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use App\Models\Order;
use App\Models\AcceptedJob;
use Auth;

class EditorChatController extends Controller
{
    public function editorChatRoom($order_number)
    {
        $current_order = Order::with('hasAccepted')->where('order_number', $order_number)->first();
        $editor_id = $current_order->hasAccepted->editor_id;
        $orders = Order::with('hasAccepted')->where('order_number', $order_number)->get();
        $admin_id = User::whereRoleIs('admin')->first()->id;
        // return $id; 
        $conversations = Chat::where('order_number', $order_number)->where('user', 'editor')->get();

        $customer = User::where('id', $admin_id)->first();
        return view('backend.editor.chatroom.chat', compact('conversations', 'current_order', 'customer', 'orders'));
    }

    public function store(Request $request)
    {
        $admin_id = User::whereRoleIs('admin')->first()->id;

        $generated_name = null;
        if (isset($_FILES['filename'])) { 
            $generated_name = time().'.'.request()->filename->getClientOriginalExtension();
            request()->filename->move(public_path('assets/files'), $generated_name);
        }

        $model = Chat::create([
            'order_number' => $request->order_id,
            'user' => 'editor',
            'sender_id' => Auth::user()->id,
            'reciever_id' => $admin_id,
            'message' => $request->message,
            'attachment' => $generated_name,
            'date' => date('Y-m-d'),
        ]);

        if($model){
            $conversations = Chat::where('order_number', $request->order_id)->where('user', 'editor')->get();

            $result = (string) view('backend.editor.chatroom.ajax.conversation', compact('conversations'));
        }

        if($result){
            
            $userDetails = User::where('id', $admin_id)->first();
            
            $details = [
                'from' => 'editor-to-admin-chat-email',
                'title' => 'Chat Messages',
                'customer' => $userDetails->name,
                'body' => $request->message,
            ];

            \Mail::to($userDetails->email)->send(new \App\Mail\mailNotification($details));
            
            return response()->json([
                'status' => 'true',
                'result' => $result,
            ]);
        }
    }
    public function show(Request $request)
    {
        $current_order = Order::where('order_number', $request->order_id)->first();

        $conversations = Chat::where('order_number', $request->order_id)->where('user', 'editor')->get();
        if($conversations){
            $result = (string) view('backend.editor.chatroom.ajax.conversation', compact('conversations'));
        }

        if($result){
            return response()->json([
                'status' => 'true',
                'result' => $result,
            ]);
        }
    }
}
