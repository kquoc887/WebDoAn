<!--chọn ghế từ các image-->
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../libs/lib/css/checkbox3.min.css">
<link rel="stylesheet" type="text/css" href="css/style_custome.css">
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
            <a href="index.php" class="brand">
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
                    <li class="active" style="margin-top: 25px;
                    margin-right: 550px;color: white;">Chọn ghế
                    </li>
                </ul>
            </div>
            <!-- End main navigation -->
        </div><!--end container-->
    </div>

    <div style="float: right; margin-right:100px ;color: white; font-size:35px;margin-top: -20px; ">
        <ul>
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white;" >
                    <?php
                    if (isset($_SESSION["loginuser"])) {
                        echo $_SESSION["loginuser"];
                    }
                    ?>
                    <span class="caret"></span></a>
                <ul class="dropdown-menu animated fadeInDown" style="width: 200px;>
                                <li class=" profile-img">
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


<div class="section secondary-section " id="portfolio">
    <div class="triangle"></div>
    <div class="container">
        <div id="col-right" style="float: right; width: 40%  border: 1px solid;
                    padding-left: 10px;
                    margin-top: 150px;
                    box-shadow: 0px 1px 5px #888888;">
            <div class="card">
                <div> <!--info-->
                    <div id="gia-buoc2">
                        <!--code bên ajax-->
                        <?php
                        echo "Giá vé: " . $_SESSION["giave"] . "đ/vé";
                        ?>
                    </div>
                    <div id="phim-buoc2">
                        <?php
                        echo "Phim: " . $_SESSION["tenphim"];
                        ?>
                        <!--code bên ajax-->
                    </div>
                    <div id="rap-buoc2">
                        <?php
                        echo "Rạp: " . $_SESSION["tenrap"];
                        ?>
                        <!--code bên ajax-->
                    </div>
                    <div id="ngaygio-buoc2">
                        <?php
                        echo "Ngày: " . $_SESSION["ngaychieu"] . "</br>";
                        echo "Giờ: " . $_SESSION["suatchieu"];
                        ?>
                        <!--code bên ajax-->
                    </div>
                    <div id="ghe-buoc2" style="color: red">
                        Ghế:
                        <!--code bên ajax-->
                    </div>
                </div>
                <form name="Fr-thanhtoan">
                    <?php
                    if (isset($_SESSION["loginuser"])) {
                        echo '
                            <div class="control" style="text-align: center; display:none">
                                <label style="color: black ; ">Email:</label>
                                <input type="text" class="form-control" value="' . $_SESSION["loginemail"] . '" id="email" name = "email"/>
                            </div>';
                    } else {
                        echo '
                            <div class="control" style="text-align: center;">
                                <label style="color: black ; ">Email:</label>
                                <input type="text" class="form-control" value="" id="email" name = "email"/>
                            </div>';
                    }
                    ?>
                    <div>
                        <label>Chọn combo</label>
                        <select id="sl-combo">
                            <?php
                            $db = DB::getInstance();
                            $query = 'SELECT * FROM combo';
                            $ketqua = $db->query($query);
                            foreach ($ketqua->fetchAll() as $dong) {
                                echo "<option value='" . $dong["MACOMBO"] . "'>" . $dong["TENCOMBO"] . " </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label>Chọn số lượng</label>
                        <select id="sl-soluong">
                            <?php
                            for ($i = 0; $i <= 10; $i++) {
                                echo "<option value='" . $i . "'>" . $i . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    </br>
                    <label style="color: black; text-align: center;font-size: 18px; "> Hình thức thanh toán</label>
                    </br>
                    <div class="radio3">
                        <input type="radio" id="radio1" name="radio1" value="rd-thanhtoanthe">
                        <label for="radio1">
                            Thẻ ATM
                        </label>
                    </div>


                    <div class="radio3">
                        <input type="radio" id="radio2" name="radio1" value="rd-thanhtoanquacong">
                        <label for="radio2">
                            Thông qua cổng thanh toán
                        </label>
                    </div>
                    <div>
                        <button type="button" class="btn btn-success" id="btn-thanhtoan"
                                style="width: 350px ; height: 55px; margin-bottom:1px; margin-right:5px">Thanh toán
                        </button>
                    </div>
                </form>

            </div>
        </div><!--end right-->

        <div id="col-left" style="width: 65% ">
            <div id="phim-buoc2">
                <!--code bên ajax-->
                <?php
                echo $_SESSION["tenphim"];
                ?>
            </div>
            <div id="gio-buoc2">
                <!--
                  ôpcode bên ajax-->
            </div>
            <hr style="color: black ; border:8px solid">
            <h4 style="text-align: center; color: black ">Màn hình</h4>
            </br>
            <!--day button chon ghe-->
            <div style="padding-left: 100px">
                <?php
                $seat = array("A", "B", "C", "D", "E", "F", "G", "H", " J", "K");
                $classSeat = "btn-seat seat-disabled";
                for ($i = 0; $i < 10; $i++) {
                    echo "<span style=" . '"' . "margin-right:20px;" . '">' . $seat[$i] . "</span>";
                    echo "<span>";
                    for ($j = 0; $j < 9; $j++) {
                        if (isset($_SESSION["ghesuccess"])) {
                            foreach ($_SESSION["ghesuccess"] as $ghe1) {
                                if ($seat[$i] . ($j + 1) == $ghe1) {
                                    $classSeat = "btn-seatdisabled";
                                    break;
                                } else {
                                    $classSeat = "btn-seat seat-disabled";
                                }
                            }
                            echo "<button class = '" . $classSeat . "' value=" . $seat[$i] . ($j + 1) . "" . " style=" . '"' . "width:40px ;height: 40px ;margin:5px ;border: 10px; border-radius: 3px;" . '"' . "></button>";
                        } else {
                            echo "<button class = 'btn-seat seat-disabled' value=" . $seat[$i] . ($j + 1) . "" . " style=" . '"' . "width:40px ;height: 40px ;margin:5px ;border: 10px; border-radius: 3px;" . '"' . "></button>";
                        }
                    }
                    echo "</span>";
                    echo "</br>";
                }
                echo "</br>";
                echo "<button class = 'btn-seatdisabled' style=" . '"' . "width:40px ;height: 40px ;margin-left:50px ; padding-left: 20px;border: 10px; border-radius: 3px;" . '"' . "></button>";
                echo " Ghế đã có người chọn.";
                echo "<button style=" . '"' . "width:40px ;height: 40px ;margin-left:50px ; padding-left: 20px;border: 10px; border-radius: 3px; background-color:gray" . '"' . "></button>";
                echo " Ghế có thể chọn.";
                ?>
            </div>
        </div><!--end left-->

        <div class="triangle" style="margin-top: 40px"></div>
    </div> <!--end container-->
</div>
</body>
</html>
<?php
include("footer.html");
?>


<?php
//login
if (isset($_SESSION["loginuser"]))
    echo '<script> $(".dropdown").show();</script>';
else
    echo '<script> $(".dropdown").hide();</script>';
?>
