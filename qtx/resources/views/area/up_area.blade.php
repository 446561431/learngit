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
							
								{!! Form::open(['url' => '/update']) !!}

								<div class="form-group">
									<label class="col-sm-2 control-label">城市列表：</label>
									
									<div class="col-sm-10">
										<select class="form-control" name="sel_name" id="select1" style="width: 100%;">
										@foreach($area1 as $v)
											<option value="{{ $v -> area_id }}">{{ $v -> area_name }}</option>
										@endforeach
										</select>
									</div>
								</div>
								<br><br><br>
								<div class="form-group-separator"></div>

								
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1" >修改城市：</label>
									<div class="col-sm-10">
									@foreach($area as $vv)
									@endforeach
										{!! Form::text('area_name', $vv -> area_name , ['id' => 'field-1', 'class' => 'form-control','placeholder' => '修改城市']) !!}
										{!!Form::hidden('area_id',$vv -> area_id)!!}
									</div>
								</div>					 
								    <div class="form-group">
								      {!! Form::submit('修改', ['class' => 'btn btn-blue']) !!}
								      {!! Form::reset('重置', ['class' => 'btn btn-gray']) !!}
								    </div>

								<!-- 报错 -->
								@if (count($errors) > 0)
								    <div class="alert alert-danger">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif 
								<!-- 结束报错 -->
								  {!! Form::close() !!}						
								
								<!-- <input type="submit" class="btn btn-blue" value="添加">
								<input type="reset" class="btn btn-gray" value="重置"> -->
							<!-- </form> -->				
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
/* This parser won't respect "---" selection */
function dataParserA(data, selected) {
	retval = [ { val: "-1" , text: "---" } ];

	data.forEach(function(v){
		if(selected == "-1" && v.val == 3)
			v.selected = true;
		retval.push(v); 
	});

	return retval;
}

/* This parser let's the component to handle selection */
function dataParserB(data, selected) {
	retval = [ { val: "-1" , text: "---" } ];
	data.forEach(function(v){ retval.push(v); });
	return retval;
}

/* Create select elements */
$("#select1").tinyselect();
$("#select2").tinyselect({ showSearch: false });
$("#select3").tinyselect({ dataUrl: "file.json" , dataParser: dataParserA });
$("#select4").tinyselect({ dataUrl: "failure.json" });
$("#select5").tinyselect({ dataUrl: "file.json" , dataParser: dataParserB });

$("#select2").on("change",function() {
	console.log($(this).val());
});

$("#havoc").show()
})
</script>




@endsection

