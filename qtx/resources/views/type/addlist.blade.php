@extends('layout.main')

@section('content')





    <div class="page-title">

        <div class="title-env">
            <h1 class="title">消费分类</h1>
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
                    <h3 class="panel-title">分类修改</h3>
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
                    {!! Form::open(array('url' => '/typeaddbuy','class' => 'form-horizontal','role'=>'form')) !!}

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-1">分类名称</label>

                        <div class="col-sm-10">
                            {!! Form::text('consumption_name','',['class' => 'form-control','id' => 'field-1']) !!}

                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-2">状态</label>

                        <div class="col-sm-10">
                            开启:  &nbsp;{!! Form::radio('status', '1') !!} &nbsp;&nbsp;     关闭:&nbsp;  {!! Form::radio('status', 0) !!}
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    {!! Form::submit('修改',['class' => 'btn btn-blue']) !!}
                    {!! Form::close() !!}

                    @include('errors.error')

                </div>
            </div>

        </div>
    </div>









    <!-- Main Footer -->
    <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
    <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
    <!-- Or class "fixed" to  always fix the footer to the end of page -->







@endsection