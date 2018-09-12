<?php
//import file config kết nối database
include("../libs/config.php");
include("PHPMailer/PHPMailer.php");
include("PHPMailer/Exception.php");
include("PHPMailer/SMTP.php");
use PHPMailer\PHPMailer\PHPMailer;

$ham = $_POST["action"];// biến action bên phía client gọi ajax sang bên này 
//thực hiện

switch ($ham) {
	//Phần drop down chọn phiim
	case 'XemRap'://chọn tên rạp sau khi chọn tên phim
		XemRap(); //hàm thực hiện
		break;
	case 'XemNgayChieu': // chọn ngày chiếu phim
		XemNgayChieu();
		break;
	case 'XemGioChieu': //chọn giờ chiếu cho phim
		XemGioChieu();
		break;
	//end phần drop down chọn phim

	case 'HienThiChiTietPhim':
		HienThiChiTietPhim();
		break;

	// Phần đặt vé 
	case 'DatVeBuoc1': // chọn ghế hiện sơ đồ ghế
		DatVeBuoc1();
		break;
	case 'DatVeBuoc2':
		DatVeBuoc2();
		break;
	case 'DatVeBuoc2Tu1':
		DatVeBuoc2Tu1();
		break;
	case 'ThanhToan': //button thanh toán
		ThanhToan();
		break;
	case 'LoadManHinh': //load màn hình sau khi có ghế đã đặt
		LoadManHinh();
		break;
	case 'LoadManHinh1':
		LoadManHinh1();
		break;
	case 'LoadManHinh2':
		LoadManHinh2();
		break;
	case 'DangKy':
		DangKy();
		break;
	case 'DangNhap':
		DangNhap();
		break;
	case 'TimKiem':
		TimKiem();
		break;
	case 'LogOut':
		LogOut();
		break;
	case 'PayPal':
		PayPal();
		break;
	case 'DangNhapXoa':
		DangNhapXoa();
		break;
	case 'SuaGhe':
		SuaGhe();
		break;
	case 'XacNhanSuaGhe':
		XacNhanSuaGhe();
		break;
	default:
		# code...
		break;
}

/////////////TRANG INDEX///////////
function XemRap()
{

		date_default_timezone_set('Asia/Ho_Chi_Minh'); //set timezone là tphcm
        $today = date("Y-m-d"); // set định dạng ngày tháng năm/tháng/ngày
        $today = strtotime($today); // lấy ngày hiện tại
        $time = strtotime(date("H:i"));// lấy giờ hiện taị
        $arrMaRap = array(); // array chứa mã rạp

		$maphim = $_POST["maphim"]; // biến nhận được bên trang index gửi sang
		$db= DB::getInstance(); // khởi tạo đối tượng kết nối database
	    $loi = "Lỗi trong quá trình xem dữ liệu rạp "; // string lỗi xuất ra
    
        if($maphim == null) // trường hợp chưa chọn mã phim
        {
            //chuyển sang trang thông báo lỗi
             echo " <script> $('#btn-datve').click(function(){
       			 	window.location.href='error.php';
       				}); </script>";
       	}       
        else // trường hợp chọn r 
        {
        	/// thực hiện truy vấn trong database với các câu lệnh where select
     	 	$truyvan =  "SELECT DISTINCT rap.TENRAP , rap.MARAP , schedule.* FROM rap ,schedule WHERE rap.MARAP = schedule.MARAP and schedule.MAPHIM =".$maphim;
      		$ketqua = $db->query($truyvan); // thực hiện câu query
			if($ketqua) //nếu có kết quả trả về true
			      {
			      	foreach ($ketqua->fetchAll() as $dong) {//duyệt từng dòng cho vào mảng

			      		//if(strtotime($dong["NGAYCHIEU"]) >= $today )
			      			array_push($arrMaRap, $dong["MARAP"]); 
			      	}

			    $arrMaRap = array_unique($arrMaRap); // xóa trùng
                foreach ($arrMaRap as $key ) { // duyệt và xuất ra giao diện
                $truyvan2 ='SELECT MARAP,TENRAP FROM rap WHERE MARAP = '.$key.';';

                 $ketqua2 = $db->query($truyvan2); // tạo option cho select
                             foreach ($ketqua2->fetchAll() as $dong2) {   
                                echo "<option value='".$dong2["MARAP"]."'>".$dong2["TENRAP"]." </option>";
                             }
                }
			}


			else // ngược lại cho ra trang báo lỗi
			{
			      echo " <script> $('#btn-datve').click(function(){
       			 	window.location.href='error.php';
       				}); </script>";
			}
		}	
};//end function xrap
	function XemNgayChieu() //chọn giờ
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = date("Y-m-d");
        $today = strtotime($today);
        $time = strtotime(date("H:i"));
        $arrNgayChieu = array();

		$maphim = $_POST["maphim"];
		$marap = $_POST["marap"];
		$db= DB::getInstance();
    	$loi = "Lỗi trong quá trình xem dữ liệu ngay chieu ";
    
        if($maphim == null && $marap==null)
        {
             echo " <script> $('#btn-datve').click(function(){
       			 	window.location.href='error.php';
       				}); </script>";
        }
        else
        {
     	 	$truyvan =  "SELECT NGAYCHIEU FROM schedule WHERE MARAP = ". $marap ." AND MAPHIM = ". $maphim ;
      		$ketqua = $db->query($truyvan);
			      if($ketqua)
			      {
			      	foreach ($ketqua->fetchAll() as $dong) {
			      		//if(strtotime($dong["NGAYCHIEU"]) >= $today)
			      			array_push($arrNgayChieu, $dong["NGAYCHIEU"]); 		      	
			      	}
			      			$arrNgayChieu = array_unique($arrNgayChieu);
			                foreach ($arrNgayChieu as $key ) {
			                // $truyvan2 ='SELECT NGAYCHIEU  FROM schedule WHERE NGAYCHIEU = '.$key.';';
			                //  $ketqua2 = $db->query($truyvan2);
                   //           foreach ($ketqua2->fetchAll() as $dong2) {   
                                echo "<option value='".$key."'>".$key." </option>";
                             //}
			      }
			  	 }
			      else
			      {
			      echo " <script> $('#btn-datve').click(function(){
       			 	window.location.href='error.php';
       				}); </script>";
			      }
		}
	};

//tương tự 2 hàm trên
	function XemGioChieu()
	{
		$arrGioChieu = array();
		$maphim = $_POST["maphim"];
		$marap = $_POST["marap"];
		$ngaychieu = $_POST["ngaychieu"];
		$db= DB::getInstance();
    	$loi = "Lỗi trong quá trình xem dữ liệu ngay chieu ";
    
        if($maphim == null && $marap==null && $ngaychieu==null )
        {
           echo " <script> $('#btn-datve').click(function(){
       			 	window.location.href='error.php';
       				}); </script>";
       	}
        else
        {
     	 	$truyvan =  "SELECT GIOCHIEU  FROM schedule WHERE MARAP = ". $marap ." AND MAPHIM = ". $maphim . " AND NGAYCHIEU = ".'"'.$ngaychieu.'"';
      		$ketqua = $db->query($truyvan);
      		      // echo($truyvan);
			      if($ketqua)
			      {foreach ($ketqua->fetchAll() as $dong) {
			      		//if(strtotime($dong["NGAYCHIEU"]) >= $today)
			      			array_push($arrGioChieu, $dong["GIOCHIEU"]); 		      	
			      	}
			      			$arrGioChieu = array_unique($arrGioChieu);
			                foreach ($arrGioChieu as $key ) {
			                 echo "<option value='".$key."'>".$key." </option>";
                             }
			      }
			  		
			      else
			      {
			      	echo " <script> $('#btn-datve').click(function(){
       			 	window.location.href='error.php';
       				}); </script>";
			      }
		}
	};//end function Xem gio chieu

/////////////TRANG ĐẶT VÉ BƯỚC 1///////////

