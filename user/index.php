<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
    <?php
    include("header.html");
    include("../libs/config.php");
    session_start();
    ?>
</head>
<body>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a href="#home" class="brand">
                <img src="images/logo3.png" width="120" height="40" alt="Logo"/>
                <!-- This is website logo -->
            </a>
            <!-- Navigation button, visible on small resolution -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <i class="icon-menu"></i>
            </button>
            <!-- Main navigation -->
            <div class="nav-collapse collapse pull-right">
                <ul class="nav" id="top-navigation">
                    <li class="active"><a href="#home">Trang Chủ</a></li>
                    <li><a href="#service" id="mn-datve">Đặt Vé</a></li>
                    <li><a href="#portfolio">Lịch Chiếu</a></li>
                    <li><a href="#clients">Tin tức</a></li> <!--client-->
                    <li class="guest"><a href="dangki.php" target="_blank">Đăng ký</a></li>
                    <li class="guest"><a href="login.php" target="_blank">Đăng nhập</a></li>
                    <?php
                    if (isset($_SESSION["loginuser"])) {
                        echo '<script>$(".guest").css("display","none");</script>';
                    }
                    ?>
                    <li style="margin-left: 15px">

                        <input type="text" placeholder="Search.." id="txtsearch"
                               style="margin-top: 15px; border-radius:0px">
                        <button type="button" style="margin-top: 5px ; margin-left: -3px" id="search"><i
                                    class="fa fa-search" style="width:25px; height:20px"></i></button>

                    </li>
                    <li class="dropdown profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><?php
                            if (isset($_SESSION["loginuser"])) {
                                echo $_SESSION["loginuser"];
                            }
                            ?><span class="caret"></span></a>
                        <ul class="dropdown-menu animated fadeInDown">
                            <li class="profile-img">
                                <img src="images/128px.png" class="profile-img" style="margin-left: 25px;">
                            </li>
                            <li>
                                <div class="profile-info">
                                    <div class="btn-group margin-bottom-2x" role="group"><a href="thongtin.php"
                                                                                            target="_blank">
                                            <button type="button" class="btn btn-default"><i class="fa fa-user"></i>Thông
                                                tin
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-default" id="btn-logout"><i
                                                    class="fa fa-sign-out"></i> Logout
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- End main navigation -->
        </div>
    </div>
</div>
<!-- Start home section -->
<div id="home">
    <!-- Start cSlider -->
    <div id="da-slider" class="da-slider">
        <div class="triangle"></div>
        <!-- mask elemet use for masking background image -->
        <div class="mask"></div>
        <!-- All slides centred in container element -->
        <div class="container">
            <!-- Start first slide -->
            <h2>Hiển thị các slide của Phim</h2>
            <?php
            HienThiPhimSlide();
            ?>

            <!-- End first slide -->
            <!-- Start third slide -->
            <!-- Start cSlide navigation arrows -->
            <div class="da-arrows">
                <span class="da-arrows-prev"></span>
                <span class="da-arrows-next"></span>
            </div>
            <!-- End cSlide navigation arrows -->
        </div>
    </div>
</div>
<!-- End home section -->
<!-- Service section start -->
<div class="section primary-section" id="service">
    <div class="container">
        <!-- Start title section -->
        <div class="title">
            <h1>Mua vé ngay</h1>
            <!-- Section's title goes here -->

            <select id="sl-phim">
                <option value="default">Phim</option>
                <?php
                HienThiTenPhim();
                ?>
            </select>

            <select id="sl-rap">
                <option value="default">Rạp</option>
                <!--code bên custome.js để hiện option XemRap()-->
            </select>

            <select id="sl-ngaychieu">
                <option value="default">Ngày xem</option>
                <!--code bên custome.js để hiện option -->
            </select>

            <select id="sl-giochieu">
                <option value="default">Suất chiếu</option>
                <!--code bên custome.js để hiện option-->

            </select>

            <input type="button" class="btn btn-success" id="btn-datve" name="btn-datve" value="Đặt vé"
                   style=" margin-bottom: 10px">


            <!--Simple description for section goes here. -->
        </div>
    </div>
