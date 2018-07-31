@extends('layouts.app')

@section('title', '权限添加')

@section('stylesheet')
	@parent
  <!-- daterange picker -->
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/plugins/datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/plugins/select2/select2.min.css">

@endsection

@section('content')
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">添加成员</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
      
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">添加角色</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="post">
                            {{csrf_field()}}
                            <div class="box-body">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">父级角色</label>
                                    <div class="col-sm-4">
                                        <select name="parentid" class="form-control">
                                            
                                                <option value="0">顶级角色</option>
                                           
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">角色名称</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="name" class="form-control" id="inputName" placeholder="角色名称" >
                                    </div>
                                    <span class="span-danger">只能输入30个字符</span>
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription" class="col-sm-2 control-label">角色描述</label>
                                    <div class="col-sm-4">
                                        <textarea name="description" class="form-control" id="inputDescription" rows="3" placeholder="角色描述"></textarea>
                                    </div>
                                    <span class="span-danger">只能输入255个字符</span>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">是否启用</label>
                                    <div class="col-sm-4">
                                        <select name="status" class="form-control">
                                            <option value="1">启用</option>
                                            <option value="0">禁止</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSort" class="col-sm-2 control-label">排序</label>
                                    <div class="col-sm-4">
                                        <input type="text" value="0" name="sort" class="form-control" id="inputSort" placeholder="排序，数字越小越靠前"/>
                                    </div>
                                    <span class="span-danger">只能输入数字，数字越小越靠前</span>
                                </div>
                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-default" onclick="javascript:quit();">取消</button>
                                <button type="submit" class="btn btn-info pull-right">添加</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
           </div>
        </div>
    </section>
@endsection

@section('javascript')
	@parent
	<!-- Select2 -->
<script src="/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="/plugins/moment/min/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>

@endsection
<script>
 
</script>