<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
	<title>FUKI</title>
		<?php include'../csschung.php' ?>
</head>
<body id="myPage">
	<div class="container-fluid">		
 <div class="row " >
          <div class="col-md-4 "> </div>
          <div class="col-md-4 text-center img-responsive " ><a href="../index.php"><img src="../img/logo.jpg"></a></div>
          <div class="col-md-4"></div>
        </div>
          <div class="row text-right" style="margin: -80px 30px 0 0;">
         <a href="../cart.php"><svg width="28px" height="28px" style="margin-right: 4px;" viewBox="0 0 16 16" class="bi bi-bag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 1a2.5 2.5 0 0 0-2.5 2.5V4h5v-.5A2.5 2.5 0 0 0 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5H2z"/>
</svg></a>   
            <a href="../dangnhap.php"><svg width="28px" height="28px" style="margin-right: 4px;" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
  <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
</svg></a>
		<form action="../timkiem.php" method="post">
			<input type="text"  name="txtSearch" id="txtSearch" placeholder="Tìm kiếm" autocomplete="off" style="height: 33px;border-radius: 10px;padding-left: 20px;border: 1px solid #000 " >			
			<button type="submit" name="btnSubmit" style="margin: 3px 0 3px 0;border: none;padding: 2px;" ><span class="glyphicon glyphicon-search "></span></button>
		</form>
</div>
<nav>
	<ul>
		<div class="col-md-2">
		<li><a href="#" title="Giới thiệu">VĂN PHÒNG PHẨM <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
		<!-- menu con sổ xuống cấp 1 -->
		<ul style="border-top: 2px solid #000;" >
			<li>
			<?php include '../menu/Loai-but.php' ?> 
			<ul><?php include '../menu/LoaiChiTiet-but.php' ?></ul></li>
			<li>
				<?php include '../menu/Loai-so.php' ?>
			<ul><?php include '../menu/LoaiChiTiet-so.php' ?></ul></li>

			<li><?php include '../menu/Loai-st.php' ?></li>
			<li><?php include '../menu/Loai-lich.php' ?></li>
			<li><?php include '../menu/Loai-bk.php' ?></li>
		</ul>
		</li>
		</div>
		<div class="col-md-2">
		<li><a href="#" title="Giới thiệu">PHỤ KIỆN ĐỜI SỐNG <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
		<!-- menu con sổ xuống cấp 1 -->
		<ul style="border-top: 2px solid #000;">
			<li>
			<?php include '../menu/Loai-pkld.php' ?>
			<ul><?php include '../menu/LoaiChiTiet-pkld.php' ?></ul></li>
			<li><?php include '../menu/Loai-ddvp.php' ?></li>
			<li><?php include '../menu/Loai-ly.php' ?></li>
		</ul>
		</li>
		</div>
		<div class="col-md-2">
		<li><a href="#" title="Giới thiệu">PHỤ KIỆN THỜI TRANG <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
		<!-- menu con sổ xuống cấp 1 -->
		<ul style="border-top: 2px solid #000;">
			<li><?php include '../menu/Loai-tui.php' ?></li>
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
			<li><?php include '../menu/Loai-den.php' ?></li>
			<li><?php include '../menu/Loai-tu.php' ?></li>
			<li><?php include '../menu/Loai-kl.php' ?></li>			
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
</div>
</body>
</html>


