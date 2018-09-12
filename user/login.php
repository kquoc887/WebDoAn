<!DOCTYPE html>
<html>
<?php
       include("header.html"); //import layout header
      
       ?>
<head>
    <title>Trang Login</title>
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
        <div class="login-box"
            <div>
                <div class="login-form row">
                    <div class="col-sm-12 text-center login-header">
                        <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                        <h4 class="login-title" style="color: black">Login</h4>
                    </div>
                    <div class="col-sm-12">
                        <div class="login-body">
                            <div class="progress hidden" id="login-progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    Log In...
                                </div>
                            </div>
                            <form name="Fr-dangnhap">
                                <div class="control">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" value="" id = "email"/>
                                </div>
                                <div class="control">
                                    <label>Password</label>
                                    <input type="password" class="form-control" value="" id = "password"/>
                                </div>
                                <div class="login-button text-center">
                                    <input type="button" class="btn btn-primary" id="btn-login" value="Login">
                                </div>
                            </form>
                        </div>

                         <div class="control">
                                    <label id ="info" style="color: red"></label>                               
                            </div>
                    </div>
                </div>
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
<!--validator bắt lỗi các text box-->
<script type="text/javascript">
    function validateForm() { //email
            var x = document.forms["Fr-dangnhap"]["email"].value;
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
                alert("Địa chỉ email không hợp lệ!!");
                return false;
            }
            else
              return true;
        }
    function validateTextBox()
    {
    
            var email = $("#email").val();
            var password = $("#password").val();
            if(email == "" || password == "")
            {
                alert("Không được để trống!");
                return false;
            }
            else
                return true;
    }


 $("#btn-login").click(function(){
        if(validateForm() && validateTextBox())
          {
           
            var email = $("#email").val();
            var password = $("#password").val();
            $.ajax({
                url : "../user/user_function.php",
                type : "POST",
                //dataType: "html", 
                data : {
                  action:"DangNhap",
                  email : email,
                  password: password  
              
            },
            success: function(data)//data trả về là echo
            {  
                var trim = $.trim(data);
                if(trim == "index.php")
                {
                    window.location.href = trim;
                     
                }
                else
                {
                    $("#info").empty();
                   $("#info").append(data);
                }
            }
            });
          } 
        });

</script>

