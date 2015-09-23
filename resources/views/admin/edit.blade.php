<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Feedly</title>

    <!-- Bootstrap core CSS -->

    <link href="../../../css/bootstrap.min.css" rel="stylesheet">

    <link href="../../../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../../css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../../../css/custom.css" rel="stylesheet">
    <link href="../../../css/icheck/flat/green.css" rel="stylesheet">
    <link href="../../../css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">

    <script src="../../../js/jquery.min.js"></script>

    <!--[if lt IE 9]>
    <script src="../../../../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body class="nav-md">

<div class="container body">


    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                @include('admin.partials.logo')

                <br/>

                @include('admin.partials.sidebar')

            </div>
        </div>

        @include('admin.partials.nav')

                <!-- page content -->
        <div class="right_col" role="main">
            <div class="x_title">
                <h2>User Details</h2>

                <div class="clearfix"></div>
            </div>
            @include('errors.errors')

            {!! Form::model([
              'method' => 'post',
              'url' => ['{{ URL::to("admin/users/edit")}}/{{$user->id}}'],
              'class' => ['form-horizontal', 'form-label-left'],
              'id' => 'user-edit-form'
             ]) !!}

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name</label>

                        {!! Form::text('first_name', null, ['class' => 'form-control col-md-6 col-sm-6 col-xs-12', 'placeholder'=>'First name', 'value'=>"{{$user->first_name }}"]) !!}

                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="last-name"  class="form-control col-md-7 col-xs-12" value="{{$user->last_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('country_list',[1,2,3],$user->role_id,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="{{$user->address}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="{{$user->phone_number}}">
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-sucess">Submit</button>
                    </div>
                </div>

            </form>
        </div>
        <!-- /page content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src="../../../js/bootstrap.min.js"></script>

<!-- chart js -->
<script src="../../../js/chartjs/chart.min.js"></script>
<!-- bootstrap progress js -->
<script src="../../../js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="../../../js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="../../../js/icheck/icheck.min.js"></script>

<script src="../../js/custom.js"></script>


<!-- Datatables -->
<script src="../../js/datatables/js/jquery.dataTables.js"></script>
<script src="../../js/datatables/tools/js/dataTables.tableTools.js"></script>
<script>
    $(document).ready(function () {
        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    var asInitVals = new Array();
    $(document).ready(function () {
        var oTable = $('#example').dataTable({
            "oLanguage": {
                "sSearch": "Search all columns:"
            },
            "aoColumnDefs": [
                {
                    'bSortable': false,
                    'aTargets': [0]
                } //disables sorting for column one
            ],
            'iDisplayLength': 12,
            "sPaginationType": "full_numbers",
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url('assets2/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
            }
        });
        $("tfoot input").keyup(function () {
            /* Filter on the column based on the index of this element's parent <th> */
            oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
        });
        $("tfoot input").each(function (i) {
            asInitVals[i] = this.value;
        });
        $("tfoot input").focus(function () {
            if (this.className == "search_init") {
                this.className = "";
                this.value = "";
            }
        });
        $("tfoot input").blur(function (i) {
            if (this.value == "") {
                this.className = "search_init";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        });
    });
</script>
</body>

</html>