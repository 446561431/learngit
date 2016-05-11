<?php

namespace App\Models\area;
use DB;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    //protected $table = 'qtx_area';

    /**
    *@地区查询
    */
    public function sel_area()
    {
        return DB::table("qtx_area")->paginate(5);
    }

    /**
    *@地区添加查询
    */
    public function sel_morearea()
    {
        return DB::table("qtx_area")->get();
    }

    /**
    *@地区删除
    */
    public function delete_area($data)
    {
        $area_id = $data['area_id'];
        return DB::table("qtx_area")->whereIn("area_id", [$area_id])->delete();
    }

    // public function add_area($data)
    // {
    // 	return DB::table("qtx_area")->insert(['area_name' => $data['area_name']]);
    // }
}
