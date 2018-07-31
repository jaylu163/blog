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
                            <a class="btn btn-info" href="{{url('/user/add')}}">添加用户</a>
                        </div>
                        <div class="box-body">
                            <table id="user-list" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>用户名称</th>
                                    <th>邮箱</th>
                                    <th>手机号</th>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" _token ="{{ csrf_token() }}">
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
    	$.ajaxSetup({
		    "headers": {
        			'X-CSRF-TOKEN':$("#myModal").attr("_token")
            }
		});
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-footer a').attr('href', '/role/del/' + id);
        })

        $("#user-list").DataTable({
            "ajax":{
            	"url":"/user/ajax_get_data",
            	"type":"POST"
            },
            "serverSide": true, //true代表后台处理分页，false代表前台处理分页
            "processing": true, // 控制是否在数据加载时出现”Processing”的提示
            "sort": false,
            "aaSorting" : [[0, "asc"]],//默认的排序方式，第1列，升序排列
            //"ordering": true, //全局控制列表的所有排序功能
            "searchable": true,
            "language": {
                "zeroRecords": "没有找到记录",
                "processing": "正在加载数据...",
                "lengthMenu": "每页显示 _MENU_ 条记录",
                "info": "当前显示 _START_ 到 _END_ 条，共 _TOTAL_ 条记录",
                "infoEmpty": "当前显示 0 到 0 条，共 0 条记录",
                "infoFiltered": "(从 _MAX_ 条记录中筛选)",
                "search": "搜索",
                "searchPlaceholder": "用户名",
                "paginate": {
                    "first": "第一页",
                    "previous": " 上一页 ",
                    "next": " 下一页 ",
                    "last": " 最后一页 "
                }
            },
            "columns": [
                {"data": "id"},
                {"data": "name"},
                {
                	"data": "email",
                	 "defaultContent": "",
                	 "render":function($data){
                	 	return ($data =='')?"--":$data;
                	 }
            	},
            	{
                	"data": "telephone",
                	 "defaultContent": "",
                	 "render":function($data){
                	 	return ($data =='')?"--":$data;
                	 }
            	},
                {
                    "data": "status",
                    "render": function (data) {
                        if (data == 1){
                        	return "可用";
                        }else {
                        	return "禁用";
                    	}
                    }
                },
                {
                	"data": "created_at"
                },
                {
                    "data": null,
                    "defaultContent": "",
                    "render": function (data) {
                    	_nav ='<span class="pull-right-container"><a href="#/user/hasAccess/" '+ data.id + ' class ="btn btn-white btn-xs "><i class="fa fa-fw fa-eye"></i>查看角色</a>&nbsp;&nbsp; '
                            + '<a href="#edit/" '+ data.id + ' class="btn btn-white btn-xs"><i class="fa fa-pencil"></i>修改</a>&nbsp;&nbsp;';
                        if (data.id == {{Session::get('user_info.user.id')}}) {
                        	_nav+='</span>';
                            return _nav;
                        }
                        _nav+='<a href="#myModal" data-toggle="modal" data-id='+ data.id + ' class="btn btn-danger btn-xs user-delete"><i class="fa fa-trash-o"></i>删除</a></span>';
                        return _nav;
                    }
                }
            ]
        });
    });
</script>
@endsection