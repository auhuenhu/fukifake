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
		<?php include'../csschung.php' ; session_start(); ?>
	</head>
	<body id="myPage">
		<div class="container-fluid">
			<?php
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
			?>
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
				<?php
				include '../connect.php';
				$sql= 'select * from sanpham';
				$tam=$conn->query ($sql);
				$data = $tam->fetchAll();
					$kq=array();
					$arr = array();
				if(isset($_POST['btnSubmit']))
				{	
					if (strlen($_POST['txtSearch'])!=0)
					{
						$chuhoa= mb_strtoupper($_POST['txtSearch'],'UTF-8');
								foreach($data as $product)
											{
													if(strpos(mb_strtoupper($product['tensp'],'UTF-8'),$chuhoa)!==false)
															$kq[]=$product;
											}
									if(count($kq)!==0)
										{
				$dem=count($kq);?>
				<div class="row text-center" style="margin:10px 0px 50px 0px;"><?php echo "Tìm thấy $dem sản phẩm:"; ?></div>
				<?php
					foreach($kq as  $product)
									{
						$tach1hinh=$product['hinh'];
						$hinh = explode(";", $tach1hinh);
						$hinhanh1=$hinh[0];
				?>
				<div class="col-md-3">
					<div class="thumbnail">
						<a href="sanpham/sanpham.php?id=<?php echo $product['masp'] ?>"><img src="img/<?php echo $hinhanh1 ?>"></a>
						<a href="sanpham/sanpham.php?id=<?php echo $product['masp'] ?>"><?php echo $product['tensp'] ?></a>
						
						<h5><?php echo number_format($product['giaban'])  ?>đ</h5>
					</div>
				</div>
				<?php
					}
				
				}
				else
					echo "Không tìm thấy!";
				}
				
				else
				echo "Vui lòng nhập lại ";
				}
				?>				
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
<!-- -->
<style type="text/css">
	.nut-gio-hang {width: 390px;height: 40px;margin-top: 15px;margin-bottom: 15px;background: #73c9e2;border: none;color: #000 ;font-weight: bold;}
</style>
<?php
include '../connect.php';
$v=1;
$id = $_GET['id'];
$sql= "select * from sanpham where masp='$id'";
$tam=$conn->query ($sql);
$data = $tam->fetchAll();
foreach($data as $value)
{
?>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="../index.php">Trang chủ</a></li>
<li class="breadcrumb-item"><a href="../tranghangmoive.php">Hàng mới về</a></li>

<li class="breadcrumb-item active" aria-current="page"><?php echo $value['tensp'] ?></li>
</ol>
</nav>
<div class="row">
<div class="col-md-7">
<?php
$hinhanh  = $value['hinh'];
$tachanh = explode(";", $hinhanh);
count($tachanh);
foreach($tachanh as $k => $v)
{
	$a=$tachanh[$k];
	
?>
<img src="../img/<?php echo $a ?>" style="width: 600px;height: 560px;margin-left: 80px;"> <?php } ?>
</div>
<div class="col-md-5">
<div class="row" style="border-bottom:  1px dotted #777">
<h4 style="font-weight: bold;"><?php echo $value['tensp'] ?></h4>
<h6 style="color: #a3a5a7 ;">SKU:<?php echo $value['masp'] ?></h6>
</div>
<div class="row" style="border-bottom:  1px dotted #777">
<h4 style="font-weight: bold;"><?php echo number_format($value['giaban'])  ?>đ</h4>
</div>
<div class="row" style="margin-top: 15px;">
<?php
			$v=1;
foreach($data as $value)
{
$a= $value['dacdiem'];
}
$decode = json_decode($a);
$dacdiem= $decode->dd;
//print_r($dacdiem);
$a=count($dacdiem);
//echo $a;
?>
<form method="post" action="../cart.php">

<input type="hidden" name="id" value="<?php echo $value['masp'] ?>">
<?php
for ($i=0; $i < count($dacdiem); $i++) {
	
$b= $dacdiem[$i];

if(isset($_POST['btnSubmit']))
		{
		if($_POST['tt']==$b->name)		
	print_r($b->name)	;
}
?>

<input type="radio" name="tt" value="<?php print_r($b->name) ?>" checked="checked"> <?php print_r($b->name)  ?>
<br> 

<?php  } $v++;  ?>



<input   max="<?php echo $value['soluong']?>" min="<?php if($value['soluong']>0) {echo '1';} else {echo '0';} ?>" name="soluong" type="number" value="<?php if($value['soluong']>0) {echo '1';} else {echo '0';} ?>" style="width: 40px;text-align: center;" ><br>

<input class="nut-gio-hang" type="submit" value="<?php if($value['soluong']>0){echo 'THÊM VÀO GIỎ';} else {echo 'HẾT HÀNG';} ?> " name="btnSubmit">
</form>

<p><?php echo $value['mota'] ?></p>
</div>
</div>
</div>
<?php } ?>