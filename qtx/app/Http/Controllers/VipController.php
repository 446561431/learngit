<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\vip\Vip;
use App\Models\vip\Compan;
use Illuminate\Http\Request;
use DB;

header("content-type:text/html;charset=utf-8");
    class VipController extends Controller {   

    	/**
		 *	会员管理(普通用户)
         *  首页
		 *	分页，返回查询数据
    	*/
        public function index() 
        {   
        	$model = new Vip();
        	$arr = $model->sel_user();
            return view('vip/list',['arr' => $arr]);
        }
        /**
		 *	会员管理(普通用户)
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
		 *	会员管理(普通用户)
		 *	跳转修改页面
    	*/ 
    	public function vipupdate()
    	{
    		$id = $_GET['id'];
    		$model = new Vip();
    		$arr = $model->seluser($id);
    		return view('vip/vipupdate',['arr' => $arr]);
    	}
        /**
         *   会员管理(普通用户)
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
         *   会员管理(普通用户)
         *   跳转添加页面，表单
        */
        public function vipinsert()
        {
            return view('vip/vipinsert');
        }
        /**
         *   会员管理(普通用户)
         *   添加表单，提交的数据
        */
        public function vipinsertfrom(Request $request)
        {
            $this->validate($request, [
                'user_name' => 'required|unique:posts|max:255',
                'user_password' => 'required|min:6',
                'user_phone' => 'required|size:11',
                'user_place' => 'required',
                'user_school' => 'required',
                'user_status' => 'required'
            ]);
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
         *   会员管理(普通用户)
         *   搜索
        */
        public function vipsearch()
        {
            $var = $_GET['search'];
            $model = new Vip();
            $data = $model->vipsearch($var);
            if(empty($data)){
                echo "<script>alert('用户名不存在');location.href='/vip';</script>";
            }
            return view('vip.vipsearch',['arr' => $data]);
        }
        
        /**
         *   会员等级管理
         *   主页显示
        */
        public function rank()
        {
            return view('vip.rank');
        }

        /**
         *   企业用户管理
         *   主页显示
        */
        public function company()
        {
            $Models = new Compan();
            $arr = $Models->sel_company();
            return view('vip.company',['arr' => $arr]);
        }
        /**
         *   企业用户管理
         *   删除，批量删除
        */
         public function companydel()
        {   
            $id = $_GET['id'];
            $Models = new Compan();
            $str = $Models->del_user($id); 
            if($str){
                echo "1";
            }else{
                echo "0";
            }
        }
        /**
         *   企业用户管理
         *   修改  指向表单
        */
        public function companyupdate()
        {
            $id = $_GET['id'];
            $Models = new Compan();
            $str = $Models->seluser($id); 
            return view('vip.companyupdate',['arr' => $str]);
        }
        /**
         *   企业用户管理
         *   修改 修改表单提交
        */
        public function companyfrom()
        {
            $Models = new Compan();
            $arr = $_POST;
            $id = $arr['user_id'];
            $arr['updated_time'] = time();
            $arr['user_lastip'] = $_SERVER['SERVER_ADDR'];
            $str = $Models->updatecompany($arr,$id);
            if($str){
                echo "<script>alert('修改成功');location.href='/company';</script>";
            }else{
                 echo "<script>alert('修改失败');location.href='/company';</script>";
            }
        }
        /**
         *   企业用户管理
         *   跳转添加页面，表单
        */
        public function companyinsert()
        {
            return view('vip/companyinsert');
        }
        /**
         *   企业用户管理
         *   添加表单提交
        */
        public function comfrom()
        {
            $Models = new Compan();
            $arr = $_POST;
            $str = $Models->insertcompany($arr);
            if($str){
                 echo "<script>alert('添加成功');location.href='/company';</script>";
            }else{
                 echo "<script>alert('添加失败');location.href='/company';</script>";
            }
        }
        /**
         *   企业用户管理
         *   搜索
        */
        public function companysearch()
        {
            $var = $_GET['search'];
            $model = new Compan();
            $data = $model->companysearch($var);
            if(empty($data)){
                echo "<script>alert('用户名不存在');location.href='/company';</script>";
            }
            return view('vip.companysearch',['arr' => $data]);
        }
    }  