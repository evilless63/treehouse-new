<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends LocalizedModel
{
    use HasFactory;

    protected $guarded = ['localization'];

}
