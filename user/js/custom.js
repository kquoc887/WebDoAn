$(document).ready(function () {
    ///////////////////////////////////Trang Index////////////////////////////////
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
                //data trả về là echo
                success: function (data) {
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
                //data trả về là echo
                success: function (data) {
                    window.location.href = data;
                    // console.log(data);
                }
            });
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
            //data trả về là echo
            success: function (data) {
                window.location.href = "index.php";
            }
        });
    });


//chon rap
    $("#sl-phim").change(function() {
        var maphim = $("#sl-phim :selected").val();
        //This = $this;
        //gọi ajax sang file function xủ lý
        $.ajax({
            url : "../user/user_function.php",
            type : "POST",
            data : {
                action:"XemRap",
                maphim : maphim
            },
            //data trả về là echo
            success: function(data) {
                // Xóa select cũ đễ k lặp lại
                $("#sl-rap").empty();
                // thêm cái mới lại
                $("#sl-rap").append(data);
            }

        });
    });

//
    $("#sl-rap").click(function() {
        var maphim = $("#sl-phim :selected").val();
        var marap = $("#sl-rap :selected").val();
        //This = $this;
        //gọi ajax sang file function xủ lý
        $.ajax({
            url : "../user/user_function.php",
            type : "POST",
            //dataType: "html",
            data : {
                action:"XemNgayChieu",
                maphim : maphim,
                marap : marap
            },
            //data trả về là echo
            success: function(data) {
                // Xóa select cũ đễ k lặp lại
                $("#sl-ngaychieu").empty();
                // thêm cái mới lại
                $("#sl-ngaychieu").append(data);
            }
        });
    });
//
    $("#sl-ngaychieu").click(function() {
        var maphim = $("#sl-phim :selected").val();
        var marap = $("#sl-rap :selected").val();
        var ngaychieu = $("#sl-ngaychieu :selected").val();
        //gọi ajax sang file function xủ lý
        $.ajax({
            url : "../user/user_function.php",
            type : "POST",
            data : {
                action:"XemGioChieu",
                maphim : maphim,
                marap : marap,
                ngaychieu : ngaychieu
            },
            //data trả về là echo
            success: function(data) {
                // Xóa select cũ đễ k lặp lại
                $("#sl-giochieu").empty();
                // thêm cái mới lại
                $("#sl-giochieu").append(data);
            }

        });
    });

///////////////////////////////////Trang Dat Ve buoc 1////////////////////////////////
//b1.lay chi tiet phim//

    $(".mask").click(function(){
        var maphimbuoc1 = $(this).text();
        //alert(maphimbuoc1);
        $.ajax({
            url : "../user/user_function.php",
            type : "POST",
            data : {
                action:"HienThiChiTietPhim",
                maphimbuoc1 : maphimbuoc1
            },
            success : function(data) {
                $("#slidingDiv").text("");
                $("#slidingDiv").append(data);
            }
        });
    });
//b2.sang trang 2//
    $(".mask").click(function() {
        var maphimbuoc1 = $(this).text();
        //alert(maphimbuoc1);
        $.ajax({
            url : "../user/user_function.php",
            type : "POST",
            //dataType: "html",
            data : {
                action :"DatVeBuoc1",
                maphimbuoc1 : maphimbuoc1
            },
            success: function(data){}
        });
    });


//////////////////////////////////Trang đặt vé bước 2/////////////////////////////////
//click đặt vá sang bước 2
    $("#btn-datve").click(function() {
        var maphim = $("#sl-phim :selected").val();
        var marap = $("#sl-rap :selected").val();
        var tenphim = $("#sl-phim :selected").text();
        var tenrap = $("#sl-rap :selected").text();
        var ngaychieu = $("#sl-ngaychieu :selected").text();
        var suatchieu = $("#sl-giochieu :selected").text();
        //This = $this;
        //gọi ajax sang file function xủ lý
        $.ajax({
            url : "../user/user_function.php",
            type : "POST",
            //dataType: "html",
            data : {
                action : "DatVeBuoc2",
                maphim : maphim,
                marap : marap,
                tenphim : tenphim,
                tenrap : tenrap,
                ngaychieu : ngaychieu,
                suatchieu : suatchieu
            },
            //data trả về là echo
            success: function(data) {}
        });
    });

