<!DOCTYPE html>
<html>
<?php
include("header.html");
include("../libs/constants.php");

include("PHPMailer/PHPMailer.php");
include("PHPMailer/Exception.php");
include("PHPMailer/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;

session_start();
?>
<head>
    <title>Trang Thông tin</title>
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

<body class="flat-blue login-page">
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
            </br></br>
            <!-- End main navigation -->
        </div>
    </div>
</div>
<div class="container">

    <div class="info-datve">
        <div>
            <?php
            echo "Mã đặt chỗ: " . base64_decode($_SESSION["madatcho"]);
            ?>
        </div>

        <div>
            <?php
            echo "Rạp: " . $_SESSION["tenrap"];
            ?>
        </div>

        <div>
            <?php
            echo "Mã Rạp: " . $_SESSION["marap"];
            ?>
        </div>

        <div>
            <?php
            echo "Tên phim: " . $_SESSION["tenphim"];
            ?>
        </div>
        <div>
            <?php
            echo "Ngày: " . $_SESSION["ngaychieu"] . "</br>";
            ?>
        </div>

        <div>
            <?php
            echo "Giờ: " . $_SESSION["suatchieu"];
            ?>
        </div>
        <div>
            Ghế:
            <?php
            $n = 0;
            foreach ($_SESSION["ghe"] as $ghe) {
                echo $ghe . " ";
                $n++;

            }
            echo "</br>";
            echo "Tiền Vé: " . ($_SESSION["giave"] * $n) . "đ";
            ?>
        </div>

        <div>
            <?php
            echo "Combo: " . $_SESSION["tencombo"];
            ?>
        </div>

        <div>
            <?php
            echo "SL Combo: " . $_SESSION["slcombo"];
            ?>
        </div>
        <div>
            <?php
            $n = 0;
            foreach ($_SESSION["ghe"] as $ghe) {
                $n++;
            }
            $total = ($_SESSION["slcombo"] * $_SESSION["giacombo"] + $_SESSION["giave"] * $n);
            echo "Tổng tiền: " . ($_SESSION["slcombo"] * $_SESSION["giacombo"] + $_SESSION["giave"] * $n);
            ?>
        </div>
    </div>

    <div id="paypal-button"></div>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        paypal.Button.render({
            <?php if(MODE == 'live') { ?>
            env: 'production',
            <?php } else {?>
            env: 'sandbox',
            <?php } ?>

            commit: true,

            client: {
                sandbox: '<?php echo PayPal_CLIENT_ID; ?>',
                production: '<?php echo PayPal_CLIENT_ID; ?>'
            },

            payment: function (data, actions) {

                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: {
                                    total: '<?php echo $total ?>',
                                    currency: '<?php echo CURRENCY; ?>'
                                }
                            }
                        ]
                    }
                });
            },

            onAuthorize: function (data, actions) {

                return actions.payment.execute().then(function () {
                    alert("Đặt vé thành công!");
                });
            }
        }, '#paypal-button');
    </script>


    <div>
        <button type="button" class="btn btn-success" id="btn-back"
                style="width: 350px ; height: 55px; margin-bottom:1px; margin-right:5px">Quay lại trang chủ
        </button>
    </div>

    <div><p id="result" style="color: red"></p></div>
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

<script type="text/javascript">
    $("#btn-back").click(function () {
        window.location.href = "index.php";
    });

</script>
