<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateConsumptionRequest;
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
    public function updatepost(CreateConsumptionRequest $request){
        $requests = $request->all();
        $cons = Consumption::where('consumption_id', '=', $requests['consumption_id'])->first();
        // 修改属性
        $cons->consumption_name = $requests['consumption_name'];
        $cons->status = $requests['status'];
        $cons->update_time = time();
        // 保存
        if($cons->save()){
            echo "<script>alert('修改成功');location.href='typeindex'</script>";
        }else{
            echo "<script>alert('修改失败');location.href='typeindex'</script>";
        }
    }

    /**
     * 添加消费分类
     */
    public function  addbuy(CreateConsumptionRequest $request){
        $requests = $request->all();
        $requests['create_time'] = time();
        $requests['update_time'] =time();
        unset($requests['_token']);
        if(Consumption::create($requests)){
            echo "<script>alert('修改成功');location.href='typeindex'</script>";
        }else{
            echo "<script>alert('修改失败');location.href='typeindex'</script>";
        }
    }


}