</div>
<!-- Service section end -->
<!-- Portfolio section start -->
<div class="section secondary-section " id="portfolio">
    <div class="triangle"></div>
    <div class="container">
        <div class=" title">
            <h1>Chọn Phim</h1>

        </div>
        <ul class="nav nav-pills">
            <li class="filter" data-filter="now">
                <a href="#noAction">Phim đang chiếu</a>
            </li>
            <li class="filter" data-filter="future">
                <a href="#noAction">Phim sắp chiếu</a>
            </li>
        </ul>
        <!-- Start details for portfolio project 1 -->
        <!--chi tiết phim-->
        <div id="single-project">
            <div id="slidingDiv" class="toggleDiv row-fluid single-project">
                <!--ajax HienThiChiTietPhim()-->
            </div>
            <!-- End details for portfolio project 1 -->
            <!--Hết chi tiết phim-->
            <ul id="portfolio-grid" class="thumbnails row">
                <?php
                HienThiPhimAll();
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- Portfolio section end -->

<!-- Client section start -->

<div id="clients">
    <div class="section primary-section">
        <div class="triangle"></div>
        <div class="container">
            <div class="title">
                <h1>Tin tức</h1>
                <p>Thế giới phim của bạn</p>
            </div>
            <div class="row">
                <div class="span4">
                    <div class="testimonial">
                        <p>"I've worked too hard and too long to let anything stand in the way of my goals. I will not
                            let my teammates down and I will not let myself down."</p>
                        <div class="whopic">
                            <div class="arrow"></div>
                            <img src="images/Client1.png" class="centered" alt="client 1">
                            <strong>Bài viết 1
                                <small>Tác giả</small>
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="testimonial">
                        <p>"In motivating people, you've got to engage their minds and their hearts. I motivate people,
                            I hope, by example - and perhaps by excitement, by having productive ideas to make others
                            feel involved."</p>
                        <div class="whopic">
                            <div class="arrow"></div>
                            <img src="images/Client2.png" class="centered" alt="client 2">
                            <strong>Bài viết 2
                                <small>Tác giả</small>
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="testimonial">
                        <p>"Determine never to be idle. No person will have occasion to complain of the want of time who
                            never loses any. It is wonderful how much may be done if we are always doing."</p>
                        <div class="whopic">
                            <div class="arrow"></div>
                            <img src="images/Client3.png" class="centered" alt="client 3">
                            <strong>Bài viết 3
                                <small>Tác giả</small>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter section start -->
<div class="section third-section">
    <div class="container newsletter">
        <div class="sub-section">
            <div class="title clearfix">
                <div class="pull-left">
                    <h3>Phản hồi</h3>
                </div>
            </div>
        </div>
        <div id="success-subscribe" class="alert alert-success invisible">
            <strong>Cảm ơn!</strong>Quý khách đã đặt vé từ chúng tôi.
        </div>
        <div class="row-fluid">
            <div class="span5">
                <p>Rất vui được phục vụ quý khách.</p>
            </div>
            <div class="span7">
                <form class="inline-form">
                    <input type="email" name="email" id="nlmail" class="span8" placeholder="Enter your email" required/>
                    <button id="subscribe" class="button button-sp">Subscribe</button>
                </form>
                <div id="err-subscribe" class="error centered">Vui lòng nhập địa chỉ Email.</div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter section end -->

<!--đối tác-->
<div class="section third-section">
    <div class="container centered">
        <div class="sub-section">
            <div class="title clearfix">
                <div class="pull-left">
                    <h3>Đối tác</h3>
                </div>
                <ul class="client-nav pull-right">
                    <li id="client-prev"></li>
                    <li id="client-next"></li>
                </ul>
            </div>
            <ul class="row client-slider" id="clint-slider">
                <li>

                    <img src="images/clients/ClientLogo01.png" alt="client logo 1">

                </li>
                <li>

                    <img src="images/clients/ClientLogo02.png" alt="client logo 2">

                </li>
                <li>

                    <img src="images/clients/ClientLogo03.png" alt="client logo 3">

                </li>
                <li>

                    <img src="images/clients/ClientLogo04.png" alt="client logo 4">

                </li>
                <li>

                    <img src="images/clients/ClientLogo05.png" alt="client logo 5">

                </li>
                <li>

                    <img src="images/clients/ClientLogo02.png" alt="client logo 6">

                </li>
                <li>

                    <img src="images/clients/ClientLogo04.png" alt="client logo 7">

                </li>
            </ul>
        </div>
    </div>
</div>
<!--end đối tác-->

<?php
include("footer.html");
?>
</body>
</html>

<?php
//show phim drop list
function HienThiTenPhim()
{
    //if(strtotime($dong2["NGAYCHIEU"]) >= $today && strtotime($dong2["GIOCHIEU"])>strtotime(date("h:i")))
    $arrMaPhim = array(); // mảng lưu mã phim
    date_default_timezone_set('Asia/Ho_Chi_Minh'); //xet múi giờ
    $db = DB::getInstance(); // instance db
    $today = date("Y-m-d");//get ngày hiện tại
    $today = strtotime($today);//get 1 số tính toán ngày hiện tại
    $time = strtotime(date("H:i"));//get 1 số là giờ hiện tại

    $truyvan = "SELECT * FROM schedule";
    $ketqua = $db->query($truyvan);
    if ($ketqua) {
        foreach ($ketqua->fetchAll() as $dong) {
            $another_date = $dong["NGAYCHIEU"]; // ngày chiếu của phim
            $another_time = $dong["GIOCHIEU"]; // giờ chiếu của phim
            if (strtotime($another_date) > $today) {
                $truyvan1 = 'SELECT MAPHIM,TENPHIM FROM movie WHERE MAPHIM = ' . $dong["MAPHIM"] . ';';
                $ketqua1 = $db->query($truyvan1);
                foreach ($ketqua1->fetchAll() as $dong1) {
                    array_push($arrMaPhim, $dong1["MAPHIM"]);   //thêm vào mảng
                }
            } else {
                if (strtotime($another_date) == $today && strtotime($another_time) > $time) {
                    $truyvan1 = 'SELECT MAPHIM,TENPHIM FROM movie WHERE MAPHIM = ' . $dong["MAPHIM"] . ';';
                    $ketqua1 = $db->query($truyvan1);
                    foreach ($ketqua1->fetchAll() as $dong1) {
                        array_push($arrMaPhim, $dong1["MAPHIM"]);
                    }
                }
            }
        }
    }
    $arrMaPhim = array_unique($arrMaPhim);//xóa trùng mã phim để k lặp lại

    foreach ($arrMaPhim as $key) { // duyệt mảng và xuất phim ra
        $truyvan2 = 'SELECT MAPHIM,TENPHIM FROM movie WHERE MAPHIM = ' . $key . ';';

        $ketqua2 = $db->query($truyvan2);
        foreach ($ketqua2->fetchAll() as $dong2) {
            echo "<option value='" . $dong2["MAPHIM"] . "'>" . $dong2["TENPHIM"] . " </option>";
        }
    }
}

;

//Show hình ảnh phim
function HienThiPhimAll()
{
    //172800
    $arrMaPhimNow = array(); //mảng chứa phim hiện tại
    $arrMaPhimFuture = array();// mảng chứa phim tương lai
    date_default_timezone_set('Asia/Ho_Chi_Minh'); // set time zone hcm
    $db = DB::getInstance(); // đối tượng kết nối csdl
    $today = date("Y-m-d"); // xét ngày hiện tại
    $today = strtotime($today); // lấy ra dãy số ngày hiện tại

    $time = strtotime(date("H:i")); // lấy ra chuỗi giờ hiện tại
    $truyvan = "SELECT * FROM movie";// select bảng phim
    $ketqua = $db->query($truyvan); // thực hiện query
    if ($ketqua) // nếu kết quả true
    {
        //xuất ra giao diện trang index
        foreach ($ketqua->fetchAll() as $dong) {
            $another_date = strtotime($dong["NGAYBDCHIEU"]);
            if ($another_date <= $today + 172800) // phim now
            {

                $truyvan1 = "SELECT * FROM schedule WHERE MAPHIM = " . $dong["MAPHIM"];
                $ketqua1 = $db->query($truyvan1);
                foreach ($ketqua1 as $dong1) {
                    # code...
                    $another_date1 = strtotime($dong1["NGAYCHIEU"]);
                    $another_time = strtotime($dong1["GIOCHIEU"]);


                    if ($another_date1 > $today) {
                        $truyvan1 = 'SELECT MAPHIM FROM movie WHERE MAPHIM = ' . $dong["MAPHIM"] . ';';
                        $ketqua1 = $db->query($truyvan1);
                        foreach ($ketqua1->fetchAll() as $dong1) {
                            array_push($arrMaPhimNow, $dong1["MAPHIM"]);
                        }
                    }

                }
            } else //phim future

            {
                $truyvan1 = "SELECT * FROM schedule WHERE MAPHIM = " . $dong["MAPHIM"];
                $ketqua1 = $db->query($truyvan1);
                foreach ($ketqua1 as $dong1) {
                    # code...
                    $another_date1 = strtotime($dong1["NGAYCHIEU"]);
                    $another_time = strtotime($dong1["GIOCHIEU"]);
                    if ($another_date1 >= $today) {

                        $truyvan1 = 'SELECT MAPHIM FROM movie WHERE MAPHIM = ' . $dong["MAPHIM"] . ';';
                        $ketqua1 = $db->query($truyvan1);
                        foreach ($ketqua1->fetchAll() as $dong1) {
                            array_push($arrMaPhimFuture, $dong1["MAPHIM"]);
                        }
                    }

                }
            }


        }
    }


    $arrMaPhimNow = array_unique($arrMaPhimNow);//mảng chứa phim đang chiếu
    $arrMaPhimFuture = array_unique($arrMaPhimFuture); //mảng chứa phim sắp chiêus
    //duyệt show phim
    foreach ($arrMaPhimNow as $key) {
        $truyvan2 = 'SELECT * FROM movie WHERE MAPHIM = ' . $key . ';';
        $kq = $db->query($truyvan2);
        foreach ($kq->fetchAll() as $dong) {
            echo '<li class="span4 mix now">
                            <div class="thumbnail">
                                <img src="../admin/public/img/' . $dong["IMAGE"] . '" alt="' . $dong["MAPHIM"] . '">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>' . "Tên phim: " . $dong["TENPHIM"] . '</h3>
                                <p>' . "Thời lượng: " . $dong["THOILUONG"] . "phút" . '</p>
                                <div class="mask">
                                <p style = "display :none;">' . $dong["MAPHIM"] . '</p>
                                 </div>
                        </li>';

        }
    }

    foreach ($arrMaPhimFuture as $key1) {
        $truyvan2 = 'SELECT * FROM movie WHERE MAPHIM = ' . $key1 . ';';
        $kq = $db->query($truyvan2);
        foreach ($kq->fetchAll() as $dong) {

            echo '<li class="span4 mix future">
                                   <div class="thumbnail">
                                <img src="../admin/public/img/' . $dong["IMAGE"] . '" alt="' . $dong["MAPHIM"] . '">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>' . "Tên phim: " . $dong["TENPHIM"] . '</h3>
                                <p >' . "Thời lượng: " . $dong["THOILUONG"] . "phút" . '</p>
                                <div class="mask">
                                <p style = "display :none;">' . $dong["MAPHIM"] . '</p>
                                 </div>
                                </li>';
        }
    }


}

