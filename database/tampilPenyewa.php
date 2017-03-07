<?php
	$resultPenyewa = mysqli_query($kon, "select * from penyewa");
?>
<div class="col-md-10 col-md-offset-1">
	<table class='table table-striped table-hover'>
    	<thead bgcolor='#d9edf7'>
	    	<tr>
	    		<th>No</th>
	    		<th>Nama Penyewa</th>
	    		<th>Alamat</th>
	    		<th>Nomor Telpon</th>
	    	</tr>
    	</thead>
    	<tbody bgcolor='#fff'>
<?php
	$no = 1;
	while($rsPenyewa = $resultPenyewa->fetch_array(MYSQLI_ASSOC)) {
?>
		<tr>
			<td><?php echo $no?></td>
			<td><?php echo $rsPenyewa["nama_penyewa"]?></td>
			<td><?php echo $rsPenyewa["alamat_penyewa"]?></td>
			<td><?php echo $rsPenyewa["notlp_penyewa"]?></td>
		</tr>
<?php	
	$no++;
	}
?>
		</tbody>
	</table>
</div>