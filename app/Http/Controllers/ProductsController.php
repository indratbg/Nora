<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth As Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Products;
use App\Picture;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon as Carbon;

class ProductsController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Carbon::createFromFormat('d/m/Y', $request->input('post_date_from')))  $post_date_from = Carbon::createFromFormat('d/m/Y',  $request->input('post_date_from'))->format('Y-m-d');
        if(Carbon::createFromFormat('d/m/Y', $request->input('post_date_to')))  $post_date_to = Carbon::createFromFormat('d/m/Y',  $request->input('post_date_to'))->format('Y-m-d');
        $validator = Validator::make($request->all(),Products::$rules);
        if($validator->fails())
        {
            return Redirect::to('admin/create_product')->withInput()->withErrors($validator);
        }
       $model = new Products;
        $id_product = rand().substr($request->input('product_name'), 4);
       $model->id_product= $id_product;
       $model->product_name=$request->input('product_name');
       $model->category = $request->input('category');
       $model->description = $request->input('description');
       $model->stock = $request->input('stock');
       $model->price = $request->input('price');
       $model->post_date_from = $post_date_from;
       $model->post_date_to = $post_date_to;
       $model->status = $request->input('status');
       $model->save();

       if($request->hasFile('image'))
       {

        $files = $request->file('image.*');
      //  var_dump(count($files));die();
        foreach ($files as $file) 
        {            
            $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(['file'=> $file], $rules);
            if($validator->fails())
            {
                 return Redirect::to('admin/create_product')->withInput()->withErrors($validator);
            }

            $extension = $file->getClientOriginalExtension();
            Storage::disk('product')->put($file->getFilename().'.'.$extension,  File::get($file));
            $entry = new Picture();
            $entry->id_product = $id_product;
            $entry->filename = $file->getFilename().'.'.$extension;
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->save();
        }
       

       }

       if($request->input('category') =='accessories')
       {
            return Redirect::to('admin/list_accesories')->with('success',ucfirst($request->input('product_name')).' has been saved');
       }
       else
       {    
            return Redirect::to('admin/list_fassion')->with('success',ucfirst($request->input('product_name')).' has been saved');
       }
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
