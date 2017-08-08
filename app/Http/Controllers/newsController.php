<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(15);
        return view('news_index',compact('news'));
    }

    public function admin_index()
    {
        $news = News::all();
        return view('admin.news_index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('admin.news_add',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->level == 0):
            $input = $request->all();
            $user_id = User::whereRaw("name='" . $request->input("user") . "'")->first()->id;
            $action = array_merge($input, ['user_id' => $user_id]);
            if (!empty($request->input("content")) && !empty($request->input("title"))) {
                News::create($action);
                return view('admin.news_list');
            } else {
                dd("请完整填写标题和内容");
            }
        endif;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_details($id)
    {
       $news = News::find($id);
        return view('news_detail',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $user = User::all();
        return view("admin.news_edit",compact('news'))->with('user',$user);
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
        $news = News::findOrFail($id);
        $input = $request->all();
        $news->update($input);
        return redirect("/admin/news/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect('/admin/news');
    }
}
