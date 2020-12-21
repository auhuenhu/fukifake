<?php
session_start();
if(isset($_SESSION['user']))
{
	?>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
		<div class="col-md-4 text-right">
			<h5 style="font-weight: bold;"> Xin chào !  <?php print_r($_SESSION['user']) ?> </h5> 
		</div>

	</div>


<?php
}


 ?>