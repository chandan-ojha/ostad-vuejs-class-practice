<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SiteController extends Controller
{
    public function index()
    {
        return Inertia::render('index');
    }

    //data passing to vue component
    public function Page1()
    {
        $json = [
            'name' => 'John Doe',
            'age' => 25,
            'city' => 'New York',
        ];
        return Inertia::render('Page1',[
            'data' => $json,
        ]);
    }

    //meta data passing to app.blade.php
    public function Page2()
    {
        $meta = [
            'title' => 'This is page 2',
        ];
        return Inertia::render('Page2')->withViewData(['meta' => $meta]);
    }

    //shared data passing to all pages
    public function Page3()
    {
        $shared_data = [
            'message' => 'This is page 3',
            'status' => 'success',
            'shared_data' => 'This is my shared data',
        ];
        return Inertia::render('Page3')->with($shared_data);
    }

    public function Page4()
    {
        return Inertia::render('Page4');
    }

    //post back request
    public function PostBackRequest(Request $request)
    {
        $json = $request->input();

        $data = [
            'message' => 'Submit Success !',
            'status' => true,
            'shared_data' => $json,
        ];

        return redirect()->route('Page4')->with($data);
    }

    //meta data passing to vue component
    public function Page5()
    {
        $meta=[
            'title' => 'Page 5',
            'description'=>"description"
        ];
        return Inertia::render('Page5',['meta'=>$meta]);
    }

    public function Page6()
    {
        return Inertia::render('Page6');
    }

    function UploadRequest(Request $request){

        $img=$request->file('image_file');
        $img->move(public_path('uploads'), $img->getClientOriginalName());
        $data = [
            'message'=>'Submit Success !',
            'status' => true,
            'shared_data'=> $img->getClientOriginalName(),
        ];
        return redirect()->route('Page6')->with($data);
    }

    public function Page7()
    {
        return Inertia::render('Page7');
    }

    public function Page8()
    {
        return Inertia::render('Page8');
    }

    function PostBackForError()
    {
        return redirect()->route('Page000');
    }

    public function Page9()
    {
        return Inertia::render('scroll/Page9');
    }

    public function Page10()
    {
        return Inertia::render('scroll/Page10');
    }

    public function Page11()
    {
        return Inertia::render('Page11');
    }

    function PostBackRequestFromLink(Request $request){
        $JsonObject= $request->input();
        $data = [
            'message'=>'Submit Success',
            'status' => true,
            'shared_data'=>$JsonObject
        ];

        return redirect()->route('Page11')->with($data);
    }

    public function Page12()
    {
        return Inertia::render('Page12');
    }
}
