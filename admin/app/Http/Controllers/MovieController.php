<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movie;
use App\category;
use App\schedule;

class MovieController extends Controller
{
    //
    //Khi gọi đến hàm này nó sẽ trả về view hiển thị giao diện danh sách các phim.
    public function getMovieList()
    {
        $movie_list = movie::paginate(3);
        return view('PageAdmin.movie.movie_list', ['movie' => $movie_list]);// trả về view danh sách các phim.
    }

    //Khi gọi đến hàm này nó sẽ xử lý việc xóa một phim.
    public function getMovieDelete($id)
    {
//        $schedule = schedule::where('FK_MAPHIM',$id);
//        $schedule->delete();
        $movie = movie::find($id);//tìm phim muốn xóa với mã phim là $id
        $movie->delete();
        //Sau khi xóa xong chuyển hướng người dùng đến đường dẫn 'PageAdmin/movie/movie_list' và thông báo đã xóa xong.
        return redirect('PageAdmin/movie/movie_list')->with('thongbao', 'Đã xóa thành công');
    }

    //Khi gọi đến hàm này nó sẽ trả về cho người view để thêm phim
    public function getMovieAdd(){
        $category = category::all();
        return view('PageAdmin.movie.movie_add', ['category' => $category]);
    }

    //Hàm này để xử lý việc thêm phim
    public function postMovieAdd(Request $request)
    {
        $this->validate($request, [
                'txtName' => 'required',
                'txtTime' => 'required',
                'txtAuthor'=> 'required',
                'txtActor' => 'required',
                'txtCountry' => 'required',
                'txtDescribe' => 'required',

            ], [
                'txtName.required' => 'Bạn chưa nhập tên phim',
                'txtTime.required' => 'Bạn chưa nhập thời lượng phim',
                'txtAuthor.required' => 'Bạn chưa nhập tác giả của phim',
                'txtActor.required' => 'Bạn chưa nhập diễn viên của phim',
                'txtCountry.required' => 'Bạn chưa nhập phim thuộc nước nào',
                'txtDescribe.required' => 'Bạn chưa nhập miêu tả của phim',  
            ]);
        //Bắt việc người dùng chưa chọn ngày, tháng , năm để chiếu phim trên giao diện thêm phim.
        if ($request->Day == 0 || $request->Month == 0|| $request->Year == 0) {
            return redirect('PageAdmin/movie/movie_add')->with('loi', 'Bạn chưa chọn ngày tháng năm để chiếu phim');
        }
        $startday = \Carbon\Carbon::create($request->Year, $request->Month, $request->Day);
        $daycurrent = \Carbon\Carbon::today();
        // Bắt viecj người dùng chọn ngày tháng năm chiếu phim nhỏ hơn ngày tháng năm hiện tại
        if ($startday < $daycurrent) {
            return redirect('PageAdmin/movie/movie_add')->with('loi', 'Ngày chiếu không thể nhỏ hơn ngày hiện tại');
        }
        // Nếu đã thỏa các diều kiện sẽ tiến hành tạo ra đối tượng phim và bắt đầu thêm vào.
        $movie = new movie();
        $movie->TENPHIM = $request->txtName;
        $movie->THOILUONG = $request->txtTime;
        $movie->DAODIEN = $request->txtAuthor;
        $movie->DIENVIEN = $request->txtActor;
        $movie->MALOAIPHIM = $request->idCategory;
        $movie->NUOC = $request->txtCountry;
        $movie->MIEUTA = $request->txtDescribe;
        $movie->NGAYBDCHIEU = $request->Year . "-" . $request->Month . "-" . $request->Day;
        $movie->URL = $request->txtURLTrailler;
        $movie->ISSLIDE = $request->rdoStatus;
        if ($request->hasFile('url')) {//Kiểm tra xem có tồn tại file url hay không.
            $file = $request->file('url');//file url(là một file hình ảnh).
            $extension = $file->getClientOriginalExtension();//lấy phần mở phần của file url.
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {//Kiểm tra xem file url tải lên có đuôi mở rộng là jpg,png,jpeg hay không nếu sai nó sẽ không báo ở trang giao diện và bắt người dùng chọn lại file hình ảnh
                return redirect('PageAdmin/movie/movie_add')->with("loi", "Bạn chỉ được chọn file có đuôi là jpg,png,jpeg");
            }
            $name = $file->getClientOriginalName();//lấy tên file hình ảnh.
            $hinh = str_random(4) . "_" . $name;//tạo ra một tên file mới.
            while (file_exists("img/" . $hinh)) {//kiểm tra xem trong thư mục img đã tòn tại tên hình chưa nếu đã tồn tại nó sẽ tao ra một tên hình khác.
                $hinh = str_random(4) . "_" . $name;
            }
            $file->move("img", $hinh);//di chuyển file hình vào thư mục img ở phần public.
            $movie->IMAGE = $hinh;
        }
        else {
            return redirect('PageAdmin/movie/movie_add')->with('loi', 'Bạn chưa chọn hình ảnh cho phim');
        }

        $movie->save();
        return redirect('PageAdmin/movie/movie_add')->with("thongbao", "Bạn đã thêm một phim thành công");
    }

