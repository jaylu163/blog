@extends("layouts.app")

@section("stylesheet")
	@parent
	 <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/dist/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/css/dist/skins/_all-skins.min.css">
@endsection

@section("content")
<!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-info" href="{{url('/role/add')}}">添加角色</a>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>角色名称</th>
                                    <th>角色描述</th>
                                    <th>状态</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">确认删除</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" value="" id="roleid"/>
                您真的要删除吗？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <a href="#" class="btn btn-primary">删除</a>
            </div>
        </div>
    </div>
</div>
@endsection



@section("javascript")
	@parent
<!-- ./wrapper -->
<!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/js/dist/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/js/dist/demo.js"></script>
<!-- page script -->

<script>
    $(function () {
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-footer a').attr('href', '/admin/role/del/' + id);
        })
        $("#example1").DataTable({
            "ajax": "/admin/role/getData",
            "paging": false,
            "searching": false,
            "sort": false,
            "language": {
                "zeroRecords": "没有找到记录",
                "processing": "正在加载数据...",
                "lengthMenu": "每页显示 _MENU_ 条记录",
                "info": "当前显示 _START_ 到 _END_ 条，共 _TOTAL_ 条记录",
                "infoEmpty": "当前显示 0 到 0 条，共 0 条记录",
                "infoFiltered": "(从 _MAX_ 条记录中筛选)",
            },
            "columns": [
                {"data": "id"},
                {"data": "name"},
                {"data": "description"},
                {
                    "data": "status",
                    "render": function (data) {
                        if (data == 1) return "可用";
                        else return "禁用";
                    }
                },
                {"data": "createtimestr"},
                {
                    "data": null,
                    "defaultContent": "",
                    "render": function (data) {
                        if (data.parentid == 0) {
                            return "<a href='/admin/index/" + data.id + "'>成员管理</a>";
                        }
                        return "<a href='/admin/role/access/" + data.id + "'>角色授权</a>&nbsp;&nbsp;|&nbsp;&nbsp;"
                                + "<a href='/admin/admin/index/" + data.id + "'>成员管理</a>&nbsp;&nbsp;|&nbsp;&nbsp;"
                                + "<a href='/admin/role/edit/" + data.id + "'>修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;"
                                + "<a href='#myModal' data-toggle='modal' data-id='" + data.id + "'>删除</a>";
                    }
                }
            ]
        });
    });
</script>
@endsection