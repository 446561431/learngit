<?php

namespace App\Models\type;

use Illuminate\Database\Eloquent\Model;

class consumption extends Model
{
    protected $table = 'qtx_consumption';
    public $timestamps = false;
    protected $primaryKey = 'consumption_id';
    protected  $fillable = ['consumption_id','consumption_name','status','create_time','update_time'];
    /**
     * 根据主键id,获取单条记录
     * @params $id 表中cosumption_id
     * return 数组
     */
    public function selectone($id){
        return $this->find($id);
    }
}
