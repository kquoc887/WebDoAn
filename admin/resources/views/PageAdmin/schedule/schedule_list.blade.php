@extends('PageAdmin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Schedule
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
                        <th>Tên Phim</th>
                        <th>Tên Rạp</th>
                        <th>Giờ Chiếu</th>
                        <th>Ngày Chiếu</th>
                        <th>Giá Vé</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedule as $value)
                        <tr>
                            <td>{{$value->nphim->TENPHIM}}</td>
                            <td>{{$value->rap->TENRAP}}</td>
                            <td>{{$value->GIOCHIEU}}</td>
                            <td>{{$value->NGAYCHIEU}}</td>
                            <td>{{$value->PRICE}}</td>
                            <!-- Đường dẫn href là 1 route -->
                            <td class="center"><a href="PageAdmin/schedule/schedule_delete/{{$value->MAPHIM}}/{{$value->MARAP}}/{{$value->GIOCHIEU}}"> Delete</a></td>
                            <td class="center"><a href="PageAdmin/schedule/schedule_edit/{{$value->MAPHIM}}/{{$value->MARAP}}/{{$value->GIOCHIEU}}">Edit</a></td>
                        </tr>
                    @endforeach
                    <tr style="text-align: right">
                        <td colspan="7">{!! $schedule->links() !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
    </div>
        <!-- /.container-fluid -->
@endsection