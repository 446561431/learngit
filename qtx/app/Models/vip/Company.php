<?php

namespace App\Models\Vip;

use DB;
use Illuminate\Database\Eloquent\Model;



class Company extends Model
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
    	return Company::destroy(array($id));
    }
}