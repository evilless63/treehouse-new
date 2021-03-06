<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;

    protected $guarded = ['promocode_newer_ends'];

    public function categories() {
        return $this->belongsToMany(Category::class, "category_promocode", "promocode_id", "category_id");
    }

    public function colorVariations() {
        return $this->belongsToMany(ColorVariation::class, "color_variation_promocode", "promocode_id", "color_variation_id");
    }

    public function products() {
        return $this->belongsToMany(Product::class, "product_promocode", "promocode_id", "product_id");
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

}
