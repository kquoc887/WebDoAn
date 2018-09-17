<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\category;
Route::get('/', function() {
    return view('welcome');
});
//Bắt đầu phần đồ án ở đây:
//Mỗi một route trong đây sẽ là một đường dẫn khi gọi route nào nó sẽ vào Controller tương ứng mình đã cấu hình trong route để nó xử lý yêu cầu mà người dùng mong muốn, sau khi xử lý xong nó sẽ trả về một view
Route::get("PageAdmin/login", 'UserController@getAdminLogin');
Route::post("PageAdmin/login", 'UserController@postAdminLogin');
Route::get('PageAdmin/Logout', 'UserController@logoutPageAdmin');
// nhóm các vào nhóm để sau này mình gán middleware cho thằng PageAdmin thì các trang cũng như vậy.
// cái tên định danh của middleware mình đặt trong Kennel.
// còn middleware đó quy định làm gì thì mình code trong App/Http/Middleware.
//'adminLogin'->tên định định danh của middleware mà mình đã quy định trong admin/app/http/Kennel.php
Route::group(['prefix'=>'PageAdmin', 'middleware' => 'adminLogin'], function(){
    Route::get('layout/index', function(){
        return view('PageAdmin.layout.index');
    });//Thiết lập đường dẫn khi thằng admin đăng nhập vào thành công nó sẽ chuyển dến view này.
    //Thiết lập đường dẫn đến Category
   Route::group(['prefix' => 'category'], function(){
       //Muốn gọi trang nào thì gõ PageAdmin/category/category_list, các trang còn lại cứ tương tự như vậy mà làm.
       //khi gọi một gọi trong đây trước trả về một view cho người dùng thấy nó sẽ phải vào Controller để xử lý.
       //Các controller sẽ nằm trong thư mục App\Http\Controller.
        Route::get('category_list','CategoryController@getCategoryList')->name('get_Category_List');//Khi gọi đến route này nó sẽ vào Controller có tên là CategoryController và nó sẽ vào hàm get_Category_List để xử lý sau đó trả về cho người dùng một view.
        Route::get('category_add','CategoryController@getCategoryAdd')->name('get_Category_Add');//Khi gọi đến route này nó sẽ vào Controller có tên là CategoryController và nó sẽ vào hàm get_Category_Add để xử lý sau đó trả về cho người dùng view để thêm một loại phim.
        Route::post('category_add','CategoryController@postCategoryAdd')->name('post_category_add');//Khi gọi đến route này nó sẽ xữ lý thêm một phim vào database.
        Route::get('category_edit/{id}','CategoryController@getCategoryEdit');//Khi gọi đến route này nó sẽ vào Controller có tên là CategoryController và nó sẽ vào hàm get_Category_Edit để xử lý sau đó trả về cho người dùng view để sửa thông tin một loại phim.
        Route::post('category_edit/{id}','CategoryController@postCategoryEdit');//Khi gọi đến route này nó sẽ xử lý việc sữa một loại tin.
        Route::get('category_delete/{id}','CategoryController@getCategoryDelete')->name('get_category_delete');//KHi gọi route này nõ chuyển đến Controller có tên là CategoryController và nó sẽ gọi hàm get_Category_Delete để xử lý việc xóa một loại phim.
   });

    //Thiết lập đường dẫn đến Movie
    Route::group(['prefix'=>'movie'], function(){
        Route::get('movie_list','MovieController@get_Movie_List')->name('movie_list');//Khi gọi đến route này nó sẽ vào Controller có tên là MovieController(nằm trong thư mục và nó sẽ vào hàm get_Movie_List để xử lý sau đó trả về cho người dùng một view hiển thị danh sách các phim.
        Route::get('movie_add','MovieController@get_Movie_Add');//Khi gọi đến route này nó vào Controller có tên là MovieController và nó sẽ vào hàm get_Movie_Add để xử lý trả về view để người dùng có thể thêm một phim.
        Route::post('movie_add','MovieController@post_Movie_Add');//Khi gọi đến route này nó vào Controller có tên là MovieController và nó sẽ vào hàm post_Movie_Add để xử lý việc thêm một phim.
        Route::get('movie_edit/{id}','MovieController@get_Movie_Edit');//Khi gọi đến route này nó vào Controller có tên là MovieController và nó vào hàm get_Movie_Edit để xử lý và trả về cho người dùng giao diện sữa một phim.
        Route::post('movie_edit/{id}','MovieController@post_Movie_Edit');//Khi gọi đến route này nó vào Controller có tên là MovieController và nó sẽ vào hàm post_Movie_Edit để xử lý việc sữa thông tin một phim
        Route::get('movie_delete/{id}','MovieController@get_Movie_Delete')->name('get_movie_delete');//KHi gọi route này nõ chuyển đến Controller có tên là MovieController và nó sẽ gọi hàm get_Movie_Delete để xử lý việc xóa một phim.
    });
    //Thiết lập đường đãn đến Schedule
    // Phần giải thích những route dưới đây sẽ tương tự như ở trên.
    Route::group(['prefix' => 'schedule'], function(){
        Route::get('schedule_list', 'ScheduleController@get_Schedule_List');
        Route::get('schedule_add', 'ScheduleController@get_Schedule_Add');
        Route::post('schedule_add', 'ScheduleController@post_Schedule_Add');
        Route::get('schedule_edit/{id}/{marap}/{giochieu}', 'ScheduleController@get_Schedule_Edit');
        Route::post('schedule_edit/{id}/{marap}/{giochieu}', 'ScheduleController@post_Schedule_Edit');
        Route::get('schedule_delete/{id}/{marap}/{giochieu}', 'ScheduleController@Schedule_Delete');
    });
    //Thiết lập đương dẫn dến user
    Route::group(['prefix'=>'user'],function (){
        Route::get('user_list','UserController@getUserList');
        Route::get('user_add','UserController@getUserAdd');
        Route::post('user_add','UserController@postUserAdd');
        Route::get('user_edit/{id}','UserController@getUserEdit');
        Route::post('user_edit/{id}','UserController@postUserEdit');
        Route::get('user_delete/{id}','UserController@getUserDelete');
    });

});
