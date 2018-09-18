<!--chọn ghế từ drop down list-->
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<head>
 <?php
include "header.html";
include "../libs/config.php";
session_start();
?>
</head>
<body>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a href="index.php" class="brand">
                    <img src="images/logo3.png" width="120" height="40" alt="Logo" />
                    <!-- This is website logo -->
                </a>
                <!-- Navigation button, visible on small resolution -->
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <i class="icon-menu"></i>
                </button>
                <!-- Main navigation -->
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">
                        <li class="active" style="margin-top: 25px; margin-right: 500px ;color: white;">Chọn lịch chiếu phim</li>
                    </ul>
                </div>
                <!-- End main navigation -->
            </div>
        </div>

        <div style="float: right; margin-right:100px ;color: white; font-size:35px;margin-top: -40px;">
            <ul>
                <li class="dropdown profile" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white;">

                        <?php
if (isset($_SESSION["loginuser"])) {
	echo $_SESSION["loginuser"];
}
?>
                       <span class="caret"></span></a>
                       <ul class="dropdown-menu animated fadeInDown" style="width: 200px;>
                       <li class="profile-img">
                        <img src="images/128px.png" class="profile-img" style="margin-left: 25px;">
                    </li>
                    <li>
                        <div class="profile-info">
                            <div class="btn-group margin-bottom-2x" role="group"><a href="thongtin.php" target="_blank">
                                <button type="button" class="btn btn-default"><i class="fa fa-user"></i>Thông tin</button></a>
                                <button type="button" class="btn btn-default" id ="btn-logout"><i class="fa fa-sign-out"></i> Logout</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>

    </div>

</div>

<div class="section secondary-section " id="portfolio">
    <div class="triangle"></div>
    <div class="container">
        <form method="POST">
            <ul class="row client-slider" id="clint-slider"> <!-- ảnh phim-->
                <li id ="li-anhphimbuoc1">
                 <!--code bên custome.js để hiện link-->
                 <?php
$maphimbuoc1 = $_SESSION["maphimbuoc1"];
$db = DB::getInstance();
if ($maphimbuoc1 != null) {
	$truyvan = "SELECT * FROM movie WHERE MAPHIM = " . $maphimbuoc1;
	$ketqua = $db->query($truyvan);

	if ($ketqua) {
		foreach ($ketqua->fetchAll() as $dong) {
			echo '<img src="../admin/public/img/' . $dong["IMAGE"] . '">';
		}
	}
} else {
	echo "Lỗi";
}
?>

       </li>
       <li style="color: black" id ="li-tenphimbuoc1">
         <!--code bên custome.js để hiện info-->

         <?php
$maphimbuoc1 = $_SESSION["maphimbuoc1"];
$db = DB::getInstance();
if ($maphimbuoc1 != null) {
	$truyvan = "SELECT * FROM movie WHERE MAPHIM = " . $maphimbuoc1;
	$ketqua = $db->query($truyvan);

	if ($ketqua) {
		foreach ($ketqua->fetchAll() as $dong) {
			echo "Tên phim: " . $dong["TENPHIM"] . ".";
			echo "</br></br></br></br>";
			echo "Thời lượng: " . $dong["THOILUONG"] . " phút" . ".";
		}
	}
} else {
	echo "Lỗi";
}
?>




   <p id="lb-thoiluongphimbuoc1"></p>
</li>
</ul>
<ul class="nav nav-pills" style="margin-top: 100px"> <!--menu-->
    <li class="filter" style="margin-left: 500px">
        <a>Lịch Chiếu</a>
    </li>
</ul>
<ul>
    <div class= "card">
        <table class="table">
            <thead>
                <tr style="color: black">
                    <th>
                        <label for="sl-rapbuoc1">Rạp</label>
                    </th>
                    <th>
                        <label for="sl-ngaychieubuoc1">Ngày Chiếu</label>
                    </th>
                    <th>
                        <label for="sl-giochieubuoc1">Giờ chiếu</label>
                    </th>
                    <th>
                        <label for="sl-giavebuoc1">Giá Vé</label>
                    </th>
                    <th>
                        <label >Chọn</label>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php

$arrMaPhim = array();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$db = DB::getInstance();
$today = date("Y-m-d");
$today = strtotime($today);
$time = strtotime(date("h:i"));
$count = 0;

