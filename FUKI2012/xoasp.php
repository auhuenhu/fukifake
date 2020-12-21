<?php
include 'connect.php';
$masp = isset($_GET['id'])?$_GET['id']:'';
$sql="delete from sanpham where masp = ?";
$stm= $conn->prepare($sql);
$stm->execute([$masp]);
header('location:quanlysanpham.php');

