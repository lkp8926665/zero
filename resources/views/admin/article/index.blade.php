@extends('layouts.admin_common')
@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 文章列表
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>文章列表</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap fr">
                    <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>文章添加</a>
                    <a href="#" onclick="window.location.reload()"><i class="fa fa-refresh"></i>刷新</a>
                </div>
                <div class="cb"></div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>分类</th>
                        <th>标题</th>
                        <th>点击</th>
                        <th>编辑</th>
                        <th>发布时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $art)
                        <tr>
                            <td class="tc">{{$art->art_id}}</td>
                            <td >{{$art->cate_name}}</td>
                            <td >{{$art->art_title}}</td>
                            <td>{{$art->art_view}}</td>
                            <td>{{$art->art_editor}}</td>
                            <td>{{date('Y-m-d',$art->art_time)}}</td>
                            <td>
                                <a href="{{url('admin/article/'.$art->art_id.'/edit')}}">修改</a>
                                <a href="javascript:" onclick="del_art({{$art->art_id}})">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="page_list">
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

<style>
    .result_content ul li span {
        font-size: 15px;
        padding: 6px 12px;
    }
</style>


<script>
    /*删除分类*/
    function del_art(art_id){
        layer.confirm('您确定要删除这篇文章么？',{
            btn:['确定肯定','我点错了'] //按钮
        }, function () {
            $.post("{{url('admin/article/')}}/"+art_id,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
                if(data.status==0){
                    layer.msg(data.msg,{icon:6});
                    setTimeout(function () {
                        /*window.location.reload();*/
                        location.href = location.href;
                    }, 1000);
                }else{
                    layer.msg(data.msg,{icon:5});
                }
            });
//            layer.msg('的确很重要',{icon:1});
        },function(){
//            layer.msg('也可以这样',{
//                time:20000,//20s后自动关闭
//                btn:['明白了','知道了']
//            });
        });
    }
</script>
@endsection