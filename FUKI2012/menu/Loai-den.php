<?php 
$sql= "select * from loai where maloai='den'";
$tam=$conn->query ($sql);
$data = $tam->fetchAll();
if(file_exists('menu/menutang1.php'))
{
    foreach($data as $value)
        {
?>
            <a href="menu/menutang1.php?maloai=<?php echo $value['maloai'] ?>"><?php echo $value['tenloai'] ?></a>
<?php
        }   
}
else
{
    foreach($data as $value)
        {
?>
            <a href="../menu/menutang1.php?maloai=<?php echo $value['maloai'] ?>"><?php echo $value['tenloai'] ?></a>
<?php
        }
}
?>
