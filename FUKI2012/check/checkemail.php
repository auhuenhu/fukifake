<?php 
include '../connect.php';
$email = $_POST["email"];
$sql= "select * from khachhang where email='$email'";	
		$u=$conn->query ($sql);
		$data = $u->fetchAll();
		if ($data == null)
		{
			$data=0;
		}
		else
		{
			$data=1;
		}
		
		echo $data;
?>

