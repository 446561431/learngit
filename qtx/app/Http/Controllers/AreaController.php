<?php
namespace App\Http\Controllers;

use App\Models\area\Area;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;


class AreaController extends Controller {   
	/**
	*@地区显示页面
	*/
    public function index() 
    {   
    	//$area = Area::all();
    	$area = new Area();
    	$area = $area->sel_area();
        return view('area/list',["area"=>$area]);
    }

    /**
	*@地区添加页面
	*/
    public function addarea()
    {
    	$area = new Area();
    	$area = $area->sel_morearea(); 
    	return view('area/addarea',["area"=>$area]);
    }

    /**
	*@地区添加
	*/
    public function insertarea(Request $request)
    {
    	$area = new Area();
        $this->validate($request, ['area_name' => 'bail|required|unique:qtx_area|max:30|min:2']);//验证
        $area = $area->add_area($_POST); 
        if ($area) {
            echo "<script>alert('添加成功');history.go(-1)</script>";
        }else{
            echo "<script>alert('添加失败')</script>";
        }
    }

    /**
	*@地区删除
	*/
    public function del_area()
    {
    	$area = new Area();
    	$area = $area->delete_area($_GET);
        print_r($area);die;
    	if ($area) {
    		echo "1";
    	}else{
    		echo "0";
    	}
    }
    
    /**
    *@地区修改
    */
    public function up_area()
    {
        $arrarea = new Area();
        $area1 = $arrarea->sel_morearea();
        $area = $arrarea->select_area($_GET);
        return view('area/up_area',["area"=>$area,"area1"=>$area1]);
    }

    /**
    *@地区搜索
    */
    public function sel_area()
    {
        $area = new Area();
        $area = $area->select1_area($_GET);
        //$area = json_decode( json_encode( $area),true);
        return view('area/sel_area',["area"=>$area]);
    }

    /**
    *@地区修改
    */
    public function update(Request $request)
    {
        $area = new Area();
        $this->validate($request, ['area_name' => 'bail|required|max:30|min:2']);//验证
        $area = $area->update_area($_POST); 
        if ($area) {
            echo "<script>alert('修改成功');history.go(-1)</script>";
        }else{
            echo "<script>alert('修改失败')</script>";
        }
    }
    
}  



