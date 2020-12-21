<?php 
include '../connect.php';
$un = $_POST["un"];
$sql= "select * from khachhang where tenkh='$un'";	
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