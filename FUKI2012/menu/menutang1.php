<?php include '../connect.php'; include '../csschung.php';include'../include/top.php';  ?>
<?php 
if(isset($_GET['maloai']))
{
	$maloai= $_GET['maloai'];
}
	$sql= "select * from loai where maloai='$maloai'";
	$tam=$conn->query ($sql);
	$data = $tam->fetchAll();
	foreach ($data as $val) {
?>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="../index.php">Trang chủ</a></li>
		<li class="breadcrumb-item active" aria-current="page">
			<?php 
			
				if($maloai=='but' | $maloai=='st' | $maloai=='so' |$maloai=='lich' | $maloai=='bk')
				{
					echo "Văn phòng phẩm"; 
				}
				if($maloai == 'pkld' | $maloai == 'ddvp' |$maloai=='ly' )
				{
					echo "Phụ kiện đời sống";
				}
					if($maloai == 'tui'  )
				{
					echo "Phụ kiện thời trang";
				}
					if($maloai == 'den' | $maloai == 'tu' |$maloai=='kl' )
				{
					echo "Quà tặng, trang trí";
				}

			?>

		</li>
		
		<li class="breadcrumb-item active" aria-current="page"><?php echo $val['tenloai'] ?></li>
	</ol>
</nav>
<h3 style="color: red;margin-left: 25px;margin-top: 30px;font-weight: lighter;"><?php echo $val['tenloai'] ?></h3>
<?php } 
$sql= "select * from sanpham where maloai='$maloai'";
$tam=$conn->query ($sql);
$data = $tam->fetchAll();
foreach($data as $value) 
{
	?>
	<div class="col-md-3"   >
	<div class="thumbnail" >
<?php
$tach1hinh=$value['hinh'];
 $hinh = explode(";", $tach1hinh); 
$hinhanh1=$hinh[0];
 ?>
 <a href="../sanpham/sanpham.php?id=<?php echo $value['masp'] ?>"><img src="../img/<?php echo $hinhanh1 ?>" ></a> 
 <a href="../sanpham/sanpham.php?id=<?php echo $value['masp'] ?>"><?php echo $value['tensp'] ?></a>
 <h5><?php echo number_format($value['giaban'])  ?>đ</h5>
</div>
</div>
<?php	
}
?>






