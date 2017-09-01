<?php

namespace App\Http\Controllers\Admin;


use App\Http\model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends CommonController
{
    /*---admin/user---get---全部列表---*/
    public function index(){
        $data = User::orderBy('user_id', 'desc')->paginate(10);
        return view('admin.user.index',compact('data'));
    }

    /*---admin/user/create---get---添加---*/
    public function create(){
        return view('admin.user.add');
    }

    /*---admin/user---post---添加提交---*/
    public function store(){
        $input=Input::except('_token');
        $input['user_time']=time();
        $rules = [
            'user_name'=>'required|min:3|unique:user',
            'user_password'=>'required|between:6,20|alpha_num|confirmed',
            'user_email'=>'unique:user',
        ];
        $message =[
            'user_name.required'  => '用户名不能为空!',
            'user_name.min'  => '用户名不得小于3个字符!',
            'user_name.unique'  => '用户名已存在!',
            'user_password.required'  => '密码不能为空!',
            'user_password.between'  => '密码必须6-20位之间!',
            'user_password.alpha_num'  => '密码必须是字母或是数字!',
            'user_password.confirmed'  => '密码确认不一致!',
            'user_email.unique'=>'此电子邮箱已注册,请更换电子邮箱!',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $user = new User();
            $user->user_name = $input['user_name'];
            $user->user_password = Crypt::encrypt($input['user_password']);
            $user->user_nickname=$input['user_nickname'];
            $user->user_true_name=$input['user_true_name'];
            $user->user_thumb=$input['user_thumb'];
            $user->user_time = $input['user_time'];
            $user->user_email = $input['user_email'];
            $user->user_mobile = $input['user_mobile'];
            $user->save();
            return redirect('admin/user');
            /*$re = User::create($input);
            if($re){
                return redirect('admin/user');
            }else{  
                return back()->with('errors','新增用户未知错误，请稍后重试!');
            }*/
        }else{
            return back()->withErrors($validator);
        }
    }
    /*---admin/user/{user}---get---显示单个分类信息---*/
    public function show($user_id){

    }
    /*---admin/user/{user} /edit---get---编辑信息---*/
    public function edit($user_id){
        $data = User::find($user_id);
                                                                                                                                                                                                                                                                                                                                                                                                                       return view('admin.user.edit',compact('data'));
    }

    /*---admin/user/{user}---put---更新信息---*/
    public function update($user_id){
        $input = Input::except('_token','_method');
        $rules = [
            'user_email'=>'unique:user',
        ];
        $message =[
            'user_email.unique'=>'此电子邮箱已注册,请更换电子邮箱!',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $re = User::where('user_id',$user_id)->update($input);
            if($re){
                return redirect('admin/user');
            }else{
                return back()->with('errors','用户信息更新失败，请稍后重试!');
            }
        }else{
            return back()->withErrors($validator);
        }
    }
    /*---admin/user/{user}/password---get---用户密码修改---*/
    public function password($user_id){
        $data = User::find($user_id);
        return view('admin.user.password',compact('data'));
    }
    /*---admin/user/{user}/password---get---用户密码修改提交---*/
    public  function password_edit($user_id){
        $input = Input::except('_token','_method');
        $tit = '/'.Crypt::decrypt(User::where('user_id','1')->value('user_password'));
        if($input['user_pass']==$tit){
            $rules = [
                'user_password'=>'required|between:6,20|alpha_num|confirmed',
            ];
            $message =[
                'user_password.required'  => '密码不能为空!',
                'user_password.between'  => '密码必须6-20位之间!',
                'user_password.alpha_num'  => '密码必须是字母或是数字!',
                'user_password.confirmed'  => '密码确认不一致!',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                unset($input['user_pass'],$input['user_password_confirmation']);
                $input['user_password'] = Crypt::encrypt($input['user_password']);
                $re = User::where('user_id',$user_id)->update($input);
                if($re){
                    return redirect('admin/user');
                }else{
                    return back()->with('errors','用户信息更新失败，请稍后重试!');
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back()->with('errors','密码修改指令错误!请重试!');
        }
    }

    /*---admin/user/{user} ---DELETE ---删除单个信息---*/
    public function destroy($user_id){
        /*session('user');
        dd(session('user'));
        exit;*/
        $re = User::where('user_id',$user_id)->delete();
        if($re){
            $data = [
                'status' =>0,
                'msg' =>'用户删除成功!'
            ];
        }else{
            $data = [
                'status' =>1,
                'msg' =>'用户删除失败，请稍后重试!!'
            ];
        }
        return $data;
    }
}
