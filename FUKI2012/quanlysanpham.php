
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>QLSP</title>
  <style type="text/css">
    col-md-1 {padding-right: 0px;padding-left: 0px;}
    col-md-2 {padding-right: 0px;padding-left: 0px;}
    col-md-3 {padding-right: 0px;padding-left: 0px;}

  </style>
</head>
<body>
 
  
    
<table class="table">
  <thead>
    <tr style="text-align: center;">
      <th class="col-md-1">Hình</th>
      
      <th class="col-md-1">Mã</th>
      <th class="col-md-4" style="text-align:left; padding-left: 30px;">Tên sản phẩm</th>
      <th class="col-md-1" >Giá</th>
      
      <th class="col-md-1">Số lượng</th>


      <th class="col-md-2">Ngày nhập</th>
      <th class="col-md-1"></th>
      <th class="col-md-1"></th>
      <th class="col-md-1"></th>


    </tr>
  </thead>
  <tbody style="font-size: 16px;">
    <tr>
      <form action="" method="post">
      <?php 
include 'connect.php';
$sql= 'select * from sanpham order by ngaynhap desc';
$tam=$conn->query ($sql);
$data = $tam->fetchAll();
$i =1; 
foreach ($data as $value) {
  $tach1hinh=$value['hinh'];
 $hinh = explode(";", $tach1hinh); 
$hinhanh1=$hinh[0];
?>

     <td style="text-align: center;"><img style="width: 100px;height: 100px;" src="img/<?php echo $hinhanh1 ?>"> </td>
      <td style="text-align: center;"><?php echo $value['masp'] ?></td>
      <td style="text-align:left; padding-left: 30px;"><?php echo $value['tensp'] ?>
        

      </td>

      <td  style="text-align: center;">

        <?php echo number_format($value['giaban']) ."đ"  ?>

      </td>
        
       <td  style="text-align: center;">

        <?php echo $value['soluong']  ?>

      </td>
      <td  style="text-align: center;">

<?php 
$date = date_create($value['ngaynhap']);
echo date_format($date,"d/m/Y H:i:s");
?>
        

      </td>
      <td>Sửa</td>
      <td>
      
        <a href="xoasp.php?id=<?php echo $value['masp'] ?>" class="btn btn-danger" name="xoa" type="submit"> Xóa</a>
      </td>
      
      
      

     
    </tr>
    </form>
   <?php 
   $i++;} ?>
  </tbody>
</table>



</body>
</html>


  


