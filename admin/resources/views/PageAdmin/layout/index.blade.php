<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/metisMenu.min.css" rel="stylesheet">
    <link href="./css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="./css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="./css/dataTables.responsive.css" rel="stylesheet">

</head>
<style>

</style>
<body>
<div id="wrapper">
    @include('PageAdmin.layout.header')
    @yield('content')

</div>
<!-- /#page-wrapper -->
<!-- Bootstrap Core JavaScript -->
<script src="./js/app.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="./js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="./js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="./js/sb-admin-2.js"></script>

<!-- DataTables JavaScript -->
<script src="./js/jquery.dataTables.min.js"></script>
<script src="./js/dataTables.bootstrap.min.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
<script type="text/javascript" language="javaScript" src="./ckeditor/ckeditor.js"></script>
@yield('script')
</body>
</html>