<?php include 'connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <style >
    	input {outline: none;}
    	/*body {overflow-x: hidden;overflow-y: hidden;}*/
    	#dangky:hover  {background: #fff;border:1px solid #F7BD33}
    	#dangky  {outline: none;border: none;background: #F7BD33}
    	a:hover{text-decoration: none;}
    </style>
	<title>ĐĂNG KÝ</title>
</head>
<body>
	<div class="col-md-6 text-center " style="border-right: 1px dotted #737373; ">
		<h1 style="line-height: 580px;font-weight: bold; ">ĐĂNG KÝ </h1>
		


		
	</div>
	<div class="col-md-6">
		
	<form action="" method="POST">
		<div style="margin:8px 65px 0px 80px">
					<input id="hoten" style="width: 455px;height: 45px;border-radius: 7px;border: 1px solid #737373;margin-top: 35px" type="text" name="ho-ten" maxlength="30" autocomplete="off" placeholder=" Họ và tên">
					<div id="loi-hoten"></div>
					
					<input style="margin-top: 25px;width: 18px;height: 18px" type="radio" name="rdbGender" id="rdbMale" value="1" <?php if(!isset($_POST['rdbGender'])||$_POST['rdbGender']==1) echo 'checked'?>> <span >Nam</span>
                <input style="margin-top: 25px;width: 18px;height: 18px" type="radio" name="rdbGender" id="rdbFemale" value="0" <?php if(isset($_POST['rdbGender'])&&$_POST['rdbGender']==0) echo 'checked'?>><span > Nữ</span>
					
		
			<input id="email" style="width: 455px;height: 40px;border-radius: 7px;border: 1px solid #737373;margin-top: 10px;margin-top: 25px" type="text" name="email" autocomplete="off" placeholder=" Email">
					<div id="loi-email"></div>


			<input id="sdt" style="width: 455px;height: 40px;border-radius: 7px;border: 1px solid #737373;margin-top: 10px;margin-top: 35px" type="text" name="sdt" minlength="10" maxlength="10" autocomplete="off" placeholder=" Số điện thoại ">
					<div id="loi-sdt"></div>


			
			<input id="diachi" style="width: 455px;height: 40px;border-radius: 7px;border: 1px solid #737373;margin-top: 10px;margin-top: 35px" type="text" name="diachi" autocomplete="off" placeholder=" Địa chỉ">
			<div id="loi-diachi" ></div>

			
			<input id="matkhau1" style="width: 455px;height: 40px;border-radius: 7px;border: 1px solid #737373;margin-top: 10px;margin-top: 35px" autocomplete="off" placeholder=" Mật khẩu" name="mk1" type="password">
			<div id="loi-matkhau1" ></div>
					


			<!-- <input id="matkhau2" style="width: 455px;height: 40px;border-radius: 7px;border: 1px solid #737373;margin-top: 10px;margin-top: 35px"  autocomplete="off" placeholder=" Nhập lại mật khẩu" name="mk2">
					<div id="loi-matkhau2"></div> -->



		<input id="dangky"type="submit" name="btnDangKy" value="Đăng ký" style="width: 130px; height: 50px;margin-top: 40px;font-size: 15px;">
		<a href="dangnhap.php" style="margin-left: 250px;margin-top: 10px;">Đăng nhập </a>


		</div>
	</form>
	<div style="padding:10px 80px;color: red">
	<?php

$err= false;
if(isset($_POST['btnDangKy']))
{
	if($_POST['ho-ten']=="")
	{
		echo "Họ và tên không được để trống<br>";
		$err= true;
	}
	if($_POST['email']=="")
	{
		echo "Email không được để trống<br>";
		$err= true;

	}
	if($_POST['sdt']=="")
	{
		echo "SĐT không được để trống<br>";
		$err= true;

	}
	if($_POST['mk1']=="")
	{
		echo "Mật khẩu không được để trống<br>";
		$err= true;

	}
	else { $matkhau=md5($_POST['mk1']) ;}

	if ($_POST['rdbGender']==1)
	{
		$_POST['rdbGender']="Nam";
		
	}
	else
	{
		$_POST['rdbGender']="Nữ";
		

	}

if(!$err)
{
	 $sql = "INSERT INTO khachhang VALUES (
 '".$_POST['ho-ten']."', 
 
 '".$_POST['sdt']."',
 '".$_POST['diachi']."',
  '".$_POST['email']."',
 '$matkhau',

 '".$_POST['rdbGender']."'
)";


   $conn->exec($sql);

}




}


?>
</div>

</div>




