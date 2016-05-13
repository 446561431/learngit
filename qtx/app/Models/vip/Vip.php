<?php

namespace App\Models\Vip;

use DB;
use Illuminate\Database\Eloquent\Model;



class Vip extends Model
{
    /**
	 *  	查询主页显示，分页
     *   返回查询用户表的所有数据
    */
    public function sel_user(){
        return $data = DB::table('qtx_user_stu')->select(
                    'user_id',
                    'user_name',
                    'user_password',
                    'user_phone',
                    'user_place',
                    'user_school',
                    'create_time',
                    'updated_time',
                    'user_lastlogin',
                    'user_lastip',
                    'user_status'
            )->paginate(5);
    }
    /**
	 *	要查询的数据
     *   @params $id 表中的user_id
	 *	返回该id的数组
    */
    public function seluser($id){
    	return $data = DB::table('qtx_user_stu')->
                        where('user_id','=',$id)->
                        first();
    }
    /**
     *	删除,批量删除
     *   @params $id 表中要删除的表id 相当于 user_id
     * 	返回是否删除成功
    */
    public function del_user($id){
    	return Vip::destroy(array($id));
    }

    /**
     *   修改
     *   @params $id接收要修改的id
     *   return true or flash
    */
    public function updatevip($arr,$id){
        return DB::table('qtx_user_stu')
                            ->where('user_id','=',$id)
                            ->update(['user_name'    => $arr['user_name'],
                                     'user_password' => $arr['user_password'],
                                     'user_phone'    => $arr['user_phone'],
                                     'user_place'    => $arr['user_place'],
                                     'user_school'   => $arr['user_school'],
                                     'updated_time'  => $arr['updated_time'],
                                     'user_lastip'   => $arr['user_lastip'],
                                     'user_status'   => $arr['user_status']
                                    ]);
    }
    /**
     *   添加
     *   @params
     *   return true or flash
    */
    public function insertvip($arr){
        return Vip::insert([
                        'user_name' => $arr['user_name'],
                        'user_password' => $arr['user_password'],
                        'user_phone' => $arr['user_phone'],
                        'user_place' => $arr['user_place'],
                        'user_school' => $arr['user_school'],
                        'create_time' => time(),
                        'updated_time' => time(),
                        'user_lastip' => $_SERVER['SERVER_ADDR'],
                        'user_status' => $arr['user_status']
            ]);
    }
}