$truyvan = 'SELECT schedule.* ,rap.TENRAP FROM schedule , rap WHERE MAPHIM = ' . $_SESSION["maphimbuoc1"] . 'AND rap.MARAP = schedule.MARAP';
$ketqua = $db->query($truyvan);
if ($ketqua) {
	foreach ($ketqua->fetchAll() as $dong) {
		if (strtotime($dong["NGAYCHIEU"]) > $today) {
			echo "<tr>";
			echo '<th>' . $dong["TENRAP"] . ' </th>';
			echo '<th>' . $dong["NGAYCHIEU"] . '</th>';
			echo '<th>' . $dong["GIOCHIEU"] . '</th>';
			echo '<th>' . $dong["PRICE"] . '</th>';
			echo '<th>
                         <input name = "rd-mang[]" type="radio" id= "cb/' . $dong["MARAP"] . '/' . $dong["NGAYCHIEU"] . '/' . $dong["GIOCHIEU"] . '" style="
                         width: 25px; height: 30px;"
                         </th>';
			echo "</tr>";
			$count++;
		} else if (strtotime($dong["NGAYCHIEU"]) == $today && strtotime($dong["GIOCHIEU"]) >= $time) {

			echo "<tr>";
			echo '<th>' . $dong["TENRAP"] . ' </th>';
			echo '<th>' . $dong["NGAYCHIEU"] . '</th>';
			echo '<th>' . $dong["GIOCHIEU"] . '</th>';
			echo '<th>' . $dong["PRICE"] . '</th>';
			echo '<th>
                         <input name = "rd-mang[]" type="radio" id= "cb/' . $dong["MARAP"] . '/' . $dong["NGAYCHIEU"] . '/' . $dong["GIOCHIEU"] . '" style="
                         width: 25px; height: 30px;"
                         </th>';
			echo "</tr>";
			$count++;

		}
	}
}
?>
         </tbody>
     </table>
 </div>
</ul>
<?php
if ($count > 0) {
	echo '<input type="button" class="btn btn-success" id="btn-datvebuoc2tu1" value="Đặt vé" style=" margin-bottom: 20px;margin-top: 20px; margin-left: 500px ; width: 100px; height: 50px;">';
} else {
	echo '<div class="alert alert-danger" role="alert">
    <strong>Không tìm thấy lịch chiếu phù hợp!</strong>
    </div>';
	echo '<input type="button" class="btn btn-success" id="btn-back" value="Quay lại" style=" margin-bottom: 20px;margin-top: 20px; margin-left: 500px ; width: 100px; height: 50px;">';
}
?>
</form>
<div class="triangle"></div>
</div>
</div>

</div>
</body>
</html>
<?php
include "footer.html";
?>
<script >
        // gọi redirect trang
        $("#btn-back").click(function(){
            window.location.href ='index.php';
        });

    // gọi ajax sang hàm user_function
    //click button đặt vé
    $("#btn-datvebuoc2tu1").click(function(){
        var count = 0;
        var checkbox = document.getElementsByName("rd-mang[]");
        for (var i = 0; i < checkbox.length; i++){
            if (checkbox[i].checked === true){

                var str = checkbox[i].id;
                var strSplit = str.split("/");
                var marap1 = strSplit[1];
                var ngaychieu = strSplit[2];
                var suatchieu = strSplit[3];

                        //This = $this;
                        //gọi ajax sang file function xủ lý
                        $.ajax({
                            url : "../user/user_function.php",
                            type : "POST",
                        //dataType: "html",
                        data : {
                            action:"DatVeBuoc2Tu1",
                            marap1 : marap1,
                            ngaychieu : ngaychieu,
                            suatchieu : suatchieu
                        },
                    success: function(data)//data trả về là echo
                    {
                        //console.log(data);
                    }

                });
                        count++;
                    }
                }

                if (count == 0) {
                    alert("Bạn phải chọn lịch chiếu!");
                }
            });

     // hàm load ghế bên đặt vé
     $("#btn-datvebuoc2tu1").click(function(){
        var count = 0;
        var checkbox = document.getElementsByName("rd-mang[]");
        for (var i = 0; i < checkbox.length; i++){
            if (checkbox[i].checked === true){
                $.ajax({
                    url : "../user/user_function.php",
                    type : "POST",
                                //dataType: "html",
                                data : {
                                    action:"LoadManHinh1"
                                },
                            success: function(data)//data trả về là echo
                            {
                              window.location.href='datvebuoc2.php';
                                  //console.log(data);
                              }
                          });

                count++;
            }
        }

        if (count == 0) {
            alert("Bạn phải chọn lịch chiếu!");
        }
    });
// button log out khi đăng nhập

$("#btn-logout").click(function(){
   $.ajax({
    url : "../user/user_function.php",
    type : "POST",
                    //dataType: "html",
                    data : {
                      action:"LogOut",

                  },
                    success: function(data)//data trả về là echo
                    {
                      window.location.href= "index.php";
                  }
              });
});
</script>

<?php
// hàm show login khi đăng nhập
if (isset($_SESSION["loginuser"])) {
	echo '<script> $(".dropdown").show();</script>';
} else {
	echo '<script> $(".dropdown").hide();</script>';
}

?>