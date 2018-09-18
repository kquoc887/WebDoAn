<!DOCTYPE html>
<html>
<?php
//import các trang cần thiết
include("header.html");      // phần header layout
include("../libs/config.php"); // kết nối csdl
session_start(); //khởi tạo session
?>
<head>
    <title>Kết quả tìm kiếm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="../libs/lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../libs/lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../libs/lib/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../libs/lib/css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="../libs/lib/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="../libs/lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../libs/lib/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../libs/lib/css/select2.min.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="../libs/css/style.css">
    <link rel="stylesheet" type="text/css" href="../libs/css/themes/flat-blue.css">

</head>
<body>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a href="index.php">
                <img src="images/logo3.png" width="120" height="40" alt="Logo"/>
                <!-- This is website logo -->
            </a>
            <!-- Navigation button, visible on small resolution -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <i class="icon-menu"></i>
            </button>
            <!-- Main navigation -->

            <!-- End main navigation -->
        </div>
    </div>
    <div style="float: right; margin-right:100px ;color: white; font-size:35px">
        <ul>
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php
                    if (isset($_SESSION["loginuser"])) {
                        echo $_SESSION["loginuser"];
                    }
                    ?><span class="caret"></span></a>
                <ul class="dropdown-menu animated fadeInDown" style="width: 200px;>
                                <li class=" profile-img
                ">
                <img src="images/128px.png" class="profile-img" style="margin-left: 25px;">
            </li>
            <li>
                <div class="profile-info">
                    <div class="btn-group margin-bottom-2x" role="group"><a href="thongtin.php" target="_blank">
                            <button type="button" class="btn btn-default"><i class="fa fa-user"></i>Thông tin</button>
                        </a>
                        <button type="button" class="btn btn-default" id="btn-logout"><i class="fa fa-sign-out"></i>
                            Logout
                        </button>
                    </div>
                </div>
            </li>
        </ul>
        </li>
        </ul>

    </div>
</div>
<div class="section secondary-section " style="height: 80%">
    <div class="triangle"></div>
    <div class="container">
        <div id="single-project">
            <table class="table table-bordered" style=" font-size: 18px">
                <tr>
                    <th>STT</th>
                    <th>Tên phim</th>
                    <th>Rạp</th>
                    <th>Ngày chiếu</th>
                    <th>Giờ chiếu</th>
                    <th> Mã đặt chỗ</th>
                    <th>Tùy chọn</th>
                <tr>
                    <tbody>

                    <?php
                    HienThiPhim();
                    ?>


                    </tbody>

            </table>
        </div>
    </div>
</div>

<!-- Javascript Libs -->
<script type="text/javascript" src="../libs/lib/js/jquery.min.js"></script>
<script type="text/javascript" src="../libs/lib/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../libs/lib/js/Chart.min.js"></script>
<script type="text/javascript" src="../libs/lib/js/bootstrap-switch.min.js"></script>

<script type="text/javascript" src="../libs/lib/js/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="../libs/lib/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../libs/lib/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../libs/lib/js/select2.full.min.js"></script>
<script type="text/javascript" src="../libs/lib/js/ace/ace.js"></script>
<script type="text/javascript" src="../libs/lib/js/ace/mode-html.js"></script>
<script type="text/javascript" src="../libs/lib/js/ace/theme-github.js"></script>
<!-- Javascript -->
<script type="text/javascript" src="../libs/js/app.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>

<?php
//hiện thị ra giao diện
function HienThiPhim()
{
    $db = DB::getInstance();
    $count = 0;

    $truyvan = "SELECT * FROM lichsu WHERE id = '" . $_SESSION["loginid"] . "'";
    $ketqua = $db->query($truyvan);

    foreach ($ketqua->fetchAll() as $dong) {
        $count++;
        $truyvan1 = "SELECT * ,RAP.TENRAP ,RAP.MARAP  FROM reserve,rap WHERE MADATCHO = '" . $dong["MADATCHO"] . "' AND rap.MARAP = reserve.MARAP";
        $ketqua1 = $db->query($truyvan1);
        foreach ($ketqua1->fetchAll() as $dong1) {
            $truyvan2 = 'SELECT * FROM movie WHERE MAPHIM ="' . $dong1["MAPHIM"] . '";';
            $ketqua2 = $db->query($truyvan2);
            foreach ($ketqua2->fetchAll() as $dong2) {
                $another_date = $dong2["NGAYBDCHIEU"];
                $today = date("Y-m-d");
                $now_data = strtotime($today);
                if ($now_data < strtotime($another_date)) {
                    echo '<tr>
                                <td> 
                                    <div>' . $count . '  </div>
                                </td>
                                <td ">
                                    <div style="color: black">' . $dong2["TENPHIM"] . '</div>
                                </td>
                                <td>
                                <div>' . $dong1["TENRAP"] . '</div>
                                </td>
                                <td>
                                    <div> ' . $dong1["NGAYDAT"] . '</div>
                                </td>
                                <td>
                                    <div>' . $dong1["GIODAT"] . '</div>
                                </td>
                                  <td>
                                    <div>' . base64_decode($dong["MADATCHO"]) . '</div>
                                </td>
                                <td>
                                <button type="button" class="btn btn-info btn-sua" style="width: 60px ; height: 46px; margin-bottom:1px;margin-right:3px" value = "' . $dong["MADATCHO"] . '/' . $dong1["MAPHIM"] . '/' . $dong1["MARAP"] . '/' . $dong1["NGAYDAT"] . '/' . $dong1["GIODAT"] . '">Sửa</button>
                                   <button type="button" class="btn btn-info btn-lg btn-xoa" data-toggle="modal" data-target="#myModal" value="' . $dong1["MADATCHO"] . '">Xóa</button>
                                      <div class="modal fade" id="myModal" role="dialog" style="margin-left: 500px;">
                                        <div class="modal-dialog modal-sm">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Nhập password</h4>
                                            </div>
                                            <div class="modal-body">
                                            <input type="password" class="form-control" value="" id = "password"/>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal" id="btn-xacnhan">Xác nhận</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </td>
                                </tr>';
                } else {
                    echo '<tr>
                                <td> 
                                    <div>' . $count . '  </div>
                                </td>
                                <td id ="tenphimls">
                                    <div style="color: black">' . $dong2["TENPHIM"] . '</div>
                                </td>
                                <td>
                                <div>' . $dong1["TENRAP"] . '</div>
                                </td>
                                <td>
                                    <div> ' . $dong1["NGAYDAT"] . '</div>
                                </td>
                                <td>
                                    <div>' . $dong1["GIODAT"] . '</div>
                                </td>
                                <td>
                                    <div>' . base64_decode($dong["MADATCHO"]) . '</div>
                                </td>
                                </tr>';
                }
            }
        }

    }
}

?>
<?php
if (isset($_SESSION["loginuser"])) {
    echo '<script> $(".dropdown").show();</script>';
} else {
    echo '<script> $(".dropdown").hide();</script>';
}
?>

