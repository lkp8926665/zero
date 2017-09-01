@extends('layouts.home_common')
@section('info')
    <title>{{\Illuminate\Support\Facades\Config::get('web.web_title')}}-{{Config::get('web.seo_title')}}</title>
    <meta name="keywords" content="{{Config::get('web.keywords')}}" />
    <meta name="description" content="{{Config::get('web.description')}}" />
@endsection
@section('content')
<div class="banner">
    <section class="box">
        <ul class="texts">
            <p>打了死结的青春，捆死一颗苍白绝望的灵魂。</p>
            <p>为自己掘一个坟墓来葬心，红尘一梦，不再追寻。</p>
            <p>加了锁的青春，不会再因谁而推开心门。</p>
        </ul>
        <div class="avatar"><a href="{{url('admin')}}" target="_blank"><span>登录管理</span></a> </div>
    </section>
</div>
<article style="background: #e8e8e8;">
    <div class="register_cont">
        <div class="register_cont_head">
            <div class="register_cont_head_b fl"><span>注册</span></div>
            <div class="register_cont_head_g fr"><span>登录</span></div>
        </div>
        <div class="register_cont_write cb">
            <div class="register_cont_write_left fl">
                <ul class="register_cont_write_ul fl">
                    <li><span><i>用户名：</i><i class="register_red">*</i></span><input type="text"></li>
                    <li><span><i>密码：</i><i class="register_red">*</i></span><input type="password"></li>
                    <li><span><i>密码确认：</i><i class="register_red">*</i></span><input type="password"></li>
                    <li><span><i>昵称：</i></span><input type="text"></li>
                    {{--<li><span><i>真实姓名：</i></span><input type="text"></li>
                    <li><span><i>性别：</i></span><input type="text"></li>
                    <li><span><i>出生日期：</i></span><input type="text"></li>
                    <li><span><i>联系方式：</i></span><input type="text"></li>
                    <li><span><i>QQ：</i></span><input type="text"></li>
                    <li><span><i>地址：</i></span><input type="text"></li>--}}
                </ul>
                <div class="register_cont_write_re fl"><span>注册</span></div>
            </div>
            <div class="register_cont_write_right fl">
                <div class="register_cont_write_do">
                    <span>已有用户↓点击登录</span><br>
                    <a href="#"><img src="{{asset('/resources/views/home/images/register_d.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>



</article>
@endsection