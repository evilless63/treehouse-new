<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public function size() {
        return $this->belongsTo(Size::class);
    }

    public function colorVariation() {
        return $this->belongsTo(colorVariation::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
