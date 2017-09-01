<?php

namespace App\Http\Controllers\Admin;

use App\Http\model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class IndexController extends CommonController
{
    /*首页显示*/
    public function index(){
        $user = User::first();
        return view('admin.index',compact('user'));
    }
    /*首页信息页*/
    public function info(){
        return view('admin.info');
    }
    /*用户退出*/
    public  function quit(){
        session(['user'=>null]);
        return redirect('admin/login');
    }
    /*修改密码*/
    public function pass(){
        $input = Input::all();
        if($input) {
            $rules = [
                'password'=>'required | between:6,20 | confirmed',
            ];
            $message =[
                'password.required'  => '新密码不能为空!',
                'password.between'  => '新密码必须6-20位之间!',
                'password.confirmed'  => '确认密码不一致!',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $user =User::first();
                $_password = Crypt::decrypt($user->user_password);
                if($input['password_o']==$_password){
                    $user->user_password = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->with('errors','密码修改成功！');
                }else{
                    return back()->with('errors','原密码错误！');
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{

        }
        return view('admin.pass');
    }
}
