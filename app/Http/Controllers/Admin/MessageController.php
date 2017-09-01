<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Message;
use Illuminate\Http\Request;

class MessageController extends CommonController
{
    /*---admin/article---get---全部列表---*/
    public function index(){
        //$data = Message::Join('user', 'user.user_id', '=', 'message.mes_user')->Join('article', 'article.art_id', '=', 'message.mes_position')->orderBy('mes_id', 'desc')->paginate(10);
        $data = Message::Join('user', 'user.user_id', '=', 'message.mes_user')->orderBy('mes_id', 'desc')->paginate(10);
        return view('admin.message.index',compact('data'));
    }

    /*---admin/article/create---get---添加---*/
    public function create(){


    }

    /*---admin/article---post---添加提交---*/
    public function store(){

    }

    /*---admin/article/{article} /edit---get---编辑信息---*/
    public function edit (){

    }

    /*---admin/article/{article}---put---更新信息---*/
    public function update($mes_id){
         $dis=Message::where('mes_id',$mes_id)->value('mes_dis');
        if($dis=='YES'){
            $re = Message::where('mes_id',$mes_id)->update(['mes_dis'=>'NO']);
        }else{
            $re = Message::where('mes_id',$mes_id)->update(['mes_dis'=>'YES']);
        }
        if($re){
            $data = [
                'status' =>0,
                'msg' =>'显示状态修改成功!'
            ];
        }else{
            $data = [
                'status' =>1,
                'msg' =>'显示状态修改失败，请稍后重试!!'
            ];
        }
        return $data;
    }

    /*---admin/article/{article} ---DELETE ---删除单个信息---*/
    public function destroy($mes_id){
        $re = Message::where('mes_id',$mes_id)->delete();
        if($re){
            $data = [
                'status' =>0,
                'msg' =>'留言删除成功!'
            ];
        }else{
            $data = [
                'status' =>1,
                'msg' =>'留言删除失败，请稍后重试!!'
            ];
        }
        return $data;
    }

}
