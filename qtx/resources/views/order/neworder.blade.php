@extends('layout.main')

@section('content')


<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">未结算订单页面</h1>
					<p class="description">Variations of basic tables included in Xenon</p>
				</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="{{ url('/vip') }}"><i class="fa-home"></i>Home</a>
						</li>
								<li>
						
										<a href="{{ url('/area') }}">Tables</a>
								</li>
							<li class="active">
						
										<strong>Basic Tables</strong>
								</li>
								</ol>
								
				</div>
					
			</div>
			<!-- Table Styles -->
			<div class="row">
				<div class="col-md-12">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Table Styles</h3>
			  <div class="pl_40" style="margin-top: 43px;margin-bottom: 42px;" id='btnDIV'>
	 
                时间：
                <input type="text" class="pub_peonum mr_9 Wdate validate[required]" name="workBegin" value="" id="ctime" data-prompt-position="topRight" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd'})" placeholder="请输入日期" />
          -  <input type="text" class="pub_peonum mr_9 Wdate validate[required]" name="workEnd" value="" id="utime" data-prompt-position="topRight" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd'})" placeholder="请输入日期" />
                <button class="btn btn-gray " id="search" >搜索</button>
                <div class="ml_9 bal_sl"></div>
            
            </div>
							<div class="panel-options">

								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
								<a href="#" data-toggle="reload">
									<i class="fa-rotate-right"></i>
								</a>
								
								<a href="#" data-toggle="remove">
									&times;
								</a>
							</div>
						</div>
						<div class="panel-body">
							
							<div class="row" id="replace">
		
								
									<!-- Basic Table -->

									
									<table class="table responsive">
										<thead>
											<tr>
												<th>ID</th>
												<th>用户名</th>
												<th>订单号</th>
												<th>商家</th>
												<th>地点</th>
												<th>金额</th>
												<th>订单状态</th>
												<th>支付状态</th>
												<th>创建时间</th>
												<th>修改时间</th>
												<th>操作</th>
											</tr>
										</thead>								
										<tbody>
										 @foreach( $arr as $item)
											<tr>
												<td style="width:50px"><span class="order_id">{{ $item->order_id }}</span></td>
												<td>{{ $item->user_name }}</td>
												<td>{{ $item->order_only }}</td>
												<td>{{ $item->shop_name }}</td>
												<td>{{ $item->cousume_site }}</td>
												<td>{{ $item->consume_money }}元</td>

												@if( $item->order_status == 0)
                                                   <td><span class="dian" value="0" aa="{{ $item->order_id }}">{!! '代付款' !!}</span> </td>  
												@elseif($item->order_status == 1)
												   <td><span class="dian" value="1" aa="{{ $item->order_id }}">{!! '代发货' !!}</span> </td>											
												@else
												   <td><span class="dian" value="2" aa="{{ $item->order_id }}">{!! '已发货' !!}</span></td>	
												@endif

                                                @if( $item->pay_status == 0)
                                                   <td><span  value="0" aa="{{ $item->order_id }}">{!! '提交未支付' !!}</span> </td>  
												@elseif($item->pay_status == 1)
												   <td><span  value="1" aa="{{ $item->order_id }}">{!! '支付失败' !!}</span> </td>											
												@else
												   <td><span  value="2" aa="{{ $item->order_id }}">{!! '已取消' !!}</span></td>	
												@endif
												<td><?php echo date('Y-m-d H:i:s', $item->create_at ) ?></td>
												<td><?php echo date('Y-m-d H:i:s', $item->update_at ) ?></td>							
											    <td><button class="btn btn-gray " id="del" value="{{ $item->order_id }}" >删除</button></td>       
											</tr>
										 @endforeach													
										</tbody>
									</table>
									 {{--显示页码 --}}
                                    <div style="float:right">{!! $arr->links() !!}</div>
								</div>
							</div>
						</div>
				</div>
			</div>
           
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->
<script>
	
$(document).ready(function(){
    //单个删除
    $(document).on("click","#del",function(){	
        $(this).parent().parent().remove();		
        var  order_id = $(this).attr('value');
        //进行传值 
		$.ajax({
			type:"GET",
			data:{order_id:order_id},
			url: "/orderdel",
			success:function(data){	  
		       if( data == 1 ){
                  
		       	   alert("删除成功");
                   location.reload();
		       }else{
                   alert("删除失败");
		       }
			}
		})
       
    });
    //日历插件
     $('#ctime').datepicker(); //绑定输入框
	//日历插件       
     $('#utime').datepicker(); //绑定输入框
     //搜索
	 $(document).on("click","#search",function(){	
       // var  shop_name = $('#shop_name').val();
        var  ctime = $('#ctime').val();
        var  utime = $('#utime').val();
        //alert(ctime);
        //进行传值 
		$.ajax({
			type:"GET",
			data:{ctime:ctime,utime:utime},
			url: "/weisearch",
			success:function(data){	  
		       $('#replace').html(data);
		    // alert(data)
			}
		})
        
     });

 })
</script>
@endsection
