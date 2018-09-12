@extends('PageAdmin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Movie
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Phim</th>
                        <th>Loại Phim</th>
                        <th>Thời lượng chiếu</th>
                        <th>Đạo Diễn</th>
                        <th>Diễn Viên</th>
                        <th>Nước</th>
                        <th>Miêu tả</th>
                        <th>Ngày chiếu</th>
                        <th>URL</th>
                        <th>IMAGE</th>
                        <th>ISSLIDE</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($movie as $value)
                        <tr>
                            <td>{{$value->MAPHIM}}</td>
                            <td>{{$value->TENPHIM}}</td>
                            <td>{{$value->loaiphim->TENLOAIPHIM}}</td>
                            <td>{{$value->THOILUONG}}</td>
                            <td>{{$value->DAODIEN}}</td>
                            <td>{{$value->DIENVIEN}}</td>
                            <td>{{$value->NUOC}}</td>
                            <td>{{$value->MIEUTA}}</td>
                            <td>{{$value->NGAYBDCHIEU}}</td>
                            <td>{{$value->URL}}</td>
                            <td>{{$value->IMAGE}}</td>
                            <td>{{$value->ISSLIDE}}</td>
                            <td class="center"><a href="PageAdmin/movie/movie_delete/{{$value->MAPHIM}}"> Delete</a></td>
                            <td class="center"><a href="PageAdmin/movie/movie_edit/{{$value->MAPHIM}}">Edit</a></td>
                        </tr>
                    @endforeach
                    <tr style="text-align: right;">
                        <td colspan="14">{!! $movie->links() !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection