<?php

$err= false;
if(isset($_POST['hoantatdonhang']))
{
if($_POST['ho-ten']=="")
{
echo "Họ và tên không được để trống<br>";
$err= true;
}
if($_POST['email']=="")
{
echo "Email không được để trống<br>";
$err= true;

}
if($_POST['sdt']=="")
{
echo "SĐT không được để trống<br>";
$err= true;

}
if($_POST['diachi']=="")
{
echo "Địa chỉ không được để trống<br>";
$err= true;

}
}

session_start();

if(isset($_SESSION['user']))
{
    ?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4 text-right">
            <h5 style="font-weight: bold;"> Xin chào ❗  <?php print_r($_SESSION['user']) ?> 💋</h5>
        </div>

    </div>


<?php
}
?>

<?php

if(!$err)
{




 include 'connect.php';
$sql= 'select * from sanpham';
$tam=$conn->query ($sql);
$data = $tam->fetchAll();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <style type="text/css">
    a:hover {text-decoration: none;}
    a {color: #000}
   
    </style>
<title>ĐƠN HÀNG</title>
</head>
<body>
<div class="container-fluid">

<div class="col-md-7"style="padding-left:60px;border-right: 1px dotted #737373">
<h2> 5THEWAY® </h2>

<h4> ĐẶT HÀNG THÀNH CÔNG </h4>

<H5>Mã đơn hàng : <?php echo $_POST['madon'] ?></H5>


<h5>Cám ơn bạn đã mua hàng!</h5>
<h3>Thông tin đơn hàng</h3>

<div style="border:1px solid #737373 ; border-radius: 5px;margin-top: 20px;width: 600px;">

<div style="margin:20px 0px 30px 30px">





<div style="color:#737373 " >
<h4 style="color: red">Thông tin giao hàng</h4>
<p><?php echo $_POST['ho-ten'] ?></p>
<p><?php echo $_POST['email'] ?></p>

<p><?php echo $_POST['diachi'] ?></p>
<p><?php echo $_POST['sdt'] ?></p>
</div>
<div style="color:#737373 ">
<h4 style="color: red">Phương thức thanh toán</h4>
<?php

 


if (isset($_POST['radiott']))
{
$thanhtoan = $_POST['radiott'];
echo $thanhtoan;
}



?>
</div>


</div>




</div>
<div>
<button style="width: 140px;height: 38px;color: #000;font-size: 13px;background: #F7BD33 ;border: none;border-radius: 10px;float: right;margin-right: 70px;margin-top: 35px;"> <a href="index.php">Tiếp tục mua hàng</a>  </button>

</div>
</div>
<div class="col-md-5">
<?php
$tong = 0;
if(isset($_SESSION['a']))
{
foreach ($_SESSION['a'] as $key => $value) {
foreach ($value as $k=> $v) {
?>
<div class="row" style="margin-top: 18px;">

<div class="col-md-3"><img style="width: 100px; height: 100px;border-radius: 15px;" src="img/<?php echo $v['img'] ?>"></div>
<div class="col-md-5"><p><?php echo $v['ten'] ?></p>
<p style="color: #737373 ;;font-size: 12px;padding-top: 0px;margin-top: 0px;" ><?php echo $v['loai'] ?></p>
</div>
<div class="col-md-2"><?php echo $v['sluong'] ?></div>
<div class="col-md-2"><?php echo number_format($v['gia']) ?>đ</div>

</div>



<?php
$tong+= $v['gia']*$v['sluong']; ?>

<?php



?>

<?php
}
}

 
?>
<div class="col-md-6 row" style="border-top:1px dotted #737373; margin-top: 50px;margin-left: 10px; " >
<p style="padding-top: 15px;color: #737373">Tạm tính</p>
<p style="color: #737373;padding-bottom: 15px">Phí vận chuyển</p>
<div class="row" style="border-top: 1px dotted #737373 ;padding-bottom: 20px;"></div>
<p style="font-size: 15px;">Tổng cộng</p>


</div>
<div class="col-md-6 row text-right" style="border-top:1px dotted #737373; margin-top: 50px;margin-left: 10px; " >
<p style="padding-top: 15px;color: #737373"><?php echo number_format($tong)  ?>đ</p>
<p style="color: #737373;padding-bottom: 15px"><?php $vc="";
if (isset($_POST['radio']))
{
if($_POST['radio']=='Nhận tại cửa hàng')
echo "Miễn Phí";
$vc="Nhận tại cửa hàng";

if($_POST['radio']=='Giao tận nơi')
{


echo "25,000đ";
$vc="Giao tận nơi";


}

}
?></p>
<div class="row" style="border-top: 1px dotted #737373 ;padding-bottom: 20px;"></div>
<p style="font-size: 25px;">
<?php
if (isset($_POST['radio']))
{
if($_POST['radio']=='Nhận tại cửa hàng')
{
$bill= $tong;
echo number_format($bill) ."đ";
}

if($_POST['radio']=='Giao tận nơi')
{
$bill = $tong+25000;
echo number_format($bill) ."đ";

}

}
?>
</p>



</div>

<?php
}

?>
</div>



<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
$date= date('Y/m/d - H:i:s')  ;
 $sql = "INSERT INTO hoadon VALUES ('".$_POST['madon']."', '".$_POST['ho-ten']."', '".$_POST['diachi']."','".$_POST['sdt']."','".$_POST['email']."','$date','chua hoan thanh')";
   
    $conn->exec($sql);

   
  //$last_id = $conn->lastInsertId();


if(isset($_SESSION['a']))
{

foreach ($_SESSION['a'] as $key => $value) {
foreach ($value as $k=> $v) {
$tensp = $_SESSION['a'][$key][$v['loai']]['ten'];
$masp = $_SESSION['a'][$key][$v['loai']]['id'];

$loai = $_SESSION['a'][$key][$v['loai']]['loai'];
$soluong = $_SESSION['a'][$key][$v['loai']]['sluong'];
$gia =$_SESSION['a'][$key][$v['loai']]['gia'];

$hinh = $_SESSION['a'][$key][$v['loai']]['img'];




  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $insert = "INSERT INTO chitiethd VALUES (
    '".$_POST['madon']."',
    '".$tensp."',
    '".$masp."',
    '".$loai."',
    '".$gia."',
    '".$date."',
    '".$soluong."',
    '".$vc."',
    '".$thanhtoan."',
    '".$hinh."'
)";
     $conn->exec($insert);
     


$up= "select * from sanpham where masp ='$masp'";
$tam=$conn->query ($up);
$data = $tam->fetchAll();
foreach ($data as $value) {
$sl= $value['soluong'];
}
$ton  = $sl-$soluong;
$up="UPDATE sanpham SET soluong = '$ton' WHERE masp = '$masp'";
     $conn->exec($up);

    }
   
    }
     
unset($_SESSION['a']);
}
}

?>