<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @yield('info')
    <title>网站首页</title>
    <link rel="stylesheet" href="{{asset('/resources/views/home/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('/resources/views/home/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('/resources/views/home/css/right.css')}}">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <!--[if lt IE 9]>
    <script src="{{asset('/resources/views/home/js/modernizr.js')}}"></script>
    <![endif]-->
</head>
<body>
</body>
<div class="bg">
    <div class="header">
        <div class="header_bg1"></div>
        <div class="header_bg2">
            <div class="center">
                <ul class="header_menu_ul">
                    @foreach($navs as $k=>$v)
                        <li>
                            <a href="{{url($v->nav_url)}}">
                                <span>{{$v->nav_name}}</span>
                                {{--<span class="en">{{$v->nav_alias}}</span>--}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="header_bg3">
            <div class="center">
                <img src="{{asset('/resources/views/home/images/photo1.jpg')}}" alt="">
            </div>
        </div>
    </div>
@section('content')
    <div class="contR fr">
        <div class="contR_search">
            <div class="search">
                <input type="text" placeholder="请输入需要搜索的关键字">
                <img src="{{asset('/resources/views/home/images/search.png')}}" alt="">
            </div>
        </div>
        <div class="contR_news">
            <div class="news">
                <div class="news_title"><h3 class="title">最新文章</h3></div>
                <div class="news_box">
                    <ul class="news_box_ul">
                        @foreach($news as $n)
                        <li><a href="{{url('view/'.$n->art_id)}}">{{$n->art_title}} <span>{{date('m-d',$n->art_time)}}</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="contR_random">
            <div class="random">
                <div class="random_title"><h3 class="title">随机文章</h3></div>
                <div class="random_box">
                    <ul class="random_box_ul">
                        @foreach($random as $r)
                        <li>
                            <a href="{{url('view/'.$r->art_id)}}">
                                <div class="random_box_ul_some">
                                    <span class="fl">热度：{{$r->art_view}}℃</span>
                                    <span class="fr">评论：11</span>
                                </div>
                                <div class="random_box_ul_title">{{$r->art_title}}</div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="contR_links">
            <div class="links">
                <div class="links_title"><h3 class="title">友情链接</h3></div>
                <div class="links_box">
            <ul class="links_box_ul">
                @foreach($links as $k)
                    <li><a href="{{$k->link_url}}">{{$k->link_title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
        </div>
    </div>
@show
    <div class="footer cb">
        <div class="footer_top"></div>
        <div class="footer_title">Copyright © 2016  | 网站地图 | 浙ICP备xxxxxxxx号</div>
    </div>
</div>
<script src="{{asset('/resources/views/home/js/silder.js')}}"></script>
</html>