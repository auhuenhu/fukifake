<?php
session_start();


include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<title>FUKI</title>
		<?php include'csschung.php' ?>
	</head>
	<body id="myPage">
		<div class="container-fluid">
			<div>
				<?php 
				if(isset($_SESSION['ad']))
				{
					?>
						<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4"></div>
					<div class="col-md-4 text-right">
						<span style="font-weight: bold;"> Xin chào !  <?php print_r($_SESSION['ad']) ?> </span>
						<form method="POST" action="dangxuat.php">
							<input   type="submit" name="btnDangXuat" value="Đăng xuất" style=" height: 20px;margin-top: 0;background: #fff;border: none;">
						</form>
						<a href="admin.php">ADMIN</a>
					</div>
				</div>


					<?php
					
				}
				else
				{
					if(isset($_SESSION['user']))
					{
							?>
						<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4"></div>
					<div class="col-md-4 text-right">
						<span style="font-weight: bold;"> Xin chào !  <?php print_r($_SESSION['user']) ?> </span>
						<form method="POST" action="dangxuat.php">
							<input   type="submit" name="btnDangXuat" value="Đăng xuất" style=" height: 20px;margin-top: 0;background: #fff;border: none;">
						</form>
					</div>
				</div>


					<?php
					}
				
				}
				

					?>
						


					
			</div>
			<div class="row " >
				<div class="col-md-4 "> </div>
				<div class="col-md-4 text-center img-responsive " ><a href="index.php"><img src="img/logo.jpg"></a></div>
				<div class="col-md-4"></div>
			</div>
			<div class="row text-right" style="margin: -80px 30px 0 0;">
				<a href="cart.php"><svg width="28px" height="28px" style="margin-right: 4px;" viewBox="0 0 16 16" class="bi bi-bag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M8 1a2.5 2.5 0 0 0-2.5 2.5V4h5v-.5A2.5 2.5 0 0 0 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5H2z"/>
				</svg></a>
				<a href="dangnhap.php"><svg width="28px" height="28px" style="margin-right: 4px;" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
					<path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
					<path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
				</svg></a>
				<form action="timkiem.php" method="post">
					<input type="text"  name="txtSearch" id="txtSearch" placeholder="Tìm kiếm" autocomplete="off" style="height: 33px;border-radius: 10px;padding-left: 20px;border: 1px solid #000 " >
					
					<button type="submit" name="btnSubmit" style="margin: 3px 0 3px 0;border: none;padding: 2px;" ><span class="glyphicon glyphicon-search "></span></button>
				</form>
			</div>
			<nav>
				<ul >
					<div class="col-md-2">
						<li><a href="#" title="Giới thiệu">VĂN PHÒNG PHẨM <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
						<!-- menu con sổ xuống cấp 1 -->
						<ul style="border-top: 2px solid #000;" >
							<li>
								<?php include 'menu/Loai-but.php' ?>
							<ul><?php include './menu/LoaiChiTiet-but.php' ?></ul></li>
							<li>
								<?php include './menu/Loai-so.php' ?>
							<ul><?php include './menu/LoaiChiTiet-so.php' ?></ul></li>
							<li><?php include './menu/Loai-st.php' ?></li>
							<li><?php include './menu/Loai-lich.php' ?></li>
							<li><?php include './menu/Loai-bk.php' ?></li>
						</ul>
					</li>
				</div>
				<div class="col-md-2">
					<li><a href="#" title="Giới thiệu">PHỤ KIỆN ĐỜI SỐNG <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					<!-- menu con sổ xuống cấp 1 -->
					<ul style="border-top: 2px solid #000;">
						<li>
							<?php include './menu/Loai-pkld.php' ?>
						<ul><?php include './menu/LoaiChiTiet-pkld.php' ?></ul></li>
						<li><?php include './menu/Loai-ddvp.php' ?></li>
						<li><?php include './menu/Loai-ly.php' ?></li>
					</ul>
				</li>
			</div>
			<div class="col-md-2">
				<li><a href="#" title="Giới thiệu">PHỤ KIỆN THỜI TRANG <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
				<!-- menu con sổ xuống cấp 1 -->
				<ul style="border-top: 2px solid #000;">
					<li><?php include './menu/Loai-tui.php' ?></li>
				</ul>
			</li>
		</div>
		<div class="col-md-2">
			<li><a href="#" title="Giới thiệu">PHỤ KIỆN CÔNG NGHỆ <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
			<!-- menu con sổ xuống cấp 1 -->
			<ul style="border-top: 2px solid #000;">
				
			</ul>
		</li>
	</div>
	<div class="col-md-2">
		<li><a href="#" title="Giới thiệu">QUÀ TẶNG, TRANG TRÍ <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
		<!-- menu con sổ xuống cấp 1 -->
		<ul style="border-top: 2px solid #000;">
			<li><?php include './menu/Loai-den.php' ?></li>
			
			<li><?php include './menu/Loai-tu.php' ?></li>
			<li><?php include './menu/Loai-kl.php' ?></li>
		</ul>
	</li>
