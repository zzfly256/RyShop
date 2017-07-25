<?php

namespace App\Http\Controllers;

use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function front_index()
    {
        $tic = Auth::user()->ticket()->orderBy("created_at","desc")->get();
        return view("tickets_index",compact('tic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ticket_add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if(empty(trim($input["content"])) or empty(trim($input["title"]))){
            return redirect("/my_ticket/");
        }
        $input["content"] = $request->input('content')."<br><small class='ticket-tail'>".Auth::user()->name." 发布于 ".Carbon::now()." </small><hr>";
        $action = array_merge(["user_id"=>Auth::user()->id, "reply"=>Auth::user()->id, "valid"=>"1"],$input);
        //dd($action);
        Ticket::create($action);
        return redirect("/my_ticket");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tic = Ticket::findOrFail($id);
        return view("ticket_show",compact('tic'));
    }

    public function front_reply($id)
    {
        $tic = Ticket::findOrFail($id);
        return view("ticket_reply",compact('tic'));
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
        $tic=Ticket::findOrFail($id);
        $input = $request->all();
        if(empty(trim($input["content"]))){
            return redirect("/my_ticket/".$id);
        }
        $input["content"] = $tic->content.$request->input('content')."<br><small class='ticket-tail'>".Auth::user()->name." 发布于 ".Carbon::now()." </small><hr>";
        $action = array_merge(["user_id"=>Auth::user()->id, "valid"=>"1"],$input);
        //dd($action);
        $tic->update($action);
        return redirect("/my_ticket/".$id);
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
