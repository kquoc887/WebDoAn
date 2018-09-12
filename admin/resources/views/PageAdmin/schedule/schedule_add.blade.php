@extends('PageAdmin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Schedule
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
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
                    @elseif(session('loi'))
                        <div class="alert alert-danger">
                            {{session('loi')}}
                        </div>
                    @endif
                    <form action="PageAdmin/schedule/schedule_add" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Choose movie</label>
                            <select class="form-control" name="idMovie">
                                <option value="0">Please Choose Movie</option>
                                @foreach($movie as $value)
                                    <option value="{{$value->MAPHIM}}">{{$value->TENPHIM}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Choose movie</label>
                            <select class="form-control" name="idRap">
                                <option value="0">Please Choose Cinema</option>
                                @foreach($rap as $value)
                                    <option value="{{$value->MARAP}}">{{$value->TENRAP}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Start Time</label>
                            <input class="form-control" name="txtStartTime" placeholder="Please Enter Start Time" />
                        </div>
                        <div class="form-group">
                            <label>Start Day</label>
                            <div class="form-inline">
                                <select class="custom-select-sm" name="Day">
                                    <option value="0">Please Choose Day</option>
                                    @for($i=1;$i<=31;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <select class="form-inline" name="Month" >
                                    <option value="0">Please Choose Month</option>
                                    @for($i=1;$i<=12;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <select class="custom-select-sm" name="Year">
                                    <option value="0">Please Choose Year</option>
                                    @for($i=2018;$i<=2030;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" name="txtPrice" placeholder="Please Enter Price" />
                        </div>

                        <button type="submit" class="btn btn-default">Schedule Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection