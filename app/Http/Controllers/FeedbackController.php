<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Feedback;
use App\Http\Requests;
//use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;


class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Feedback::get();

         return response()->view('admin.page.testimoni.list_testimoni',['data'=>$data]);
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
    public function store(Requests\FeedbacksRequest $request)
    {
        Feedback::create($request->all());
        return Redirect::to('/contact_us')->with('success','Thank you for your feedback');
    }
    public function storeFeedbackAjax(Requests\FeedbacksRequest $request)
    {
        Feedback::create($request->all());
        echo json_encode(['success'=>true]);
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
        echo json_encode(Feedback::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\FeedbacksRequest $request)
    {
        $model = Feedback::whereId($request->input('id'))->first();
        $model->name = $request->input('name');
        $model->subject = $request->input('subject');
        $model->email = $request->input('email');
        $model->body = $request->input('body');
        $model->save();
        echo json_encode(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feedback::find($id)->delete();
        echo json_encode(['success'=>true]);
    }
}
