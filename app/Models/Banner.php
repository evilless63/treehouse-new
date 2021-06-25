<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends LocalizedModel
{
    use HasFactory;

    protected $guarded = ['localization'];

    public function colorVariations() {
        return $this->belongsToMany(ColorVariation::class, "banner_color_variation", "banner_id", "color_variation_id");
    }

    public function lookbooks(){
        return $this->belongsToMany(Lookbook::class, "banner_lookbook", "banner_id", "lookbook_id");
    }
}
