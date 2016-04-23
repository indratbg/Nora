<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
    // Admin
    Route::get('/login_admin', function () {
        return view('admin.page.login_form');
    });
    Route::post('/login_admin', 'AdminController@showProfile');


    Route::group(['middleware' => ['admin']], function () {

        Route::get('/dashboard', function () {
            return view('admin.page.administrator.index', ['title' => 'Dashboard']);
        });
        Route::get('/dashboard2', function () {
            return view('admin.page.administrator.index2', ['title' => 'Dashboard 2']);
        });
        Route::get('logout_admin', 'AdminController@logoutAdmin');


        //Products
        Route::get('admin/list_products', function () {
            $data = App\Products::whereStatus('active')->get();
            return view('admin.page.products.list_products', ['title' => 'List Products', 'data' => $data]);
        });
        Route::get('admin/edit_product/{id_product}',function($id_product){
            $data = App\Products::whereId_product($id_product)->first();
            if (DateTime::createFromFormat('Y-m-d H:i:s', $data->post_date_from)) $data->post_date_from = DateTime::createFromFormat('Y-m-d H:i:s', $data->post_date_from)->format('d/m/Y');
            if (DateTime::createFromFormat('Y-m-d H:i:s', $data->post_date_to)) $data->post_date_to = DateTime::createFromFormat('Y-m-d H:i:s', $data->post_date_to)->format('d/m/Y');
            return view('admin.page.products.edit_product',['title'=>'Update Product','data'=>$data]);
        });
        Route::get('admin/create_product', function () {
            $category_cd = App\Category::whereCategory_id1("product")->orderBy('category_name','asc')->get();
            return view('admin.page.products.create_product', ['title' => 'Create Product','category_cd'=>$category_cd]);
        });
        Route::post('admin/create_product', 'ProductsController@store');
        Route::get('admin/delete_product/{id_product}','ProductsController@destroy');

        Route::get('admin/view_product/{id_product}', function ($id_product) {
            $data = App\Products::where('id_product', '=', $id_product)->first();
            if (DateTime::createFromFormat('Y-m-d H:i:s', $data->post_date_from)) $data->post_date_from = DateTime::createFromFormat('Y-m-d H:i:s', $data->post_date_from)->format('d-M-Y');
            if (DateTime::createFromFormat('Y-m-d H:i:s', $data->post_date_to)) $data->post_date_to = DateTime::createFromFormat('Y-m-d H:i:s', $data->post_date_to)->format('d-M-Y');
            $images = App\Picture::where('id_product','=',$id_product)->get();
            return view('admin.page.products.view_product', ['title' => 'View Product ' . $data->product_name, 'data' => $data,'images'=>$images]);
        });
        Route::post('admin/update_product/{id_product}','ProductsController@update');
        

        // Article
        Route::get('admin/list_article', function () {
            $data = App\Blog::orderBy('post_at','desc')->get();
            return view('admin.page.blogs.list_article', ['title' => 'List Article','data'=>$data]);
        });
        Route::get('admin/edit_article/{id}',function($id){
            $data = App\Blog::findorfail($id);
            if (DateTime::createFromFormat('Y-m-d', $data->post_at)) $data->post_at = DateTime::createFromFormat('Y-m-d', $data->post_at)->format('d/m/Y');
            return view('admin.page.blogs.edit_article', ['title' => 'Edit Article','data'=>$data]);
        });
        Route::post('admin/update_article/{id}','BlogController@update');
        Route::get('admin/delete_article/{id}','BlogController@destroy');

        Route::get('admin/create_article', function () {
            $category_cd = App\Category::whereCategory_id1('article')->get();
            return view('admin.page.blogs.create_article', ['title' => 'Create Article','category_cd'=>$category_cd]);
        });
        Route::post('admin/create_article', ['as' => 'create_acticle', 'uses' => 'BlogController@store']);



        // Profile Admin
        Route::get('admin/profile', function () {
            return view('admin.page.administrator.profile_admin', ['title' => 'Profile Admin']);
        });
        //CATEGORY
        Route::get('admin/list_category',function(){
            $data = App\Category::orderBy('created_at','desc')->get();
            return view('admin.page.category.list_category',['title'=>'List Category','data'=>$data]);
        });

        Route::post('admin/add_category','CategoryController@store');
        Route::get('admin/delete_category/{id}','CategoryController@destroy');
        Route::get('admin/edit_category/{id}','CategoryController@edit');
        Route::post('admin/update_category','CategoryController@update');

        //Image
        Route::get('admin/view_product/delete_image/{id_product}/{filename}','PictureController@destroy');

    });

    //User
    Route::get('/', function () {
        return view('page.index', ['breadcrumb' => 'Home']);
    });
    Route::get('/fashion', function () {
        return view('page.fashion', ['breadcrumb' => 'Fassion']);
    });
    Route::get('/necklace', function () {
        return view('page.necklace', ['breadcrumb' => 'Necklace']);
    });
    Route::get('/contact_us', function () {
        return view('page.contact_us', ['breadcrumb' => 'Contact Us']);
    });
    // Route::get('/blog',function(){ return view('page.blog',['breadcrumb'=>'Blog','data'=>App\Blog::paginate(3)]);  });
    Route::get('/blog/{category?}', 'BlogController@index');

    Route::get('blog_detail/{blog_id}',function($blog_id){
        return view('page.blog_detail', ['breadcrumb' => 'Blog','data'=>App\Blog::whereId($blog_id)->first()]);
    });


    Route::get('/my_account', function () {
        return view('page.my_account', ['breadcrumb' => 'My Account']);
    });

    Route::auth();
    Route::get('/home', 'HomeController@index');


    Route::post('/contact_us/feedback', 'FeedbackController@store');


});

