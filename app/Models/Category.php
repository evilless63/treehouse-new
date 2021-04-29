<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Menu;
use LaravelLocalization;

class Category extends LocalizedModel
{

    use HasFactory;
    protected $guarded = ['localization'];
    public function products() {
        return $this->belongsToMany(Product::class);
    }
    
    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'category_id');
    }

    
    public static function buildMenu($arrMenu)
    {
        $mBuilder = Menu::make('MyNav', function ($m) use ($arrMenu) {
            foreach ($arrMenu as $item) {
                if ($item->parent_id == 0) {
                    $m->add($item->getLocalizeTitle(LaravelLocalization::getCurrentLocale()), $item->id, $item->parent_id)
                        ->id($item->id);
                } else {
                    if ($m->find($item->parent_id)) {
                        $m->find($item->parent_id)
                            ->add($item->getLocalizeTitle(LaravelLocalization::getCurrentLocale()), $item->id, $item->parent_id)
                            ->id($item->id);
                    }
                }
            }
        });
        return $mBuilder;
    }

}
