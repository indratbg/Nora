<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;

class PictureController extends Controller
{
    //
    public  function destroy($id_product,$filename)
    {
        Picture::whereId_product($id_product)->whereFilename($filename)->delete();
        Storage::disk('product')->delete($filename);
        return json_encode(array('status'=>'success'));
    }
}
