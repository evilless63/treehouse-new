<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart as CartModel;
use Delivery;
use Payment;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'is_closed', 'is_paid', 'country', 'city', 'street', 'house', 'zipcode', 'delivery_id', 'payment_id'];

    // public function colorVariation() {
    //     return $this->belongsTo(ColorVariation::class);
    // }

    // public function sizeVariation() {
    //     return $this->belongsTo(SizeVariation::class);
    // }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function productSet() {
        $this->hasOne(CartModel::class, 'identifier');
    }

    public function delivery() {
        $this->hasOne(Delivery::class, 'id');
    }

    public function payment() {
        $this->hasOne(Payment::class, 'id');
    }
}
