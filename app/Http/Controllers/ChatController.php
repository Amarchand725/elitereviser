<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use App\Models\Order;
use App\Models\AcceptedJob;
use Auth;

class ChatController extends Controller
{
    public function adminChat($order_number)
    {
        $order = Order::where('order_number', $order_number)->first();
        $user_id = $order->user_id;
        if(!empty($order)){
            $models = Chat::where('order_number', $order_number)->where('user', 'customer')->get();
            return view('backend.admin.chat.chat', compact('models', 'order_number', 'user_id'));
        }else{
            return redirect()->route('my_orders');
        }
    }

    //admin chat with customer 
    public function adminChatStore(Request $request)
    {
        
        return 'Admin';
        
        $order = Order::where('order_number', $request->order_number)->first();
        $user_id = $order->user_id;
        $chat = Chat::create([
            'order_number' => $request->order_number,
            'user' => 'customer',
            'sender_id' => Auth::user()->id,
            'reciever_id' => $order->user_id,
            'message' => $request->message,
            'date' => date('Y-m-d'),
            'status' => 1,
        ]);
        
    
        if($chat){
            
            $models = Chat::where('order_number', $request->order_number)->where('user', 'customer')->get();
            return view('backend.admin.chat.ajax', compact('models', 'user_id'));
        }
    }

    public function adminChatShow(Request $request)
    {
        $order = Order::where('order_number', $request->order_number)->first();
        $user_id = $order->user_id;

        $models = Chat::where('order_number', $request->order_number)->where('user', 'customer')->get();
        return view('backend.admin.chat.ajax', compact('models', 'user_id'));
    }

    //Admin chat room
    public function chatRoom($id)
    {
        $current_order = Order::where('order_number', $id)->first();
        $orders = Order::orderby('id', 'desc')->where('user_id', $current_order->user_id)->get();
        // return $id; 
        $conversations = Chat::where('order_number', $id)->where('user', 'customer')->get();

        $customer = User::where('id', $current_order->user_id)->first();
        return view('backend.admin.chatroom.chat', compact('conversations', 'current_order', 'customer', 'orders'));
    }
    

    public function storeChat(Request $request)
    {
        // if ($_FILES['filename']) { 
        //     $rules = ([
        //         'filename' => 'required|file|size:5000',
        //     ]);
        // }

        // $this->validate($request, $rules);
        $generated_name = null;
        if (isset($_FILES['filename'])) { 
            $generated_name = time().'.'.request()->filename->getClientOriginalExtension();
            request()->filename->move(public_path('assets/files'), $generated_name);
        }

        $model = Chat::create([
            'order_number' => $request->order_id,
            'user' => 'customer',
            'sender_id' => Auth::user()->id,
            'reciever_id' => $request->user_id,
            'message' => $request->message,
            'attachment' => $generated_name,
            'date' => date('Y-m-d'),
        ]);

        if($model){
            
            $userDetails = User::where('id', $request->user_id)->first();
            
            $details = [
                'from' => 'admin-to-customer-chat-email',
                'title' => 'Chat Messages',
                'customer' => $userDetails->name,
                'body' => $request->message,
            ];

            \Mail::to($userDetails->email)->send(new \App\Mail\mailNotification($details));
            
            $conversations = Chat::where('order_number', $request->order_id)->where('user', 'customer')->get();

            $result = (string) view('backend.admin.chatroom.ajax.conversation', compact('conversations'));
        }

        if($result){
            return response()->json([
                'status' => 'true',
                'result' => $result,
            ]);
        }
    }

    public function getChat(Request $request)
    {
        $current_order = Order::where('order_number', $request->order_id)->first();
        $conversations = Chat::where('order_number', $request->order_id)->where('user', 'customer')->get();
        if($conversations){
            $result = (string) view('backend.admin.chatroom.ajax.conversation', compact('conversations'));
        }

        if($result){
            return response()->json([
                'status' => 'true',
                'result' => $result,
            ]);
        }
    }

    //Admin Chat with Editor
    public function chatWithEditor($order_number)
    {
        $current_order = Order::with('hasAccepted')->where('order_number', $order_number)->first();
        $editor_id = $current_order->hasAccepted->editor_id;
        $orders = Order::with('hasAccepted')->where('order_number', $order_number)->get();

        // return $id; 
        $conversations = Chat::where('order_number', $order_number)->where('user', 'editor')->get();


        $customer = User::where('id', $editor_id)->first();
        return view('backend.admin.chatroom.editor-chat', compact('conversations', 'current_order', 'customer', 'orders'));
    }
    public function getEditorChat(Request $request)
    {
        $current_order = Order::where('order_number', $request->order_id)->first();

        $conversations = Chat::where('order_number', $request->order_id)->where('user', 'editor')->get();
        if($conversations){
            $result = (string) view('backend.admin.chatroom.ajax.editor-conversation', compact('conversations'));
        }

        if($result){
            return response()->json([
                'status' => 'true',
                'result' => $result,
            ]);
        }
    }
    public function adminEditorChatStore(Request $request)
    {
        // return $request;
        $generated_name = null;
        if (isset($_FILES['filename'])) { 
            $generated_name = time().'.'.request()->filename->getClientOriginalExtension();
            request()->filename->move(public_path('assets/files'), $generated_name);
        }

        $model = Chat::create([
            'order_number' => $request->order_id,
            'user' => 'editor',
            'sender_id' => Auth::user()->id,
            'reciever_id' => $request->user_id,
            'message' => $request->message,
            'attachment' => $generated_name,
            'date' => date('Y-m-d'),
        ]);

        if($model){
            
            $conversations = Chat::where('order_number', $request->order_id)->where('user', 'editor')->get();

            $result = (string) view('backend.admin.chatroom.ajax.editor-conversation', compact('conversations'));
            
            $userDetails = User::where('id', $request->user_id)->first();
            
            $details = [
                'from' => 'admin-to-editor-chat-email',
                'title' => 'Chat Messages',
                'customer' => $userDetails->name,
                'body' => $request->message,
            ];

            \Mail::to($userDetails->email)->send(new \App\Mail\mailNotification($details));
            
            
        }

        if($result){
            return response()->json([
                'status' => 'true',
                'result' => $result,
            ]);
        }
    }
}