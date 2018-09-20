
<!--file xác nhận email-->
<!DOCTYPE html>
<html>
      <?php
           include("header.html");
          include("../libs/config.php");
      ?>
<head>
    <title>Trang Verify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="../admin/lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/lib/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/lib/css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/lib/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/lib/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../admin/lib/css/select2.min.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="../admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="../admin/css/themes/flat-blue.css">
</head>

<body class="flat-blue login-page">
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
                   </br></br>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
    <div class="container">
       <div class="alert alert-danger" role="alert">
          <strong>Bạn đăng kí thành công!!</strong>
          <?php
                UpdateUser();
          ?>
        </div>
    </div>
    <!-- Javascript Libs -->
    <script  src="../admin/lib/js/jquery.min.js"></script>
    <script  src="../admin/lib/js/bootstrap.min.js"></script>
    <script  src="../admin/lib/js/Chart.min.js"></script>
    <script  src="../admin/lib/js/bootstrap-switch.min.js"></script>
    <script  src="../admin/lib/js/jquery.matchHeight-min.js"></script>
    <script  src="../admin/lib/js/jquery.dataTables.min.js"></script>
    <script  src="../admin/lib/js/dataTables.bootstrap.min.js"></script>
    <script  src="../admin/lib/js/select2.full.min.js"></script>
    <script  src="../admin/lib/js/ace/ace.js"></script>
    <script  src="../admin/lib/js/ace/mode-html.js"></script>
    <script  src="../admin/lib/js/ace/theme-github.js"></script>
    <!-- Javascript -->
    <script type="text/javascript" src="../admin/js/app.js"></script>
</body>
</html>
<?php
function UpdateUser()
{
    $email = $_GET['Email'];
    $email = base64_encode($email);
    $activation_code = $_GET["activation_code"];
    if (isset($email) && isset($activation_code)) {
        $db = DB::getInstance();
        $truyvan = "SELECT * FROM users WHERE EMAIL = '" . $email . "';";
        $ketqua = $db->query($truyvan);
        if ($ketqua) {
            $truyvan1 = "UPDATE users SET remember_token = '" . $activation_code . "' WHERE EMAIL = '" . $email . "';";
            $ketqua1 = $db->query($truyvan1);
            if ($ketqua1) {
                echo "Đăng kí thành công!";

            } else {
                echo "Lỗi";
            }
        } else {
            echo " <script> $('#btn-datve').click(function(){
                        window.location.href='error.php';
                        }); </script>";
        }
    } else {
        echo " <script> $('#btn-datve').click(function(){
                    window.location.href='error.php';
                    }); </script>";
    }
}
?>