<script>
	
	$(document).ready(function(){
	$("#hoten").blur(function(){
		var u = $(this).val();
		
		$.post("check/checkuser.php",{un:u},function(d){
			// if (d == 0)
			// {
			// 	$("#loi-hoten").html("✔");
			// 	$("#loi-hoten").css("color","green");
			// }
			
			
			if (u=="")
			{
				$("#loi-hoten").html("Không được để trống ");
				$("#loi-hoten").css("color","red");
			}
			else {
				var count = u.length;
				// var ten = u.indexOf('');

				if(count<6 )
				{
					
				$("#loi-hoten").html("Họ và tên dưới 6 ký tự ");
				$("#loi-hoten").css("color","red");
					
				}
				else {
					if(u.indexOf(" ")!=-1)
					{
						$("#loi-hoten").html("Hợp lệ");
				$("#loi-hoten").css("color","green");

					}
					else {
						$("#loi-hoten").html("Phải 2 từ");
				$("#loi-hoten").css("color","red");

						
					}
				
					
				}
			}

		}); 
	});

});
	
</script>

<script type="text/javascript">
	$(document).ready(function(){
	$("#email").blur(function(){
		var u = $(this).val();
		$.post("check/checkemail.php",{email:u},function(d){
				

			if (d == 0)
			{
				$("#loi-email").html("✔");
				$("#loi-email").css("color","green");
			}
			else
			{
				$("#loi-email").html("❌ EMAIL đã tồn tại");
				$("#loi-email").css("color","red");
			}
			if (u=="")
			{
				$("#loi-email").html("Không được để trống ");
				$("#loi-email").css("color","red");
			}
			else {

          // var email = u.indexOf("@");
          var c = u.length;
				if(c<15)
				{
				$("#loi-email").html("Email phải chứa ký tự @ và ít nhất 15 ký tự ");
				$("#loi-email").css("color","red");


				}

				
			}
		
		}); 
	});
});

</script>

<script>
	$(document).ready(function(){
	$("#sdt").blur(function(){
		var u = $(this).val();
		$.post("check/checksdt.php",{sdt:u},function(d){
			
			if (d == 0)
			{
				$("#loi-sdt").html("✔");
				$("#loi-sdt").css("color","green");
			}
			else
			{
				$("#loi-sdt").html("❌SĐT đã tồn tại");
				$("#loi-sdt").css("color","red");

			}

			if (u=="")
			{
				$("#loi-sdt").html("Không được để trống ");
				$("#loi-sdt").css("color","red");
			}
			else
			{
			 var dt = /((09|03|07|08|05)+([0-9]{8})\b)/g;
			  if (dt.test(u) == false) 
        		{
					$("#loi-sdt").html("Không đúng định dạng!");
					$("#loi-sdt").css("color","red");


          
        		}
   

			}
    
    


		}); 
	});
});
</script>
<script>
	$(document).ready(function(){
	$("#diachi").blur(function(){
		var u = $(this).val();
		var kytu = u.length;
		if(u=="")
		{

			$("#loi-diachi").html("Không được để trống");
		 	$("#loi-diachi").css("color","red");
		}
		else {
			
			if(kytu <15)
			{
				$("#loi-diachi").html("Địa chỉ ít nhất 15 ký tự");
		 	$("#loi-diachi").css("color","red");
			}
			else {
				$("#loi-diachi").html("");
			}
		}		
		}); 
		}); 
</script>
<script>
	$(document).ready(function(){
	$("#matkhau1").blur(function(){
		var u = $(this).val();
		
		$.post("check/checkmatkhau.php",{mk1:u},function(d){
			//alert(d);
		if(u=="")
		{
			$("#loi-matkhau1").html("Không được để trống");
		 	$("#loi-matkhau1").css("color","red");
		}
		else {
			var dem = u.length;
			if(dem <8  )
			{
				$("#loi-matkhau1").html("Mật khẩu ít nhất 8 ký tự");
		 		$("#loi-matkhau1").css("color","red");
			}
			 if (d==1) {
				$("#loi-matkhau1").html("Mật khẩu hợp lệ");

		 		$("#loi-matkhau1").css("color","green");				
			}
			else {
				$("#loi-matkhau1").html("Mật khẩu có ít nhất một chữ hoa, một chữ thường và một số");
		 		$("#loi-matkhau1").css("color","red");
			}			
			}
		}); 
		}); 
		}); 	
</script>
<!-- <script>
	$(document).ready(function(){
	$("#matkhau2").blur(function(){
		var mk2 = $(this).val();



		
				if(mk2==  )
				{
				$("#loi-matkhau2").html("có");

				}
				else {
				$("#loi-matkhau2").html("ko");
					
				}
		


	}); 
	}); 

	
</script> -->



</body>
</html>