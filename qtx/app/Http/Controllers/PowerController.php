<?php
namespace App\Http\Controllers;

use App\models\Power;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Cache;


class PowerController extends Controller {
    public function __construct()
    {

    }

    /**
     *权限列表
     */
    public function index() {
        $power = new Power();
        $powerarr = $power -> PowerSel();
        return view('power.index',['data' => $powerarr]);
    }
    /**
     *权限删除
     * $id 权限ID
     */
    public function del($id)
    {
        $power = new power();
        $status = $power -> PowerDel( $id );
        return $status;
    }
    /**
     *权限修改（表单）
     * $id 权限ID
     */
    public function  uplist($id)
    {
        $power = new Power();
        $data = $power -> UpdateSel( $id );
        return view('power.update',['data' => $data]);
    }
    /**
     *权限修改
     */
    public function update(Request $request)
    {
        $power = new Power();
        $status = $power -> PowerUpdate( $request->input() );
        if( $status > 0) {
            echo "<script>alert('修改成功');location.href='power'</script>";
        }else{
            echo "<script>alert('修改失败');location.href='power'</script>";
        }
    }
    /**
     *权限添加
     */
    public function add(Request $request)
    {
        $power = new Power();
        $status = $power -> PowerAdd( $request->input() );
        if( $status > 0) {
            echo "<script>alert('添加成功');location.href='power'</script>";
        }else{
            echo "<script>alert('添加失败');location.href='poweraddform'</script>";
        }
    }
    /**
     *角色列表
     */
    public function rolelist() {
        $power = new Power();
        $rolearr = $power -> RoleSel();
        return view('power.role',['data' => $rolearr]);
    }
    /**
     *添加角色
     */
    public function roleadd(Request $request)
    {
        $power = new Power();
        $status = $power -> RoleAdd( $request->input() );
        if( $status > 0) {
            echo "<script>alert('添加成功');location.href='rolelist'</script>";
        }else{
            echo "<script>alert('添加失败');location.href='roleaddform'</script>";
        }
    }
    /**
     *删除角色
     */
    public function roledel( $id )
    {
        $power = new power();
        $status = $power -> RoleDel( $id );
        return $status;
    }
    /**
     *角色修改（表单）
     * $id 角色ID
     */
    public function roleup( $id )
    {
        $power = new Power();
        $data = $power -> RoleUpdateSel( $id );
        return view('power.roleupdate',['data' => $data]);
    }
    /**
     *角色修改
     */
    public function roleupdate(Request $request)
    {
        $power = new Power();
        $status = $power -> RoleUpdate( $request->input() );
        if( $status > 0) {
            echo "<script>alert('修改成功');location.href='rolelist'</script>";
        }else{
            echo "<script>alert('修改失败');location.href='rolelist'</script>";
        }
    }
    /**
     *给角色添加权限
     */
    public function rolenode( $id )
    {
        $power = new Power();
        $data = $power -> PowerAllSel();
        return view('power.rolenode',['id' => $id, 'data' => $data]);
    }
    public function rolenodeadd(Request $request)
    {
        $power = new Power();
        $status = $power -> PowerAllAdd( $request->input() );
        if( $status > 0) {
            echo "<script>alert('添加成功');location.href='rolelist'</script>";
        }else{
            echo "<script>alert('添加失败');location.href='rolelist'</script>";
        }
    }
    /**
     *用户列表
     */
    public function user() {
        $power = new Power();
        $rolearr = $power -> UserSel();
        return view('power.user',['data' => $rolearr]);
    }
    /**
     *用户删除
     */
    public function userdel( $id)
    {
        $power = new power();
        $status = $power -> UserDel( $id );
        return $status;
    }
    /**
     *用户修改（表单）
     * $id 用户ID
     */
    public function userup( $id )
    {
        $power = new Power();
        $data = $power -> UserUpdateSel( $id );
        return view('power.userupdate',['data' => $data]);
    }
    /**
     *用户修改
     */
    public function userupdate(Request $request)
    {
        $power = new Power();
        $status = $power -> UserUpdate( $request->input() );
        if( $status > 0) {
            echo "<script>alert('修改成功');location.href='userlist'</script>";
        }else{
            echo "<script>alert('修改失败');location.href='userlist'</script>";
        }
    }
    /**
     *添加用户
     */
    public function useradd(Request $request)
    {
        $power = new Power();
        $status = $power -> UserAdd( $request->input() );
        if( $status > 0) {
            echo "<script>alert('添加成功');location.href='rolelist'</script>";
        }else{
            echo "<script>alert('添加失败');location.href='roleaddform'</script>";
        }
    }
    /**
     *用户的角色信息
     */
    public function userrole( $id )
    {
        $power = new Power();
        $data = $power -> UserRole( $id );
        return view('power.userrole',['data' => $data]);
    }
    /**
     *给用户添加角色
     */
    public function userroleadd(Request $request)
    {
        $power = new Power();
        $status = $power -> UserRoleAdd($request->input());
        if( $status > 0) {
            echo "<script>alert('添加成功');location.href='userlist'</script>";
        }else{
            echo "<script>alert('添加失败');location.href='userlist'</script>";
        }
    }
}