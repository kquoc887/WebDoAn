<!DOCTYPE html>
<html>
 <?php
       include("header.html");      
        include("../libs/config.php");
       session_start();
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
                    <a  href="index.php" >
                        <img src="images/logo3.png" width="120" height="40" alt="Logo" />
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
                            if(isset($_SESSION["loginuser"]))
                            echo $_SESSION["loginuser"];
                            ?><span class="caret"></span></a>
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
        <div id="single-project">
                   <table class="table table-bordered" style=" font-size: 18px">
                    <?php
                    HienThiPhim();
                    ?>
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

</body>

</html>

<?php

//hiện thị kết quả tìm kiếm
function HienThiPhim()
{
    $db= DB::getInstance();
   
     foreach ($_SESSION["phimtimkiem"] as $phim) {        
        $truyvan =  "SELECT * FROM movie WHERE TENPHIM = '".$phim ."'";     
        $ketqua = $db->query($truyvan);

            foreach ($ketqua->fetchAll() as $dong) {
           echo'<tr>
           <td> <div class="span6">
                          <iframe  width="450" height="300" src="'.$dong["URL"].'" frameborder="0" allowfullscreen></iframe>
                        </div>
                   </td>
                   <td>     
                        <div class="span6" >
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3 style="color: black">Chi tiết phim</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info" >
                                    <div style="color: black">'.'Nước: '.$dong["TENPHIM"].'</div>
                                     <div style="color: black">'.'Ngày khởi chiếu: '.$dong["NGAYBDCHIEU"].'</div>
                                    <div style="color: black">'.'Nước: '.$dong["NUOC"].'</div>
                                    <div style="color: black">'.'Diễn viên: '.$dong["DIENVIEN"].'</div>
                                    <div style="color: black">'.'Miêu tả: '.$dong["MIEUTA"].'</div>
                                </div>
                        </div>
                    </td></tr>
                    ';                
                }
    }

}
?>
<script type="text/javascript">
    
     $("#btn-logout").click(function(){
             $.ajax({
                    url : "../user/user_function.php",
                    type : "POST",
                    //dataType: "html", 
                    data : {
                      action:"LogOut", //gọi ajax log out
                    
                    },
                    success: function(data)//data trả về là echo
                    {  
                      window.location.href= "index.php"; //thành công về lại trang index              
                    }
                    });
            });
     
</script>


<?php

//log out thoát tài khoản
if(isset($_SESSION["loginuser"]))
    echo '<script> $(".dropdown").show();</script>';
else
    echo '<script> $(".dropdown").hide();</script>';
?>