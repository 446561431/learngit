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
                    {!! Form::open([
                      'url' => 'userroleadd',
                      'role' => 'form',
                      'class' => 'form-horizontal'
                  ]) !!}

                    <div class="form-group">
                        {!! Form::label(null, '选择角色：', ['class' =>  'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                                @for($i=0;$i<count($data);$i++ )
                                            {!! Form::hidden('admin_id',$data[$i]->admin_id) !!}
                                            {!! Form::checkbox('role_id[]',$data[$i]->role_id) !!}
                                            {!! $data[$i] -> role_name !!}
                                            <div style="margin-left: 70px">
                                                <div>所属权限：</div>
                                                <div style="margin-left: 60px">
                                                    @for($j=0;$j<count($data[$i]->node);$j++)
                                                        {!! $data[$i]->node[$j]->node_name !!}&nbsp;&nbsp;&nbsp;
                                                        @if(0 == ($j+1)%4)
                                                            <div class="form-group-separator"></div>
                                                            <br>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                      <br>
                                @endfor
                        </div>
                    </div>



                    <div class="form-group-separator"></div>

                    {!! Form::submit('添加', ['class' => 'btn btn-blue']) !!}
                    {!! Form::reset('取消', ['class' => 'btn btn-gray']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

@endsection
