<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//Mỗi lần ta gọi controller bất kỳ thì nó sẽ tự động cái $this->checklogin() để nó kiểm tra xem ta có
// đăng nhập hay không nếu có đăng nhập ta sẽ dụng view->share() để đưa 1 biến user vào trong các view của chúng ta.
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
    }
}
