<?php

namespace App\Http\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey='cate_id';
    public $timestamps=false;
    protected $guarded=[];

    public function tree($type=1)
    {
        $category = $this->orderBy('cate_order','asc')->get();
        return $this->getTree($category,'cate_name','cate_pid','cate_id','',$type);
    }

    public function getTree($data,$field_name,$field_pid='pid',$field_id='id',$pid=0,$type=1){
        $_data =array();
        foreach($data as $k=>$v){
            if($v->$field_pid==$pid){
                $data[$k]['_'.$field_name] = $data[$k][$field_name];
                $_data[] = $data[$k];
                foreach($data as $m => $n){
                    if($n->$field_pid==$v->$field_id){
                        $data[$m]['_'.$field_name] = '└─ '.$data[$m][$field_name];
                        $_data[]=$data[$m];
                        if($type==1) {
                            foreach ($data as $z => $j) {
                                if ($j->$field_pid == $n->$field_id) {
                                    $data[$z]['_' . $field_name] = '└─└─ ' . $data[$z][$field_name];
                                    $_data[] = $data[$z];
                                }
                            }
                        }
                    }
                }
            }
        }
        return $_data;
    }
}
