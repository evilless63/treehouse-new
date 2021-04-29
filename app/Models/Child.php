<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function size() {
        return $this->hasOne(Size::class, 'size_id', 'id');
    }
}
