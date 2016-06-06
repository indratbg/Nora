<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Redirect;
use Request;
use App\Blog;
use Validator;
use Response;
use View;
use Carbon\Carbon as Carbon;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construc()
    {
        $this->middleware('admin', ['except' => 'index']);
    }

    public function index(Request $request, $category = '')
    {

        $posts = Blog::where('category', 'like', "%$category%")->orderBy('updated_at', 'desc')->paginate(10);
        if (Request::ajax()) {
            return Response::json(View::make('visitor.blog.blog_ajax', array('breadcrumb' => 'Blog', 'data' => $posts))->render());
        }
        return View::make('visitor.blog.blog', array('data' => $posts, 'breadcrumb' => 'Blog'));

        //return view('visitor.blog.blog', ['breadcrumb' => 'Blog', 'data' => Blog::paginate(10)]);
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
    public function store(BlogRequest $request)
    {
        Blog::create(Request::all());
        return redirect('admin/list_article')->with('success', 'The article has been successfully saved.');
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
    public function update(BlogRequest $request, $id)
    {

        $model = Blog::find($id);
        $model->title = Request::input('title');
        $model->subtitle = Request::input('subtitle');
        $model->post_at = Request::input('post_at');
        $model->body = Request::input('body');
        $model->category = Request::input('category');
        $model->save();
        return Redirect::to('admin/list_article');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
    }
}
