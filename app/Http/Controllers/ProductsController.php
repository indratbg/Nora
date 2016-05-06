<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth As Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Session;
use Request;
//use Illuminate\Http\Response;
use App\Products;
use App\Picture;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
//use Carbon\Carbon as Carbon;

class ProductsController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin',['except'=>'index']);
    }

    public function index()
    {
        //
    }
    public function ajaxList()
    {
        $data = Products::get();

        return response()->view('admin.page.products.list_products',['data'=>$data]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        try{
            $model = new Products;
            $id_product = rand() . substr($request->input('product_name'), 4);
            $model->id_product = $id_product;
            $model->product_name = $request->input('product_name');
            $model->category = $request->input('category');
            $model->description = $request->input('description');
            $model->stock = $request->input('stock');
            $model->price = $request->input('price');
            $model->post_date_from = $request->input('post_date_from');
            $model->post_date_to = $request->input('post_date_to');
            $model->status = $request->input('status');
            $model->save();
        }
        catch(\PDOException $e){
            return Redirect::to('admin/create_product')->with('error',$e->getMessage())->withInput();
        }

        if ($request->hasFile('image'))
        {
            $files = $request->file('image.*');
            foreach ($files as $file) {
                $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(['file' => $file], $rules);
                if ($validator->fails()) {
                    return Redirect::to('admin/create_product')->withInput()->withErrors($validator);
                }

                $extension = $file->getClientOriginalExtension();
                Storage::disk('product')->put($file->getFilename() . '.' . $extension, File::get($file));
                $entry = new Picture();
                $entry->id_product = $id_product;
                $entry->type = 'product';
                $entry->filename = $file->getFilename() . '.' . $extension;
                $entry->mime = $file->getClientMimeType();
                $entry->original_filename = $file->getClientOriginalName();
                $entry->save();
            }
        }
        return Redirect::to('admin/products')->with('success', ucfirst(Request::input('product_name')) . ' has been saved');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id_product)
    {/*
        $validator = Validator::make($request->all(), Products::$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (Carbon::createFromFormat('d/m/Y', $request->input('post_date_from'))) $post_date_from = Carbon::createFromFormat('d/m/Y', $request->input('post_date_from'))->format('Y-m-d');
        if (Carbon::createFromFormat('d/m/Y', $request->input('post_date_to'))) $post_date_to = Carbon::createFromFormat('d/m/Y', $request->input('post_date_to'))->format('Y-m-d');*/

        $model = Products::where('id_product', $id_product)->
        update(['product_name' => $request->input('product_name'),
            'post_date_from' =>$request->input('post_date_from'),
            'post_date_to' => $request->input('post_date_to'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'status' => $request->input('status')
        ]);
        if ($request->hasFile('image'))
        {
            $files = $request->file('image.*');
            //  var_dump(count($files));die();
            foreach ($files as $file) {
                $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(['file' => $file], $rules);
                if ($validator->fails()) {
                    return Redirect::to('admin/edit_product')->withInput()->withErrors($validator);
                }

                $extension = $file->getClientOriginalExtension();
                Storage::disk('product')->put($file->getFilename() . '.' . $extension, File::get($file));
                $entry = new Picture();
                $entry->id_product = $id_product;
                $entry->type = 'product';
                $entry->filename = $file->getFilename() . '.' . $extension;
                $entry->mime = $file->getClientMimeType();
                $entry->original_filename = $file->getClientOriginalName();
                $entry->save();
            }
        }


        return Redirect::to('admin/list_products')->with('success', 'Successful update product ' . $request->input('product_name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_product)
    {
        Products::whereId_product($id_product)->delete();
        // echo json_encode(['sukses'=>'SUkses bro']);
    }
}
