<?php
$mk1 = $_POST["mk1"];
if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $mk1))
{
	$d= 1;
}
else
{
	$d= 0;
	
}
echo $d;
?>