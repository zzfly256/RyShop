<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Good;
use App\User;
use App\Host;
use Illuminate\Support\Facades\Auth;

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
        $action = array_merge(['price' => $good[0]->price,'end_at' => $date, 'user_id' => Auth::user()->id],$input);
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
        $cur_good = Good::whereRaw("model='".$cur_order->model."'")->get();
        //dd($cur_good[0]->price);
        if(Order::is_succeed($apikey,$total,$cur_order))
        {
            $cur_order->update(['payout'=>'1']);
            $host_name = "uid".Auth::user()->id.chr (rand(97,122)).chr (rand(97,122)).chr (rand(97,122)).chr (rand(97,122));
            $host_pass = chr (rand(97,122)).chr (rand(97,122)).chr (rand(97,122)).chr (rand(97,122)).rand(1000,9999);
            $host_info = ['order_no'=>$cur_order->no, 'price'=>$total, 'host_name'=>$host_name, 'host_pass'=>$host_pass, 'model'=>$cur_order->model, 'user_id'=> Auth::user()->id,'end_at'=>$cur_order->end_at,'host_panel'=>$cur_good[0]->panel];
            Host::create($host_info);
            if(Host::create_host($cur_good[0]->panel,$cur_order->model,$host_name,$host_pass))
            {
                $host_update = ['valid' => '1'];
                $cur_host = Host::whereRaw("order_no='".$cur_order->no."'")->get();
                $cur_host[0]->update($host_update);
                return redirect('/my_host');
            }else{
                dd("主机所在服务器通信故障，请迅速联系售后，并提供您的用户名、UID、订单号以便快速帮您补办主机");
            }
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
    public function order_show($no)
    {
        $order = Order::whereRaw("no='".$no."'")->get();
        $order_get = $order[0];
        return view("admin.order_show",compact('order_get'));
    }

    public function order_front_show($no)
    {
        $order = Order::whereRaw("no='".$no."'")->get();
        $order_get = $order[0];
        return view("order_show",compact('order_get'));
    }

    public function show_mine()
    {
        if(Auth::user())
        {
            $order = Auth::user()->order()->orderBy('created_at', 'desc')->get();
            return view("my_order",compact('order'));
        }
        else
        {
            return view("my_order");
        }

    }
    public function show_user($id)
    {
        if(Auth::user() and Auth::user()->level==0)
        {
            $order = User::findOrFail($id)->order()->orderBy('created_at', 'desc')->get();
            $user = User::findOrFail($id);
            return view("admin.show_user_order",compact('order'))->with("user",$user);
        }

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
