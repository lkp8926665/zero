@extends('layouts.admin_common')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 新增用户
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>新增用户</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap fr">
                <a href="{{url('admin/user')}}"><i class="fa fa-list-ul"></i>用户列表</a>
                <a href="#" onclick="window.location.reload()"><i class="fa fa-refresh"></i>刷新</a>
            </div>
            <div class="cb"></div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/user/'.$data->user_id.'/password')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>用户名：</th>
                        <td>
                            <input type="text"  name="user_name" value="{{$data->user_name}}" disabled="disabled" style="color: #e1e1e1;border-color: #e1e1e1;">
                            <span><i class="fa fa-exclamation-circle yellow"></i>用户名不可修改</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>密码修改指令：</th>
                        <td>
                            <input type="password"  name="user_pass" >
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>新密码：</th>
                        <td>
                            <input type="password"  name="user_password" >
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>新密码确认：</th>
                        <td>
                            <input type="password"  name="user_password_confirmation" >
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection