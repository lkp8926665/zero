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
                <a href="{{url('admin/user/'.$data->user_id.'/password')}}"><i class="fa fa-recycle"></i>密码修改</a>
                <a href="#" onclick="window.location.reload()"><i class="fa fa-refresh"></i>刷新</a>
            </div>
            <div class="cb"></div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/user/'.$data->user_id)}}" method="post">
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
                        <th>昵称：</th>
                        <td>
                            <input type="text"  name="user_nickname" value="{{$data->user_nickname}}">
                        </td>
                    </tr>
                    <tr>
                        <th>真实姓名：</th>
                        <td>
                            <input type="text"  name="user_true_name" value="{{$data->user_true_name}}">
                        </td>
                    </tr>
                    <tr>
                        <th>E-mail：</th>
                        <td>
                            <input type="text"  name="user_email" value="{{$data->user_email}}"  @if($data->user_email) disabled="disabled" style="color: #e1e1e1;border-color: #e1e1e1;"@endif >
                            @if($data->user_email)
                                <span><i class="fa fa-exclamation-circle yellow"></i>E-mail不可修改</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>手机：</th>
                        <td>
                            <input type="text"  name="user_mobile" value="{{$data->user_mobile}}">
                        </td>
                    </tr>
                    <tr>
                        <th>头像：</th>
                        <td>
                            <input type="text" size="50" name="user_thumb" value="{{$data->user_thumb}}" >
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <script src="{{asset('resources/views/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('resources/views/org/uploadify/uploadify.css')}}">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                            $('#file_upload').uploadify({
                                                'buttonText'    :'图片上传',
                                                'formData'     : {
                                                    'timestamp' : '<?php echo $timestamp;?>',
                                                    '_token'     : "{{csrf_token()}}"
                                                },
                                                'swf'      : "{{asset('resources/views/org/uploadify/uploadify.swf')}}",
                                                'uploader' : "{{url('admin/upload')}}",
                                                'onUploadSuccess' : function(file,data,response){
                                                    $('input[name=user_thumb]').val(data);
                                                    $('#user_thumb_img').attr('src','/'+data);
                                                }
                                            });
                                        });
                            </script>
                            <style>
                                .uploadify{display:inline-block;}
                                .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                            </style>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <img src="@if($data->user_thumb){{url($data->user_thumb)}} @endif" alt="" id="user_thumb_img" style="max-width: 100px;max-height: 100px;">
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