///////////////////////////////////////////////JS của trang dangky.php///////////////////////////////////////////////////////////
//Xét validate
    function validateForm() { //email
        var x = document.forms["Fr-dangky"]["email"].value;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos < 1 || dotpos < atpos+2 || dotpos+2 >= x.length) {
            alert("Địa chỉ email không hợp lệ!!");
            return false;
        } else {
            return true;
        }
    }
    function validateTextBox() //textbox user & email
    {
        var user = $("#user").val();
        var email = $("#email").val();
        var password = $("#password").val();
        if (user == "" || email == "" || password == "") {
            alert("Không được để trống!");
            return false;
        } else {
            return true;
        }
    }

//button đăng ký thực hiện ajax bên file user_function
    $("#btn-dangky").click(function(){
        if (validateForm() && validateTextBox()) {
            var  user = $("#user").val();
            var email = $("#email").val();
            var password = $("#password").val();
            $.ajax({
                // file xử lý hàm
                url : "../user/user_function.php",
                //loại gửi dữ liệu
                type : "POST",
                //dataType: "html",
                data : {
                    // hàm thực hiện bên user_function
                    action:"DangKy",
                    // dữ liệu gửi đi
                    user: user,
                    email : email,
                    password: password
                },
                //data trả về là echo
                success: function(data) {
                    // xuất ra id info
                    $("#info").empty();
                    $("#info").append(data);
                    // window.location.href="login.php";
                }
            });
        }
    });

///////////////////////////////////////////////////JS của trang login.php/////////////////////////////////////////////////////////
//email
    function validateForm() {
        var x = document.forms["Fr-dangnhap"]["email"].value;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
            alert("Địa chỉ email không hợp lệ!!");
            return false;
        } else {
            return true;
        }
    }

    function validateTextBox() {
        var email = $("#email").val();
        var password = $("#password").val();
        if (email == "" || password == "") {
            alert("Không được để trống!");
            return false;
        } else {
            return true;
        }
    }


    $("#btn-login").click(function(){
        if (validateForm() && validateTextBox()) {
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
                //data trả về là echo
                success: function(data) {
                    var trim = $.trim(data);
                    if (trim == "index.php") {
                        window.location.href = trim;
                    } else {
                        $("#info").empty();
                        $("#info").append(data);
                    }
                }
            });
        }
    });
    ///////////////////////////////////////////////JS trang suaphim.php/////////////////////////////////////////////////////////////
//chọn ghế
//làm bt như bên index k chạy f gọi kiểu này => dynamic control
    $(document).on('click', '.btn-seat', function () {
        $(this).toggleClass('highlight');
        $(this).toggleClass('seat-disabled');
        var data = $(this).val();
        var strr = $("#ghe-buoc2").text();
        var str1 = strr.split(" ");
        for (var i = 0; i < str1.length; i++) {
            if (str1[i] === data) {
                data = strr.replace(data, "");
                $("#ghe-buoc2").text("");
            }
        }
        $("#ghe-buoc2").append(data + " ");
        // đếm số ghế
        var z = $(".highlight").length;
        var z1 = $("#soluongghecansua").text();
        z1 = z1.split(":");
        //nếu đủ số ghế thì dừng
        if (z == z1[1]) {
            $(".seat-disabled").attr('disabled', 'disabled');
            alert("đã đủ số ghế!");
        } else {
            $(".seat-disabled").removeAttr('disabled');
        }

    });


//xu ly lenh updata
    $("#btn-suaghe").click(function () {
        //mảng chứa tên ghế
        var strr = $("#ghe-buoc2").text();
        //tách chuỗi tên ghế
        var arrGhe = strr.split(" ");
        //đếm số ghế đã chọn
        var z = $(".highlight").length;
        if (z > 1) {
            $.ajax({
                url: "../user/user_function.php",
                type: "POST",
                //dataType: "html",
                data: {
                    action: "XacNhanSuaGhe",
                    arrGhe: arrGhe
                },
                //data trả về là echo
                success: function (data) {
                    if (data.includes("công")) {
                        window.location.href = "index.php";
                    } else {
                        window.location.href = "suaphim.php";
                    }
                }
            });
        } else {
            alert("Bạn chưa chọn đủ chỗ ngồi!");
        }
    });

