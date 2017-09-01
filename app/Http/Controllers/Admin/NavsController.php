<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class NavsController extends CommonController
{
    /*---admin/navs---get---全部自定义导航列表---*/
    public function index(){
        $data = Navs::orderBy('nav_order')->get();
        return view('admin.navs.index',compact('data'));
    }
    //排序
    public function changeOrder()
    {
        $input = Input::all();
        $nav = Navs::find($input['nav_id']);
        $nav-> nav_order = $input['nav_order'];
        $res = $nav ->update();
        if($res){
            $data=[
                'status'=>0,
                'msg'=>'自定义导航排序更新成功！'
            ];
        } else{
            $data=[
                'status'=>1,
                'msg'=>'自定义导航排序更新失败，请稍后重试！'
            ];
        }
        return $data;
    }

    /*---admin/navs/create---get---添加自定义导航---*/
    public function create(){
        $data = [];
        return view('admin.navs.add',compact('data'));
    }

    /*---admin/navs---post---添加自定义导航提交---*/
    public function store(){
        $input=Input::except('_token');

        $rules = [
            'nav_name'=>'required',
            'nav_url'=>'required',
        ];
        $message =[
            'nav_name.required'  => '自定义导航名称不能为空!',
            'nav_url.required'  => '自定义导航地址不能为空!',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $re = Navs::create($input);
            if($re){
                return redirect('admin/navs');
            }else{
                return back()->with('errors','自定义导航添加失败，请稍后重试!');
            }
        }else{
            return back()->withErrors($validator);
        }

    }

    /*---admin/navs/{navs} /edit---get---编辑自定义导航信息---*/
    public function edit ($nav_id){
        $field =  Navs::find($nav_id);
        return view('admin.navs.edit',compact('field'));

    }

    /*---admin/navs/{navs}---put---更新自定义导航信息---*/
    public function update($nav_id){
        $input = Input::except('_token','_method');
        $re = Navs::where('nav_id',$nav_id)->update($input);
        if($re){
            return redirect('admin/navs');
        }else{
            return back()->with('errors','自定义导航更新失败，请稍后重试!');
        }

    }

    /*---admin/navs/{navs}---get---显示单个自定义导航信息---*/
    public function show(){

    }

    /*---admin/navs/{navs} ---DELETE ---删除单个自定义导航信息---*/
    public function destroy($nav_id){
        $re =  Navs::where('nav_id',$nav_id)->delete();
        if($re){
            $data = [
                'status' =>0,
                'msg' =>'自定义导航删除成功!'
            ];
        }else{
            $data = [
                'status' =>1,
                'msg' =>'自定义导航删除失败，请稍后重试!!'
            ];
        }
        return $data;
    }

}
