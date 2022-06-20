<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasArtist()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
