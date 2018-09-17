@extends('PageAdmin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao') )
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="PageAdmin/user/user_add" method="POST" >
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>User Name</label>
                            <input class="form-control" name="txtUserName" placeholder="Please Enter User Name" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email " />
                        </div>
                        <div class="form-group">
                            <label>PassWord</label>
                            <input type="password" class="form-control" name="txtPass" placeholder="Please Enter PassWord" />
                        </div>
                        <div class="form-group">
                            <label>PassWordAgain</label>
                            <input type="password" class="form-control" name="txtPassAgain" placeholder="Please Enter PassWord" />
                        </div>
                        <div class="form-group">
                            <label>Permission</label>
                            <label class="radio-inline"><input name="rdoStatus" checked value="0" type="radio">Normal</label>
                            <label class="radio-inline"><input name="rdoStatus" value="1" type="radio">Admin</label>
                        </div>
                        <button type="submit" class="btn btn-default">User Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection