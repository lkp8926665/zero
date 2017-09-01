<?php

namespace App\Http\Controllers\Admin;

use App\Http\model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once 'resources/views/org/code/Code.class.php';

class LoginController extends CommonController
{
    /*登录界面*/
    public function login()
    {
        if($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code']) != $_code){
                return  back()->with('msg','输入验证码有误!');
            }
            $user = User::first();
            $_user_name = $user->user_name;
            $_user_password = Crypt::decrypt($user->user_password);
            if($input['user_name'] != $_user_name || $input['user_password'] != $_user_password){
                return back()->with('msg','用户名或密码错误!');
            }
            session(['user'=>$user]);
            return redirect('admin');
        }else {
            return view('admin.login');
        }
    }
    /*获取验证码code*/
    public function code()
    {
        $code = new \Code;
        $code->make();
    }
    /*加密*/
    public  function crypt(){
        $str = '000000';
        $_str = Crypt::encrypt($str);
        return $_str;
    }
    /*测试用*/
    public  function test(){
        return view('test');
    }

}
