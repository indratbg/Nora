<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\Facades\Image;
use Response;
use App\Picture;
use View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon as Carbon;


class PictureController extends Controller
{
    //
    public function destroy($id_product, $filename)
    {
        Picture::whereId_product($id_product)->whereFilename($filename)->delete();
        //cek whatever image exist
        $cek = $exists = Storage::disk('product')->exists($filename);
        if($cek)Storage::disk('product')->delete($filename);
        $cek = $exists = Storage::disk('product_thumb')->exists($filename);
        if($cek)Storage::disk('product_thumb')->delete($filename);


        //Storage::disk('product')->delete($filename);
        return json_encode(array('status' => 'success'));
    }

    public function list_slider(Request $requests)
    {
        $images = Picture::whereType('slide')->get();

        if ($requests->ajax()) {
            return Response::json(View::make('admin.page.slider.image', ['images' => $images])->render());
        }
    }

    public function storeSlider(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('slider')->put($file->getFilename() . '.' . $extension, File::get($file));
            $model = new Picture();
            $model->title = $request->input('title');
            $model->desc = $request->input('desc');
            $model->type = 'slide';
            $model->filename = $file->getFilename() . '.' . $extension;
            $model->mime = $file->getClientMimeType();
            $model->original_filename = $file->getClientOriginalName();
            $model->save();

            //Resize Image
            $filename  ='xxxx' . '.' . $file->getClientOriginalExtension();
            $path = 'storage/app/public/product/thumb/'.$filename;
            Image::make($file->getRealPath())->resize(200, 200)->save($path);
        }

        return redirect('admin/slider');
    }

    public function destroySlider($filename)
    {
        Picture::whereFilename($filename)->delete();
        Storage::disk('slider')->delete($filename);
        return json_encode(array('status' => 'success'));
    }
}
