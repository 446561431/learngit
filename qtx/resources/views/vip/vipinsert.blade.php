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
							<h3 class="panel-title">添加会员</h3>
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
							{!! Form::open(array('url' => '/vipinsertfrom', 'method' => 'post','class' => 'form-horizontal','role' => 'form')) !!}
							<!--<form role="form" class="form-horizontal" action='/vipinsertfrom' method='post'>-->
								<input type="hidden" name="_token" value="{{csrf_token()}}"/>
								<div class="form-group">
									{!! Form::label('field-1', '用户名', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										{!! Form::text('user_name', null, ['class' => 'form-control','placeholder' => '请输入用户名']) !!}
									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									{!! Form::label('field-1', '密码', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										{!! Form::password('user_password', null, ['class' => 'form-control']) !!}
									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									{!! Form::label('field-1', '手机号', ['class' => 'col-sm-2 control-label']) !!}
									
									<div class="col-sm-10">
										{!! Form::text('user_phone', null, ['class' => 'form-control','placeholder' => '请输入11位手机号']) !!}
									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									{!! Form::label('field-1', '住址', ['class' => 'col-sm-2 control-label']) !!}
									
									<div class="col-sm-10">
										{!! Form::text('user_place', null, ['class' => 'form-control','placeholder' => '请输入住址']) !!}
									</div>
								</div>
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									{!! Form::label('field-1', '用户学校', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										{!! Form::text('user_school', null, ['class' => 'form-control','placeholder' => '请输入学校']) !!}
									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									{!! Form::label('field-1', '是否启动', ['class' => 'col-sm-2 control-label']) !!}
									
									<div class="col-sm-10">
										<div class="radio">
											<label>
												{!! Form::radio('user_status','0')!!}
												启用&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												{!! Form::radio('user_status','1')!!}
												禁用
											</label>
										</div>
									</div>
								</div>
								
								  <div class="form-group-separator"></div>
								{!! Form::submit('添加', ['class' => 'btn btn-primary form-control','style' => 'width:20%']) !!}
							<!--</form>-->
							{!! Form::close() !!}
							@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
						</div>
					</div>
					
				</div>
			</div>
			
			
			
						
					
				
				
		
			
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->







@endsection