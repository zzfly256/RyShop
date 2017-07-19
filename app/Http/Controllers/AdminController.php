<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Good;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function host_index()
    {
        $good = Good::all();
        $user_count = User::all()->count();
        return view("admin.host_index",compact('good'))->with("user_count",$user_count);
    }

    public function users_index()
    {
        $user = User::all();
        $user_count = User::all()->count();
        return view("admin.users_index",compact('user'))->with("user_count",$user_count);
    }

    protected function user_home($id)
    {
        $user = User::findOrFail($id);
        return view("user_index",compact('user'))->with("current_id",$id);
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
        //
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
    public function user_edit($id)
    {
        $user = User::findOrFail($id);
        $user_count = User::all()->count();
        return view("admin.user_edit",compact('user'))->with("user_count",$user_count);
    }

    public function user_front_edit($id)
    {
        $user = User::findOrFail($id);
        return view("user_edit",compact('user'))->with("current_id",$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        if(!empty($request->input('the_password'))) {
            $new_password = bcrypt($request->input('the_password'));
            $input = array_merge(['password'=>$new_password],$input);
        }
        $user->update($input);
        return redirect("/admin/users/");
    }

    public function user_front_update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        if(!empty($request->input('the_password'))) {
            $new_password = bcrypt($request->input('the_password'));
            $input = array_merge(['password'=>$new_password],$input);
        }
        $user->update($input);
        return redirect("/auth/home/".$id)->with("current_id",$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/users');
    }
}
