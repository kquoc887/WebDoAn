<?php

namespace App\Http\Controllers;

use App\schedule;
use Illuminate\Http\Request;
use App\movie;
use App\rap;

class ScheduleController extends Controller
{
    //Hàm này sẽ trả về giao diện hiển thị danh sách các phim
    public function get_Schedule_List()
    {
        $schedule = schedule::paginate(3);//trả về danh sách các lịch chiếu
        return view('PageAdmin.schedule.schedule_list',
            ['schedule' => $schedule]);//trả về view hiển thị danh sách các lịch chiếu,đồng thời truyền một biến schedule sang view đó để truy xuất tạo danh sách lịch chiếu động bên view hiển thị danh sách lịch chiéu
    }

    //Hàm này sẽ trả xử lý việc xóa một lịch chiếu.
    public function Schedule_Delete($id, $marap, $giochieu)
    {
        $schedule = schedule::where('MAPHIM', '=', $id)
            ->where('MARAP', '=', $marap)
            ->where('GIOCHIEU', '=', $giochieu)
            ->delete();//tìm lịch chiếu với điều là MAPHIM=$id và MARA=$marap và GIOCHIEU=$giochieu để xóa.
        return redirect('PageAdmin/schedule/schedule_list')->with('thongbao', 'Bạn đã xóa thành công');
        //Sau khi xử lý xóa xong nó sẽ trả về view danh sách lịch chiếu để thông báo bạn đã xóa thành công
    }

    //Hàm này sẽ trả về view để thêm một lịch chiếu
    public function get_Schedule_Add()
    {
        $movie = movie::all();
        $rap = rap::all();
        return view('PageAdmin.schedule.schedule_add', ['movie' => $movie, 'rap' => $rap]);
    }

    //Hàm này để xử lý việc bắt đầu thêm một lịch chiếu.
    public function post_Schedule_Add(Request $request)
    {
        if ($request->idMovie == 0 || $request->idRap == 0)//Kiểm tra xem người dùng đã chọn phim hoặc chọn rạp chưa nếu chưa thì nó trả về view thêm một lịch chiếu và thông báo lỗi.
        {
            return redirect('PageAdmin/schedule/schedule_add')->with('loi',
                'Bạn chưa chọn phim hoặc chọn rạp để trình chiếu');
        }

        $this->validate($request,
            [
                'txtStartTime' => 'required',
                'txtPrice' => 'required'
            ],
            [
                'txtStartTime.required' => 'Bạn chưa chọn ngày bắt đầu chiếu',
                'txtPrice.required' => 'Bạn chưa nhập giá'
            ]);//Cái này dùng để kiểm tra xem người dùng đã nhập vào txtStartTime hoặc txtPrice bên giao diện thêm một phim hay chưa.(trong đó txtStartTime và txtPrice là 2 thẻ input bên view thêm một phim).
        if ($request->Day == 0 || $request->Month == 0 || $request->Year == 0)//Kiểm tra người dùng đã chọn ngày tháng năm cho lịch chiếu hay chưa.
        {
            return redirect('PageAdmin/schedule/schedule_add')->with('loi',
                'Bạn chưa chọn ngày tháng năm để chiếu phim');//Nếu người dùng chưa chọn thì sẽ thông báo cho người dùng biết :"Bạn chưa chọn ngày tháng năm để chiếu phim")
        }
        $startday = \Carbon\Carbon::create($request->Year, $request->Month, $request->Day);
        $daycurrent = \Carbon\Carbon::today();
        if ($startday < $daycurrent)//Kiểm tra người dùng có nhập ngày bắt đầu lịch chiếu có lớn hơn ngày hiện tại không.
        {
            //Nếu người dùng nhập nhỏ hỏn ngày hiện tại nó sẽ thông báo cho người dùng " Ngày chiếu không thể nhỏ hơn ngày hiện tại "
            return redirect('PageAdmin/schedule/schedule_add')->with('loi',
                'Ngày chiếu không thể nhỏ hơn ngày hiện tại');
        }
        //Nếu người dùng thỏa hết các điều kiện bắt lỗi trên trên thì việc tiến hành thêm một lịch chiếu sẽ bắt đầu ở đây
        $schedule = new schedule();
        $schedule->MAPHIM = $request->idMovie;
        $schedule->MARAP = $request->idRap;
        $schedule->NGAYCHIEU = $request->Year . '-' . $request->Month . '-' . $request->Day;
        $schedule->GIOCHIEU = $request->txtStartTime;
        $schedule->PRICE = $request->txtPrice;
        $schedule->save();// tiến hành lưu lịch chiếu mới vào database.
        return redirect('PageAdmin/schedule/schedule_add')->with('thongbao', 'Bạn đã thêm lịch chiếu thành công');
    }

