@extends('PageAdmin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
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
                        <th>Tên Loại</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- biến $category là do được truyền từ CategoryController khi ta gọi đến đường dẫn  PageAdmin/category/category_list nó sẽ thực hiện hàm get_Category_List() trong controller đó !-->
                    @foreach($category as $value)
                        <tr>
                            <td>{{$value->MALOAIPHIM}}</td>
                            <td>{{$value->TENLOAIPHIM}}</td>
                            <!-- Đường dẫn href là 1 route -->
                            <!-- Khi ta bấm vào một thẻ a nó sẽ gọi một route có đường dẫn tương ứng để thực hiện -->
                            <td class="center"><a href="PageAdmin/category/category_delete/{{$value->MALOAIPHIM}}">
                                    Delete</a></td>
                            <td class="center"><a
                                        href="PageAdmin/category/category_edit/{{$value->MALOAIPHIM}}">Edit</a></td>
                        </tr>
                    @endforeach
                    <tr>

                        <td colspan="4" style="text-align: right">{!! $category->links() !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection