<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Image;
use Storage;
use App\Models\ColorVariation;
use App\Models\ImageGallery;

class UploadController extends Controller
{
    public function imageUpload(Request $request)
    {
        $folder = '';
        $colorVariation  = ColorVariation::where('id', $request->color_variation_id)->first();
        if($colorVariation != null ) {
            $folder = $folder . '/' . $colorVariation->product->slug . '/' . $colorVariation->color->slug;
        }
        
        $time = time();
        $imageName = $time . $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images' . $folder),  $imageName);

        $image = new ImageGallery;
        $image->img_path = 'images' . $folder . "/" . $imageName;
        $image->slug = $imageName;
        $image->color_variation_id = $colorVariation->id;
        $image->save(); 

        return json_encode($imageName);
    }

    public function mainImageUpload(Request $request)
    {
        $folder = '';
        $colorVariation  = ColorVariation::where('id', $request->color_variation_id)->first();
        if($colorVariation != null ) {
            $folder = $folder . '/' . $colorVariation->product->slug . '/' . $colorVariation->color->slug;
        }
        
        $time = time();
        $imageName = $time . $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images' . $folder),  $imageName);

        $colorVariation->main_img = 'images' . $folder . "/" . $imageName;
        $colorVariation->update(); 

        return json_encode($imageName);
    }

    public function imageDelete(Request $request)
    {

        $folder = '';
        $colorVariation  = ColorVariation::where('id', $request->color_variation_id)->first();

        if($colorVariation != null ) {
            $folder = $folder . '/' . $colorVariation->product->slug . '/' . $colorVariation->color->slug;
        }

        try {
            $image = str_replace('"', '', $request->image);
            File::delete(public_path('images' . $folder), $image);

            $storedImage = ImageGallery::where('color_variation_id', $colorVariation->id)
            ->where('img_path', 'images' . $folder . "/" . $image)->first();

            $storedImage->delete();

        } catch (Exception $e) {
        } finally {
        }
        return json_encode($image);
    }

    public function deleteImageFromGallery()
    {
        $image = ImageGallery::where('id', request()->image_id);
        $image->delete();
        return;
    }
}
