<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Article;
use App\Http\model\Category;
use App\Http\Model\Links;
use Illuminate\Http\Request;


class IndexController extends CommonController
{
    /*public function index(){
        //点击量最高的6篇文章(站长推荐)
        $picHot =Article::orderBy('art_view','desc')->take(6)->get();
        //图文列表（带分页效果）------paginate():分页函数
        //$data = Article::Join('category','article.cate_id','=','category.cate_id')->orderBy('art_time','desc')->paginate(5);

        //友情链接
        $link = Links::orderBy('link_order','asc')->take(3)->get();
        return view('home.index',compact('picHot','data','link'));
    }*/

    public function cate($cate_id){
        //图文列表（带分页效果）------paginate():分页函数
        $data = Article::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(4);

        //查看次数自增
        Category::where('cate_id',$cate_id)->increment('cate_view');

        //获取栏目子分类
        $submenu =  Category::where('cate_pid',$cate_id)->get();

        $field =  Category::find($cate_id);
        return view('home.list',compact('field','data','submenu'));
    }


    public function article($art_id){
        $field = Article::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();

        //查看次数自增
        Article::where('art_id',$art_id)->increment('art_view');

        //上一篇
        $article['pre'] = Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        //下一篇
        $article['next'] = Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();
        //相关文章
        $data = Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();
        return view('home.new',compact('field','article','data'));
    }

    /*文章时态*/
    public function article2(){
        //文章列表条件
        $arr = Category::select('cate_id')->where('cate_pid',1)->get();
        foreach($arr as $k=>$v){$if = Category::select('cate_id')->where('cate_pid',$v->cate_id)->get();$where[] = $v->cate_id;}
        foreach($if as $v){$where[] = $v->cate_id;}

        //文章时态（带分页效果）------paginate():分页函数
        $data = Article::Join('category','article.cate_id','=','category.cate_id')->whereIn('category.cate_id',$where)->orderBy('art_time','desc')->paginate(4);
        return view('home.list_article',compact('field','data','submenu'));
    }

    /*本地风情*/
    public  function  photo(){
        //图片列表条件
        $arr = Category::select('cate_id')->where('cate_pid',3)->get();
        foreach($arr as $k=>$v){$if = Category::select('cate_id')->where('cate_pid',$v->cate_id)->get();$where[] = $v->cate_id;}
        foreach($if as $v){$where[] = $v->cate_id;}


        //图片列表(带分页效果 显示12个)
        $data = Article::Join('category','article.cate_id','=','category.cate_id')->whereIn('category.cate_id',$where)->orderBy('art_time','desc')->paginate(12);
        return view('home.photo_list',compact('data'));
    }

    /*用户注册*/
    public function register(){
        return view('home.register');
    }


    public function index(){
        //首页推荐文章
        $recommend = Article::take(6)->get();
        return view('home.index',compact('recommend'));
    }

    /*文章列表页*/
    public function cate_list($cate_id){
        //图文列表（带分页效果）------paginate():分页函数
        $data = Article::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(1);
        //查看次数自增
        Category::where('cate_id',$cate_id)->increment('cate_view');
        //获取栏目子分类
        $submenu =  Category::where('cate_pid',$cate_id)->get();
        $field =  Category::find($cate_id);
        $hots = Article::orderBy('art_view','desc')->take(3)->get();
        return view('home.list',compact('data','field','hots'));
    }

    /*文章详情页*/
    public  function view($art_id){
        $field = Article::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();
        //查看次数自增
        Article::where('art_id',$art_id)->increment('art_view');
        //相关文章
        $data = Article::where('cate_id',$field->cate_id)->where('art_id','!=',$art_id)->orderBy('art_id','desc')->take(3)->get();
        return view('home.view',compact('field','data'));
    }


    /*主题另类首页*/
    public function order($order_id){
        return view('home.order');
    }


}
