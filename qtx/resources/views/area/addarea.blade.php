@extends('layout.main')

@section('content')





			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Native Elements</h1>
					<p class="description">Plain text boxes, select dropdowns and other basic form elements</p>
				</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
						</li>
								<li>
						
										<a href="forms-native.html">Forms</a>
								</li>
							<li class="active">
						
										<strong>Native Elements</strong>
								</li>
								</ol>
								
				</div>
					
			</div>
			<div class="row">
				<div class="col-sm-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Default form inputs</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								<a href="#" data-toggle="remove">
									&times;
								</a>
							</div>
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal" method="post" action="<?php echo URL::to('insertarea') ?>">
								
								<div class="form-group">
									<label class="col-sm-2 control-label">城市列表：</label>
									
									<div class="col-sm-10">
										<select class="form-control">
										@foreach($area as $v)
											<option name="{{ $v -> area_id }}">{{ $v -> area_name }}</option>
										@endforeach
										</select>
									</div>
								</div>		
																
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1" >添加城市：</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="field-1" name="area_name" placeholder="请添加城市">
									</div>
								</div>
														
								
								<input type="submit" class="btn btn-blue" value="添加">
								<input type="reset" class="btn btn-gray" value="重置">
							</form>
							
						</div>
					</div>
					
				</div>
			</div>
			
			
			
						
					
				
				
		
			
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->







@endsection