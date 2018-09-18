<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Kiểm trả xem admin của trang web đã login chưa nếu chưa login thì nó trả về trang login và thông báo cho admin.
        if(Auth::check()) // Nếu người dùng là admin đã login đúng thì nó sẽ về true ngược lại sẽ trả về false(mục đích của hàm là kiểm tra xem admin đã login hay chưa).
        {
            $user=Auth::user();
            if ($user->ISADMIN == 1) {//Nếu user là có cột ISADMIN(đã tạo trong database) là 1 thì nó sẽ cho đăng nhập vào.
                return $next($request);//trả người dùng về trang admin.
            }
            else //ngược lại thì nó sẽ trả về trang đăng nhập và thông báo cho người dùng là đăng nhập không thành công.
                return redirect('PageAdmin/login')->with('thongbao', 'Đăng nhập không thành công');
        }
        else return redirect('PageAdmin/login');
    }
    
}