//////////////////////////////////////////////////JS trang thongtin.php//////////////////////////////////////////////////////////
//chhuyen sang trang log out tai khoan
    $("#btn-logout").click(function () {
        $.ajax({
            url: "../user/user_function.php",
            type: "POST",
            //dataType: "html",
            data: {
                //thoát gọi sang ajax xử lý
                action: "LogOut",
            },
            //data trả về là echo
            success: function (data) {
                window.location.href = "index.php";
            }
        });
    });

//truyền data từ thongtin.php sang trang suaghe.php
    $(".btn-sua").click(function () {
        var str = $(this).val();
        var strSplit = str.split("/");
        var madatchosua = strSplit[0];
        var maphim = strSplit[1];
        var marap = strSplit[2];
        var ngaychieu = strSplit[3];
        var suatchieu = strSplit[4];
        $.ajax({
            url: "../user/user_function.php",
            type: "POST",
            data: {
                action: "SuaGhe",
                madatchosua: madatchosua,
                maphim: maphim,
                marap: marap,
                ngaychieu: ngaychieu,
                suatchieu: suatchieu
            },
            //data trả về là echo
            success: function (data) {
                window.location.href = "suaphim.php";
                //console.log(data);
            }
        });
    });

//load man hinh 2 để xác định ghế k bị lỗi session
    $(".btn-sua").click(function () {
        $.ajax({
            url: "../user/user_function.php",
            type: "POST",
            data: {
                action: "LoadManHinh2",
            },
            //data trả về là echo
            success: function (data) {
                // window.location.href= "suaphim.php";
            }
        });
    });

//truyền data từ thongtin.php sang trang xoaphim.php
    $("#btn-xacnhan").click(function () {
        var password = $("#password").val();
        var madatcho = $(".btn-xoa").val();
        $.ajax({
            url: "../user/user_function.php",
            type: "POST",
            //dataType: "html",
            data: {
                action: "DangNhapXoa",
                password: password,
                madatcho: madatcho
            },
            //data trả về là echo
            success: function (data) {
                alert(data);
                window.location.href = "thongtin.php";
            }
        });
    });

    ////////////////////////////////////////////////////JS của trang timkiem.php//////////////////////////////////////////////////////
    $("#btn-logout").click(function () {
        $.ajax({
            url: "../user/user_function.php",
            type: "POST",
            //dataType: "html",
            data: {//gọi ajax log out
                action: "LogOut",
            },
            //data trả về là echo
            success: function (data) {
                //thành công về lại trang index
                window.location.href = "index.php";
            }
        });
    });

/////////////////////////////////////////////////JS trang datvebuoc1.php////////////////////////////////////////////////////////////

// gọi redirect trang
    $("#btn-back").click(function () {
        window.location.href = 'index.php';
    });

// gọi ajax sang hàm user_function
//click button đặt vé
    $("#btn-datvebuoc2tu1").click(function () {
        var count = 0;
        var checkbox = document.getElementsByName("rd-mang[]");
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked === true) {
                var str = checkbox[i].id;
                var strSplit = str.split("/");
                var marap1 = strSplit[1];
                var ngaychieu = strSplit[2];
                var suatchieu = strSplit[3];
                //This = $this;
                //gọi ajax sang file function xủ lý
                $.ajax({
                    url: "../user/user_function.php",
                    type: "POST",
                    //dataType: "html",
                    data: {
                        action: "DatVeBuoc2Tu1",
                        marap1: marap1,
                        ngaychieu: ngaychieu,
                        suatchieu: suatchieu
                    },
                    //data trả về là echo
                    //console.log(data);
                    success: function (data) {}
                });
                count++;
            }
        }
        if (count == 0) {
            alert("Bạn phải chọn lịch chiếu!");
        }
    });

