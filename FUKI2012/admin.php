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
  

