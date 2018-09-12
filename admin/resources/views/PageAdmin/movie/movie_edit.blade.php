@extends('PageAdmin.layout.index');
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Movie
                        <small>Edit</small>
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
                    <form action="PageAdmin/movie/movie_edit/{{$movie->MAPHIM}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="txtName"  value="{{$movie->TENPHIM}}" />
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <input class="form-control" name="txtTime"  value="{{$movie->THOILUONG}}" />
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input class="form-control" name="txtAuthor"  value="{{$movie->DAODIEN}}" />
                        </div>
                        <div class="form-group">
                            <label>Actor</label>
                            <input class="form-control" name="txtActor" value="{{$movie->DIENVIEN}}" />
                        </div>
                        <div class="form-group">
                            <label>Category Movie</label>
                            <select class="form-control" name="MALOAIPHIM">
                                <option value="0">Please Choose Category</option>
                                @foreach($category as $value)
                                    <option
                                            @if($movie->MALOAIPHIM==$value->MALOAIPHIM)
                                                    {{"selected"}}
                                            @endif
                                            value="{{$value->MALOAIPHIM}}">{{$value->TENLOAIPHIM}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input class="form-control" name="txtCountry" value="{{$movie->NUOC}}" />
                        </div>
                        <div class="form-group">
                            <label>Describe</label>
                            <textarea name="txtDescribe" class="form-control ckeditor" id="demo" rows="3" >
                                {{$movie->MIEUTA}}
                            </textarea>
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
                                <select class="form-inline" name="Month" onselect="">
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
                            <label>Images</label>
                            <input type="file" name="url" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default">Movie Edit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection