<?php
namespace App\Http\Controllers;

use App\models\Power;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;



    class PowerController extends Controller {
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
    }  