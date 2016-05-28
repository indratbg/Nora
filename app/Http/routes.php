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
| it contains. The "web" middlewarmaae group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
    // Admin
    Route::get('/login_admin', function () {
        return view('admin.page.administrator.login_form');
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
        Route::get('admin/products', function () {
            $data = App\Products::whereStatus('active')->get();
            return view('admin.page.products.index', ['title' => 'List Products', 'data' => $data]);
        });
        Route::get('admin/edit_product/{id_product}', function ($id_product) {
            $data = App\Products::whereId_product($id_product)->first();
            $images = App\Picture::where('id_product', '=', $id_product)->get();
            return view('admin.page.products.edit_product', ['title' => 'Update Product', 'data' => $data, 'images' => $images]);
        });
        Route::get('admin/create_product', function () {
            $category_cd = App\Category::whereCategory_id1("product")->orderBy('category_name', 'asc')->get();
            return view('admin.page.products.create_product', ['title' => 'Create Product', 'category_cd' => $category_cd]);
        });
        Route::post('admin/create_product', 'ProductsController@store');
        Route::get('admin/delete_product/{id_product}', 'ProductsController@destroy');

        Route::get('admin/view_product/{id_product}', function ($id_product) {
            $data = App\Products::where('id_product', '=', $id_product)->first();
            $images = App\Picture::where('id_product', '=', $id_product)->get();
            return view('admin.page.products.view_product', ['title' => 'View Product ' . $data->product_name, 'data' => $data, 'images' => $images]);
        });
        Route::post('admin/update_product/{id_product}', 'ProductsController@update');
        Route::get('admin/get_list_product', 'ProductsController@ajaxList');
        Route::get('admin/edit_product/delete_image/{id_product}/{filename}', 'PictureController@destroy');
        Route::get('admin/product/get_list_image_product/{id_product}', 'ProductsController@list_image_ajx');

        // Article
        Route::get('admin/list_article', function () {
            $data = App\Blog::orderBy('post_at', 'desc')->get();
            return view('admin.page.blogs.list_article', ['title' => 'List Article', 'data' => $data]);
        });
        Route::get('admin/edit_article/{id}', function ($id) {
            $data = App\Blog::findorfail($id);
            return view('admin.page.blogs.edit_article', ['title' => 'Edit Article', 'data' => $data]);
        });
        Route::post('admin/update_article/{id}', 'BlogController@update');
        Route::get('admin/delete_article/{id}', 'BlogController@destroy');

        Route::get('admin/create_article', function () {
            $category_cd = App\Category::whereCategory_id1('article')->get();
            return view('admin.page.blogs.create_article', ['title' => 'Create Article', 'category_cd' => $category_cd]);
        });
        Route::post('admin/create_article', ['as' => 'create_acticle', 'uses' => 'BlogController@store']);


        // Profile Admin
        Route::get('admin/profile', function () {
            return view('admin.page.administrator.profile_admin', ['title' => 'Profile Admin']);
        });
        //CATEGORY
        Route::get('admin/list_category', function () {
            $data = App\Category::orderBy('created_at', 'desc')->get();
            return view('admin.page.category.list_category', ['title' => 'List Category', 'data' => $data]);
        });

        Route::post('admin/add_category', 'CategoryController@store');
        Route::get('admin/delete_category/{id}', 'CategoryController@destroy');
        Route::get('admin/edit_category/{id}', 'CategoryController@edit');
        Route::post('admin/update_category', 'CategoryController@update');

        //Image
        Route::get('admin/view_product/delete_image/{id_product}/{filename}', 'PictureController@destroy');

        //Slider
        Route::get('admin/slider', function () {
            return view('admin.page.slider.index', ['title' => 'Slider Image']);
        });
        Route::get('admin/list_slider', 'PictureController@list_slider');
        Route::post('admin/add_slider', 'PictureController@storeSlider');
        Route::get('admin/slider/delete/{filename}', 'PictureController@destroySlider');

        //Testimonial
        Route::get('admin/testimoni', function () {
            $data = App\Feedback::all();
            return view('admin.page.testimoni.index', ['title' => 'Testimonial', 'data' => $data]);
        });
        Route::post('admin/add_testimoni', 'FeedbackController@storeFeedbackAjax');
        Route::get('admin/get_list_testimoni', 'FeedbackController@index');
        Route::get('admin/edit_testimoni/{id}', 'FeedbackController@edit');
        Route::post('admin/update_testimoni', 'FeedbackController@update');
        Route::get('admin/delete_testimoni/{id}', 'FeedbackController@destroy');

    });

    //User
    Route::get('/', function () {
        $recent_product = App\Products::orderBy('created_at', 'desc')->take(8)->get();
        return view('visitor.home.index', ['breadcrumb' => '', 'recent_product' => $recent_product]);
    });
    Route::get('/contact_us', function () {
        return view('visitor.contact_us.contact_us', ['breadcrumb' => 'Contact Us']);
    });
    // Route::get('/blog',function(){ return view('page.blog',['breadcrumb'=>'Blog','data'=>App\Blog::paginate(3)]);  });
    Route::get('/blog/{category?}', 'BlogController@index');

    Route::get('blog_detail/{blog_id}', function ($blog_id) {
        return view('visitor.blog.blog_detail', ['breadcrumb' => 'Blog', 'data' => App\Blog::whereId($blog_id)->first()]);
    });

    //PRODUCT
    Route::get('product/{category?}', function ($category = '') {
        $category_id2 = '';
        if ($category) {
            $category_id2 = App\Category::whereCategory_name($category)->first()->category_id2;
        }
        $data = App\Products::where('category', 'like', "%$category_id2")->orderBy('updated_at', 'desc')->paginate();
        return view('visitor.products.products', ['breadcrumb' => $category==''?'Product':$category, 'data' => $data]);
    });

    Route::get('product/detail/{id_product}', function ($id_product) {
        $data = App\Products::whereId_product($id_product)->firstorFail();
        $images = App\Picture::whereId_product($id_product)->get();
        return view('visitor.products.detail', ['breadcrumb' => $data->product_name, 'data' => $data, 'images' => $images]);
    });


    Route::get('/my_account', function () {
        return view('visitor.user.my_account', ['breadcrumb' => 'My Account']);
    });

    Route::auth();
    //Route::get('/home', 'HomeController@index');


    Route::post('/contact_us/feedback', 'FeedbackController@store');



//    Helper Visitor
    Route::get('/how_to_order', function () {
        return view('visitor.helper.how_to_order', ['breadcrumb' => 'How to order']);
    });
    Route::get('/about_us', function () {
        return view('visitor.helper.about_us', ['breadcrumb' => 'About Us']);
    });
    Route::get('/career', function () {
        return view('visitor.helper.career', ['breadcrumb' => 'Career']);
    });
});

