<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lookbook;

class LookbookLocalization extends Model
{
    use HasFactory;

    protected $fillable = ['lang','title'];
    public $timestamps = false;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lookbook()
    {
        return $this->belongsTo(Lookbook::class);
    }
}
