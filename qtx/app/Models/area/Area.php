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
    
    protected $table = 'qtx_area';
    protected $primaryKey = 'area_id';

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
        //return DB::table("qtx_area")->whereIn("area_id", [$area_id])->delete();
        return Area::destroy(array($area_id));
    }

    /**
    *@地区添加
    */
    public function add_area($data)
    {
        $parent_id = $data['sel_name'];
        $area_name = $data['area_name'];
        return DB::table('qtx_area')->insert(
            array(
                'parent_id' => $parent_id, 
                'area_name' => "$area_name"
            )
        );
    }

    /**
    *@地区修改查询
    */
    public function select_area($data)
    {
        return DB::table("qtx_area")->where("area_id",$data['area_id'])->get();
    }

    /**
    *@地区修改查询
    */
    public function select1_area($data)
    {
        $area_name = $data['area_name'];
        return DB::table("qtx_area")->where("area_name", $area_name)->paginate(5);
    }

    /**
    *@地区修改
    */
    public function update_area($data)
    {
        $area_id = $data['area_id'];
        $parent_id = $data['sel_name'];
        $area_name = $data['area_name'];
        return DB::table('qtx_area')->where("area_id", $area_id)->update(
            array(
                'parent_id' => $parent_id, 
                'area_name' => "$area_name"
            )
        );
    }


    // public function add_area($data)
    // {
    // 	return DB::table("qtx_area")->insert(['area_name' => $data['area_name']]);
    // }
}
