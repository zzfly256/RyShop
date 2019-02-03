<?php
/**
 * Copyright (c) 2019.1 Rytia RyShop
 */

namespace Controller;

use Model\User;
use Model\Good;
use System\Controller;

/**
 * Class GoodController
 * @package Controller
 * RyShop 商品控制器
 */
class GoodController extends Controller
{
    public function Get(){
        // 商品列表
        $items = Good::all();
        return $this->response($items);
    }

    public function Post(){
        // 添加商品
        $item = new Good();
        $item->name = $this->request()->get('name');
        $item->content = $this->request()->get('content');
        $item->cover = $this->request()->get('cover');
        $item->category_id = $this->request()->get('category_id');
        $item->type_id = $this->request()->get('type_id');

        if ($item->save()){
            return $this->response();
        } else {
            return $this->response("","500", "500000",'添加失败');
        }
    }

    public function infoGet($id){

        $user = User::find($id);
        if (is_null($user)){
            return $this->response("","404", "500404",'未找到商品ID:'.$id);
        } else {
            return $this->response($user);
        }
    }

    public function infoPut($id){

        // TODO: 鉴权

        $item = Good::find($id);
        if (is_null($item)){
            return $this->response("","404", "500404",'未找到商品ID:'.$id);
        } else {
            if(!is_null($this->request()->get('name'))) {
                $item->name = $this->request()->get('name');
            }
            if(!is_null($this->request()->get('content'))) {
                $item->content = $this->request()->get('content');
            }
            if(!is_null($this->request()->get('cover'))) {
                $item->cover = $this->request()->get('cover');
            }
            if(!is_null($this->request()->get('category_id'))) {
                $item->category_id = $this->request()->get('category_id');
            }
            if(!is_null($this->request()->get('type_id'))) {
                $item->type_id = $this->request()->get('type_id');
            }
            if ($item->save()){
                return $this->response($user);
            } else {
                return $this->response("","500", "500000",'修改失败');
            }
        }
    }

    public function infoDelete($id){
        $item  = Good::find($id);
        if (is_null($item )){
            return $this->response("","404", "500404",'未找到商品ID:'.$id);
        } else {
            if ($item ->delete()){
                return $this->response();
            } else {
                return $this->response("","500", "500000",'删除失败');
            }
        }
    }

}

