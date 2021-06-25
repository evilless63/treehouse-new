<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lookbook extends LocalizedModel
{
    use HasFactory;

    protected $guarded = ['localization'];

    public function banners(){
        return $this->belongsToMany(Banner::class, "banner_lookbook", "lookbook_id", "banner_id");
    }
}
