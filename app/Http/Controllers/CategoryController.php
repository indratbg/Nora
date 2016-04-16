<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $model = new Category();
        $model->category_id1 = $request->input('category_id1');
        $model->category_id2 = $request->input('category_id2');
        $model->category_id3 = $request->input('category_id3');
        $model->category_name = $request->input('category_name');
        $model->save();
        //return redirect('admin/list_category')->with('success','Successful Save Category');
        echo json_encode(array("success" =>true));
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
        return  Category::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $model = Category::whereId($request->input('id'))->first();
        $model->category_id1= $request->input('category_id1');
        $model->category_id2= $request->input('category_id2');
        $model->category_id3= $request->input('category_id3');
        $model->category_name= $request->input('category_name');
        $model->save();
        echo json_encode(array('status'=>'success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Category::destroy($id);
    }
}
