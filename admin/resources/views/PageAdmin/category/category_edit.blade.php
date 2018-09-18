@extends('PageAdmin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                                <!-- $err ở đây sẽ là những lỗi mà chúng ta đã bắt bên CategoryController (bằng validate) -->
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="PageAdmin/category/category_edit/{{$category->MALOAIPHIM}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name"
                                   value="{{$category->TENLOAIPHIM}}"/>
                        </div>
                        <button type="submit" class="btn btn-default">Category Edit</button>
                        <!-- Khi bấm vào nút submit này nó sẽ chuyển đến một trang mà ta quy định trong action.
                             Mà trong action là một đường dẫn của một route nó dựa vào đường dẫn đó nó sẽ gọi route đó
                             và khi gọi route đó controller mà ta quy định cho route đó nó sẽ xử lý yêu cầu của người dùng
                             và trả lại kết quả cho người dùng
                         -->
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection