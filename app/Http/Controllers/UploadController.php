<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Image;
use Storage;

class UploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        $request->file('filepond-image-bez-cveta')->storeAs('logos', $request->file('filepond-image-bez-cveta')->getClientOriginalName());
    }
}