// hàm load ghế bên đặt vé
    $("#btn-datvebuoc2tu1").click(function () {
        var count = 0;
        var checkbox = document.getElementsByName("rd-mang[]");
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked === true) {
                $.ajax({
                    url: "../user/user_function.php",
                    type: "POST",
                    //dataType: "html",
                    data: {
                        action: "LoadManHinh1"
                    },
                    //data trả về là echo
                    success: function (data) {
                        window.location.href = 'datvebuoc2.php';
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
    $("#btn-logout").click(function () {
        $.ajax({
            url: "../user/user_function.php",
            type: "POST",
            //dataType: "html",
            data: {
                action: "LogOut",

            },
            //data trả về là echo
            success: function (data) {
                window.location.href = "index.php";
            }
        });
    });

//////////////////////////////////////////////////////////JS trang datvebuoc2.php//////////////////////////////////////////////////////////////////
//chọn ghế
    $(document).on('click', '.btn-seat', function () {
        //tô màu và xóa tô màu
        $(this).toggleClass('highlight');
        // cấm chọn khi đã đủ 10 ghế
        $(this).toggleClass('seat-disabled');
        //dữ liệu ghế
        var data = $(this).val();
        // chuỗi tên các ghế
        var strr = $("#ghe-buoc2").text();
        // cắt chuỗi
        var str1 = strr.split(" ");
        // đếm ghế
        var z = 0;
        //duyệt các ghế
        for (var i = 0; i < str1.length; i++) {
            if (str1[i] === data) {
                //thêm xóa tên ghế khi chọn button ghế
                data = strr.replace(data, "");
                $("#ghe-buoc2").text("");
            }
        }
        $("#ghe-buoc2").append(data + " ");
        //đếm số ghế đã chọn
        var z = $(".highlight").length;
        // đủ 10 ghế
        if (z == 10) {
            $(".seat-disabled").attr('disabled', 'disabled');
            alert("Bạn chỉ được đặt tối đa 10 ghế");
        } else {
            $(".seat-disabled").removeAttr('disabled');
        }

    });
// click button thanh toán và thực hiện hàm sau
    $("#btn-thanhtoan").click(function () {
        if (validateForm() && validateCheckBox()) {
            //dữ liệu
            var z = 0;
            var strr = $("#ghe-buoc2").text();
            var email = $("#email").val();
            var arrGhe = strr.split(" ");
            var slcombo = $("#sl-soluong").val();
            var macombo = $("#sl-combo").val();
            //đếm số ghế
            for (var i = 0; i < arrGhe.length; i++) {
                if (arrGhe[i] != "" && arrGhe[i] != " " && arrGhe[i] != null && arrGhe[i] != "\n") {
                    z++;
                }
            }
            if (z > 1) {
                //gọi ajax
                $.ajax({
                    url: "../user/user_function.php",
                    type: "POST",
                    //dataType: "html",
                    data: {
                        action: "ThanhToan",
                        email: email,
                        arrGhe: arrGhe,
                        slcombo: slcombo,
                        macombo: macombo

                    },
                    success: function (data)//data trả về là echo
                    {
                        window.location.href = "payment.php";
                        // console.log(data);
                    }
                });
            }
            else {
                alert("Bạn chưa chọn chỗ ngồi!");

            }
        }
    });

//bắt lỗi các text box cho phù hợp
    function validateForm() { //email
        var x = document.forms["Fr-thanhtoan"]["email"].value;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
            alert("Địa chỉ email không hợp lệ!!");
            return false;
        } else {
            return true;
        }
    }

    function validateCheckBox() {
        if (($("input[name*=radio1]:checked").length) <= 0) {
            alert("Bạn chưa chọn hình thức thanh toán");
            return false;
        }
        return true;
    }
//log out khi đăng nhập
    $("#btn-logout").click(function () {
        $.ajax({
            url: "../user/user_function.php",
            type: "POST",
            //dataType: "html",
            data: {
                action: "LogOut",
            },
            //data trả về là echo
            success: function (data) {
                window.location.href = "index.php";
            }
        });
    });
});