//b1
function HienThiChiTietPhim()
{
	 	$maphim = $_POST["maphimbuoc1"]; // biến được post từ trang index khi gọi ajax

		$db= DB::getInstance(); // tạo đối tượng kết nối databse
		if($maphim!=null) // trường hợp gửi dữ liệu thất bại
		{
	        $truyvan =  "select * from movie WHERE MAPHIM = ".$maphim;
	        $ketqua = $db->query($truyvan); //thực hiện câu query
	       
	        if($ketqua) //xuất ra giao diện
	        {       	
	        	foreach ($ketqua->fetchAll() as $dong) {
	        		 echo '<div class="span6">
                            <iframe  width="530" height="370" src="'.$dong["URL"].'" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Chi tiết phim</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Phim: </span> <span class = "chitiettenphim" style="color:white" >'.$dong[1].' </span></div>
                                    <div>
                                        <span>Ngày khởi chiếu: </span><span style="color:white"> '.$dong[8].'</span></div>
                                    <div>
                                        <span>Nước: </span> <span style="color:white">'.$dong[6].' </span></div>
                                    <div>
                                        <span>Diễn viên: </span><span style="color:white">'."</br>".$dong[4].' </span></div>
                                      <div> <p style = "display: none">'.$dong["MAPHIM"].'</></div>
                                </div>
                                <p style="color:white" id = "mieuta">'.$dong[7].'</p>
                              
                                <a href="datvebuoc1.php" class="da-link button" id = "btn-datvebuoc1">Đặt vé</a>
                            </div>
                        </div>';  
                    }
                         
             	}
     	 }
         else
         {
         	echo "Lỗi";
         }
}
//b2
function DatVeBuoc1() // tạo biến session chọn phim
{
	session_start();
	$maphimbuoc1 = $_POST["maphimbuoc1"];
	        		echo  $_SESSION["maphimbuoc1"] = $maphimbuoc1;
	
};//end function datvebuoc1


function DatVeBuoc2Tu1()
{		
		
		session_start();
		$maphim = $_SESSION["maphimbuoc1"]; // mã phim
		$marap = $_POST["marap1"]; // mã rạp 
		$ngaychieu = $_POST["ngaychieu"]; // ngày chiếu
		$suatchieu = $_POST["suatchieu"]; // suất chiếu
			// bỏ khoảng trắng nếu có
		$maphim = trim($maphim);
		$marap = trim($marap);
		$ngaychieu = trim($ngaychieu);
		$suatchieu = trim($suatchieu);
		
		$db= DB::getInstance(); //tạo đối tượng kết nối csdl

		if($maphim!=null && $marap!=null && $ngaychieu!=null && $suatchieu!=null)
		{
			// thực hiện truy vấn trong csdl
			$truyvan =  "select PRICE from schedule WHERE MAPHIM = '".$maphim . "' AND MARAP = '".$marap . "' AND NGAYCHIEU = '".$ngaychieu . "' AND GIOCHIEU = '".$suatchieu."' ;";
			$ketqua = $db->query($truyvan);
			
			if($ketqua)
		        {
		        	foreach ($ketqua->fetchAll() as $dong) {
		        		echo  $_SESSION["giave"] = $dong["PRICE"]; //sesion giá phim
		        	}   	
		        }
	    }
	    else
	    {
	    	echo "Lỗi";
	    }


		if($maphim!=null)
		{
			$truyvan =  "select TENPHIM from movie WHERE MAPHIM = ".$maphim;
			$ketqua = $db->query($truyvan);
			if($ketqua)
		        {
		        	foreach ($ketqua->fetchAll() as $dong) {
		        		echo  $_SESSION["tenphim"] = $dong["TENPHIM"]; //sesion tên phim
		        	}   	
		        }
	    }
	    else
	    {
	    	echo "Lỗi";
	    }

	    if($marap!=null)
		{
			$truyvan =  "select TENRAP from rap WHERE MARAP = ".$marap;
			$ketqua = $db->query($truyvan);	
			if($ketqua)
		        {
		        	foreach ($ketqua->fetchAll() as $dong) {
		        		echo  $_SESSION["tenrap"] = $dong["TENRAP"];//session tên rạp
		        	}   	
		        }
	    }
	    else
	    {
	    	echo "Lỗi";
	    }
	    echo $_SESSION["marap"]= $marap; //sesion mã rạp
    	echo $_SESSION["maphim"] = $maphim; // session mã phim
    	echo $_SESSION["ngaychieu"] = $ngaychieu; //session ngày chiếu
    	echo $_SESSION["suatchieu"] = $suatchieu; //sesion suất chiếu


};//end function datvebuoc2
/////////////TRANG ĐẶT VÉ BƯỚC 2///////////

