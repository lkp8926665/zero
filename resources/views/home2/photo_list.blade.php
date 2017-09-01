@extends('layouts.home_common')
@section('info')
    <title>图片列表</title>
    <meta name="keywords" content="图片" />
    <meta name="description" content="图片列表" />
@endsection
@section('content')
    <article class="blogs">
        <h1 class="t_nav2"><span>“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。</span><a href="{{url('/')}}" class="n1">网站首页</a><a href="{{url('/photo_list')}}" class="n2">本地风情</a></h1>
        <div class="newblog left">
            <div class="list_photo">
                <ul class="list_photo_ul">
                    @foreach($data as $d)
                    <li><a href="{{url('a/'.$d->art_id)}}" title=""><img src="{{url($d->art_thumb)}}" alt="" width="200" height="100"><div class="list_photo_title">{{$d->art_title}}</div></a></li>
                    @endforeach
                </ul>
            </div>
            <div class="page">
                {{$data->links()}}
            </div>

        </div>
        <aside class="right">
            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
            </script>
            <!-- Baidu Button END -->
            <div class="news" style="float: left;">
                @parent
            </div>
            <div class="cb"></div>
            <div class="visitors">
                <h3><p>最近访客</p></h3>
                <ul>

                </ul>
            </div>
        </aside>
    </article>
@endsection