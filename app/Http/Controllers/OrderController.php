<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Good;
use App\User;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $input = $request->all();
        // 从数据库获取价格
        $good = Good::whereRaw("model='".$request->input('model')."'")->get();
        $date = Carbon::parse('+1 year')->toDateString();
        $action = array_merge(['price' => $good[0]->price,'end_at' => $date],$input);
        //dd($request->input('no'));
        Order::create($action);
        $cur_order = Order::whereRaw("no='".$request->input('no')."'")->get();
        //dd($id);
        Order::checkout($good[0]->price,$cur_order[0]->id,$request->input('no'));
        //return redirect("/admin/host");
    }

    public function result(Request $request)
    {
        $addnum = $_POST['addnum'] ? $_POST['addnum'] : $_GET['addnum'];		//接收到的订单编号
        $uid = $_POST['uid'] ? $_POST['uid'] : $_GET['uid'];				//接收到的支付会员编号
        $total = $_POST['total'] ? $_POST['total'] : $_GET['total'];			//接收到的支付金额
        $apikey = $_POST['apikey'] ? $_POST['apikey'] : $_GET['apikey'];		//接收到的验证加密字串
        $cur_order = Order::findOrFail($uid);
        //dd($cur_order->price);
        if(Order::is_succeed($apikey,$total,$cur_order))
        {
            $cur_order->update(['payout'=>'1']);
            echo "成功支付，可惜没主机开通";
        }
        else{
            echo "你TM想骗我主机？";
        }
        //dd($cur_order);
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
