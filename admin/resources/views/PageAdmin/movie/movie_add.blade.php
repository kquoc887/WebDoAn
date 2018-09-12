@extends('PageAdmin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Movie
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
                    <form action="PageAdmin/movie/movie_add" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="txtName" placeholder="Please Enter Name " />
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <input class="form-control" name="txtTime" placeholder="Please Enter Time" />
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input class="form-control" name="txtAuthor" placeholder="Please Enter Author" />
                        </div>
                        <div class="form-group">
                            <label>Actor</label>
                            <input class="form-control" name="txtActor" placeholder="Please Enter Actor" />
                        </div>
                        <div class="form-group">
                            <label>Category Movie</label>
                            <select class="form-control" name="idCategory">
                                <option value="0">Please Choose Category</option>
                                @foreach($category as $value)
                                    <option value="{{$value->MALOAIPHIM}}">{{$value->TENLOAIPHIM}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input class="form-control" name="txtCountry" placeholder="Please Enter Country" />
                        </div>
                        <div class="form-group">
                            <label>Describe</label>
                            <textarea name="txtDescribe" class="form-control ckeditor" id="demo" rows="3" ></textarea>
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
                            <label>URL Trailer</label>
                            <input class="form-control" name="txtURLTrailler" placeholder="Please Enter URL Trailler" />
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" name="url" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>ISSLIDE</label>
                            <label class="radio-inline"><input name="rdoStatus" checked value="0" type="radio">No Slide</label>
                            <label class="radio-inline"><input name="rdoStatus" value="1" type="radio">Is Slide</label>
                        </div>
                        <button type="submit" class="btn btn-default">Movie Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection