<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>

   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
  <title>Document</title>
  <style type="text/css">
    li {list-style-type: none;}
    a:hover {cursor: pointer;text-decoration: none;color: #000}
    a {text-decoration: none;color: #000}
    body {
      padding: 0px;
      margin: 0px;
    }

  </style>
</head>
<body>
  <div>
  <?php
session_start();

if(isset($_SESSION['user']))
{
  ?>
  <div class="row text-center">
      <div class="col-md-4"></div>
      <div class="col-md-4">    <h5 style="font-weight: bold;line-height: 50px;">Xin chào Admin:  <?php print_r($_SESSION['user']) ?> </h5> </div>
      <div class="col-md-4 ">
         <form style="text-align: right; margin: 10px 10px" method="POST" action="dangxuat.php">
      <input   type="submit" name="btnDangXuat" value="Đăng xuất" style=" height: 40px;margin-top: 0;background: #fff">
    </form> 
      </div>
    </div>
<?php
}
 ?>
</div>


<div class="container-fluid " style="font-size:14px;" >
  <div class="col-md-2" style="padding-right: 0px;">
     <ul style="border-right: 1px dotted #000">
    <li><a href="index.php">Trang chủ</a> </li>
    <li><a href="quanlydonhang.php">Quản lý đơn hàng</a></li>
    <li><a href="quanlysanpham.php">Quản lý sản phẩm</a></li>
    


    

  </ul>
  </div>
  <div  class="col-md-10" id="tra-ve">
    <table class="table">
  <thead>
    <tr style="text-align: center;">
      
      <th class="col-md-1">Mã đơn</th>
      <th class="col-md-3" style="text-align:left; padding-left: 30px;">Tên sản phẩm</th>
      <th class="col-md-1" >Tổng</th>
      <th class="col-md-2">Ngày mua</th>
      <th class="col-md-2">Vận chuyển</th>

      <th class="col-md-2">Tình trạng</th>

      <th class="col-md-1"></th>
    </tr>
  </thead>
  <tbody style="font-size: 13px;">
    <tr>
      <form action="" method="get">
      <?php 
include 'connect.php';
$sql= 'select * from hoadon ';
$tam=$conn->query ($sql);
$data = $tam->fetchAll();
$i =1; 
foreach ($data as $value) {
?>
     
      <td style="text-align: center;"><?php echo $value['mahd'] ?></td>
      <td style="text-align:left; padding-left: 30px;">
        <?php 
        $mahd = $value['mahd'];
        $sql= "select * from chitiethd where mahd = $mahd  ";
$tam=$conn->query ($sql);
$d = $tam->fetchAll();
$tong= 0;
foreach ($d as $v) {
  echo $v['tensp'] ."<br>";
if($v['vanchuyen']=="Giao tận nơi")
  $ship = 25000;
else
  $ship = 0;
  $tong += $v['gia']*$v['soluong']+$ship;
  
 }
 ?>
      </td>

      <td  style="text-align: center;">

        <?php echo number_format($tong) ."đ"  ?>

      </td>
      <td style="text-align: center;">
        <?php 
$date = date_create($value['ngaymua']);
echo date_format($date,"d/m/Y H:i:s");
?>
      </td>

      <td style="text-align: center;">
        <?php 
        echo $v['vanchuyen'];
        
?>
      </td>
      <td  >
        
<input style="border: none;text-align: center;outline: none;" type="text" name="" value="<?php 
if(isset($_GET['mahd'])){
           if($_GET['mahd']== $value['mahd'])
           {
            echo "Hoàn thành";
            $mahd =$_GET['mahd'];
            $sql= "UPDATE  hoadon set tinhtrang='Hoàn thành' WHERE mahd='$mahd' ";
          $conn->exec($sql);
           }
           else {echo $value['tinhtrang'];}
}
else 
echo $value['tinhtrang'];
 ?>">
     
       </td>

      <td style="text-align: center;">
        
           
              <a style="text-decoration: none;" name="tt" href="quanlydonhang.php?mahd=<?php echo $v['mahd'] ?>">
            
           
        
        <?php
         $ma= $v['mahd'];
          $sql= "select * from hoadon where mahd = $ma  ";
        $tam=$conn->query ($sql);
        $d = $tam->fetchAll();
        foreach ($d as $val) {    
          if ($val['tinhtrang']=='Chưa hoàn thành') echo "Hoàn thành";
        }
        ?>
       </a>

       </td>
    </tr>
    </form>
   <?php 
   $i++;} ?>
  </tbody>
</table>
  
  </div>
 
</div>
</body>

</html>
<!-- <script>
$(document).ready(function(){
  $("#qldh").click(function(){
    $("#tra-ve").load("quanlydonhang.php");
  });
});
</script> -->
  

