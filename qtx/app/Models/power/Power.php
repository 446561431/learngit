<?php

namespace App\power\models;

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
    /**
     *查询角色
     * return 对象
     */
    public function RoleSel()
    {
        return DB::table('qtx_role')->select([
            'role_id',
            'role_name',
            'role_status',
        ])
            ->paginate(3);
    }
    /**
     *添加角色
     * $post 需要添加的数据
     * return 受影响的条数
     */
    public function  RoleAdd( $post )
    {
        return DB::table('qtx_role')->insert([
            'role_name' => $post['role_name'],
            'role_status' => $post['role_status']
        ]);
    }
    /**
     *删除角色
     * $id 角色ID
     * return 受影响的条数
     */
    public function RoleDel( $id )
    {
        return DB::table('qtx_role')->where('role_id', '=', $id)->delete();
    }
    /**
     *根据ID查询单个角色
     * $id 角色ID
     * return object 对象
     */
    public function RoleUpdateSel( $id )
    {
        return DB::table('qtx_role')->select([
            'role_id',
            'role_name',
            'role_status'
        ])
            ->where('role_id', '=', $id)
            ->first();
    }
    /**
     *修改角色
     * $post 需要修改的数据
     * return 受影响的条数
     */
    public function RoleUpdate( $post )
    {
        return DB::table('qtx_role')
            ->where('role_id', '=', $post['role_id'])
            ->update([
                'role_name' => $post['role_name'],
                'role_status' => $post['role_status'],
            ]);
    }
    /**
     *查询用户
     * return 对象
     */
    public function UserSel()
    {
        return DB::table('qtx_admin')->select([
            'admin_id',
            'admin_name',
            'admin_email',
            'admin_phone',
            'created_time',
            'updated_time',
            'admin_status'
        ])
            ->paginate(3);
    }
    /**
     *删除用户
     * $id 用户ID
     * return 受影响的条数
     */
    public function UserDel( $id )
    {
        return DB::table('qtx_admin')->where('admin_id', '=', $id)->delete();
    }
    /**
     *根据ID查询单个用户
     * $id 用户ID
     * return object 对象
     */
    public function UserUpdateSel( $id )
    {
        return DB::table('qtx_admin')->select([
            'admin_id',
            'admin_name',
            'admin_email',
            'admin_phone',
            'created_time',
            'updated_time',
            'admin_status'
        ])
            ->where('admin_id', '=', $id)
            ->first();
    }
}