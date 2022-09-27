<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasOrderDetails()
    {
        return $this->hasOne(OrderDetail::class, 'order_id', 'id');
    }
    public function hasPayment()
    {
        return $this->hasOne(Payment::class, 'order_id', 'order_number');
    }
    public function hasUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function hasAccepted()
    {
        return $this->hasOne(AcceptedJob::class, 'order_number', 'order_number');
    }
}