    //Hàm này sẽ trả về view chỉnh sữa một lịch chiếu
    public function get_Schedule_Edit($id, $marap, $giochieu)
    {
        $movie = movie::all();
        $rap = rap::all();
        $schedule = schedule::where('MAPHIM', '=', $id)->where('MARAP', '=', $marap)->where('GIOCHIEU', '=',
            $giochieu)->get();
        return view('PageAdmin.schedule.schedule_edit', ['schedule' => $schedule, 'movie' => $movie, 'rap' => $rap]);
        //trả về view chỉnh sữa một lịch chiếu.
    }

    //Hàm này sẽ tiến hành xử lý việc sữa một lịch chiếu.
    public function post_Schedule_Edit(Request $request, $id, $marap, $giochieu)
    {
        $this->validate($request,
            [
                'txtStartTime' => 'required',
                'txtPrice' => 'required'
            ],
            [
                'txtStartTime.required' => 'Bạn chưa chọn ngày bắt đầu chiếu',
                'txtPrice.required' => 'Bạn chưa nhập giá'
            ]);
        //Cái này dùng để kiểm tra xem người dùng đã nhập vào txtStartTime hoặc txtPrice bên giao diện thêm một phim hay chưa.(trong đó txtStartTime và txtPrice là 2 thẻ input bên view thêm một phim).
        if ($request->Day == 0 || $request->Month == 0 || $request->Year == 0)//Nếu người dùng điều chỉnh lịch chiếu mà không sữa ngày bắt đầu chiếu thì chúng chỉ sữa GIOCHIEU va PRICE
        {
            $schedule = schedule::where('MAPHIM', '=', $id)
                ->where('MARAP', '=', $marap)
                ->where('GIOCHIEU', '=', $giochieu)
                ->update(['GIOCHIEU' => $request->txtStartTime, 'PRICE' => $request->txtPrice]);
        } else//Nếu người dùng điều chỉnh lịch chiếu mà có ngày bắt đầu chiếu thì chúng ta sẽ cập nhật lại GIOCHIEU PRICE NGAYCHIEU của lịch chiếu mà chúng ta muốn sữa
        {
            $startday = \Carbon\Carbon::create($request->Year, $request->Month, $request->Day);
            $daycurrent = \Carbon\Carbon::today();
            if ($startday < $daycurrent)//Kiểm tra người dùng có nhập ngày bắt đầu lịch chiếu có lớn hơn ngày hiện tại không.
            {
                //Nếu người dùng nhập nhỏ hỏn ngày hiện tại nó sẽ thông báo cho người dùng " Ngày chiếu không thể nhỏ hơn ngày hiện tại "
                return redirect('PageAdmin/schedule/schedule_edit/' . $id . '/' . $marap . '/' . $giochieu)->with('loi',
                    'Ngày chiếu không thể nhỏ hơn ngày hiện tại');
            }
            $ngay = $request->Year . "-" . $request->Month . "-" . $request->Day;
            $schedule = schedule::where('MAPHIM', '=', $id)
                ->where('MARAP', '=', $marap)
                ->where('GIOCHIEU', '=', $giochieu)
                ->update(['GIOCHIEU' => $request->txtStartTime, 'PRICE' => $request->txtPrice, 'NGAYCHIEU' => $ngay]);
        }
        //Sau khi sữa xong nó trả về view sữa lịch chiếu và thông báo "Bạn đã sữa thành công".
        return redirect('PageAdmin/schedule/schedule_edit/' . $id . '/' . $marap . '/' . $request->txtStartTime)->with('thongbao',
            'Bạn đã sữa thành công');
    }
}
