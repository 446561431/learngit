@extends('layout.main')

@section('content')
			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">修改页面</h1>
					<p class="description"></p>
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
							<h3 class="panel-title">表单</h3>
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
							{!! Form::open(array('url' => '/companyfrom', 'method' => 'post','class' => 'form-horizontal','role' => 'form')) !!}
								<input type="hidden" name="_token" value="{{csrf_token()}}"/>
								{!! Form::hidden('user_id', $arr -> user_id) !!}
								<div class="form-group">
									{!! Form::label('field-1', '用户名', ['class' => 'col-sm-2 control-label']) !!}
									
									<div class="col-sm-10">
										{!! Form::text('user_name', $arr->user_name, ['class' => 'form-control']) !!}
										
									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									{!! Form::label('field-1', '密码', ['class' => 'col-sm-2 control-label']) !!}
									
									<div class="col-sm-10">
										{!! Form::text('user_password', $arr->user_password, ['class' => 'form-control']) !!}
									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									{!! Form::label('field-1', '手机号', ['class' => 'col-sm-2 control-label']) !!}
									
									<div class="col-sm-10">
										{!! Form::text('user_phone', $arr->user_phone, ['class' => 'form-control']) !!}
									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									{!! Form::label('field-1', '地址', ['class' => 'col-sm-2 control-label']) !!}
									
									<div class="col-sm-10">
										{!! Form::text('user_place', $arr->user_place, ['class' => 'form-control']) !!}
									</div>
								</div>
								
								<div class="form-group-separator"></div>
								<div class="form-group">
									{!! Form::label('field-1', '公司类型', ['class' => 'col-sm-2 control-label']) !!}
									
									<div class="col-sm-10">
										<p>
			                                    @if($arr -> user_type == 1)
			                                        <label class="radio-inline">
			                                            {!! Form::radio('user_type', '1', true) !!}
			                                                消费
			                                        </label>
			                                        <label class="radio-inline">
			                                            {!! Form::radio('user_type', '0') !!}
			                                                兼职
			                                        </label>
			                                    @else
			                                        <label class="radio-inline">
			                                            {!! Form::radio('user_type', '1') !!}
			                                                消费
			                                        </label>
			                                        <label class="radio-inline">
			                                            {!! Form::radio('user_type', '0', true) !!}
			                                                兼职
			                                        </label>
			                                    @endif
                                </p>
									</div>
								</div>
								
								<div class="form-group-separator"></div>
								<div class="form-group">
									{!! Form::label('field-1', '状态', ['class' => 'col-sm-2 control-label']) !!}
			                           <div class="col-sm-10">
										<p>
			                                    @if($arr -> user_status == 1)
			                                        <label class="radio-inline">
			                                            {!! Form::radio('user_status', '1', true) !!}
			                                                启用
			                                        </label>
			                                        <label class="radio-inline">
			                                            {!! Form::radio('user_status', '0') !!}
			                                                禁用
			                                        </label>
			                                    @else
			                                        <label class="radio-inline">
			                                            {!! Form::radio('user_status', '1') !!}
			                                                启用
			                                        </label>
			                                        <label class="radio-inline">
			                                            {!! Form::radio('user_status', '0', true) !!}
			                                                禁用
			                                        </label>
			                                    @endif
                                </p>
									</div>
								</div>
								  <div class="form-group-separator"></div>
								<button class="btn btn-blue" value=''>修改<button>
							{!! Form::close() !!}
						</div>
					</div>
					
				</div>
			</div>
			
			
			
						
					
				
				
		
			
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->







@endsection