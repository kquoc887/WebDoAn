///////////////////////////////////Trang Index////////////////////////////////
//chon rap 
$("#sl-phim").change(function()
{
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
		success: function(data)//data trả về là echo
		{
			$("#sl-rap").empty(); // Xóa select cũ đễ k lặp lại
			$("#sl-rap").append(data);// thêm cái mới lại
			
		}
		
	});

});

//
$("#sl-rap").click(function()
{
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
		success: function(data)//data trả về là echo
		{
			$("#sl-ngaychieu").empty(); // Xóa select cũ đễ k lặp lại
			$("#sl-ngaychieu").append(data);// thêm cái mới lại
		}
			
	});
	
});

//
$("#sl-ngaychieu").click(function()
{
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
		success: function(data)//data trả về là echo
		{
			$("#sl-giochieu").empty(); // Xóa select cũ đễ k lặp lại
			$("#sl-giochieu").append(data);// thêm cái mới lại
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
		success: function(data)//data trả về là echo
		{
			$("#slidingDiv").text("");
			$("#slidingDiv").append(data);

		}
	});	
});
//b2.sang trang 2//
$(".mask").click(function(){
	var maphimbuoc1 = $(this).text(); 
	//alert(maphimbuoc1);
	$.ajax({
		url : "../user/user_function.php",
				type : "POST",
				//dataType: "html", 
				data : {
					action:"DatVeBuoc1",
					maphimbuoc1 : maphimbuoc1
				},
				success: function(data)//data trả về là echo
				{

				}
	});
});


//////////////////////////////////Trang đặt vé bước 2/////////////////////////////////
//click đặt vá sang bước 2
$("#btn-datve").click(function()
{

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
				action:"DatVeBuoc2",
				maphim : maphim,
				marap :marap,
				tenphim :tenphim,
				tenrap : tenrap,
				ngaychieu : ngaychieu,
				suatchieu : suatchieu
			},
			success: function(data)//data trả về là echo
			{
			}
	});
});

    $("#btn-datve").click(function(){

     $.ajax({
        url : "../user/user_function.php",
        type : "POST",
            //dataType: "html",
            data : {
              action:"LoadManHinh"
          },
            success: function(data)//data trả về là echo
            {

               window.location.href='datvebuoc2.php';
           }
       });
    });


//hàm tìm kiếm phim
$("#search").click(function(){

    if ($("#txtsearch").val()!= "" ) {
        var txtsearch = $("#txtsearch").val();
        $.ajax({
            url : "../user/user_function.php",
            type : "POST",
            //dataType: "html",
            data : {
              action:"TimKiem",
              txtsearch :txtsearch
          },
            success: function(data)//data trả về là echo
            {
                window.location.href = data;
              // console.log(data);
          }
      });
    }
});

//hàm thoát ajax
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


