@extends('layouts.home_common')
@section('info')
    <title>{{\Illuminate\Support\Facades\Config::get('web.web_title')}}-{{Config::get('web.seo_title')}}</title>
    <meta name="keywords" content="{{Config::get('web.keywords')}}" />
    <meta name="description" content="{{Config::get('web.description')}}" />
    <link rel="stylesheet" media="screen and (min-width:960px)" href="{{asset('/resources/views/home/css/index.css')}}">
    <link rel="stylesheet" media="screen and (min-width:640px) and (max-width:959px)" href="{{asset('/resources/views/home/css/index_960.css')}}">
    <link rel="stylesheet" media="screen and (max-width:639px)" href="{{asset('/resources/views/home/css/index_640.css')}}">
@endsection
@section('content')
    <div class="content">
            <div class="cont1">
                <div class="center">
                    <ul class="cont1_ul">
                        <li style="background: url({{asset('/resources/views/home/images/photo1.jpg')}}) no-repeat;">
                            <a href="{{url('/')}}">
                                <h2>首页</h2>
                                <p>进人不一样的世界</p>
                            </a>
                        </li>
                        <li style="background: url({{asset('/resources/views/home/images/photo2.jpg')}}) no-repeat;">
                            <a href="{{url('/ui_list')}}">
                                <h2>UI</h2>
                                <p>进人不一样的世界</p>
                            </a>
                        </li>
                        <li style="background: url({{asset('/resources/views/home/images/photo3.jpg')}}) no-repeat;">
                            <a href="">
                                <h2>WEB前端</h2>
                                <p>进人不一样的世界</p>
                            </a>
                        </li>
                        <li style="background: url({{asset('/resources/views/home/images/photo4.jpg')}}) no-repeat;">
                            <a href="">
                                <h2>PHP</h2>
                                <p>进人不一样的世界</p>
                            </a>
                        </li>
                        <li style="background: url({{asset('/resources/views/home/images/photo1.jpg')}}) no-repeat;">
                            <a href="">
                                <h2>个人兴趣</h2>
                                <p>进人不一样的世界</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="cont_bor"></div>
            <div class="cont2">
                <div class="center">
                    <ul class="cont2_ul">
                        <li><a href="#"><img src="{{asset('/resources/views/home/images/photo2.jpg')}}"  alt=""></a></li>
                        <li><a href="#"><img src="{{asset('/resources/views/home/images/photo3.jpg')}}"  alt=""></a></li>
                        <li><a href="#"><img src="{{asset('/resources/views/home/images/photo4.jpg')}}"  alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="cont_bor"></div>
            <div class="cont3">
                <div class="center">
                    <ul class="cont3_ul ma">
                        @foreach($recommend as $k=>$v)
                            <li><a href="{{url('view/'.$v->art_id)}}">
                                    <div class="cont3_box ">
                                        <div class="cont3_box_title">{{$v->art_title}}</div>
                                    </div>
                                    <div class="cont3_img "><img src="{{url($v->art_thumb)}}" alt=""></div>
                                </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection