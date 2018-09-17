@extends('PageAdmin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">USER
                        <small>EDIT</small>
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
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="PageAdmin/user/user_edit/{{$user->id}}" method="POST" >
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>User Name</label>
                            <input class="form-control" name="txtUserName" value="{{base64_decode($user->USER)}}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="txtEmail" value="{{base64_decode($user->EMAIL)}}" readonly />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="changePassword" id="changePassword"/>
                            <label>ChangePassWord</label>
                            <input type="password" class="form-control password" name="txtPass" placeholder="Please Enter PassWord" disabled  />
                        </div>
                        <div class="form-group">
                            <label>PassWordAgain</label>
                            <input type="password" class="form-control password" name="txtPassAgain" placeholder="Please Enter PassWordAgain" disabled />
                        </div>
                        <div class="form-group">
                            <label>Permission</label>
                            <label class="radio-inline"><input name="rdoStatus" @if($user->ISADMIN == 0){{"checked"}}  @endif type="radio" value="0">Normal</label>
                            <label class="radio-inline"><input name="rdoStatus" @if($user->ISADMIN == 1){{"checked"}} @endif value="1" type="radio">Admin</label>
                        </div>
                        <button type="submit" class="btn btn-default">USER EDIT</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#changePassword").change(function() {
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                }
                else {
                    $(".password").attr('disabled', '');
                }
            });
        });
    </script>
@endsection