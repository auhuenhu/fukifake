<?php 
session_start();
if(isset($_POST['btnDangXuat']))
{

	if (isset($_SESSION['user']))
	{
   unset($_SESSION['user']);
}
}
header('location:index.php');

?>