//tương tự như trên
function DatVeBuoc2()
{
		session_start();
		$maphim = $_POST["maphim"];
		$tenphim = $_POST["tenphim"];
		$tenrap = $_POST["tenrap"];
		$ngaychieu = $_POST["ngaychieu"];
		$suatchieu = $_POST["suatchieu"];
		$marap = $_POST["marap"];

		$maphim = trim($maphim);
		$tenphim = trim($tenphim);
		$marap = trim($marap);
		$ngaychieu = trim($ngaychieu);
		$suatchieu = trim($suatchieu);

    	//if($maphim != "Phim" && $marap != "Rạp" && $ngaychieu!="Ngày xem" && $suatchieu!= "Suất chiếu")
    	echo $_SESSION["maphim"] = $maphim;
    	echo $_SESSION["tenphim"] = $tenphim;
    	echo $_SESSION["tenrap"] = $tenrap;
    	echo $_SESSION["ngaychieu"] = $ngaychieu;
    	echo $_SESSION["suatchieu"] = $suatchieu;
    	echo $_SESSION["marap"]= $marap;

    	$db= DB::getInstance(); 

		if($maphim!=null && $marap!=null && $ngaychieu!=null && $suatchieu!=null)
		{
			$truyvan =  "select PRICE from schedule WHERE MAPHIM = '".$maphim . "' AND MARAP = '".$marap . "' AND NGAYCHIEU = '".$ngaychieu . "' AND GIOCHIEU = '".$suatchieu."' ;";
			$ketqua = $db->query($truyvan);
			
			if($ketqua)
		        {
		        	foreach ($ketqua->fetchAll() as $dong) {
		        		echo  $_SESSION["giave"] = $dong["PRICE"];
		        	}   	
		        }
	    }
	    else
	    {
	    	echo "Lỗi";
	    }

};//end function datvebuoc2

