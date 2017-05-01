<?php
	$kon = new mysqli('db','root','fiki','sewa');
	if (!$kon) {
		die('Could not connect: ' . mysqli_error($con));
	}
?>
