<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorVariation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function color() {
        return $this->BelongsTo(Color::class);
    }

    public function product() {
        return $this->BelongsTo(Product::class);
    }

    public function images() {
        return $this->hasMany(ImageGallery::class);
    }

    public function sizeVariations() {
        return $this->hasMany(SizeVariation::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class, "category_color_variaton", "color_variation_id", "category_id");
    }

    public function main_img() {
        if(!empty($this->main_img)) {
            return $this->main_img;
        } else {
            return '/icons/noimage.jpg';
        }
    }

    public function wishlists() {
        return $this->hasMany(Wishlist::class);
    }

    public function inStock() {
        $count = 0;
        foreach($this->sizeVariations as $sv){
            if($sv->stock >= 0) {
                $count += $sv->stock;
            }
        }
        return $count > 0 ? true : false;
    }

}
