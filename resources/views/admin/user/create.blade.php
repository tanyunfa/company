@extends('admin.layout.layout')


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a class="refresh-link" href="javascript:window.location.reload();">
                            <i class="fa fa-refresh"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form action="javascript:;" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">用户名:</label>

                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">密码:</label>

                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">确认密码:</label>

                            <div class="col-sm-10">
                                <input type="password" name="confirm_password" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">性别:</label>

                            <div class="col-sm-10">
                                <div class="radio i-checks" style="display: inline-block;">
                                    <label>
                                        <input type="radio" value="1" name="sex" checked=""> <i></i> 男</label>
                                </div>
                                <div class="radio i-checks" style="display: inline-block;">
                                    <label>
                                        <input type="radio" value="2" name="sex"> <i></i> 女</label>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">邮箱:</label>

                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2" style="text-align: center;">
                                <a class="btn btn-success" href="javascript:;" id="submit-btn">添加</a>
                            </div>
                        </div>
                        <input type="hidden" value="{{csrf_token()}}" name="_token">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section ('js')
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
        $(function () {
            $("#submit-btn").click(function () {
                var url = '/admin/user';
                var data = $('form').serialize();
                $.post(url,data,function (result) {
                    console.log(result);
                })
            })
        })
    </script>
@endsection


