<?php
namespace App\Http\Controllers;

use DB;
use App\Models\order\Order;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;



    class OrderController extends Controller { 
       /**
	    * 查询已经结算所有的订单
        * return   返回给视图
	    */
        public function oldorder() {   
           
        	$order = new Order();
        	$arr = $order->selOld();  

            return view('order/oldorder', ['arr' => $arr]);
        
        }
       /**
	    * 查询未结算所有的订单
        * return   返回给视图
	    */
        public function noorder() {   

        	$order = new Order();
        	$arr = $order->noOrder();    
            return view('order/neworder', ['arr' => $arr]);
        
        }
      
        /**
	     * 修改已完成的订单
         * return   返回给视图
	     */   
        public function up() {  
          
        	$order_id = $_GET['order_id'];
        	$status = $_GET['status'];   
        	//echo $order_id;die;        
            $order = new Order();
            $re = $order->up($order_id,$status);
        } 
        /**
	     * 删除订单
         * return   bool
	     */   
        public function del() {  
          
        	$order_id = $_GET['order_id'];       
            $order = new Order();
            $re = $order->del($order_id);
            if($re){
                echo "1";
            }else{
                echo "0";
            }
        }
        /**
	     * 搜索 以结算的订单
         *
	     */   
        public function yisearch() {  
                   	
         	$ctime = strtotime($_GET['ctime']); 
        	$utime = strtotime($_GET['utime']);         	
        	$order = new Order();
            $arr = $order->yisearch($ctime,$utime);
            return view('order/souorder', ['arr' => $arr]);
            
        }
         /**
         * 搜索 未结算的订单
         *
         */   
        public function weisearch() {  
               
            $ctime = strtotime($_GET['ctime']); 
            $utime = strtotime($_GET['utime']);            
            $order = new Order();
            $brr = $order->weisearch($ctime,$utime);                  
            return view('order/seaorder', ['brr' => $brr]);
        
        }
       /**
	    * 订单评论
	    * return bool
	    */
	    function neworder(){
	      echo  "asdasf";
	    }   
    }  