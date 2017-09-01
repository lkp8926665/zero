<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class ArticleController extends CommonController
{
    /*---admin/article---get---全部文章列表---*/
    public function index(){
        $data = Article::Join('category','article.cate_id','=','category.cate_id')->orderBy('art_id','desc')->paginate(10);
       return view('admin.article.index',compact('data'));
    }

    /*---admin/article/create---get---添加文章---*/
    public function create(){
        $category = new Category();
        $data =$category -> tree();
        return view('admin.article.add',compact('data'));
    }

    /*---admin/article---post---添加文章提交---*/
    public function store(){
        $input=Input::except('_token');
        $input['art_time']=time();
        $rules = [
            'art_title'=>'required',
            'art_content'=>'required',
        ];
        $message =[
            'art_title.required'  => '文章标题不能为空!',
            'art_content.required'  => '文章内容不能为空!',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $re = Article::create($input);
            if($re){
                return redirect('admin/article');
            }else{
                return back()->with('errors','文章上传未知错误，请稍后重试!');
            }
        }else{
            return back()->withErrors($validator);
        }
    }
    /*---admin/article/{article}/edit---get---编辑文章信息---*/
    public function edit($art_id){
        $category = new Category();
        $data =$category -> tree();
        $field =  Article::find($art_id);
        return view('admin.article.edit',compact('field','data'));
    }

    /*---admin/article/{article}---put---更新文章信息---*/
    public function update($art_id){
        $input = Input::except('_token','_method');
        $re = Article::where('art_id',$art_id)->update($input);
        if($re){
            return redirect('admin/article');
        }else{
            return back()->with('errors','文章信息更新失败，请稍后重试!');
        }
    }

    /*---admin/article/{article} ---DELETE ---删除单个分类信息---*/
    public function destroy($art_id){
        $re =  Article::where('art_id',$art_id)->delete();
        if($re){
            $data = [
                'status' =>0,
                'msg' =>'文章删除成功!'
            ];
        }else{
            $data = [
                'status' =>1,
                'msg' =>'文章删除失败，请稍后重试!!'
            ];
        }
        return $data;
    }

}
