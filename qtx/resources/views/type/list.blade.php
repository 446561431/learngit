@extends('layout.main')


@section('content')

			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">消费分类</h1>
					<p class="description">
                        </p>
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
							<a  href="typeaddlist"><button class='btn btn-blue'>添加分类</button></a>
							
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
									<strong></strong>
									
									<table class="table responsive">

										<thead>
											<tr>
												<th>ID</th>
												<th>分类名称</th>
												<th>状态</th>
												<th>创建时间</th>
												<th>修改时间</th>
												<th>操作</th>
											</tr>
										</thead>

										<tbody>
										@foreach($data as $value)
											<tr>
												<td>{{$value->consumption_id}}</td>
												<td>{{$value->consumption_name}}</td>
												<td>{{$value->status}}</td>
												<td>{{date("Y-m-d",$value->create_time)}}</td>
												<td>{{date("Y-m-d",$value->update_time)}}</td>
												<td><a href="{{url('typeupdate?id='.$value->consumption_id)}}">修改</a>|<a href="javascript:void(0)" class="del" value="{{$value->consumption_id}}" >删除</a></td>
											</tr>
										@endforeach
										</tbody>

									</table>
                                <div style="float: right">
                                    {!! $data->links() !!}
                                </div>

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
    $(function(){
        $(document).on("click",".del",function(){
            $(this).parent().parent().remove();
            $.get("{{ url('/typelistdel')}}",{id : $(this).attr("value")},function(data){
                    if(data == 1 ){

                        alert('删除分类成功')
                    }else{
                        alert('删除分类失败')
                    }
            })
        })
    })
</script>
@endsection
