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

                        <a href="javascript:void(0)" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>

                        <a href="javascript:void(0)" data-toggle="reload">
                            <i class="fa-rotate-right"></i>
                        </a>

                        <a href="javascript:void(0)" data-toggle="remove">
                            &times;
                        </a>
                    </div>
                </div>
                <div class="panel-body">

                    <div class="row">


                        <!-- Basic Table -->
                        <strong>
                            <a href="{{ url('/roleaddform') }}">
                                <button class="btn btn-blue">添加</button>
                            </a>
                            <button class="btn btn-pink" id="delall">删除</button>
                        </strong>

                        <table class="table responsive">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="all"></th>
                                <th>ID</th>
                                <th>角色名称</th>
                                <th>是否启用</th>
                                <th>操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($data as $k => $v)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="one[]" class="one" value="{!! $v -> role_id !!}">
                                    </td>
                                    <td>
                                        {!! $v -> role_id !!}
                                    </td>
                                    <td>
                                        {!! $v -> role_name !!}
                                    </td>
                                    <td>
                                        @if($v -> role_status == 1)
                                            {!! '是' !!}
                                        @else
                                            {!! '否' !!}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="role_node&id={!! $v->role_id !!}"><button class="btn btn-gray">添加权限</button></a>
                                        <a href="roleup&id={!! $v->role_id !!}"><button class="btn btn-gray">修改</button></a>
                                        <button class="btn btn-gray del" value="{!! $v -> role_id !!}">删除</button>
                                    </td>
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
    <script>
        $(document).ready(function(){
            /**
             * 全选全不选
             */
            $("#all").click(function(){
                $("input[name='one[]']").attr("checked", $(this).attr("checked"));
                $("input[name='one[]']").prop("checked", $(this).prop("checked"));
            });
            /**
             * 单个删除
             */
            $(document).on("click",'.del',function(){
                var obj = $(this);
                if(confirm('您确定要删除么'))
                {
                    $.get("roledel/id="+obj.attr("value"),function(data){
                        if(data == 1) {
                            obj.parent().parent().remove();
                            alert('删除成功');
                        }else{
                            alert("删除失败");
                        }
                    })
                }
            });
            /**
             * 批量删除
             */
            $(document).on('click', '#delall', function(){
                var value = [];
                $('.one:checked').each(function(){
                    value.push($(this).val())
                });
                var id = value.join(",");
                if(value.length != 0) {
                    $.get('powerdelall&id='+id,function(data){
                        alert(data);
                    })
                }else {
                    alert('请先选择');
                }
            })
        })
    </script>
@endsection