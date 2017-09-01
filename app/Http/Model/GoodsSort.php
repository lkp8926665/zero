<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsSort extends Model
{
    protected $table = 'goods_sort';
    protected $primaryKey='sort_id';
    public $timestamps=false;
    protected $guarded=[];

    public function tree($type=1,$where)
    {
        $goodsSort = $this->where('sort_name','like','%'.$where.'%')->orderBy('sort_sorting','asc')->get();
        return $this->getTree($goodsSort,'sort_name','sort_pid','sort_id','',$type);
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
