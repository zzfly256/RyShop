<?php
namespace Controller;

use Model\User;
use System\Controller;

/**
 * Class UserController
 * @package Controller
 * RyShop 用户控制器
 */
class UserController extends Controller
{
    public function Get(){
        // 用户列表
        $users = User::all();
        return $this->response($users);
    }

    public function Post(){
        // 用户注册
        $user = new User();

        $user->name = $this->request()->get('name');
        $user->email = $this->request()->get('email');
        $user->password = md5("rY".$this->request->get('password')."sHOP");

        if ($user->save()){
            return $this->response();
        } else {
            return $this->response("","500", "500000",'注册失败！用户名或邮箱重复');
        }
    }

    public function infoGet($id){

        $user = User::find($id);
        if (is_null($user)){
            return $this->response("","404", "500404",'未找到用户ID:'.$id);
        } else {
            return $this->response($user);
        }
    }

    public function infoPut($id){

        // TODO: 鉴权

        $user = User::find($id);
        if (is_null($user)){
            return $this->response("","404", "500404",'未找到用户ID:'.$id);
        } else {
            if(!is_null($this->request()->get('name'))) {
                $user->name = $this->request()->get('name');
            }
            if(!is_null($this->request()->get('email'))) {
                $user->email = $this->request()->get('email');
            }
            if(!is_null($this->request()->get('status'))) {
                $user->status = $this->request()->get('status');
            }
            if(!is_null($this->request()->get('level'))) {
                $user->level = $this->request()->get('level');
            }
            if(!is_null($this->request()->get('password'))) {
                $user->password = md5("rY".$this->request->get('password')."sHOP");
            }
            if ($user->save()){
                return $this->response($user);
            } else {
                return $this->response("","500", "500000",'修改失败');
            }
        }
    }

    public function infoDelete($id){
        $user = User::find($id);
        if (is_null($user)){
            return $this->response("","404", "500404",'未找到用户ID:'.$id);
        } else {
            if ($user->delete()){
                return $this->response();
            } else {
                return $this->response("","500", "500000",'删除失败');
            }
        }
    }

    public function checkGet($type){
        $condition = User::where([ $type => $this->request('s')])->count();
        if ($condition > 0){
            return $this->response("","200", "500000",'X 已被使用');
        } else {
            return $this->response("","200", "0",'√ 可以使用');
        }
    }


}

