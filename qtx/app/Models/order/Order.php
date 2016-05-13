<?php

namespace App\Models\order;
 
use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Order extends Authenticatable

{   /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'qtx_user_order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'user_id', 'shop_id', 'consume_money', 'create_at', 'pay_status', 'cousume_site', 'shop_name', 'update_at', 'order_status',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	
    /**
	 * 查询所有门店已经结算的所有订单
     * return $orders array
	 */
    function selOld(){
        $orders = DB::table('qtx_user_order')
            ->leftjoin('qtx_user_stu', 'qtx_user_stu.user_id', '=', 'qtx_user_order.user_id')
            ->leftjoin('qtx_shop', 'qtx_shop.shop_id', '=', 'qtx_user_order.shop_id')
            ->select('qtx_user_order.*', 'qtx_user_stu.user_id', 'qtx_user_stu.user_name', 'qtx_shop.shop_id', 'qtx_shop.shop_name')
            ->orderBy('qtx_user_order.create_at', 'desc')
            ->where('qtx_user_order.pay_status','=', 2)
            ->paginate(4);
        return $orders;
    }
    /**
     * 查询所有门店没有结算的所有订单
     * return $orders array
     */
    function noOrder(){
        $orders = DB::table('qtx_user_order')
            ->leftjoin('qtx_user_stu', 'qtx_user_stu.user_id', '=', 'qtx_user_order.user_id')
            ->leftjoin('qtx_shop', 'qtx_shop.shop_id', '=', 'qtx_user_order.shop_id')
            ->select('qtx_user_order.*', 'qtx_user_stu.user_id', 'qtx_user_stu.user_name', 'qtx_shop.shop_id', 'qtx_shop.shop_name')
            ->orderBy('qtx_user_order.create_at', 'desc')
            ->where('qtx_user_order.pay_status','!=', 2)
            ->paginate(4);
        return $orders;
    }
 

    /**
     * 修改订单状态
     * return bool
     */
    function up($order_id,$status){

        $re = DB::update("update qtx_user_order set  order_status = '$status' where order_id = ?", [$order_id]);
        return $re;
    }
   /**
    * 修改订单状态
    * return bool
    */
    function del($order_id){

        $re = DB::delete("delete  from qtx_user_order where order_id = ?", [$order_id]);
        return $re;
    }
   /**
    *   删除订单
    * return bool
    */
    function search($order_id){

        $re = DB::delete("delete  from qtx_user_order where order_id = ?", [$order_id]);
        return $re;
    }
  /**
    *   根据条件搜索订单
    * return bool
    */
    function yisearch($ctime,$utime){
     
     //  $orders = DB::select("select qtx_user_order.*,qtx_user_stu.user_id,qtx_user_stu.user_name,qtx_shop.shop_id,qtx_shop.shop_name from qtx_user_order left join qtx_shop on qtx_user_order.shop_id=qtx_shop.shop_id left join qtx_user_stu on qtx_user_order.user_id=qtx_user_stu.user_id where qtx_user_order.pay_status=2 and $where order by qtx_user_order.create_at desc");
      
        $orders = DB::table('qtx_user_order')
            ->leftjoin('qtx_user_stu', 'qtx_user_stu.user_id', '=', 'qtx_user_order.user_id')
            ->leftjoin('qtx_shop', 'qtx_shop.shop_id', '=', 'qtx_user_order.shop_id')
            ->select('qtx_user_order.*', 'qtx_user_stu.user_id', 'qtx_user_stu.user_name', 'qtx_shop.shop_id', 'qtx_shop.shop_name')
            ->orderBy('qtx_user_order.create_at', 'desc')
            ->where('qtx_user_order.pay_status','!=', 2)
            ->where('qtx_user_order.create_at','>',$ctime)
            ->where('qtx_user_order.create_at','<',$utime)
            ->paginate(4);
        return $orders;
        
    }
  /**
    *  根据条件搜索订单  未结算的
    * return bool
    */
    function weisearch($ctime,$utime){
    
        $orders = DB::table('qtx_user_order')
            ->leftjoin('qtx_user_stu', 'qtx_user_stu.user_id', '=', 'qtx_user_order.user_id')
            ->leftjoin('qtx_shop', 'qtx_shop.shop_id', '=', 'qtx_user_order.shop_id')
            ->select('qtx_user_order.*', 'qtx_user_stu.user_id', 'qtx_user_stu.user_name', 'qtx_shop.shop_id', 'qtx_shop.shop_name')
            ->orderBy('qtx_user_order.create_at', 'desc')
            ->where('qtx_user_order.pay_status','!=', 2)
            ->where('qtx_user_order.create_at','>',$ctime)
            ->where('qtx_user_order.create_at','<',$utime)
            ->paginate(4);
        return $orders;
    
    
      
        
    }
}
