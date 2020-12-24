<?php 
session_start();
if(isset($_POST['btnDangXuat']))
{

	if (isset($_SESSION['user']))
	{
   unset($_SESSION['user']);}
   if (isset($_SESSION['ad']))
	{
   unset($_SESSION['ad']);}

}
header('location:index.php');

?>







