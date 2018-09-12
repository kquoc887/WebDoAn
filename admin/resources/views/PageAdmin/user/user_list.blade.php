@extends('PageAdmin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Username</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>ISADMIN</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $value)
                        <tr class="odd gradeX" align="center">
                            <td>{{$value->id}}</td>
                            <td>{{$value->USER}}</td>
                            <td>{{$value->EMAIL}}</td>
                            <td>{{$value->password}}</td>
                            <td>{{$value->ISADMIN}}</td>
                            <td class="center"><a href="PageAdmin/user/user_delete/{{$value->id}}"> Delete</a></td>
                            <td class="center"><a href="PageAdmin/user/user_edit/{{$value->id}}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection