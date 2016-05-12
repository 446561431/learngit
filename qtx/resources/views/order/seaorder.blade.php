<div class="row" >
		
	<!-- Basic Table -->

<h1>未结算替换</h1>
	<table class="table responsive"  >
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
		 @foreach( $brr
		  as $item)
			<tr>
				<td style="width:50px"><span class="order_id">{{ $item->order_id }}</span></td>
				<td>{{ $item->user_name }}</td>
				<td>{{ $item->order_only }}</td>
				<td>{{ $item->shop_name }}</td>
				<td>{{ $item->cousume_site }}</td>
				<td>{{ $item->consume_money }}元</td>

				@if( $item->order_status == 1)
	               <td><span class="dian" value="0" aa="{{ $item->order_id }}">{!! '代发货' !!}</span> </td>  
															
				@else
				   <td><span class="dian" value="2" aa="{{ $item->order_id }}">{!! '已发货' !!}</span></td>	
				@endif

				<td>已成功</td>

				<td><?php echo date('Y-m-d H:i:s', $item->create_at ) ?></td>
				<td><?php echo date('Y-m-d H:i:s', $item->update_at ) ?></td>							
			    <td><button class="btn btn-gray " id="del" value="{{ $item->order_id }}" >删除</button></td>       
			</tr>
		 @endforeach													
		</tbody>
	 </table>
	 {{--显示页码 --}}
	 <div style="float:right">{!! $brr->links() !!}</div>	
</div>


