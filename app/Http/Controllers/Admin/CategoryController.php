<?php

namespace App\Http\Controllers\Admin;

use App\Http\model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{
    /*---admin/category---get---全部分类---*/
    public function index(){
        $category = new Category();
        $data =$category -> tree();
        return view('admin.category.index')->with('data',$data);
    }

    //排序
    public function changeOrder()
    {
       $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate-> cate_order = $input['cate_order'];
        $res = $cate ->update();
        if($res){
            $data=[
                'status'=>0,
                'msg'=>'分类排序更新成功！'
            ];
        } else{
            $data=[
                'status'=>1,
                'msg'=>'分类排序更新失败，请稍后重试！'
            ];
        }
        return $data;
    }

    /*---admin/category/create---get---添加分类---*/
    public function create(){
        //$data = Category::where('cate_pid',0)->get();
        $data =  (new Category())->tree(0);
        return view('admin/category/add',compact('data'));
    }

    /*---admin/category---post---添加分类提交---*/
    public function store(){
        $input=Input::except('_token');

        $rules = [
            'cate_name'=>'required',
        ];
        $message =[
            'cate_name.required'  => '分类名称不能为空!',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $re = Category::create($input);
            if($re){
                return redirect('admin/category');
            }else{
                return back()->with('errors','数据填充未知错误，请稍后重试!');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    /*---admin/category/{category} /edit---get---编辑分类信息---*/
    public function edit ($cate_id){
        $field =  Category::find($cate_id);
        //$data = Category::where('cate_pid',0)->get();
        $data =  (new Category())->tree(0);
        return view('admin.category.edit',compact('field','data'));
    }

    /*---admin/category/{category}---put---更新分类信息---*/
    public function update($cate_id){
        $input = Input::except('_token','_method');
        $re = Category::where('cate_id',$cate_id)->update($input);
        if($re){
            return redirect('admin/category');
        }else{
            return back()->with('errors','分类信息更新失败，请稍后重试!');
        }
    }


    /*---admin/category/{category}---get---显示单个分类信息---*/
    public function show(){

    }
    /*---admin/category/{category} ---DELETE ---删除单个分类信息---*/
    public function destroy($cate_id){
        $re =  Category::where('cate_id',$cate_id)->delete();
        Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
        if($re){
            $data = [
              'status' =>0,
                'msg' =>'分类删除成功!'
            ];
        }else{
            $data = [
                'status' =>1,
                'msg' =>'分类删除失败，请稍后重试!!'
            ];
        }
        return $data;
    }

}
