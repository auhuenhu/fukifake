<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <style type="">
        td {text-align: center;padding-bottom: 15px;padding-top: 15px;}
        th {text-align: center;}
    </style>
    </head>

<body>
    <?php 
include 'connect.php';

session_start();



if(isset($_SESSION['user']))
{
    ?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4 text-right">
            <span style="font-weight: bold;"> Xin chào !  <?php print_r($_SESSION['user']) ?> </span> 
            <form method="POST" action="dangxuat.php">
                            <input   type="submit" name="btnDangXuat" value="Đăng xuất" style=" height: 20px;margin-top: 0;background: #fff;border: none;">
                        </form>
        </div>

    </div>


<?php
}


 ?>



 <?php



$tong=0;
if (isset($_POST['soluong'])&isset($_POST['id'])&isset($_POST['tt']))
{
    $sl=$_POST['soluong'];
    $id = $_POST['id'];
    $tt = $_POST['tt'];

$sql= "select * from sanpham where masp='$id'";
$tam=$conn->query ($sql);
$data = $tam->fetchAll();


foreach($data as $value) 
{
    $tach1hinh=$value['hinh'];
 $hinh = explode(";", $tach1hinh); 
$hinhanh1=$hinh[0];
   $arr=['id'=>$id,'loai'=>$tt,'ten'=> $value['tensp'],'img'=>$hinhanh1,'gia'=>$value['giaban'],'sluong'=>$sl];


//$_SESSION ['a'][$id][$tt]=$arr;


}


if(isset($_SESSION ['a'][$id][$tt]))
{
    
        $_SESSION ['a'][$id][$tt]['sluong'] += $sl;

  
}
else
{
    $_SESSION ['a'][$id][$tt]= $arr;
    
           
}

                        
}

                if (isset($_GET['action']))
                {
                if ($_GET['action']=='del')
                {
               
                unset($_SESSION['a'][$_GET['id']][$_GET['loai']]);

                }
                 header("Location:cart.php"); 
                }


                   if (isset($_POST['update']))
                {

                    $qtynew= $_POST['qty'];

                      
                       $_SESSION['a'][$_POST['id']][$_POST['loai']]['sluong']=$qtynew;
                 header("Location:cart.php"); 



                     

                }





?>

        <H2 style="text-align: center;color: red;margin-bottom: 30px;font-weight: bold;" >GIỎ HÀNG</H2>
        <div style="border: 3px dotted #ADAAAA;padding: 30px;margin-right: 40px;margin-left: 40px" >
            <table align="center"  >
                <thead >
                    <tr style="background: #F7BD33;font-size: 15px;height: 40px;">
                        
                        <th class="col-md-1 ">MÃ </th>
                        <th class="col-md-1">ẢNH </th>
                        <th class="col-md-3">TÊN</th>
                        <th class="col-md-1">LOẠI</th>

                        <th class="col-md-3">SỐ LƯỢNG</th>
                        <th class="col-md-2">ĐƠN GIÁ</th>
           

                        <th class="col-md-1" ></th>
                   
                        


                    </tr>
                </thead>
                <tbody style="font-size: 14px;">

                        <?php foreach ($_SESSION ['a'] as $key => $value) {
                       
                        foreach ($value as $k => $v) { ?>
                        
                    <tr>
                       
                        <td><?php echo $key ?></td>
                  
                        <td><img style="width: 100px;height: 100px;border-radius: 15px;" src="img/<?php echo $v['img'] ?>"></td>
                        <td><?php echo $v['ten'] ?></td>
                        <td>
                            
                                <?php echo $v['loai'] ?>
                            

                        </td>
                        
                            <td>

                                <form method="POST" action="">
                                   <?php 
                                $ma = $v['id'];
                                   $sql= "select soluong from sanpham where masp= '$ma'";
                                    $tam=$conn->query ($sql);
                                    $data = $tam->fetchAll();
                                    foreach ($data as  $val) {

                                       
                                    
                                    ?>

                                    <input type="hidden" name="qty-hidden" value="<?php echo $v['sluong'] ?>"> 
                                    <input type="hidden" name="id" value="<?php echo $v['id'] ?>">
                                    <input type="hidden" name="loai" value="<?php echo $v['loai'] ?>">


                                    <input style="width: 50px;" type="number" name="qty" autocomplete="off" value="<?php if( $v['sluong']<=$val['soluong'])  echo $v['sluong'];
                                    else {echo $val['soluong'];}  ?>">

                                   

                                      

                                     <button name="update" type="submit" style="width: 100px;">Cập nhật </button>
                                     <h5 style="color: red">Số lượng tối đa : <?php echo $val['soluong'] ?> </h5> 
                               

                        </td>
                        
                        <td><?php echo number_format($v['gia'])  ?>đ
                        <?php 
                            if( $v['sluong']<=$val['soluong'])  {$v['sluong']=$v['sluong'];}
                                    else {$v['sluong']=$val['soluong'];}
                        $tong += $v['sluong'] *$v['gia']; 

                         ?>
                     <?php }?>
                     <input type="hidden" name="tong" value="<?php echo $tong ?>">
                       
                    </td>
                    </form>
                    
                    <td>
                        <form method="get" action="" >
                    


                        <a href="cart.php?id=<?php echo $v['id'] ?>&loai=<?php echo $v['loai'] ?>&action=del" style="width: 50px;height: 28px;" class="btn btn-danger" name="xoa" type="submit"> Xóa</a>

                        </form>
                        
        
                    </td>
                    
                      
 </tr>

 <?php      } }?>


<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Tổng:</td>
                    <td style="color: red;font-weight: bold;"><?php echo number_format($tong);  ?>đ</td>

                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td > <a href="sanpham.php?id=<?php 
                    if(isset($v['id']))
                    { echo $v['id'] ;}
                    else 
                    {
                         header("Location:index.php"); 
                    }
                   

                    ?>" style="width: 170px;height: 34px;color: #000;font-size: 13px;background:#F7BD33 " class="btn " > TIẾP TỤC MUA HÀNG</a></td>

                     <td> <a href="thongtinmuahang.php" style="width: 140px;height: 34px;color: #000;font-size: 13px;background: #F7BD33" class="btn" >THANH TOÁN</a></td>
                     

                    



                </tr>

                </tbody>
              
            </table>
            
            </div>

           
    
                
              
    
</body>
</html>

