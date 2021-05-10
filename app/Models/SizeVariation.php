<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeVariation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function size() {
        return $this->belongsTo(Size::class);
    }

    public function colorVariation() {
        return $this->belongsTo(colorVariation::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    // public function getMinPrice() {
    //     return $this->sortBy('price')->first()->price;
    // }

    // public function getMaxPrice() {
    //     return $this->sortByDesc('price')->first()->price;
    // }
}
