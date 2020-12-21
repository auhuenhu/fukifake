<?php include'connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
	<title>SEARCH</title>
	<style type="text/css">
		* {margin: 0;padding: 0}
		input {outline: none;}
		button {outline: none;}
		.row {margin: 0px;padding: 0px;}
		a {color: #000;text-decoration: none;}
		a:hover {text-decoration: none;color: red}
		.thumbnail img {max-width: 100%;border-radius: 20px;}
		.thumbnail {border: none;}
		.thumbnail a {font-weight: bold;}
		.thumbnail a:hover {color: red}
		button {background: #fff;border: none;}
	</style>
<body>

	<div style="text-align: center;margin-top: 20px;" >
	<form action="" method="post">
		<input type="text"  name="txtSearch" id="txtSearch" autocomplete="off" placeholder="Tìm kiếm" style="height: 33px;border-radius: 10px;padding-left: 20px; border: 1px solid #000 ;width: 300px;" >			
		<button type="submit" name="btnSubmit" style="margin: 3px 0 3px 0;border: none;padding: 2px;font-size: 20px;" ><span class="glyphicon glyphicon-search "></span></button>
	</form>
	</div>



<?php
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
							<div class="row text-center" style="margin:10px 0px 50px 0px;color: red;font-weight: lighter;"><?php echo "Tìm thấy $dem sản phẩm:"; ?></div>
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

</body>
</head>
</html>

