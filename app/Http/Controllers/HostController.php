<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Host;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hosts = Host::latest()->get();
        return view("admin.host_list",compact("hosts"));
    }

    public function show_mine()
    {
        if (Auth::user()) {
            $hosts = Auth::user()->host()->orderBy('created_at', 'desc')->get();
            return view("my_host", compact('hosts'));
        } else {
            return view("my_host");
        }
    }

    public function show_user($id)
    {
        if(Auth::user() and Auth::user()->level==0)
        {
            $hosts = User::findOrFail($id)->host;
            $user = User::findOrFail($id);
            return view("admin.show_user_host",compact('hosts'))->with("user",$user);
        }

    }

    public function show_panel($panel)
    {
        if($panel=="ep1")
        {
            return view("ep1_panel");
        }
        else{
            dd("面板错误，朋友你在搞笑了吧");
        }
    }

    public function change_status($id,Request $request)
    {
        $host = Host::findOrFail($id);
        if($request->input('valid')=="2")
        {
            if(Host::stop_host($host->host_panel,$host->host_name))
            {
                $host->update($request->all());
                return redirect("/admin/vhost");
            }

        }
        elseif($request->input('valid')=="1")
        {
            if(Host::start_host($host->host_panel,$host->host_name))
            {
                $host->update($request->all());
                return redirect("/admin/vhost");
            }
        }
        else
        {
            dd($host->host_panel."主机所在服务器通信故障。");
        }

    }

    public function delete_host($id)
    {
        $host = Host::findOrFail($id);
        if(Host::delete_host($host->host_panel,$host->host_name))
        {
            $host->delete();
            return redirect("/admin/vhost");
        }
        else
        {
            dd($host->host_panel."主机所在服务器通信故障。");
        }
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
