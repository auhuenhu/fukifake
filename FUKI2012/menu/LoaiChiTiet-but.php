<?php
$sql= 'select * from chitietloai where maloai="but"';
$tam=$conn->query ($sql);
$data = $tam->fetchAll();
if(file_exists('menu/menutang2.php'))
	{
		foreach($data as $value)
			{
?>
				<li><a href="menu/menutang2.php?maloai=<?php echo $value['maloai'] ?>&tenloai=<?php echo $value['tenloaichitiet'] ?>"><?php echo $value['tenloaichitiet'] ?></a></li>
<?php
			}
	}

else
	{

		foreach($data as $value)
			{
?>
				<li><a href="../menu/menutang2.php?maloai=<?php echo $value['maloai'] ?>&tenloai=<?php echo $value['tenloaichitiet'] ?>"><?php echo $value['tenloaichitiet'] ?></a></li>
<?php
			}
	}
?>