//datvebuoc2
function ThanhToan()
{
		session_start();
		//$madatcho = $_POST["madatcho"];
        $arrGhe = $_POST["arrGhe"];
        $email =  $_POST["email"];
        $maphim = $_SESSION["maphim"];
        $marap = $_SESSION["marap"];
        
        $_SESSION["macombo"] = $_POST["macombo"];
        $_SESSION["slcombo"] = $_POST["slcombo"];

        //Thêm dữ liệu vào database
        $arrGhe1 = array();
    	$num =0;
    	$db= DB::getInstance();
        $truyvan ='SELECT MADATCHO FROM reserve'; 
        $ketqua = $db->query($truyvan);

           foreach ($ketqua->fetchAll() as $dong) {
                $z = base64_decode($dong["MADATCHO"]); // giải mã để so sánh
                if($z>$num)
                	$num =$z;
              }   
                 $madatcho = $num+1;              
                 $madatcho = base64_encode($madatcho);//mã hóa mã đặt chỗ
                 $_SESSION["madatcho"]  = $madatcho; 

                 //thêm vào bảng chi tiết đặt chỗ
                 $x='INSERT INTO reserve( MADATCHO,EMAIL,MAPHIM,MARAP,NGAYDAT,GIODAT,MACOMBO,SOLUONG) VALUES ("'.$madatcho.'","'.$email.'",'. $maphim.','.$marap.',"'.$_SESSION["ngaychieu"].'","'.$_SESSION["suatchieu"].'","'.$_SESSION["macombo"]. '","'.$_SESSION["slcombo"].'");';
                 
                      $db->query($x);
                        if(isset($_SESSION["loginid"])){
                        $x1 = 'INSERT INTO lichsu(id,MADATCHO) VALUES ("'.$_SESSION["loginid"].'","'.$madatcho.'");
                        ';
                        $db->query($x1);
                      }
         
         //thêm ghế vào bảng đặt chỗ và ghế để có thể truy xuất số ghế
          foreach($arrGhe as $Ghe)
                {
                    if($Ghe!="" && $Ghe!=" " && $Ghe!=null && $Ghe!="\n" && $Ghe!="Ghế:" )
                    {   

                       $x2 = 'INSERT INTO datchovaghe(MADATCHO,GHE) VALUES("'.$madatcho .'"	,"'.$Ghe.'");' ;
                       $db->query($x2);
                       array_push($arrGhe1, $Ghe);
                    }
                }
           $_SESSION["ghe"] = $arrGhe1; //payment.

          

          $query = 'SELECT TENCOMBO ,GIACOMBO FROM combo WHERE MACOMBO = "'.$_POST["macombo"].'";';
          $ketqua1 = $db->query($query);

           foreach ($ketqua1->fetchAll() as $dong) {
            $_SESSION["tencombo"] = $dong["TENCOMBO"];
            $_SESSION["giacombo"] = $dong["GIACOMBO"];
           }




           //gửi mail xác nhận

           		$mail = new PHPMailer(true);

           		$mail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
					)
					);
       			$mail->SMTPDebug = 2;                                 // Enable verbose debug output
			    $mail->isSMTP();                                      // Set mailer to use SMTP
			    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			    $mail->SMTPAuth = true;                               // Enable SMTP authentication
			    $mail->Username = 'nttpnttp1@gmail.com';                 // SMTP username
			    $mail->Password = 'thuphuong';                           // SMTP password
			    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` tls also accepted
			    $mail->Port = 587;    

       			

       			$mail->setFrom('nttpnttp1@gmail.com');
	       		$mail->addAddress($email);
	       		$mail->Subject="Thong tin dat ve.";
	       		$mail->isHTML(true);
	       		$mail->Body="Mã Phim: ".$_SESSION["maphim"]."<br>
	       		Mã Rạp: ".$marap."<br>
	       		Mã Combo: ".$_SESSION["tencombo"]."<br>
	       		Số lượng combo: ".$_SESSION["slcombo"]."<br>
				Số lượng ghế đặt: ".count($arrGhe1)."<br>
	       		";
  		
       		     if($mail->send())
	       		{
	       			echo "Đặt ghế thành công";
	       		}
	       		else
	       		{
	       			echo "Đặt ghế thất bại!";
	       		}

};

//index

//hàm giúp load ghế đã được đặt hay chưa
function LoadManHinh()
{	
		session_start();//khởi tạo session
		//các biến session như trên
		$arrGheSuccess = array(); //array lưu ghế đã được đặt
	 	$maphim = $_SESSION["maphim"];
        $marap = $_SESSION["marap"];
        $ngaychieu = $_SESSION["ngaychieu"];
        $suatchieu = $_SESSION["suatchieu"];
        $ngaychieu = trim($ngaychieu);
        $suatchieu =trim($suatchieu);
      
		$db= DB::getInstance();
		//truy xuất trong bảng reserve để lấy mã đặt chỗ
		$truyvan = 'SELECT MADATCHO FROM reserve WHERE MAPHIM = "'.$maphim.'" AND MARAP ="'.$marap.'" AND NGAYDAT="'.$ngaychieu.'" AND GIODAT ="'.$suatchieu.'";';

		$ketqua = $db->query($truyvan);
		foreach ($ketqua->fetchAll() as $dong) {
				// từ mã đặt chỗ có ở trên duyệt các ghế
			$truyvan1 = 'SELECT GHE FROM datchovaghe WHERE MADATCHO = "'.$dong["MADATCHO"].'"';

			$ketqua1 = $db->query($truyvan1);

			foreach ($ketqua1->fetchAll() as $dong1) {
				//push các ghế đã đặt vào mảng để trả lại cho index xử lý
			array_push($arrGheSuccess,$dong1["GHE"]);

				}
           }
				echo $_SESSION["ghesuccess"] = $arrGheSuccess;
	}
//index
	//giống như trên vì tạo session mới nên f tạo hàm mới không bị mất biến sesion
 function LoadManHinh1()
{	
		session_start();
		$arrGheSuccess = array();
	 	$maphim = $_SESSION["maphim"];
        $marap = $_SESSION["marap"];
        $ngaychieu = $_SESSION["ngaychieu"];
        $suatchieu = $_SESSION["suatchieu"];
        $ngaychieu = trim($ngaychieu);
        $suatchieu =trim($suatchieu);
     	 $maphim = trim($maphim);
		$db= DB::getInstance();
		$truyvan = 'SELECT MADATCHO FROM reserve WHERE MAPHIM = "'.$maphim.'" AND MARAP ="'.$marap.'" AND NGAYDAT="'.$ngaychieu.'" AND GIODAT ="'.$suatchieu.'";';
		
		$ketqua = $db->query($truyvan);
		foreach ($ketqua->fetchAll() as $dong) {

			$truyvan1 = 'SELECT GHE FROM datchovaghe WHERE MADATCHO = "'.$dong["MADATCHO"].'"';

			$ketqua1 = $db->query($truyvan1);

			foreach ($ketqua1->fetchAll() as $dong1) {
				
			array_push($arrGheSuccess,$dong1["GHE"]);
			
				}
           }
				echo $_SESSION["ghesuccess"] = $arrGheSuccess;

	}
	//thongtin.php
	//tương tự như trên
	 function LoadManHinh2()
{	
		session_start();
		$arrGheSuccess = array();
	 	$maphim = $_SESSION["maphim"];
        $marap = $_SESSION["marap"];
        $ngaychieu = $_SESSION["ngaychieu"];
        $suatchieu = $_SESSION["suatchieu"];
        $ngaychieu = trim($ngaychieu);
        $suatchieu =trim($suatchieu);
     	 $maphim = trim($maphim);
		$db= DB::getInstance();
		$truyvan = 'SELECT MADATCHO FROM reserve WHERE MAPHIM = "'.$maphim.'" AND MARAP ="'.$marap.'" AND NGAYDAT="'.$ngaychieu.'" AND GIODAT ="'.$suatchieu.'";';
		
		$ketqua = $db->query($truyvan);
		foreach ($ketqua->fetchAll() as $dong) {

			$truyvan1 = 'SELECT GHE FROM datchovaghe WHERE MADATCHO = "'.$dong["MADATCHO"].'"';

			$ketqua1 = $db->query($truyvan1);

			foreach ($ketqua1->fetchAll() as $dong1) {
				
			array_push($arrGheSuccess,$dong1["GHE"]);
			
				}
           }
				echo $_SESSION["ghesuccess"] = $arrGheSuccess;

	}

//dangki.php

	function DangKy()
	{		
			
			$email =  $_POST["email"]; //dữ liệu được nhận từ file đăng kí
        	$user = $_POST["user"];
       		$password = $_POST["password"];

       		
       		
       		$email = base64_encode($email); // mã hóa email
       		$user = base64_encode($user); //mã hóa user

       		$db= DB::getInstance(); 
       		$truyvan1 = 'SELECT * FROM users';
       		//xét trùng
       		$ketqua1 = $db->query($truyvan1);
       		foreach ($ketqua1->fetchAll() as $dong1) {
       			
       			if($dong1["USER"] == $user)
       			{
       				echo "Tên user đã có người sử dụng";
       				return;
       			}
       			if($dong1["EMAIL"] == $email)
       			{
       				echo "Địa chỉ email đã có!";
       				return;
       			}
       			
       		}
       		//nếu không trùng thêm vào csdl
       		//gửi mail xác nhận

       			$activecode ="130597p";
       			$mail = new PHPMailer(true);
       			$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				)
				);
       			$mail->SMTPDebug = 2;                                 // Enable verbose debug output
			    $mail->isSMTP();                                      // Set mailer to use SMTP
			    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			    $mail->SMTPAuth = true;                               // Enable SMTP authentication
			    $mail->Username = 'nttpnttp1@gmail.com';                 // SMTP username
			    $mail->Password = 'thuphuong';                           // SMTP password
			    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			    $mail->Port = 587;    

       			$email = base64_decode($email); // mã hóa email
       			$user = base64_decode($user); //mã hóa user

       			$mail->setFrom('nttpnttp1@gmail.com');
	       		$mail->addAddress($email);
	       		$mail->Subject="Xac Nhan Tai Khoan";
	       		$mail->isHTML(true);
	       		$mail->Body="Tài Khoản đăng kí:<br><br>
	       		User: ".$user."<br>
	       		Password: ".$password."<br>
	       		Xác Nhận Tài khoản:
	       		<a href='http://localhost:8080/WebDatVe/user/verify.php?Email=".$email."&activation_code=130597p'>Click Here</a>
	       		";
  		
       		     if($mail->send())
	       		{
	       			echo "Bạn đăng kí thành công! Vui lòng check mail";
	       		}
	       		else
	       		{
	       			echo "Bạn đăng ký thất bại!";
	       		}
       		
       		
	       		$password = md5($password);//mã hóa pass md5
	       		$email = base64_encode($email); // mã hóa email
       			$user = base64_encode($user); //mã hóa user
       		$truyvan = 'INSERT INTO users(USER,EMAIL,password,ISADMIN,remember_token) VALUES ("' .$user.'","'.$email.'","'.$password.'","'.'0'.'","'.'0'.'");' ;
       				$ketqua = $db->query($truyvan);	

       			
       				//echo "Bạn đã đăng ký thành công!";	

       				
	}
//login.php
	//tương tụ như đăng kí
	function DangNhap()
	{
			session_start();

			$n=0;
			$email =  $_POST["email"];
       		$password = $_POST["password"];

       		
       		$email = base64_encode($email);
       		$password = md5($password);

       		$db= DB::getInstance();
       		$truyvan1 = 'SELECT * FROM users WHERE EMAIL = "'.$email.'" AND password = "'.$password . '" AND ISADMIN = "0" AND remember_token !="0";';
       		
       		$ketqua = $db->query($truyvan1);	
       		if($ketqua)
       		{
	       		foreach ($ketqua->fetchAll() as $dong1) {
	       				$n++;
	       				$dong1["USER"] = base64_decode($dong1["USER"]);
	       				$dong1["EMAIL"] = base64_decode($dong1["EMAIL"]);
	       				$_SESSION["loginuser"] = $dong1["USER"];
	       				$_SESSION["loginemail"] =$dong1["EMAIL"];
	       				$_SESSION["loginid"] = $dong1["id"];
	       		}
	       		if($n>0)
	       		{
	       			echo "index.php";
	       			
	       		}
	       		else
	       		{
	       			echo " Đăng nhập thất bại!";
	       			
	       		}
			}
       		
	}
//index -> timkiem.php
	function TimKiem()
	{
			session_start();
			$txtsearch = $_POST["txtsearch"];
			$arrPhimSearch = array();
			$db= DB::getInstance();
			//duyệt các phim giống với dữ liệu được tìm kiếm
       		$truyvan = 'SELECT TENPHIM FROM movie WHERE TENPHIM LIKE '. ' "%'.$txtsearch .'%" OR DAODIEN LIKE "%'.$txtsearch.'%" OR DIENVIEN LIKE "%'. $txtsearch .'%" OR NUOC LIKE "%'.$txtsearch.'%" OR MIEUTA LIKE "%'. $txtsearch .'%" ORDER BY TENPHIM;';
       		//echo $truyvan;
       		$ketqua = $db->query($truyvan);
       		foreach ($ketqua->fetchAll() as $dong) {
       			array_push($arrPhimSearch, $dong["TENPHIM"]);
       		}
       		$_SESSION["phimtimkiem"] = $arrPhimSearch;

     		if(sizeof($arrPhimSearch))
     		{
     			echo "timkiem.php";
       				
     		}
     		else
     			echo "error.php"; // không tìm thấy thì thông báo 
       		
	}
//logout.php
	function LogOut() //thoát tài khoản
	{
		session_start();
		//xóa các session
		if(isset($_SESSION["loginuser"]))
			{
				unset($_SESSION["loginuser"]);		
				unset($_SESSION["loginid"]);
				unset($_SESSION["loginemail"]);	
				unset($_SESSION["madatchosua"]);
			}
	}

//Đăng nhập để xóa ghế áp dụng cho user đã đăng kí tài khoản
	function DangNhapXoa()
	{
				session_start();//tạo session
				$db= DB::getInstance(); //khởi tạo đối tượng database
				$n=0; // biến đếm số ghế cần sửa
				$madatcho = $_POST["madatcho"]; // dữ liệu nhận bên user
                $password = $_POST["password"];
                $email = $_SESSION["loginemail"];
                $email = base64_encode($email); //mã hóa email
                $password = md5($password); //mã hóa pass
                //duyệt tìm kiếm
                $truyvan1 = 'SELECT * FROM users WHERE EMAIL = "'.$email.'" AND password = "'.$password . '" AND ISADMIN = "0";';
                $ketqua = $db->query($truyvan1);    
                if($ketqua)
                {
                    foreach ($ketqua->fetchAll() as $dong1) {
                        $n++;
                    }

                    if($n>0)
                        {
                        	//xóa theo yêu cấu người dùng
                        	$query = 'DELETE FROM datchovaghe WHERE MADATCHO = "'.$madatcho.'";'; 
                        	$db->query($query);
                        	$query1 = 'DELETE FROM lichsu WHERE MADATCHO = "'.$madatcho.'";'; 
                        	$db->query($query1);
                        	$query2 = 'DELETE FROM reserve WHERE MADATCHO = "'.$madatcho.'";'; 
                        	$db->query($query2);
                            echo("Xóa thành công");
                            
                        }
                        else
                        {
                            echo("Sai mật khẩu");
                            
                        }

                }
	}

//truyền data từ thongtin.php sang trang suaghe.php
	//tương tự như xóa chỉ khác delete là update
	function SuaGhe()
	{
		session_start();
		$maphim = $_POST["maphim"];
		$marap = $_POST["marap"];
		$ngaychieu = $_POST["ngaychieu"];
		$suatchieu = $_POST["suatchieu"];
		$maphim = trim($maphim);
		$marap = trim($marap);
		$ngaychieu = trim($ngaychieu);
		$suatchieu = trim($suatchieu);
		
		$db= DB::getInstance(); 

		if($maphim!=null && $marap!=null && $ngaychieu!=null && $suatchieu!=null)
		{
			$truyvan =  "select PRICE from schedule WHERE MAPHIM = '".$maphim . "' AND MARAP = '".$marap . "' AND NGAYCHIEU = '".$ngaychieu . "' AND GIOCHIEU = '".$suatchieu."' ;";
			$ketqua = $db->query($truyvan);
			
			if($ketqua)
		        {
		        	foreach ($ketqua->fetchAll() as $dong) {
		        		$_SESSION["giave"] = $dong["PRICE"];
		        	}   	
		        }
	    }
	    else
	    {
	    	echo "Lỗi";
	    }

	    if($maphim!=null)
		{
			$truyvan =  "select TENPHIM from movie WHERE MAPHIM = ".$maphim;
			$ketqua = $db->query($truyvan);
			if($ketqua)
		        {
		        	foreach ($ketqua->fetchAll() as $dong) {
		        		$_SESSION["tenphim"] = $dong["TENPHIM"];
		        	}   	
		        }
	    }
	    else
	    {
	    	echo "Lỗi";
	    }

	    if($marap!=null)
		{
			$truyvan =  "select TENRAP from rap WHERE MARAP = ".$marap;
			$ketqua = $db->query($truyvan);	
			if($ketqua)
		        {
		        	foreach ($ketqua->fetchAll() as $dong) {
		        		 $_SESSION["tenrap"] = $dong["TENRAP"];
		        	}   	
		        }
	    }
	    else
	    {
	    	echo "Lỗi";
	    }
	    $_SESSION["marap"]= $marap;
    	$_SESSION["maphim"] = $maphim;
    	$_SESSION["ngaychieu"] = $ngaychieu;
    	$_SESSION["suatchieu"] = $suatchieu;
    	$_SESSION["madatchosua"] = $_POST["madatchosua"];

    	$n = 0;
    	$query = 'SELECT GHE FROM datchovaghe WHERE MADATCHO ="'.$_SESSION["madatchosua"].'";';
		$ketqua = $db->query($query);
		if($ketqua)
		        {
		        	foreach ($ketqua->fetchAll() as $dong) {
		        		$n++;
		        	}   	
		        }
		$_SESSION["soluongghecansua"] = $n;

	}

//xu ly lenh updata
	function XacNhanSuaGhe()
	{
		session_start();
		$db= DB::getInstance(); 
		$madatchosua = $_SESSION["madatchosua"];
		$madatchosua = trim($madatchosua);
		$arrGhe = $_POST["arrGhe"]; //arr ghế chọn khi sửa
		$slghe = trim($_SESSION["soluongghecansua"]);
		$n=0;
		$query = 'SELECT GHE FROM datchovaghe WHERE MADATCHO = "'.$madatchosua.'";';
		
		$ketqua = $db->query($query);

		if($ketqua)
		        {		        		
		        		foreach($arrGhe as $Ghe) //đếm số ghế đủ k
                		{
		                    if($Ghe!="" && $Ghe!=" " && $Ghe!=null && $Ghe!="\n" && $Ghe!="Ghế:" )
		                    {   
		                       $n++;
		                
		                    }
		                    		                      
                		}
		         	

		        	if($n==$slghe) // đủ thì sửa
		        	{
		        	foreach ($ketqua->fetchAll() as $dong) {
		        		
		        		foreach($arrGhe as $Ghe)
                		{
		                    if($Ghe!="" && $Ghe!=" " && $Ghe!=null && $Ghe!="\n" && $Ghe!="Ghế:" )
		                    	{
		                    	$x1 = 'UPDATE datchovaghe SET GHE ="'.$Ghe.'" WHERE MADATCHO = "'.$madatchosua.'" AND GHE = "'.$dong["GHE"].'";' ;	
		                    	echo $x1;                       
		                       		$ketqua1 = $db->query($x1);  
		                    	}
		        		}  	
		        		}

		        		if($ketqua1)
		        		{
		        			echo "Sửa thành công!";
		        		}	
		        		else
		        		{
		        			echo " Sửa thất bại!";
		        		}
		        	}
          			else
          			{
          				echo "Bạn chưa chọn đủ số ghế cần sửa!";
          			}          			
          		}
        
}
?>			
