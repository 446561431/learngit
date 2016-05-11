<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\type\Consumption;

/**
 * Class TypeController
 * @author xf
 */


class TypeController extends Controller {
    /**
     * 消费分类列表
     */
    public function index()
    {
      //  DB::table('qtx_consumption')->where("consumption_id",'<>','14,15')->delete();die;
        //$consumption = new Consumtion();
      //  $consumption->toArray()->get();
       //$data = Consumption::all();
        $data = Consumption::paginate(5);
        return view('type.list',[
            'data' => $data,
        ]);
    }

    /**
     * 删除分类列表
     */
    public function xiaodel(Request $request)
    {
        $consumption_id = $request->input('id');
        $result = Consumption::where('consumption_id', $consumption_id)->delete();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    /**
     * 修改表单页面
     */
    public function updatelist(Request $request){
        $consumption_id = $request->input('id');
        $cons = new Consumption();
        $result = $cons->selectone($consumption_id);
        return view('type.buy',[
            'result' => $result,
        ]);
    }

    /**
     * 修改表单提交,数据验证
     */
    public function updatepost(Request $request){
        print_r($request->input());
    }
}