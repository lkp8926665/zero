@extends('layouts.home_common')
@section('info')
    <title>{{\Illuminate\Support\Facades\Config::get('web.web_title')}}-{{Config::get('web.seo_title')}}</title>
    <meta name="keywords" content="{{Config::get('web.keywords')}}" />
    <meta name="description" content="{{Config::get('web.description')}}" />
    <link rel="stylesheet" href="{{asset('/resources/views/home/css/order_gs.css')}}">
@endsection
@section('content')
    <div class="content">
        <div class="cont ma">
            <div class="menu">
                <ul class="menu_ul">
                    <li><a href="">阳光首页</a></li>
                    <li><a href="">通知公告</a></li>
                    <li><a href="">活动剪影</a></li>
                    <li><a href="">历届招生</a></li>
                    <li><a href="">关于阳光</a></li>
                </ul>
            </div>
            <div class="cont1">
                <div class="cont1L">
                    <div class="cont1L_top">
                        <div class="top_title">通知公告  <span><a href="">more>></a></span></div>
                    </div>
                    <div class="cont1L_box"></div>
                </div>
                <div class="cont1R"></div>
            </div>
        </div>
    </div>
@endsection