<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Hash;
class UserController extends Controller
{
    //Hàm này sẽ trả về một view hiển thị các danh sách User cho người dùng xem.
    public function get_User_List()
    {
        $user=User::all();
        return view ('PageAdmin.user.user_list',['user'=>$user]);
    }
    //Hàm này có nhiệm vụ để xóa một user
    public function get_User_Delete($id)
    {
        $user=User::find($id);// tìm user cần xóa có có id là $id
        $user->delete();// xóa user
        return redirect('PageAdmin/user/user_list')->with('thongbao','Bạn đã xóa thành công'); // sau khi xóa xong trả về view danh sách user và xuất hiện một thông báo đã xóa thành công.
    }
    //Hàm này sẽ trả về view để thêm thông tin một User.
    public function get_User_Add()
    {
        return view('PageAdmin.user.user_add');// trả về view thêm một User
    }
    // Hàm này sẽ xử lý thêm một User.
    public function post_User_Add(Request $request)
    {
        $this->validate($request,
            [
                //Tạo ra những ràng buộc để việc người dùng nhập các thông tin của User nếu thông tin không hợp lệ thì nó sẽ thông báo ra các lỗi.
                'txtUserName'=>'required|min:3',
                'txtEmail'=>'required|email|unique:users,EMAIL',
                'txtPass'=>'required|min:6|max:32',
                'txtPassAgain'=>'required|same:txtPass',
                'rdoStatus'=>'required',
            ],
            [
                'txtUserName.required'=>'Bạn chưa nhập tên User Name',
                'txtUserName.min'=>'UsserName phải từ 3 ký tự trở lên',
                'txtEmail.required'=>'Bạn chưa nhập Email',
                'txtEmail.email'=>'Bạn chưa nhập đúng định dạng email',
                'txtEmail.unique'=>'Email đã tồn tại',
                'txtPass.required'=>'Bạn chưa nhập PassWord',
                'txtPass.min'=>'PassWord có độ dài từ 6 đến 32 ký tự',
                'txtPass.max'=>'PassWord có độ dài từ 6 đến 32 ký tự',
                'txtPassAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'txtPassAgain.same'=>'Mật khẩu nhập lại chưa đúng',
                'rdoStatus.required'=>'Bạn chưa nhập tên cấp độ cho Use',
            ]);
        $user=new User();// tạo ra một đối tượng mới để tới thành việc thêm User
        $user->USER=base64_encode($request->txtUserName);//thêm dữ liệu ở cột USER với dạng dữ liệu bị mã hóa base64_encode.
        $user->EMAIL=base64_encode($request->txtEmail);//dữ liệu thêm vào bị mã hóa ở dạng base64_encode
        $user->password=Hash::make($request->txtPass);//password bị mã hóa thành Hash
        $user->ISADMIN=$request->rdoStatus;
        $user->save();// tiến hành thêm user mới vào bảng users trong CSDL
        return redirect('PageAdmin/user/user_add')->with('thongbao','Bạn đã thêm thành công');//trả người dùng về giao diện thêm user và thông báo đã thêm thành công.
    }
    //Hàm này sẽ trả về giao diện chỉnh sữa thông tin của một User
    public function get_User_Edit($id)
    {
        $user=User::find($id);// tìm user cần chỉnh sữa với id=$id
        return view('PageAdmin.user.user_edit',['user'=>$user]);// trả về giao diện chỉnh sữa user.
    }
    //Hàm này xử lý việc chỉnh sữa thông tin một user.
    public function post_User_Edit(Request $request,$id)
    {
        $user=User::find($id);//tìm user cần chỉnh sữa
        $this->validate($request,
            [
                'txtUserName'=>'required|min:3',
            ],
            [
                'txtUserName.required'=>'Bạn chưa nhập tên User Name',
                'txtUserName.min'=>'UsserName phải từ 3 ký tự trở lên',
            ]);//TẠo ra các ràng buộc để bắt lỗi người dùng nhập thông tin trên view sữa thông tin một user.
        //Nếu người dùng không nhập lỗi gì thì sẽ tiến hành sữa thông tin một user ở đây.
        $user->USER=base64_encode($request->txtUserName);
        $user->EMAIL=base64_encode($request->txtEmail);
        $user->ISADMIN=$request->rdoStatus;
        //Nếu người dùng có check vào ô checkbox trên view sữa thông tin một user thì sẽ cập nhật lại password cho user.
        if($request->changePassword=="on")
        {
            $this->validate($request,
                [

                    'txtPass'=>'required|min:6|max:32',
                    'txtPassAgain'=>'required|same:txtPass',
                ],
                [

                    'txtPass.required'=>'Bạn chưa nhập PassWord',
                    'txtPass.min'=>'PassWord có độ dài từ 6 đến 32 ký tự',
                    'txtPass.max'=>'PassWord có độ dài từ 6 đến 32 ký tự',
                    'txtPassAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                    'txtPassAgain.same'=>'Mật khẩu nhập lại chưa đúng',
                ]);
            $user->password=Hash::make($request->txtPass);//mã hóa password bằng hash.
        }
        $user->save();//cập nhật lại thông tin user và lưu vào database
        //Sau khi cập nhật xong trả về view sữa thông tin một user và hiện ra thông báo:"Bạn đã sữa thành công".
        return redirect('PageAdmin/user/user_edit/'.$id)->with('thongbao','Bạn đã sữa thành công');
    }
    //Hàm này nó sẽ trả về giao diện login
    public function get_Admin_Login()
    {
        return view('PageAdmin.login');
    }
    //Xử lý việc người dùng login vào trang admin.
    public function post_Admin_Login(Request $request)
    {
        $this->validate($request,
            [
                //Tạo ra những ràng buộc để kiểm tra tình hợp lệ mà người dùng nhập vào.
                'txtUser'=>'required|min:3',
                'txtPass'=>'required|min:3|max:32',
            ],
            [
                'txtUser.required'=>'Bạn chưa nhập UserName',
                'txtUser.min'=>'UserName phải từ 3 ký tự trở lên',
                'txtPass.required'=>'Bạn chưa nhập PassWord',
                'txtPass.min'=>'PassWord có độ dài từ 6 đến 32 ký tự',
                'txtPass.max'=>'PassWord có độ dài từ 6 đến 32 ký tự',
            ]);
        $username=$request->txtUser;
        $pass=$request->txtPass;
        $user=User::all();
        foreach ($user as $value)//duyệt từ đầu đến cuối trong bảng users của CSDL
        {
            if(base64_decode($value->USER)==$username)//kiểm tra xem username người dùng nhập vào có bằng username nào trong bảng users hay không
            {

                    if(Hash::check($pass,$value->password))//kiểm tra xem password người dùng nhập vào có đúng hay không.
                    {
                        Auth::login($value);//nếu đúng sẽ cho người dùng login vào
                        return redirect('PageAdmin/layout/index');//chuyển người dùng sang trang admin
                    }
                    else // nếu người dùng nhập password sai nó sẽ thông báo người login thất bại
                    {
                        return redirect('PageAdmin/login')->with('thongbao','Login Fail');
                    }
            }
        }
        return redirect('PageAdmin/login')->with('thongbao','Login Fail');


    }
    // Hàm này sẽ xử lý việc người dùng logout ra khỏi trang admin.
    public function logout_PageAdmin()
    {
        Auth::logout();//        //Nó sẽ logout user đang nhập vào trang admin
        //Sau khi logout nó trả về view login.
        return redirect('PageAdmin/login');
    }
}