;

//ajax?
//chạy slide indexx
function HienThiPhimSlide() //phim hiện trên slide
{
    $db = DB::getInstance();
    $truyvan = "SELECT * FROM movie WHERE ISSLIDE = '1'";
    $ketqua = $db->query($truyvan);

    if ($ketqua) {
        foreach ($ketqua->fetchAll() as $dong) {
            echo '<div class="da-slide">
                        <h2 class="fittext2">WELCOME TO CINEMA</h2>
                        <h4>' . $dong["TENPHIM"] . '</h4>
                        <p>' . $dong["MIEUTA"] . '</p>
                       
                        <div class="da-img">
                            <img src="../admin/public/img/' . $dong["IMAGE"] . '" width="320">
                        </div>
                        </div>';
        }
    }


}

;
?>


<script>
    //script gọi ajax các chức năng là các action hàm bên user_function.php
    //bắt lỗi chưa nhập thông tin
    $("#sl-ngaychieu").click(function () {
        $("#btn-datve").click(function () {

            $.ajax({
                url: "../user/user_function.php",
                type: "POST",
                //dataType: "html",
                data: {
                    action: "LoadManHinh"
                },
                success: function (data)//data trả về là echo
                {

                    window.location.href = 'datvebuoc2.php';
                }
            });
        });
    });


    //hàm tìm kiếm phim
    $("#search").click(function () {

        if ($("#txtsearch").val() != "") {
            var txtsearch = $("#txtsearch").val();
            $.ajax({
                url: "../user/user_function.php",
                type: "POST",
                //dataType: "html",
                data: {
                    action: "TimKiem",
                    txtsearch: txtsearch
                },
                success: function (data)//data trả về là echo
                {
                    window.location.href = data;
                    // console.log(data);
                }
            });
        }
        else {

        }

    });

    //hàm thoát ajax
    $("#btn-logout").click(function () {
        $.ajax({
            url: "../user/user_function.php",
            type: "POST",
            //dataType: "html",
            data: {
                action: "LogOut",

            },
            success: function (data)//data trả về là echo
            {
                window.location.href = "index.php";
            }
        });
    });


</script>

<?php
//log out thoát user
if (isset($_SESSION["loginuser"])) {
    echo '<script> $(".dropdown").show();</script>';
} else {
    echo '<script> $(".dropdown").hide();</script>';
}
?>
