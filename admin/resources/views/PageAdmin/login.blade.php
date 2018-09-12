<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}"/>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/metisMenu.min.css" rel="stylesheet">
    <link href="./css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->

    <!-- DataTables CSS -->
    <link href="./css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="./css/dataTables.responsive.css" rel="stylesheet">
</head>
<style>

</style>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please LogIn</h3>
                </div>
                <div class="panel-body">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-danger">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form role="form" action="PageAdmin/login" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Please Enter Username" name="txtUser" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Please Enter Password" name="txtPass" type="password" value="">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
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


</body>
</html>