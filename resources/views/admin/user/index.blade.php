@extends('admin.layout.layout')


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>管理员列表</h5>
                    <div class="ibox-tools">
                        <a class="refresh-link" href="javascript:window.location.reload();">
                            <i class="fa fa-refresh"></i>
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-sm-9 m-b-xs">
                            <button type="button" class="btn btn-success" id="add-btn">添加管理员</button>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" placeholder="请输入关键词" class="input-sm form-control" style="height: 34px;">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success"> 搜索</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>性别</th>
                                <th>创建时间</th>
                                <th>更新时间</th>
                                <th>启用</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $val)
                                <tr>
                                    <td>{{$val -> id}}</td>
                                    <td>{{$val -> username}}</td>
                                    <td>{{$val -> email}}</td>
                                    <td>{{$val -> sex == 1? '男': '女'}}</td>
                                    <td>{{$val -> created_at}}</td>
                                    <td>{{$val -> updated_at}}</td>
                                    <td>{{$val -> status? '启用': '禁用'}}</td>
                                    <td width="250">
                                    @if($val->status)
                                            <button class="btn btn-success is-enable" data-id="{{$val -> id}}" data-status="{{$val->status}}" type="button">
                                                <i class="fa fa-check"></i>
                                                &nbsp;启用
                                            </button>
                                    @else
                                            <button class="btn btn-warning is-enable" data-id="{{$val -> id}}" data-status="{{$val->status}}" type="button">
                                                <i class="fa fa-warning"></i>
                                                &nbsp;禁用
                                            </button>
                                    @endif
                                        <button type="button" class="btn btn-success edit-btn" data-id="{{$val -> id}}">修改</button>
                                        <a href="javascript:;" class="btn btn-danger delete-btn" data-id="{{$val -> id}}">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="pagination-container" style="text-align: center;">
                            {{ $data->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection


@section ('js')
    <script>
        $(function () {
            var token = '{{csrf_token()}}';
            $("#add-btn").click(function () {
                layer_show('添加管理员','/admin/user/create',500,700);
            })
            $(".edit-btn").click(function () {
                var id = $(this).data('id');
                layer_show('修改管理员','/admin/user/'+ id +'/edit',500,700);
            })
            $(".delete-btn").click(function () {
                var id = $(this).data('id');
                layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
                    var data = {"_token":token,"_method":"delete"};
                    var url = '/admin/user/' + id;
                    $.post(url,data,function (result) {
                        if (result.code) {
                            layer.msg(result.message,{icon: 6});
                            window.location.reload();
                        }else{
                            layer.msg(result.message, {icon: 5});
                        }
                    })
                });
            })
            $(".is-enable").click(function () {
                var id = $(this).data('id');
                var status = $(this).data('status');
                var data = {
                    id:id,
                    status:status,
                    "_token":token
                };
                var url = '/admin/user/status';
                $.post(url,data,function (result) {
                    if (result.code) {
                        layer.msg(result.message,{icon: 6});
                        window.location.reload();
                    }else{
                        layer.msg(result.message, {icon: 5});
                    }
                })
            })
        })
    </script>
@endsection


