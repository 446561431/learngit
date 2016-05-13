@extends('layout.main')


@section('content')

			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">会员管理</h1>
					<p class="description">this is vip </p>
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
							<a href="/companyinsert"><button class="btn btn-danger">添加</button></a>
							<button class="btn btn-danger" id='del'>删除</button>
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
							
							<div class="row">
		
								
									<!-- Basic Table -->
									<strong>Basic Table</strong>
									
									<table class="table responsive">
										<thead>
											<tr>
												<th><input type="checkbox" class="ace" id='all'></th>
												<th>id</th>
												<th>用户姓名</th>
												<th>密码</th>
												<th>手机号</th>
												<th>公司类型</th>
												<th>创建时间</th>
												<th>修改时间</th>
												<th>上次登录ip</th>
												<th>状态</th>
												<th>删除</th>
												<th>修改</th>
											</tr>
										</thead>
								 @foreach($arr as $v)
									<tbody>
											
											<tr>
												<td><input type="checkbox" class='ace' name='id' value='{!! $v -> user_id !!}'></td>
    											<td>{!! $v -> user_id !!}</td>
    											<td>{!! $v -> user_name !!}</td>
    											<td>{!! $v -> user_password !!}</td>
    											<td>
    												 @if($v -> user_type == 0)
			                                            {!! '消费' !!}
			                                        @else
			                                          {!! '兼职' !!}
			                                         @endif
    											</td>
    											<td>{!! $v -> user_lastip !!}</td>
    											<td><?php echo date('Y-m-d H:i:s', $v->create_time ) ?></td>
    											<td><?php echo date("Y-m-d H:i:s", $v->updated_time) ?></td>
    											<td>{!! $v -> user_lastip !!}</td>
    											<td>
    												 @if($v -> user_status == 0)
			                                            {!! '是' !!}
			                                        @else
			                                          {!! '否' !!}
			                                         @endif
    											</td>
    											<td><button id='id' value='{!! $v -> user_id !!}'>删除</button></td>
    											<td><button><a href="companyupdate?id={!! $v -> user_id !!}">修改</a></button></td>
    										</tr>
										</tbody>
								@endforeach
									</table>

								</div>
							</div>
						</div>
				</div>
			</div>

			<span style='float:right'>{!! $arr->links() !!}</span>
	<script type="text/javascript">
			$(document).ready(function(){
				$(document).on("click",'#id',function(){
					if(confirm("确定要删除嘛？")){
						var id = $(this).attr('value');
						$.get('companydel',{
							id:id
						},function(data){
							alert(data)
							/*if(data ==1){
								alert('删除成功')
							}else{
								alert('删除失败')
							}*/
						})
					}
					
				})
			$(document).on("click",'#upid',function(){
						var id = $(this).attr('value');
						$.get('companyupdate',{
							id:id
						},function(data){
							alert(data)
							/*if(data ==1){
								alert('修改成功')
							}else{
								alert('修改失败')
							}*/
						})
					
				})
			 //全选全不选
        $('#all').click(function (){
        var id=document.getElementsByName('id');
        for(i=0;i<id.length;i++){
            if(all.checked==true){
                id[i].checked=true;
            }else{
                id[i].checked=false;
            }
         }
      	})
      	$("#del").click(function(){
            var str="";
            var id=document.getElementsByName('id');
            for (var i=0; i<id.length;i++) {
                   if(id[i].checked==true){
                        str+=','+id[i].value;
                }
            }
            if(confirm("确定要删除嘛？")){
            	var arr=str.substr(1);
	            $.get('/companydel',{id:arr},function(txt){
	            	//alert(txt)
	                location.reload();
	           })
            }
            
        })
   })

	</script>
@endsection
