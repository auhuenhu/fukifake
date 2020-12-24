
<?php
session_start();
 include 'connect.php';?>
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
    	body {overflow-x: hidden;overflow-y: hidden;}
    	#dangnhap:hover {background: #fff;border:1px solid #F7BD33}
    	#dangnhap {outline: none;border: none;background: #F7BD33}
    	a:hover {text-decoration: none;}
    </style>
	<title>ĐĂNG NHẬP</title>
</head>
<body>
	<div class="col-md-6 text-center " style="border-right: 1px dotted #737373;">
		<h1 style="line-height: 580px;font-weight: bold;">ĐĂNG NHẬP </h1>
		
	</div>
	<div class="col-md-6">
		
	<form action="" method="POST">
		<div style="margin:8px 65px 0px 80px">
				
		
			<input id="email" style="width: 455px;height: 40px;border-radius: 7px;border: 1px solid #737373;margin-top: 200px;" type="text" name="email" autocomplete="off" placeholder=" Email">
					<div id="loi-email"></div>


			
			<input id="matkhau1" style="width: 455px;height: 40px;border-radius: 7px;border: 1px solid #737373;margin-top: 35px" autocomplete="off" placeholder=" Mật khẩu" name="mk1" type="password">
			<div id="loi-matkhau1" >
				<?php 
if(isset($_POST['btnDangNhap']))
{
	
$mkmahoa= md5($_POST['mk1']) ;
$mail= $_POST['email'];


		$sql= "select matkhaukh,tenkh,email from khachhang where matkhaukh='$mkmahoa' and email ='$mail' ";
		$u=$conn->query ($sql);
		$data = $u->fetchAll();

		
		
		
		 if( $data== null)
		
		{	
			?>
			<div>
				<p style="color: red">Sai mật khẩu</p>
			</div>
			<?php
			
		}

				foreach ($data as $value) {
			$_SESSION['user'] = $value['tenkh'];
		header('location:index.php');

			
		}

$sql= "select * from admin where matkhauad='$mkmahoa' and email ='$mail' ";
		$tam=$conn->query ($sql);
		$da = $tam->fetchAll();
foreach ($da as $v) {
			$_SESSION['ad'] = $v['hoten'];
		header('location:admin.php');

			
	

}

		
	}


?>

			</div>
					


		<!-- 	<input id="matkhau2" style="width: 455px;height: 40px;border-radius: 7px;border: 1px solid #737373;margin-top: 10px;margin-top: 35px"  autocomplete="off" placeholder=" Mật khẩu">
					<div id="loi-matkhau2"></div>
 -->


		<input id="dangnhap"type="submit" name="btnDangNhap" value="Đăng nhập" style="width: 130px; height: 50px;margin-top: 40px;font-size: 15px;">
		<strong style="margin-left: 110px;">Bạn chưa có tài khoản?</strong> <a href="dangky.php">Đăng ký</a>
		</div>
	</form>
</div>


<script type="text/javascript">
	$(document).ready(function(){
	$("#email").blur(function(){
		var u = $(this).val();
		//alert(u);
		$.post("check/checkemail.php",{email:u},function(d){
			
			if (d == 0)
			{
				$("#loi-email").html("❌");
				$("#loi-email").css("color","red");
			}
			else
			{
				$("#loi-email").html("✔");
				$("#loi-email").css("color","green");
			}
			if (u=="")
			{
				$("#loi-email").html("Không được để trống ");
				$("#loi-email").css("color","red");
			}

		}); 
	});

});
</script>





</body>
</html>
