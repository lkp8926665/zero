@extends('layouts.home_common')
@section('info')
    <title>文章时态--{{\Illuminate\Support\Facades\Config::get('web.web_title')}}-{{Config::get('web.seo_title')}}</title>
    <meta name="keywords" content="--{{Config::get('web.keywords')}}" />
    <meta name="description" content="--{{Config::get('web.description')}}" />
@endsection
@section('content')
<article class="blogs">
    <h1 class="t_nav2"><span>“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。</span><a href="{{url('/')}}" class="n1">网站首页</a><a href="{{url('/article_list')}}" class="n2">文章时态</a></h1>
    <div class="newblog left">
        @foreach($data as $d)
        <h2>{{$d->art_title}}</h2>
        <figure><img src="{{url($d->art_thumb)}}"></figure>
        <ul class="nlist">
            <p>{{$d->art_description}}</p>
            <a title="{{$d->art_title}}" href="{{url('a/'.$d->art_id)}}" target="_blank" class="readmore">阅读全文>></a>
        </ul>
            <p class="dateview"><span>{{date('Y-m-d',$d->art_time)}}</span><span>{{$d->art_editor}}</span><span>分类：[<a href="{{url('cate/'.$d->cate_id)}}">{{$d->cate_name}}</a>]</span></p>

            <div class="line"></div>
        @endforeach
       {{-- <div class="blank"></div>
        <div class="ad">
            <img src="images/ad.png">
        </div>--}}
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