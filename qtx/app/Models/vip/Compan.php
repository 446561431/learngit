<?php

namespace App\Models\Vip;

use DB;
use Illuminate\Database\Eloquent\Model;



class Compan extends Model
{
	/**
	 *  	查询主页显示，分页
     *   返回查询用户表的所有数据
    */
	public function sel_company(){
		return DB::table('qtx_user_com')->select(
				    'user_id',
                    'user_name',
                    'user_password',
                    'user_phone',
                    'user_type',
                    'user_place',
                    'create_time',
                    'updated_time',
                    'user_lastip',
                    'user_status'
            )->paginate(5);
	}
	 /**
     *	删除,批量删除
     *   @params $id 表中要删除的表id 相当于 user_id
     * 	返回是否删除成功
     */
    public function del_user($id){
    	return DB::delete("delete from qtx_user_com where user_id in($id)");
    }
    /**
     *  删除,批量删除
     *   @params $id 表中要删除的表id 相当于 user_id
     *  返回是否删除成功
     */
    public function seluser($id){
        return $data = DB::table('qtx_user_com')->
                        where('user_id','=',$id)->
                        first();
    }
    /**
     *  删除,批量删除
     *   @params $id 表中要删除的表id 相当于 user_id
     *  返回是否删除成功
     */
    public function updatecompany($arr,$id){
         return DB::table('qtx_user_com')
                            ->where('user_id','=',$id)
                            ->update([
                                     'user_name'     => $arr['user_name'],
                                     'user_password' => $arr['user_password'],
                                     'user_phone'    => $arr['user_phone'],
                                     'user_place'    => $arr['user_place'],
                                     'updated_time'  => $arr['updated_time'],
                                     'user_lastip'   => $arr['user_lastip'],
                                     'user_status'   => $arr['user_status']
                                    ]);
    }
    /**
     *   添加
     *   @params $arr  要添加的数据
     *  返回是否添加成功
     */
    public function insertcompany($arr){
       return  DB::table('qtx_user_com')->insert([
                        'user_name' => $arr['user_name'],
                        'user_password' => $arr['user_password'],
                        'user_phone' => $arr['user_phone'],
                        'user_place' => $arr['user_place'],
                        'user_type'  => $arr['user_type'],
                        'create_time' => time(),
                        'updated_time' => time(),
                        'user_lastip' => $_SERVER['SERVER_ADDR'],
                        'user_status' => $arr['user_status'],
                    ]);
    }   
    /**
     *  要查询的数据
     *  @params $var 表中的user_name
     *  返回查询出来的数组
    */
    public function companysearch($var){
        return $data = DB::table('qtx_user_com')->
                        where('user_name',$var)->
                        paginate(5);
    }
                     
}