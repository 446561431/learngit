@extends('layout.main')


@section('content')

			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Basic Tables</h1>
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
												<th>ID</th>
												<th>地区名称</th>
												<th>操作</th>
											</tr>
										</thead>
								@foreach($area as $v)
										<tbody>
											<tr>
												<td>{{ $v -> area_id  }}</td>
												<td>{{ $v -> area_name  }}</td>
												<td><a href="JavaScript:void(0)" >修改</a>|<a href="JavaScript:void(0)" value="{{ $v -> area_id  }}" class="del">删除</a></td>
											</tr>
										</tbody>
								@endforeach	
									</table>
									{!! $area->links() !!}
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
	jQuery(document).ready(function($){
		$(".del").on("click", function(){
			area_id = $(this).attr("value");
			$(this).parent().parent().remove();
			$.get("/del_area",{area_id:area_id},function(data){
				if (data==1) {
					alert("删除成功")
				}else{
					alert("删除失败")
				}
			})
		});
	})
</script>



@endsection




