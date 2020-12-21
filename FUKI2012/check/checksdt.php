<?php 
include '../connect.php';
$sdt = $_POST["sdt"];
$sql= "select * from khachhang where sdt='$sdt'";	
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