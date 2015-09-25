<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Feedly</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fonts/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fonts/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/maps/jquery-jvectormap-2.0.1.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/icheck/flat/green.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/floatexamples.css') }}">

    <script src="{!! asset('js/jquery.min.js') !!}"></script>
    <script src="{!! asset('js/nprogress.js') !!}"></script>
    <script src="https://apis.google.com/js/client:plusone.js" type="text/javascript"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
        NProgress.start();
    </script>

    <!--[if lt IE 9]>
    <script src="{!! asset('../assets/js/ie8-responsive-file-warning.js') !!}"></script>
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

                @section('logo')
                    Top soidebar logo
                @show

                <br/>

                @section('sidebar')
                    left siidebar area
                @show
            </div>
        </div>

        @section('nav')
            Top navigation
            @show

                    <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- /page content -->

    </div>

</div>

<script src="{!! asset('js/bootstrap.min.js') !!}"></script>

<!-- chart js -->
<script src="{!! asset('js/chartjs/chart.min.js') !!}"></script>
<!-- bootstrap progress js -->
<script src="{!! asset('js/progressbar/bootstrap-progressbar.min.js') !!}"></script>
<script src="{!! asset('js/nicescroll/jquery.nicescroll.min.js') !!}"></script>
<!-- icheck -->
<script src="{!! asset('js/icheck/icheck.min.js') !!}"></script>
<!-- daterangepicker -->
<script src="{!! asset('js/moment.min.js') !!}"></script>
<script src="{!! asset('js/datepicker/daterangepicker.js') !!}"></script>
<script src="{!! asset('js/bootstrap-multiselect.js') !!}"></script>
<script src="{!! asset('js/custom.js') !!}"></script>
<script type="text/javascript">
    $('#example-multiple-selected').multiselect();
</script>
<script>
$(document).ready(function () {

function exportTableToCSV($table, filename) {

var $rows = $table.find('tr:has(td)'),

// Temporary delimiter characters unlikely to be typed by keyboard
// This is to avoid accidentally splitting the actual contents
tmpColDelim = String.fromCharCode(11), // vertical tab character
tmpRowDelim = String.fromCharCode(0), // null character

// actual delimiter characters for CSV format
colDelim = '","',
rowDelim = '"\r\n"',

// Grab text from table into CSV formatted string
csv = '"' + $rows.map(function (i, row) {
var $row = $(row),
$cols = $row.find('td');

return $cols.map(function (j, col) {
var $col = $(col),
text = $col.text();

return text.replace(/"/g, '""'); // escape double quotes

}).get().join(tmpColDelim);

}).get().join(tmpRowDelim)
.split(tmpRowDelim).join(rowDelim)
.split(tmpColDelim).join(colDelim) + '"',

// Data URI
csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

$(this)
.attr({
'download': filename,
'href': csvData,
'target': '_blank'
});
}

// This must be a hyperlink
$(".export").on('click', function (event) {
// CSV
exportTableToCSV.apply(this, [$('#dvData>table'), 'export.csv']);

// IF CSV, don't do event.preventDefault() or return false
// We actually need this to be a typical hyperlink
});
});
</script>
</body>
</html>