<?php
	$kon = new mysqli('localhost','root','','sewa');
	if (!$kon) {
		die('Could not connect: ' . mysqli_error($con));
	}
?>