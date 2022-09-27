<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->details = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $details = $this->details;
        if($details['from']=='admin-to-customer-chat-email'){
            //customer registration email for customer
            return $this->subject('Chat Messages')->view('emails.admin-to-customer-chat-email');
        }elseif($details['from']=='customer-to-admin-chat-email'){
            //customer registration email for admin
            return $this->subject('Chat Messages')->view('emails.customer-to-admin-chat-email');
        }elseif($details['from']=='admin-to-editor-chat-email'){
            //Admin to Editor Chat email
            return $this->subject('Chat Messages')->view('emails.admin-to-editor-chat-email');
        }elseif($details['from']=='editor-to-admin-chat-email'){
            //Editor to admin  chat email
            return $this->subject('Chat Messages')->view('emails.editor-to-admin-chat-email');
        }elseif($details['from']=='admin-email'){
            //customer registration email for admin
            return $this->subject('New Lead')->view('emails.admin-lead-info');
        }elseif($details['from']=='customer-new-order'){
            //customer registration email for customer
            return $this->subject('New Order')->view('emails.customer-new-order');
        }elseif($details['from']=='admin-new-order'){
            //customer registration email for admin
            return $this->subject('New Order')->view('emails.admin-new-orders');
        }elseif($details['from']=='customer-new-order-payment'){
            //customer registration email for admin
            return $this->subject('Order Payment')->view('emails.customer-new-order-payment');
        }elseif($details['from']=='admin-new-order-payment'){
            //customer registration email for admin
            return $this->subject('Order Payment')->view('emails.admin-new-order-payment');
        }
    }
}

