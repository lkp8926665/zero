<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //图片上传
    public function upload()
    {
        $file = Input::file('Filedata');
        if($file->isValid()){
            $entension = $file -> getClientOriginalExtension();//文件上传的后缀
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file-> move(base_path().'/uploads',$newName);//移动文件并重命名
            $filepath =  'uploads/'.$newName;
            return $filepath;
        }
    }
}
