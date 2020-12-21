<?php 
include 'connect.php' ?>
<?php
$sql= 'select * from chitiethd order by soluong desc limit 4';
$tam=$conn->query ($sql);
$data = $tam->fetchAll();
foreach($data as $value) 
{
	
	?>
<div class="col-md-3">
	<div class="thumbnail">
 <a href="sanpham.php?id=<?php echo $value['masp'] ?>"><img src="img/<?php echo $value['hinh'] ?>"></a>
<a href="<?php echo $value['tensp'] ?>"><?php echo $value['tensp'] ?></a> 
 <h5><?php echo number_format($value['gia'])  ?>đ</h5>
</div>
</div>
<?php	
}
?>

