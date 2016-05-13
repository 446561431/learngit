<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\vip\Vip;
use App\Models\vip\Company;
use Request;
use DB;

header("content-type:text/html;charset=utf-8");
    class VipController extends Controller {   

    	/**
		 *	会员管理首页
		 *	分页，返回查询数据
    	*/
        public function index() 
        {   
        	$model = new Vip();
        	$arr = $model->sel_user();
            return view('vip/list',['arr' => $arr]);
        }
        /**
		 *	会员管理
		 *	删除，批量删除,接收id，删除数据
    	*/
        public function vipdel()
        {	
        	$id = $_GET['id'];
        	$model = new Vip();
        	$str = $model->del_user($id);
        	if($str){
        		echo "1";
        	}else{
        		echo "0";
        	}
        }
        /**
		 *	会员管理
		 *	跳转修改页面
    	*/ 
    	public function vipupdate()
    	{
    		$id = $_GET['id'];
    		$model = new Vip();
    		$arr = $model->seluser($id);
            //print_r($arr);die;
    		return view('vip/vipupdate',['arr' => $arr]);
    	}
        /**
         *   会员管理
         *   修改页面表单提交
         *   获取修改时间，本次登陆ip
        */
        public function vipfrom()
        {   
            $model = new Vip();
            $arr = $_POST;
            $id = $arr['user_id'];
            $arr['updated_time'] = time();
            //print_r($arr);die;
            $arr['user_lastip'] = $_SERVER['SERVER_ADDR'];
            $str = $model->updatevip($arr,$id);
            if($str){
                echo "<script>alert('修改成功');location.href='/vip';</script>";
            }else{
                 echo "<script>alert('修改失败');location.href='/vip';</script>";
            }
        }
        /**
         *   会员管理
         *   跳转添加页面，表单
        */
        public function vipinsert()
        {
            return view('vip/vipinsert');
        }
        /**
         *   会员管理
         *   添加表单，提交的数据
        */
        public function vipinsertfrom()
        {
            $arr = Request::all();
            
            $model = new Vip();
            $str = $model->insertvip($arr);
            if($str){
                 echo "<script>alert('添加成功');location.href='/vip';</script>";
             }else{
                 echo "<script>alert('添加失败');location.href='/vip';</script>";
             }
        }
        /**
         *   会员等级管理
         *   主页显示
        */
        public function rank()
        {

            return view('vip/rank');
        }

        /**
         *   企业用户管理
         *   主页显示
        */
        public function company()
        {
            $Models = new Company();
            $arr = $Models->sel_company();
            return view('vip/company',['arr' => $arr]);
        }
        /**
         *   企业用户管理
         *   删除，批量删除
        */
         public function companydel()
        {   
            $id = $_GET['id'];
            $Models = new Company();
            $str = $Models->del_user($id);
            if($str){
                echo "1";
            }else{
                echo "0";
            }
        }
    }  