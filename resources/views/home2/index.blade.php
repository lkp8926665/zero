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
<div class="template">
    <div class="box">
        <h3>
            <p><span>站长推荐</span> Recommend</p>
        </h3>
        <ul>
            @foreach($picHot as $p)
            <li><a href="{{url('a/'.$p->art_id)}}"  target="_blank"><img src="{{url($p->art_thumb)}}"></a><span>{{$p->art_title}}</span></li>
            @endforeach
        </ul>
    </div>
</div>
<article>
    <div class="cont">
        <div class="cont1 cb">
            <div class="cont1_user fl">
                <h2 class="title_tj cont1_title">
                    <p>用户<span>信息</span></p>
                </h2>
                <form action="" method="post">
                    <div class="cont1_user_box">
                        <div class="user_head"><img src="{{asset('/resources/views/home/images/user.jpg')}}" alt="" width="150" height="150"></div>
                        <div class="cont1_user_box_no">
                            <span>用户名:</span><input type="text"  name="" value=""><br>
                            <span>密　码:</span><input type="text" name="" value=""><br>
                            <span>验证码:</span><input  style="width: 50px;"  type="text" name="" value=""><img  style="float: right;margin: 5px 5px 0 0 ;" width="80" src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random();"><br>
                            <div class="user fl">登录</div>
                            <div class="user fl"><a href="{{url('/register')}}">注册</a></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="cont1_time fl">
                <link href="{{asset('/resources/views/org/index_time/style.css')}}" rel="stylesheet">
                <script src="{{asset('/resources/views/org/index_time/index.js')}}"></script>
                <iframe frameborder="0" src="{{asset('/resources/views/org/index_time/index2.html')}}" width="100%" height="300px" scrolling="no" style="background: #000;border-radius: 80%;border:3px solid #0d1de8;"></iframe>
            </div>
            <div class="cont1_notice fr">
                <div class="weather" style="margin:10px 25px;"><iframe width="190" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1"></iframe></div>
                <h2 class="title_tj cont2_title">
                    <p>通知<span>公告</span></p>
                </h2>
                <div class="cont1_notice_box">
                    <ul class="cont1_notice_box_ul">
                        <li><a href="">童子按时打卡机奥斯卡的哈桑</a><span>2016-11-30</span></li>
                        <li><a href="">童子按时打卡机奥斯卡的哈桑</a><span>2016-11-30</span></li>
                        <li><a href="">童子按时打卡机奥斯卡的哈桑</a><span>2016-11-30</span></li>
                        <li><a href="">童子按时打卡机奥斯卡的哈桑</a><span>2016-11-30</span></li>
                        <li><a href="">童子按时打卡机奥斯卡的哈桑</a><span>2016-11-30</span></li>
                        <li><a href="">童子按时打卡机奥斯卡的哈桑</a><span>2016-11-30</span></li>
                        <li><a href="">童子按时打卡机奥斯卡的哈桑</a><span>2016-11-30</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="cont2 cb">
            <div class="cont2_photo">
                <h2 class="title_tj cont1_title">
                    <p><a href="" title="精彩瞬间">精彩<span>瞬间</span></a></p>
                </h2>
                <div class="cont2_photo_box">
                    <div id="photo_list">
                        <div class="cont2_photo_box_big">
                            <ul id="photo_list1" class="cont2_photo_box_ul fl">
                                <li><a href="" title=""><img src="" alt="" width="300" height="100"><span>按时大家好</span></a></li>
                                <li><a href="" title=""><img src="" alt="" width="300" height="100"><span>按时大家好</span></a></li>
                                <li><a href="" title=""><img src="" alt="" width="300" height="100"><span>按时大家好</span></a></li>
                                <li><a href="" title=""><img src="" alt="" width="300" height="100"><span>按时大家好</span></a></li>
                            </ul>
                            <ul id="photo_list2" class="cont2_photo_box_ul fl"></ul>
                        </div>
                    </div>
                </div>
                <script>
                    $(function(){
                        var list = $("#photo_list");
                        var list1 = $("#photo_list1");
                        var list2 = $("#photo_list2");
                        var list_speed =  30 ;
                        $(function(){
                           marL(list,list1,list2,list_speed);
                        });
                        function marL(a,b,c,d){
                            if(b.width() > a.width()){
                                c.html(b.html());
                                var e = setInterval(function(){mar(a,b);},d);
                                a.hover(function(){
                                   clearInterval(e);
                                },function(){
                                    e = setInterval(function(){mar(a,b);},d);
                                });
                            }else{
                                a.scrollLeft(0);
                            }
                        }
                        function mar(a,b){
                            if(a.scrollLeft() > b.width()){a.scrollLeft(0);}
                            else{a.scrollLeft(a.scrollLeft()+1);}
                        }
                    });
                </script>
            </div>
        </div>
        <div class="cont3 cb">
            <div class="cont3_links">
                <h3 class="links">
                    <p>友情<span>链接</span></p>
                </h3>
                <ul class="website">
                    @foreach($link as $l)
                        <li><a href="{{url($l->link_url)}}" target="_blank">{{$l->link_name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</article>
@endsection
