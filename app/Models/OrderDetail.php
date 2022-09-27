<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $guarded = [];

    public function hasMainService()
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }
    public function hasSubService()
    {
        return $this->hasOne(Service::class, 'id', 'sub_service_id');
    }
}
