<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\model\Category;
use App\Http\Model\Links;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Navs;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    /*魔术环  自动加载*/
    public function __construct(){
        //最新发布文章8篇
        $news = Article::orderBy('art_time','desc')->take(8)->get();
        //随机文章8篇
        $random = Article::orderBy('art_view','desc')->take(8)->get();
        //点击量最高的5篇文章
        $hot =Article::orderBy('art_view','desc')->take(5)->get();
        $navs  =  Navs::all();
        //友情链接
        $links = Links::orderBy('link_order','asc')->take(3)->get();

        View::share('navs',$navs);//传值
        View::share('links',$links);//传值
        View::share('random',$random);//传值
        View::share('news',$news);//传值
        View::share('hot',$hot);//传值


    }
}
