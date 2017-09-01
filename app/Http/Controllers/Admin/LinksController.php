<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class LinksController extends CommonController
{
    /*---admin/links---get---全部友情链接列表---*/
    public function index(){
        $data = Links::orderBy('link_order')->get();
        return view('admin.links.index',compact('data'));
    }
    //排序
    public function changeOrder()
    {
        $input = Input::all();
        $link = Links::find($input['link_id']);
        $link-> link_order = $input['link_order'];
        $res = $link ->update();
        if($res){
            $data=[
                'status'=>0,
                'msg'=>'友情链接排序更新成功！'
            ];
        } else{
            $data=[
                'status'=>1,
                'msg'=>'友情链接排序更新失败，请稍后重试！'
            ];
        }
        return $data;
    }

    /*---admin/links/create---get---添加友情链接---*/
    public function create(){
        $data = [];
        return view('admin.links.add',compact('data'));
    }

    /*---admin/links---post---添加友情链接提交---*/
    public function store(){
        $input=Input::except('_token');

        $rules = [
            'link_name'=>'required',
            'link_url'=>'required',
        ];
        $message =[
            'link_name.required'  => '友情链接名称不能为空!',
            'link_url.required'  => '友情链接地址不能为空!',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $re = Links::create($input);
            if($re){
                return redirect('admin/links');
            }else{
                return back()->with('errors','友情链接添加失败，请稍后重试!');
            }
        }else{
            return back()->withErrors($validator);
        }

    }

    /*---admin/links/{links} /edit---get---编辑友情链接信息---*/
    public function edit ($link_id){
        $field =  Links::find($link_id);
        return view('admin.links.edit',compact('field'));

    }

    /*---admin/links/{links}---put---更新友情链接信息---*/
    public function update($link_id){
        $input = Input::except('_token','_method');
        $re = Links::where('link_id',$link_id)->update($input);
        if($re){
            return redirect('admin/links');
        }else{
            return back()->with('errors','友情链接更新失败，请稍后重试!');
        }

    }

    /*---admin/links/{links}---get---显示单个友情链接信息---*/
    public function show(){

    }

    /*---admin/links/{links} ---DELETE ---删除单个友情链接信息---*/
    public function destroy($link_id){
        $re =  Links::where('link_id',$link_id)->delete();
        if($re){
            $data = [
                'status' =>0,
                'msg' =>'友情链接删除成功!'
            ];
        }else{
            $data = [
                'status' =>1,
                'msg' =>'友情链接删除失败，请稍后重试!!'
            ];
        }
        return $data;
    }

}
