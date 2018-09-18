<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Illuminate\Validation;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //Khi người dùng gọi đến đường dẫn PageAdmin/category/category_list thì hàm này sẽ được gọi
    public function get_Category_List()
    {
        $category_list = category::paginate(3);//lấy danh sách các loại phim
        return view('PageAdmin.category.category_list', ['category' => $category_list]);
        // hàm này nó sẽ trả về view để cho người dùng(admin) xem danh sách các loại phim và đồng thời nó sẽ truyền một biến category qua bên view đó.
    }

    //hàm này nó trả về view Thêm một loại phim  khi gọi đường dẫn: PageAdmin/category/category_add (cái này là Route::get)
    public function get_Category_Add()
    {
        return view('PageAdmin.category.category_add');
    }
    //hàm này khi người dùng(admin) bấm vào nút submit bên view thêm loại phim
    // do đường dẫn này trả về PageAdmin/category/category_add này trả về.(cái này là Route::post) thì nó sẽ thực hiện hàm này
    // để thêm một loại phim vào bảng category trong database.
    public function post_Category_Add(Request $request)
    {
        // kiểm tra điều kiên trước khi thêm.
        $this->validate($request,
            [
                //tên không được bỏ trống.
                //ten phải có tối thiểu là 3 ký tự và tối đa là 100 ký tự
                'txtCateName' => 'required|unique:category,TENLOAIPHIM|min:3|max:100'
            ],
            [
                'txtCateName.required' => 'Bạn chưa nhập tên thể loại',
                'txtCateName.unique' => 'Đã có loại phim này',
                'txtCateName.min' => 'Tên loại phim phải độ dài từ 3 cho đến 100 ký tự ',
                'txtCateName.max' => 'Tên loại phim phải độ dài từ 3 cho đến 100 ký tự '
            ]);
        $category = new category();//tao một đối tượng trong bảng category
        $category->TENLOAIPHIM = $request->txtCateName;
        $category->save();//sau khi cập nhật dữ liệu cho đối tượng nó sẽ save lại và lưu vào database.
        return redirect()->route('get_Category_Add')->with('thongbao', 'Thêm thành công');
    }

    // Hàm này sẽ được gọi khi ta ứng vào thẻ a có nhiệm vự là delete bên view category_list.blade.php khi tấm bấm vào đó nó sẽ truyền một biến là mã loại phim đi
    public function get_Category_Delete($id)//$id ở đây là biến mã  loại phim
    {
        $category = category::find($id);//tìm loại phim có mã tương ứng là $id
        $category->delete();//khi tìm thấy nó sẽ xóa loại phim đó trong bảng
        return redirect()->route('get_Category_List')->with('thongbao', 'Đã xóa thành công');
    }

    // hàm này sẽ được gọi khi ta ấn vào thẻ a có nhiệm vự là edit bên view category_list.blade.php  khi tấm bấm vào đó nó sẽ truyền một biến là mã loại phim đi
    public function get_Category_Edit($id)////$id ở đây là biến mã  loại phim
    {
        $categogy = $category = category::find($id);//tìm loại phim có mã tương ứng là $id
        return view('PageAdmin.category.category_edit',
            ['category' => $categogy]);// trả về view sữa thông tin loại phim và truyền một biên có tên là category qua view đó.
    }

    //hàm này được gọi khi ta bấm vào nút submit bên view sữa loại phim có tên là category_edit.blade.php.
    public function post_Category_Edit(Request $request, $id)//$id này là do được truyền khi bấm vào nút submit.
    {
        $category = category::find($id);//tìm loại phim có mã loại phim tương ứng
        //kiểm tra điều kiện trước khi sữa.
        $this->validate($request,
            [
                //không được để trống, không được trùng tên loại phim,và loại phim có đọ dài tối thiểu là 3 ký tự và tối đa 100 ký tự.
                'txtCateName' => 'required|unique:category,TENLOAIPHIM|min:3|max:100'
            ],
            [
                //in ra thông báo lỗi nếu vi phạm những điều kiện.
                'txtCateName.required' => 'Bạn chưa nhập tên thể loại',
                'txtCateName.unique' => "Tên bạn nhập đã vào tồn tại",
                'txtCateName.min' => 'Tên loại phim phải độ dài từ 3 cho đến 100 ký tự ',
                'txtCateName.max' => 'Tên loại phim phải độ dài từ 3 cho đến 100 ký tự ',
            ]);
        // nếu không vi phạm nó sẽ sữa và lưu lại.
        $category->TENLOAIPHIM = $request->txtCateName;
        $category->save();
        // sau khi sữa xong nó sẽ thông báo thành công.
        return redirect('PageAdmin/category/category_edit/' . $id)->with('thongbao', 'Đã sữa thành công');
    }
}
