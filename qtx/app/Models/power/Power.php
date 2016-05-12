<?php

namespace App\models;

use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Power extends Authenticatable
{
    /**
     *权限查询
     * return object 对象
     */
    public function PowerSel()
    {
        return DB::table('qtx_node')->select([
            'node_id',
            'node_name',
            'node_title',
            'node_status',
            'node_level'
        ])
            ->paginate(3);
    }
    /**
     *删除权限
     * $id 权限ID
     * return 受影响的条数
     */
    public function PowerDel( $id )
    {
        return DB::table('qtx_node')->where('node_id', '=', $id)->delete();
    }
    /**
     *根据ID查询单个权限
     * $id 权限ID
     * return object 对象
     */
    public function UpdateSel( $id )
    {
        return DB::table('qtx_node')->select([
            'node_id',
            'node_name',
            'node_title',
            'node_status',
            'node_level'
        ])
            ->where('node_id', '=', $id)
            ->first();
    }
    /**
     *修改权限
     * $post 需要修改的数据
     * return 受影响的条数
     */
    public function PowerUpdate( $post )
    {
        return DB::table('qtx_node')
            ->where('node_id', '=', $post['node_id'])
            ->update([
                'node_name' => $post['node_name'],
                'node_title' => $post['node_title'],
                'node_status' => $post['node_status'],
                'node_level' => $post['node_level']
            ]);
    }
    /**
     *添加权限
     * $post 需要修改的数据
     * return 受影响的条数
     */
    public function PowerAdd( $post )
    {
        return DB::table('qtx_node')->insert([
            'node_name' => $post['node_name'],
            'node_title' => $post['node_title'],
            'node_status' => $post['node_status'],
            'node_level' => $post['node_level']
        ]);
    }
}