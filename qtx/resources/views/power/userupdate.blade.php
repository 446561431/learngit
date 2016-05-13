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
                    {!! Form::open(['url' => 'userupdate', 'class' => 'form-horizontal','role' => 'form']) !!}
                    {!! Form::hidden('admin_id', $data -> admin_id) !!}
                    <div class="form-group">
                        {!! Form::label('field-1', '用户名称：', ['class' => 'col-sm-2 control-label']) !!}

                        <div class="col-sm-10">
                            {!! Form::text('admin_name', $data->admin_name, ['class' => 'form-control', 'placeholder' => '请输入用户名称']) !!}
                        </div>

                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        {!! Form::label('field-1', '用户密码：', ['class' => 'col-sm-2 control-label']) !!}

                        <div class="col-sm-10">
                            {!! Form::password('admin_password',['class' => 'form-control', 'placeholder' => '请输入密码(不输入则不会更改)']) !!}
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        {!! Form::label('field-1', '用户email：', ['class' => 'col-sm-2 control-label']) !!}

                        <div class="col-sm-10">
                            {!! Form::email('admin_name', $data->admin_email, ['class' => 'form-control', 'placeholder' => '请输入邮箱']) !!}
                        </div>

                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        {!! Form::label('field-1', '用户手机号：', ['class' => 'col-sm-2 control-label']) !!}

                        <div class="col-sm-10">
                            {!! Form::text('admin_name', $data->admin_phone, ['class' => 'form-control', 'placeholder' => '请输入手机号码']) !!}
                        </div>

                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        {!! Form::label('field-1', '是否启用:', ['class' => 'col-sm-2 control-label']) !!}

                        <div class="col-sm-10">
                            <p>
                                @if($data -> admin_status == 1)
                                    <label class="radio-inline">
                                        {!! Form::radio('admin_status', '1', true) !!}
                                        是
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('admin_status', '0') !!}
                                        否
                                    </label>
                                @else
                                    <label class="radio-inline">
                                        {!! Form::radio('admin_status', '1') !!}
                                        是
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('admin_status', '0', true) !!}
                                        否
                                    </label>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    {!! Form::submit('修改', ['class' => 'btn btn-blue']) !!}
                    {!! Form::reset('取消', ['class' => 'btn btn-gray']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

@endsection
