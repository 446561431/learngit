<?php
namespace App\Http\Controllers;

use App\Models\area\Area;
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
    public function insertarea()
    {
    	print_r($_POST);die;
    }

    /**
	*@地区删除
	*/
    public function del_area()
    {
    	$area = new Area();
    	$area = $area->delete_area($_GET);
    	if ($area) {
    		echo "1";
    	}else{
    		echo "0";
    	}
    	
    }
}  



