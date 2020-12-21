<?php include 'connect.php';
session_start();
if(isset($_SESSION['user']))
{
    ?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4 text-right">
            <span style="font-weight: bold;margin-right: 10px;"> Xin chào !  <?php print_r($_SESSION['user']) ?> </span> 
           
        </div>

    </div>


<?php
}
 ?>

 <?php
$sql= 'select * from sanpham';
		$tam=$conn->query ($sql);
		$data = $tam->fetchAll();
		
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <style type="text/css">
    	a:hover {text-decoration: none;}
    	input {outline: none;}
    	.col-md-4 {padding: 5px;}
    	body {overflow-x: hidden;}
    	.row {margin-left: 0px;}
    </style>

	<title>THANH TOÁN</title>
</head>
<body>
<div class="container-fluid">
	<div class="col-md-2" ></div>
	<div class="col-md-8 " style="padding-left:60px;border-right: 1px dotted #737373;border-left: 1px dotted #737373">
		<div style="margin-left: 60px;">
			<h1> FUKI FRIENDS </h1>
		<h5><a href="cart.php">Giỏ hàng</a></h5>
		<h4>Thông tin giao hàng </h4>
		<h5 style="color: #737373">Bạn đã có tài khoản? <a href="dangky.php">Đăng ký</a> để tiếp tục mua hàng</h5> 
		</div>
			<form method="POST" action="hoadon.php"  style="margin-top: 10px;padding-left: 10px;margin-left: 50px;">
				<div>
					<input id="hoten" style="width: 600px;height: 40px;border-radius: 7px;border: 1px solid #737373;" type="text" name="ho-ten" maxlength="30" autocomplete="off" placeholder="Tên người nhận">
					<div id="loi-hoten"></div>
					
		
			<input id="email" style="width: 600px;height: 40px;border-radius: 7px;border: 1px solid #737373;margin-top: 10px;" type="text" name="email" autocomplete="off" placeholder=" Email tài khoản">
			<div id="loi-email"></div>

			<div class="row" style="width: 600px;">
				
			<div class="col-md-8" style="padding:10px 0px;" >
				<input id="diachi" style="width: 396px; height: 40px;border-radius: 7px;border: 1px solid #737373;" type="text" name="diachi" autocomplete="off" placeholder=" Địa chỉ người nhận">
					<div id="loi-diachi"></div>
				
			</div>
			<div class="col-md-4"style="padding:10px 0px;">
				<input id="sdt" style="width: 199px;height: 40px;border-radius: 7px;border: 1px solid #737373;" type="text" name="sdt" maxlength="10" autocomplete="off" placeholder=" Số điện thoại  ">
					<div id="loi-sdt"></div>
				

			</div>

					
			</div>
			

				
		

			<div style="border:1px solid #737373 ; border-radius: 5px;margin-top: 20px;width: 600px;" >
		

				<div style="margin-left: 20px;margin-right: 20px;">
			<input style="width: 18px;height: 18px;margin-top: 10px;" type="radio" name="radio" checked="checked" value="Giao tận nơi"> Giao tận nơi <br>


			
			
			<input style="width: 18px;height: 18px;margin-top: 10px;" type="radio" name="radio"  value="Nhận tại cửa hàng"> Nhận tại cửa hàng <br>
			<p style="color: red;font-weight: bold;padding-left: 20px;">FUKI sẽ giữ đơn cho bạn trong vòng 24 giờ.</p>
			
				
			
		</div>
	</div>
</div>





			
			<h4>Phương thức vận chuyển </h4>
		<div style="border:1px solid #737373 ; border-radius: 5px;margin-top: 20px;width: 600px;padding: 15px 35px;color: red;font-weight: bold;">
			Phí vận chuyển đồng giá 25,000đ
		
		</div>

		<h4>Phương thức thanh toán </h4>
		<div style="border:1px solid #737373 ; border-radius: 5px;margin:20px 0px;width: 600px">
			<input style="width: 18px;height: 18px;margin:15px 20px" type="radio" name="radiott" checked="checked"  value="Thanh toán khi giao hàng (COD)"> Thanh toán khi giao hàng (COD) <br>
			<input style="width: 18px;height: 18px;margin:15px 20px" type="radio" name="radiott"  value="Thanh toán tiền mặt tại cửa hàng"> Thanh toán tiền mặt tại cửa hàng <br>
			<input style="width: 18px;height: 18px;margin:15px 20px" type="radio" name="radiott"  value="Chuyển khoản qua ngân hàng"> Chuyển khoản qua ngân hàng <br>
			
			<input style="width: 18px;height: 18px;margin:15px 20px" type="radio" name="radiott"  value="Thanh toán qua ví MoMo"> Thanh toán qua ví MoMo <br>
			<input style="width: 18px;height: 18px;margin:15px 20px" type="radio" name="radiott"  value="Thanh toán qua Thẻ ATM, Visa/ Master, Internet Banking & Ví Ngân Lượng"> Thanh toán qua Thẻ ATM, Visa/ Master, Internet Banking & Ví Ngân Lượng <br>

			
		</div>
		 <?php
$sql= 'SELECT MAX(mahd) FROM hoadon WHERE mahd < 10000;';
		$tam=$conn->query ($sql);
		$data = $tam->fetchAll();
		foreach ($data  as $val) {
		
 ?>
 <input type="hidden" name="madon" value="<?php print_r($val[0]+1) ?>"> <?php }?>
		
		<input style="width: 140px;height: 45px;color: #000;font-size: 13px;background: #F7BD33 ;border: none;border-radius: 10px;float: right;margin-right: 105px;" type="submit" name="hoantatdonhang" value="Hoàn tất đơn hàng" > 

			</form>
			
			
			


		<h5 style="margin-left: 60px;"><a href="cart.php">Giỏ hàng</a></h5>



			
				
		

		</div>
	<div class="col-md-2"></div>



</div>

<script >

</script>

<script>
	
	$(document).ready(function(){
	$("#hoten").blur(function(){
		var u = $(this).val();
		
		$.post("check/checkuser.php",{un:u},function(d){
			
			
			
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
				$("#loi-email").html("❌ Đăng ký để tiếp tục mua hàng");
				$("#loi-email").css("color","green");
			}
			else
			{
				$("#loi-email").html("✔ Đã có tài khoản");
				$("#loi-email").css("color","green");
			}
			if (u=="")
			{
				$("#loi-email").html("Không được để trống ");
				$("#loi-email").css("color","red");
			}
			else {

          // var email = u.indexOf("@");
          var c = u.length;
				if(c<17)
				{
				$("#loi-email").html("Email phải chứa ký tự @ và ít nhất 17 ký tự ");
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
				$("#loi-sdt").html("");
				
			}
			else
			{
				$("#loi-sdt").html("");
				

			}

			if (u=="")
			{
				$("#loi-sdt").html("Không được để trống ");
				$("#loi-sdt").css("color","red");
			}
			else
			{
			 var dt = /((07|08|09|05|03)+([0-9]{8})\b)/g;
			  if (dt.test(u) == false) 
        		{
					$("#loi-sdt").html("Không đúng định dạng!");
					$("#loi-sdt").css("color","red");


          
        		}
        		else
        		 {
					$("#loi-sdt").html("✔");
					$("#loi-sdt").css("color","green");


        			
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
				if(u.indexOf(" ")!=-1)
					{
						$("#loi-diachi").html("");
						

					}
				else 
					{
						$("#loi-diachi").html("Phải có ít nhất 2 từ");
						$("#loi-diachi").css("color","red");

						
					}
				}
		}		
		}); 
		}); 
</script>




</body>
</html>