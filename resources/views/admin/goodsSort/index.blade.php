@extends('layouts.admin_common')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 分类管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="javascript:search_keywords()" name="searchForm" method="post">
            {{csrf_field()}}
            <table class="search_tab">
                <tr>
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
            <div class="short_title">
                <h3>分类列表</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap fr">
                    <a href="{{url('admin/goodsSort/create')}}"><i class="fa fa-plus"></i>商品分类添加</a>
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
                        <th><input type="checkbox"></th>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>分类名称</th>
                        <th>商品数量</th>
                        <th>分类描述</th>
                        <th>添加时间</th>
                        <th>操作</th>
                        </tr>
                        @foreach($data as $v )
                        <tr>
                        <td class="tc"><input type="checkbox"></td>
                        <td class="tc">
                        <input type="text" name="ord[]" value="{{$v->sort_sorting}}" onchange="changeOrder(this,{{$v->sort_id}})">
                        </td>
                        <td class="tc">{{$v->sort_id}}</td>
                        <td>
                        <a href="#">{{$v->_sort_name}}</a>
                        </td>
                        <td>{{$v->goods_number}}</td>
                        <td>{{$v->sort_description}}</td>
                        <td>{{date('Y-m-d',$v->sort_time)}}</td>
                        <td>
                        <a href="{{url('admin/goodsSort/'.$v->sort_id.'/edit')}}">修改</a>
                        <a href="javascript:" onclick="del_cate({{$v->sort_id}})">删除</a>
                        </td>
                        </tr>
                        @endforeach

                    </table>


                        </div>
                        </div>
                        </form>
                            <!--搜索结果页面 列表 结束-->
                        <script>
                            /*搜索功能*/
                        function search_keywords()
                        {
                            listTable.filter['keywords'] = Utils.trim(document.forms['searchForm'].elements['keywords'].value);
                            listTable.filter['page'] = 1;
                            listTable.loadList();
                        }

                /*排序修改*/
                function changeOrder(obj,sort_id){
                    var sort_sorting = $(obj).val();
                    $.post('{{url('admin/sort/changeOrder')}}',{'_token':'{{csrf_token()}}',sort_sorting:sort_sorting,sort_id:sort_id},function(data){
                        if(data.status==0) {
                            layer.msg(data.msg, {icon: 6});
            }else{
                layer.msg(data.msg, {icon: 5});
            }
        })
    }
    /*删除分类*/
    function del_cate(sort_id){
        layer.confirm('您确定要删除这个分类么？',{
            btn:['确定肯定','我点错了'] //按钮
        }, function () {
            $.post("{{url('admin/goodsSort/')}}/"+sort_id,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
                if(data.status==0){
                    layer.msg(data.msg,{icon:6});
                    setTimeout(function () {
                        window.location.reload();
                        /*location.href = location.href;*/
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

