<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [
        'user_id',
        'ip_address',
        'payment_id',
        'name',
        'phone_no',
        'shipping_address',
        'email',
        'message',
        'is_paid',
        'is_completed',
        'is_seen_by_admin',
        'transaction_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //There can be so many carts for an order
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
