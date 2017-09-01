@extends('layouts.home_common')
@section('info')
    <title>{{\Illuminate\Support\Facades\Config::get('web.web_title')}}-{{Config::get('web.seo_title')}}</title>
    <meta name="keywords" content="{{Config::get('web.keywords')}}" />
    <meta name="description" content="{{Config::get('web.description')}}" />
    <link rel="stylesheet" href="{{asset('/resources/views/home/css/list.css')}}">
@endsection
@section('content')
    <div class="content">
        <div class="cont ma">
            <div class="contL fl">
                <div class="contL_address fr">
                    <div class="address">当前位置: <a href="{{url('/')}}">&nbsp;首页</a><span>&nbsp;&gt;&nbsp;</span><a href="{{url('/cate_list/'.$field->cate_id)}}">{{$field->cate_name}}</a></div>
                </div>
                <div class="cb"></div>
                <div class="list_contL1">
                    <ul class="list_contL1_ul">
                        @foreach($hots as $h)
                        <li>
                            <a href="{{url('view/'.$h->art_id)}}" title="">
                                <div class="list_contL1_c fl">{{$h->art_view}}℃</div>
                                <img src="{{url($h->art_thumb)}}" alt="">
                                <div class="list_contL1_ul_t fl">{{$h->art_title}}</div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="list_contL2">
                    <ul class="list_contL2_ul">
                        @foreach($data as $d)
                        <li>
                            <a href="{{url('view/'.$d->art_id)}}">
                                <div class="list_contL2_ul_t">{{$d->art_title}}</div>
                                <div class="list_contL2_ul_i fl"><img src="{{url($d->art_thumb)}}" alt=""></div>
                                <div class="list_contL2_ul_x fr">
                                    <div class="list_contL2_ul_x_some">
                                        <span class="fl">标签：{{$d->art_tag}}</span>
                                        <span class="fr">评论：11</span>
                                        <span class="fr">热度：{{$d->art_view}}</span>
                                    </div>
                                    <div class="list_contL2_ul_x_text">奥斯卡的哈萨克的还是空间的回复快乐撒较好的付款就爱上的付款就害臊的立刻就好的刷卡缴费和奥斯卡的发生的回复啥都会分开后...</div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="page">

                        <ul class="page_ul fr">
                            {{--<li><</li>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>></li>--}}
                            {{$data->links()}}
                        </ul>
                    </div>
                </div>
            </div>
            @parent
        </div>
    </div>
@endsection