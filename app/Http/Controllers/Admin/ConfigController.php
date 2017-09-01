<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class ConfigController extends CommonController
{
    /*---admin/config---get---全部配置项列表---*/
    public function index(){
        $data = Config::orderBy('conf_order')->get();
        foreach($data as $k=>$v){
            switch($v->field_type){
                case 'input':
                    $data[$k]->_html = '<input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'">';
                    break;
                case 'textarea':
                    $data[$k]->_html = '<textarea name="conf_content[]" class="lg" id="" cols="30" rows="10">'.$v->conf_content.'</textarea>';
                    break;
                case 'radio':
                    //1|开启,0|关闭
                    $arr = explode(',',$v->field_value);
                    $str = '';
                    foreach($arr as $m=>$n){
                        //1|开启
                        $r = explode('|',$n);
                        $c = $v->conf_content==$r[0]?' checked ':'';
                        $str .= '<input type="radio" name="conf_content[]" '.$c.' value="' . $r[0] . '">' . $r[1] . '　';
                    }
                    $data[$k]->_html = $str;
                    break;
            }
        }
        return view('admin.config.index',compact('data'));
    }
    //排序
    public function changeOrder()
    {
        $input = Input::all();
        $conf = Config::find($input['conf_id']);
        $conf-> conf_order = $input['conf_order'];
        $res = $conf ->update();
        if($res){
            $data=[
                'status'=>0,
                'msg'=>'配置项排序更新成功！'
            ];
        } else{
            $data=[
                'status'=>1,
                'msg'=>'配置项排序更新失败，请稍后重试！'
            ];
        }
        return $data;
    }
    /*修改配置内容*/
    public function changeContent(){
        $input =  Input::all();
        foreach ($input['conf_id'] as $k=>$v){
            Config::where('conf_id',$v)->update(['conf_content'=>$input['conf_content'][$k]]);
        }
        $this->putFile();
        return back()->with('errors','配置项更新成功!');
    }
    
    /*配置项数据写入文件*/
    public function putFile(){
        $config =  Config::pluck('conf_content','conf_name')->all(); //获取的数据 --$k=>$v
        //var_export($config,true);//转化字符串
        $path = base_path().'\config\web.php';
        $str = '<?php return '.var_export($config,true).';';
        file_put_contents($path,$str);//写入文件
    }
    
    

    /*---admin/config/create---get---添加配置项---*/
    public function create(){
        $data = [];
        return view('admin.config.add',compact('data'));
    }

    /*---admin/config---post---添加配置项提交---*/
    public function store(){
        $input=Input::except('_token');

        $rules = [
            'conf_name'=>'required',
            'conf_title'=>'required',
        ];
        $message =[
            'conf_name.required'  => '配置项名称不能为空!',
            'conf_title.required'  => '配置项标题不能为空!',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $re = Config::create($input);
            if($re){
                return redirect('admin/config');
            }else{
                return back()->with('errors','配置项添加失败，请稍后重试!');
            }
        }else{
            return back()->withErrors($validator);
        }

    }

    /*---admin/config/{config} /edit---get---编辑配置项信息---*/
    public function edit ($conf_id){
        $field =  Config::find($conf_id);
        return view('admin.config.edit',compact('field'));

    }

    /*---admin/config/{config}---put---更新配置项信息---*/
    public function update($conf_id){
        $input = Input::except('_token','_method');
        $re = Config::where('conf_id',$conf_id)->update($input);
        if($re){
            $this->putFile();
            return redirect('admin/config');
        }else{
            return back()->with('errors','配置项更新失败，请稍后重试!');
        }

    }

    /*---admin/config/{config}---get---显示单个配置项信息---*/
    public function show(){

    }

    /*---admin/config/{config} ---DELETE ---删除单个配置项信息---*/
    public function destroy($conf_id){
        $re =  Config::where('conf_id',$conf_id)->delete();
        if($re){
            $this->putFile();
            $data = [
                'status' =>0,
                'msg' =>'配置项删除成功!'
            ];
        }else{
            $data = [
                'status' =>1,
                'msg' =>'配置项删除失败，请稍后重试!!'
            ];
        }
        return $data;
    }

}