</div>
<div class="col-md-2">
	<li><a href="#" title="Giới thiệu">GẤU BÔNG, ĐỒ VẢI <i class="fa fa-chevron-down" aria-hidden="true"></i> </a>
	<!-- menu con sổ xuống cấp 1 -->
	<ul style="border-top: 2px solid #000;">
	</ul>
</li>
</div>
</ul>
</nav>
<div class="row"><img src="img/banner.jpg" class="img-responsive" ></div>
<div id="hang-moi-ve">
<div class="col-1 slideanim" style="text-align: center;"><a href=""><h2>Hàng mới về 🍒</h2> </a> </div>
</div>
<div id="san-pham" >
<?php include'hangmoive.php' ?>
</div>
<div id="hang-ban-chay">
<div class="col-1 slideanim" style="text-align: center;"><a href=""><h2>Sản phẩm bán chạy 🍒</h2> </a> </div>
</div>
<div class="row">
<?php include'sanphambanchay.php' ?>
</div>
<div class="row">
<div class="col-md-3 col-sm-4">
<h4 style="padding-left: 10px;"> <strong> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
</svg> Đăng ký nhận ưu đãi</strong></h4>
</div>
<div class="col-md-5 col-sm-4 text-center">
<form>
<input id="email" type="text" class="form-control" name="email" placeholder="Nhập email của bạn"  >
<button style="margin: 15px 0 15px 0;background:#F7BD33 ;border: none;padding: 10px;border-radius: 10px;"> Đăng ký</button>
</form>
</div>
<div class="col-md-4 ol-sm-4" >
<h4> 📞 Hỗ trợ / Mua hàng: 0968.541.805 </h4>
</div>
</div>
<!-- THÔNG TIN WEB -->
<div class="row">
<nav class="navbar-default">
<div class="container-fluid">
<div class="navbar-header " >
	<button class="navbar-toggle " data-toggle="collapse"data-target="#phancuoi" aria-expanded="false" aria-controls="phancuoi">
	THÔNG TIN KHÁC
	</button>
</div>
<div class="navbar-collapse" id="phancuoi">
	<div class="row" style="border-top : 1px solid #000;border-bottom: 1px solid #000; background: #F7BD33">
		<div class="col-md-4" style="padding-left: 25px;">
			<h4><strong>GIỚI THIỆU</strong></h4>
			HỘ KINH DOANH FUKI FRIENDS - PHỤ KIỆN DỄ THƯƠNG
			<div style="border-top:1px solid #000;margin:17px 0 17px 0"></div>
			Giấy chứng nhận hộ kinh doanh số 41J8028141, đăng ký ngày 17/05/2019, tại Q.10 TP.HCM.<br>
		</div>
		<div class="col-md-4"  style="padding-left: 25px;">
			<h4><strong>MUA HÀNG</strong></h4>
			<li><a href="" style="color: #000">Hướng dẫn mua hàng</a></li>
			<li><a href="" style="color: #000">Hình thức thanh toán</a></li>
			<li><a href="" style="color: #000">Chính sách đổi trả</a></li>
			<li><a href="" style="color: #000">Chính sách vận chuyển</a></li>
			<li><a href="" style="color: #000">Thông tin khuyến mãi</a></li>
		</div>
		<div class="col-md-4" style="padding-left: 25px;">
			<h4><strong>ĐỊA CHỈ</strong></h4>
			<strong>FUKI FRIENDS</strong> mở cửa cả tuần (9:00 -22:00) <br>
			240 Sư Vạn Hạnh phường 2, Quận 10 <br>
			📞 <strong>0968 541 805 </strong> <br>
			<div style="padding-top: 10px;">
				<a href=""><i class="fa fa-facebook" style="font-size: 30px;padding-right: 15px;"></i></a>
				<a href=""><i class="fa fa-instagram"style="font-size: 30px;"></i></a></div>
			</div>
		</div>
	</div>
</div>
</nav>
</div>
<!-- NÚT TO TOP -->
<footer class="container-fluid text-center"style="height: 100px;line-height: 100px;">
<a href="#myPage" title ="To Top">
<span class="glyphicon glyphicon-chevron-up" style="font-size: 30px;color: #000"></span> </a>
</footer>
<h5 style="text-align: center;">Copyright © 2020</h5>
</div>
</body>
</html>