    //Khi gọi hàm này nó trả về cho người dùng view sữa thông tin một phim
    public function getMovieEdit($id)
    {
        $category = category::all();
        $movie = movie::find($id);
        return view('PageAdmin.movie.movie_edit', ['movie' => $movie, 'category' => $category]);
    }

    //Khi gọi hàm này nó sẽ xử lý việc sữa thông tin một phim.
    public function postMovieEdit(Request $request, $id)
    {
        $movie = movie::find($id);//tìm phim cần sữa có mã phim là $id.
        $this->validate($request, [
                //đặt những ràng buộc để bắt người dùng nếu người dùng không nhập thông tin phim cần sữa hoặc thông tin phim không hợp lệ.
                'txtName' => 'required',
                'txtTime' => 'required',
                'txtAuthor' => 'required',
                'txtActor' => 'required',
                'txtCountry' => 'required',
                'txtDescribe' => 'required',
            ], [
                'txtName.required' => 'Bạn chưa nhập tên phim',
                'txtTime.required' => 'Bạn chưa nhập thời lượng phim',
                'txtAuthor.required' => 'Bạn chưa nhập tác giả của phim',
                'txtActor.required' => 'Bạn chưa nhập diễn viên của phim',
                'txtCountry.required' => 'Bạn chưa nhập phim thuộc nước nào',
                'txtDescribe.required' => 'Bạn chưa nhập miêu tả của phim',
            ]);
        //Nếu người dùng không chọn ngày tháng năm bắt đầu chiếu phim thì nó lấy ngày cũ và cập nhật những thông tin còn lại
        if ($request->Day == 0 || $request->Month == 0 || $request->Year == 0) {
            $movie->TENPHIM = $request->txtName;
            $movie->THOILUONG = $request->txtTime;
            $movie->DAODIEN = $request->txtAuthor;
            $movie->DIENVIEN = $request->txtActor;
            $movie->MALOAIPHIM = $request->MALOAIPHIM;
            $movie->NUOC = $request->txtCountry;
            $movie->MIEUTA = $request->txtDescribe;

            if ($request->hasFile('url')) {// Kiểm tra xem người dùng đã chọn hình anh hay chưa nếu có tồn tại thì nó cập nhật lại tên hình ảnh cho phim ngược lại thì nó sẽ giữ lại thông tin cũ
                $file = $request->file('url');
                $extension = $file->getClientOriginalExtension();// lấy phần mở rộng của file hình ảnh
                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {//Kiểm tra người dùng có chọn đúng file hình ảnh hay không.
                    //Nếu không đúng nó sẽ trả về view sữa một phim và hiện ra thông báo : "Bạn chỉ được chọn file có đuôi là jpg,png,jpeg"
                    return redirect('PageAdmin/movie/movie_edit/' . $id)->with("loi", "Bạn chỉ được chọn file có đuôi là jpg, png, jpeg");
                }
                $name = $file->getClientOriginalName();//lấy phần name của file hình ảnh
                $hinh = str_random(4) . "_" . $name;
                while (file_exists("img/" . $hinh)) {//Kiểm tra xem trong thư mục img trong thuc mục public có tồn tại file hình ảnh chưa .
                    //Nếu đã tồn tại nó sẽ tạo ra một tên file mới
                    $hinh = str_random(4) . "_" . $name;
                }
                $file->move("img", $hinh);//thêm file hình ảnh vào thư mục img trong thư mục public.
                unlink('img/' . $movie->IMAGE);// trước khi chỉnh sữa hình cho phim nó sẽ xóa hình ảnh cũ trong thư mục img.
                $movie->IMAGE = $hinh;
            }

            $movie->save();//bắt đầu cập nhật lại phim vào database.
            //Trả về view sữa một phim và hiện ra thông báo: " Bạn đã sữa thành công ".
            return redirect('PageAdmin/movie/movie_edit/' . $id)->with("thongbao", "Bạn đã sữa thành công");
        }
        else {//Nếu người dùng chỉnh sữa thông tin phim mà có điều chỉnh ngày bắt đầu chiếu
            $startday = \Carbon\Carbon::create($request->Year, $request->Month, $request->Day);
            $daycurrent = \Carbon\Carbon::today();
            // Nếu người dùng chỉnh sữa ngày bắt chiều nhỏ hơn ngày hiện tại thì nó sẽ thông báo cho người dùng
            if ($startday < $daycurrent) {//Nếu người dùng chọn ngày bắt đầu chiếu phim mà nhỏ hơn ngày hiện tại.
                //TRả về giao diện sữa một phim và hiện ra thông báo:"Ngày chiếu không thể nhỏ hơn ngày hiện tại"
                return redirect('PageAdmin/movie/movie_edit/' . $id)->with('loi', 'Ngày chiếu không thể nhỏ hơn ngày hiện tại');
            }
            // Nếu như thỏa hết điều kiện sẽ tiến hành cập nhật lại một phim tại đây.
            $movie->TENPHIM = $request->txtName;
            $movie->THOILUONG = $request->txtTime;
            $movie->DAODIEN = $request->txtAuthor;
            $movie->DIENVIEN = $request->txtActor;
            $movie->MALOAIPHIM = $request->MALOAIPHIM;
            $movie->NUOC = $request->txtCountry;
            $movie->MIEUTA = $request->txtDescribe;
            $movie->NGAYBDCHIEU = $request->Year . "-" . $request->Month . "-" . $request->Day;

            if ($request->hasFile('url')) {//Nếu người dùng đã chọn file hình ảnh để chỉnh sữa hình ảnh cho phim.
                $file = $request->file('url');
                $extension = $file->getClientOriginalExtension();//lấy phần mở rộng của file hình ảnh
                if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {// Kiểm tra xem người dùng có chọn các file hình ảnh có đuôi mở rộng đúng quy định hay không.
                    //Nếu chọn file hình ảnh có đuôi mở rộng không đúng.
                    //Sẽ trả về view sữa một phim và hiện ra thông báo :"Bạn chỉ được chọn file có đuôi là jpg,png,jpeg"
                    return redirect('PageAdmin/movie/movie_edit/' . $id)->with("loi", "Bạn chỉ được chọn file có đuôi là jpg,png,jpeg");
                }
                $name = $file->getClientOriginalName();//lấy tên của file hình ảnh
                $hinh = str_random(4) . "_" . $name;
                while (file_exists("img/" . $hinh)) {//Kiểm tra xem trong thư mục img trong thuc mục public có tồn tại file hình ảnh chưa .
                    //Nếu đã tồn tại nó sẽ tạo ra một tên file mới
                    $hinh = str_random(4) . "_" . $name;
                }
                $file->move("img", $hinh);//thêm hình ảnh vào thư mục img trong thu muc public
                unlink('img/' . $movie->IMAGE);//xóa file hỉnh ảnh cũ của phim
                $movie->IMAGE = $hinh;
            }

            $movie->save();//tiến hành cập nhật phim và lưu lại vào database
            //Sau khi cập nhật thành công sẽ trả về view chỉnh sữa một phim và hiện ra thông báo "Bạn đã sữa thành công"
            return redirect('PageAdmin/movie/movie_edit/' . $id)->with("thongbao", "Bạn đã sữa thành công");
        }
    }

}
