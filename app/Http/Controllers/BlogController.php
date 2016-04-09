<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Blog;
use Validator;
use Response;
use View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construc()
    {
        $this->middleware('admin',['except'=>'index']);
    }
    public function index(Request $request)
    {

        $posts = Blog::paginate(10);
        if (Request::ajax()) {
            return Response::json(View::make('page.blog_ajax', array('breadcrumb'=>'Blog','data' => $posts))->render());
        }
        return View::make('page.blog', array('data' => $posts,'breadcrumb'=>'Blog'));

        
       return view('page.blog',['breadcrumb'=>'Blog','data'=>Blog::paginate(3) ]);
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
      $validator = Validator::make($request->all(),
                    ['title'=>'required|min:10',
                    'body'=>'required|min:20',
                    'category'=>'required']);
      if($validator->fails())
      {
        return redirect('admin/create_article')->withInput()->withErrors($validator);
      }

      $model = new Blog;
      $model->title = $request->input('title');
      $model->subtitle = $request->input('subtitle');
      $model->category = $request->input('category');
      $model->body = $request->input('body');
      $model->save();
      return redirect('admin/list_article')->with('success','The article has been successfully saved.');
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
