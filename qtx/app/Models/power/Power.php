<?php

namespace App\power\models;

use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Power extends Authenticatable
{
    /**
     *权限查询（有分页）
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
     *权限查询（无分页）
     * return object 对象
     */
    public function PowerAllSel()
    {
        return DB::table('qtx_node')->select([
            'node_id',
            'node_name'
        ])
            ->get();
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
     *给角色添加权限
     * $post 需要修改的数据
     * return 受影响的条数
     */
    public function PowerAllAdd( $post )
    {
        DB::table('qtx_role_node')->where('role_id', '=', $post['role_id'])->delete();
        foreach($post['node_id'] as $k => $v){
            $data[] = ['role_id' => $post['role_id'], 'node_id' => $v];
        }
        return DB::table('qtx_role_node')->insert($data);
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
    /**
     *修改用户
     * $post 需要修改的数据
     * return 受影响的条数
     */
    public function UserUpdate( $post )
    {
        /**
         * 判断密码是否为空，为空不修改，反之则修改
         */
        if( empty($post['admin_password']) )
        {
            $update = [
                'admin_name' => $post['admin_name'],
                'admin_email' => $post['admin_email'],
                'admin_phone' => $post['admin_phone'],
                'updated_time' => time(),
                'admin_status' => $post['admin_status']
            ];
        }else{
            $update = [
                'admin_name' => $post['admin_name'],
                'admin_email' => $post['admin_email'],
                'admin_password' => md5($post['admin_password']),
                'admin_phone' => $post['admin_phone'],
                'updated_time' => time(),
                'admin_status' => $post['admin_status']
            ];
        }
        return DB::table('qtx_admin')
            ->where('admin_id', '=', $post['admin_id'])
            ->update($update);
    }
    /**
     *添加角色
     * $post 需要添加的数据
     * return 受影响的条数
     */
    public function  UserAdd( $post )
    {
        return DB::table('qtx_admin')->insert([
            'admin_name' => $post['admin_name'],
            'admin_email' => $post['admin_email'],
            'admin_password' => md5($post['admin_password']),
            'admin_phone' => $post['admin_phone'],
            'created_time' => time(),
            'updated_time' => time(),
            'admin_status' => $post['admin_status']
        ]);
    }
    /**
     *查询用户的角色
     * $id 用户Id
     * return 对象
     */
    public function UserRole ( $id )
    {
        $role = DB::table('qtx_admin_role')->select([
            'admin_id',
            'qtx_role.role_id',
            'role_name'
        ])
            ->join('qtx_role', 'qtx_admin_role.role_id', '=', 'qtx_role.role_id')
            ->where('qtx_admin_role.admin_id', '=', $id)
            ->get();
        foreach($role as $k => $v)
        {
            $data[] = DB::table('qtx_role_node')->select([
                'node_name'
            ])
                ->join('qtx_node', 'qtx_node.node_id', '=', 'qtx_role_node.node_id')
                ->where('qtx_role_node.role_id', '=', $v->role_id)
                ->get();
        }
        for($i=0;$i<count($role);$i++)
        {
            $role[$i]->node = $data[$i];
        }
        return $role;
    }
    /**
     *给用户添加角色
     * $post 需要添加的数据
     * return 受影响的条数
     */
    public function UserRoleAdd( $post )
    {
        DB::table('qtx_admin_role')->where('admin_id', '=', $post['admin_id'])->delete();
        foreach($post['role_id'] as $k => $v){
            $data[] = ['admin_id' => $post['admin_id'], 'role_id' => $v];
        }
        return DB::table('qtx_admin_role')->insert($data);
    }
}