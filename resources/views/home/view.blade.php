@extends('layouts.home_common')
@section('info')
    <title>{{\Illuminate\Support\Facades\Config::get('web.web_title')}}-{{Config::get('web.seo_title')}}</title>
    <meta name="keywords" content="{{Config::get('web.keywords')}}" />
    <meta name="description" content="{{Config::get('web.description')}}" />
    <link rel="stylesheet" href="{{asset('/resources/views/home/css/view.css')}}">
@endsection
@section('content')
        <div class="content">
            <div class="cont ma">
                <div class="view_contL fl">
                    <div class="contL_address fr">
                        <div class="address">当前位置: <a href="{{url('/')}}">&nbsp;首页</a><span>&nbsp;&gt;&nbsp;</span><a href="{{url('/cate_list/'.$field->cate_id)}}">{{$field->cate_name}}</a></div>
                    </div>
                    <div class="cb"></div>
                    <div class="view_contL_view">
                        <div class="view_contL_title">{{$field->art_title}}</div>
                        <div class="view_contL_some">
                            <span>&nbsp;时间：{{date('Y-m-d',$field->art_time)}}&nbsp;</span>
                            <span>阅读：{{$field->art_view}}&nbsp;</span>
                            <span>作者：{{$field->art_editor}}&nbsp;</span>
                            <span>分类：<a href="{{url('cate_list/'.$field->cate_id)}}">{{$field->cate_name}}</a></span>
                        </div>
                        <div class="view_contL_box">
                            <div class="view_contL_text">{!! $field->art_content !!}</div>
                            <div class="view_contL_key"><span>&nbsp;标签：{{$field->art_tag}}</span></div>
                        </div>
                    </div>
                    <div class="view_contL_about">
                        <div class="view_title">相关文章</div>
                        <ul class="about_ul">
                            @foreach($data as $d)
                                <li><a href="{{url('view/'.$d->art_id)}}"><img src="{{url($d->art_thumb)}}" alt=""><div class="about_ul_title">{{$d->art_title}}</div></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="view_contL_comment">
                        <div class="view_title">来点评论</div>
                        <div class="view_comment_box">
                            <textarea name="" id="" ></textarea>
                        </div>
                        <div class="view_comment_but"><span>提交</span></div>
                        <div class="view_comment_list">
                            <div class="view_comment_list_num"><span>评论(10)</span></div>
                            <ul class="view_comment_list_ul">
                                <li>
                                    <div class="view_comment_list_ul_box">
                                        <div class="view_comment_list_ul_head fl"><img src="{{asset('/resources/views/home/images/photo6.jpg')}}" alt=""></div>
                                        <div class="view_comment_list_ul_box_r fl">
                                            <div class="view_comment_list_ul_name">name</div>
                                            <div class="view_comment_list_ul_text  ">萨科技等哈开始加大号看了较好的爱上的卢卡斯接电话</div>
                                        </div>
                                    </div>
                                    <div class="view_comment_list_ul_some cb">
                                        <span>时间：2016-12-12&nbsp;</span>
                                        <span>回复&nbsp;</span>
                                        <span>顶起来(0)&nbsp;</span>
                                        <span>转发&nbsp;</span>
                                        <span>举报&nbsp;</span>
                                    </div>
                                    <div class="view_comment_c">
                                        <textarea name="" id="" ></textarea>
                                        <div class="view_comment_c_but"><span>回复</span></div>
                                        <div class="cb"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="view_comment_list_ul_box">
                                        <div class="view_comment_list_ul_head fl"><img src="{{asset('/resources/views/home/images/photo6.jpg')}}" alt=""></div>
                                        <div class="view_comment_list_ul_box_r fl">
                                            <div class="view_comment_list_ul_name">name</div>
                                            <div class="view_comment_list_ul_text  ">萨科技等哈开始加大号看了较好的爱上的卢卡斯接电话</div>
                                        </div>
                                    </div>
                                    <div class="view_comment_list_ul_some cb">
                                        <span>时间：2016-12-12&nbsp;</span>
                                        <span>回复&nbsp;</span>
                                        <span>顶起来(0)&nbsp;</span>
                                        <span>转发&nbsp;</span>
                                        <span>举报&nbsp;</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="view_comment_list_ul_box">
                                        <div class="view_comment_list_ul_head fl"><img src="{{asset('/resources/views/home/images/photo6.jpg')}}" alt=""></div>
                                        <div class="view_comment_list_ul_box_r fl">
                                            <div class="view_comment_list_ul_name">name</div>
                                            <div class="view_comment_list_ul_text  ">萨科技等哈开始加大号看了较好的爱上的卢卡斯接电话</div>
                                        </div>
                                    </div>
                                    <div class="view_comment_list_ul_some cb">
                                        <span>时间：2016-12-12&nbsp;</span>
                                        <span>回复&nbsp;</span>
                                        <span>顶起来(0)&nbsp;</span>
                                        <span>转发&nbsp;</span>
                                        <span>举报&nbsp;</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="view_comment_list_ul_box">
                                        <div class="view_comment_list_ul_head fl"><img src="{{asset('/resources/views/home/images/photo6.jpg')}}" alt=""></div>
                                        <div class="view_comment_list_ul_box_r fl">
                                            <div class="view_comment_list_ul_name">name</div>
                                            <div class="view_comment_list_ul_text  ">萨科技等哈开始加大号看了较好的爱上的卢卡斯接电话</div>
                                        </div>
                                    </div>
                                    <div class="view_comment_list_ul_some cb">
                                        <span>时间：2016-12-12&nbsp;</span>
                                        <span>回复&nbsp;</span>
                                        <span>顶起来(0)&nbsp;</span>
                                        <span>转发&nbsp;</span>
                                        <span>举报&nbsp;</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="view_comment_list_ul_box">
                                        <div class="view_comment_list_ul_head fl"><img src="{{asset('/resources/views/home/images/photo6.jpg')}}" alt=""></div>
                                        <div class="view_comment_list_ul_box_r fl">
                                            <div class="view_comment_list_ul_name">name</div>
                                            <div class="view_comment_list_ul_text  ">萨科技等哈开始加大号看了较好的爱上的卢卡斯接电话</div>
                                        </div>
                                    </div>
                                    <div class="view_comment_list_ul_some cb">
                                        <span>时间：2016-12-12&nbsp;</span>
                                        <span>回复&nbsp;</span>
                                        <span>顶起来(0)&nbsp;</span>
                                        <span>转发&nbsp;</span>
                                        <span>举报&nbsp;</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="view_comment_list_ul_box">
                                        <div class="view_comment_list_ul_head fl"><img src="{{asset('/resources/views/home/images/photo6.jpg')}}" alt=""></div>
                                        <div class="view_comment_list_ul_box_r fl">
                                            <div class="view_comment_list_ul_name">name</div>
                                            <div class="view_comment_list_ul_text  ">萨科技等哈开始加大号看了较好的爱上的卢卡斯接电话</div>
                                        </div>
                                    </div>
                                    <div class="view_comment_list_ul_some cb">
                                        <span>时间：2016-12-12&nbsp;</span>
                                        <span>回复&nbsp;</span>
                                        <span>顶起来(0)&nbsp;</span>
                                        <span>转发&nbsp;</span>
                                        <span>举报&nbsp;</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="view_comment_page">
                            <ul class="view_comment_page_ul">
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @parent
            </div>
        </div>
@endsection