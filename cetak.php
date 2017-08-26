<script type="text/javascript">
	function cetak(){
		document.getElementById("cetak").innerHTML="";
    document.getElementById("kembali").innerHTML="";
		window.print();
		document.getElementById("cetak").innerHTML="<button onClick='cetak()'>CETAK</button>";
    document.getElementById("kembali").innerHTML="<button onclick="kembali()">KEMBALI</button>";
	}
  function kembali(){
    window.location = 'laporan.php';
  }
</script>
<?php
	include "database/koneksi.php";
	$jenis = $_GET['jenis'];

	$tglSekarang = date("d-m-Y", mktime(date("m"),date("d"),date("Y")));

	if ($jenis=="mobil"){
?>
	<h1 align="center">RENTAL MOBIL FAMILY</h1>
	<h5 align="center">Alamat : Blok O, Banguntapan,Bantul, Yogyakarta</h5>
	<hr/>
	<h3 align="center">Laporan Daftar Mobil</h3>
	<h4 align="center"><?php echo $tglSekarang?></h4>
	<br/>

<?php
	$result = $kon->query("SELECT * from mobil");
?>
	<table border="1" align="center" width="100%" >
    	<thead bgcolor='#d9edf7'>
	    	<tr>
	    		<th>No Polisi</th>
	    		<th>Merek</th>
	    		<th>Jenis</th>
	    		<th>Warna</th>
	    		<th>Status</th>
	    		<th>Harga</th>
	    	</tr>
    	</thead>
    	<tbody bgcolor='#fff'>
<?php
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
?>
		<tr>
			<td><?php echo $rs["no_polisi"]?></td>
			<td><?php echo $rs["merek"]?></td>
			<td><?php echo $rs["jenis"]?></td>
			<td><?php echo $rs["warna"]?></td>
			<td><?php echo $rs["status_mobil"]?></td>
			<td>Rp. <?php echo $rs["harga"]?>/Jam</td>
		</tr>
<?php

	}
?>
		</tbody>
	</table>
<?php
	}elseif($jenis=="sopir"){
?>
	<h1 align="center">RENTAL MOBIL FAMILY</h1>
	<h5 align="center">Alamat : Blok O, Banguntapan,Bantul, Yogyakarta</h5>
	<hr/>
	<h3 align="center">Laporan Daftar Sopir</h3>
	<h4 align="center"><?php echo $tglSekarang?></h4>
	<br/>
	<?php
	$resultSopir = mysqli_query($kon, "select * from sopir")
?>
	<table border="1" align="center" width="100%" id="a">
    	<thead bgcolor='#d9edf7'>
	    	<thead bgcolor='#d9edf7'>
		    	<tr>
		    		<th>No</th>
		    		<th>Nama Sopir</th>
		    		<th>Alamat</th>
		    		<th>Nomor Telpon</th>
		    		<th>Status</th>
		    	</tr>
	    	</thead>
	    	<tbody bgcolor='#fff'>
	<?php
		$no = 1;
		while($rs = $resultSopir->fetch_array(MYSQLI_ASSOC)) {
	?>
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $rs["nama_sopir"]?></td>
				<td><?php echo $rs["alamat_sopir"]?></td>
				<td><?php echo $rs["no_tlp_sopir"]?></td>
				<td><?php echo $rs["status_sopir"]?></td>
			</tr>
	<?php
		$no++;
		}
	?>
		</tbody>
	</table>

<?php
	}elseif($jenis=="penyewa"){
?>

	<?php
	$resultPenyewa = mysqli_query($kon, "select * from penyewa");
?>
	<h1 align="center">RENTAL MOBIL FAMILY</h1>
	<h5 align="center">Alamat : Blok O, Banguntapan,Bantul, Yogyakarta</h5>
	<hr/>
	<h3 align="center">Laporan Daftar Penyewa</h3>
	<h4 align="center"><?php echo $tglSekarang?></h4>
	<br/>
		<table  border="1" align="center" width="100%" id="a">
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
<?php
	}elseif($jenis=="sewa"){
?>
	<?php
		$tgl =  date("Y-m", mktime(date("m"),date("Y")));
		$bln = date("F");
    	$thn = date("Y");
		$sql = "SELECT id_sewa, penyewa.nama_penyewa AS Penyewa, mobil.no_polisi AS No_Polisi, mobil.merek AS Merek, sopir.nama_sopir As Sopir, jaminan.jenis_jaminan AS Jaminan, jaminan.no_jaminan AS No_Jaminan, jaminan.atas_nama AS Atas_Nama, sewa.tgl_sewa, lama_sewa, harga_sewa FROM penyewa, mobil, sopir,sewa, jaminan WHERE sewa.id_penyewa=penyewa.id_penyewa AND sewa.id_mobil=mobil.id_mobil AND sewa.id_sopir=sopir.id_sopir AND sewa.id_jaminan = jaminan.id_jaminan AND sewa.tgl_sewa LIKE '". $tgl."%'";
		$rsSewa = mysqli_query($kon, $sql) Or die ("error");
	?>

	<h1 align="center">RENTAL MOBIL FAMILY</h1>
	<h5 align="center">Alamat : Blok O, Banguntapan,Bantul, Yogyakarta</h5>
	<hr/>
	<h3 align="center">Laporan Daftar Penyewaan</h3>
	<h4 align="center">Periode : <?php echo $bln." ".$thn?></h4>
	<br/>
	<table border="1" align="center" width="100%">
	    	<thead bgcolor='#d9edf7'>
		    	<tr>
		    		<th>Id Sewa</th>
		    		<th>Penyewa</th>
		    		<th>No Polisi</th>
		    		<th>Merek</th>
		    		<th>Sopir</th>
		    		<th>Jaminan</th>
		    		<th>No Jaminan</th>
		    		<th>Atas Nama</th>
		    		<th>Tanggal Sewa</th>
		    		<th>Lama Sewa</th>
		    		<th>Harga Sewa</th>
		    	</tr>
	    	</thead>
	    	<tbody bgcolor='#fff'>
	<?php
		while($rs = $rsSewa->fetch_array(MYSQLI_ASSOC)) {
	?>
			<tr>
				<td><?php echo $rs['id_sewa']?></td>
				<td><?php echo $rs["Penyewa"]?></td>
				<td><?php echo $rs["No_Polisi"]?></td>
				<td><?php echo $rs["Merek"]?></td>
				<td><?php echo $rs["Sopir"]?></td>
				<td><?php echo $rs["Jaminan"]?></td>
				<td><?php echo $rs["No_Jaminan"]?></td>
				<td><?php echo $rs["Atas_Nama"]?></td>
				<td><?php echo $rs["tgl_sewa"]?></td>
				<td><?php echo $rs["lama_sewa"]?> Jam</td>
				<td><?php echo $rs["harga_sewa"]?></td>
			</tr>
	<?php
		}
	?>
		</tbody>
	</table>
<?php
	}elseif($jenis=="pembayaran"){
?>
<?php
	$bln = date("F");
    $thn = date("Y");
	$tgl = date("Y-m", mktime(date("m"),date("Y")));
	$sql = "select sewa.id_sewa AS id_sewa, id_bayar, tgl_bayar, status_bayar, total_bayar, kurang, penyewa.nama_penyewa as penyewa, mobil.merek as merek,mobil.no_polisi AS no_pol, sewa.lama_sewa as lama_sewa, harga_sewa from sewa, bayar, mobil, penyewa where sewa.id_sewa = bayar.id_sewa AND mobil.id_mobil=sewa.id_mobil AND penyewa.id_penyewa = sewa.id_penyewa AND tgl_bayar LIKE '".$tgl."%'";
	$result = $kon->query($sql);
?>

	<h1 align="center">RENTAL MOBIL FAMILY</h1>
	<h5 align="center">Alamat : Blok O, Banguntapan,Bantul, Yogyakarta</h5>
	<hr/>
	<h3 align="center">Laporan Daftar Pembayaran</h3>
	<h4 align="center">Periode : <?php echo $bln." ".$thn?></h4>
	<br/>
		<table border="1" align="center" width="100%">
	    	<thead bgcolor='#d9edf7'>
		    	<tr>
		    		<th>No</th>
		    		<th>Nama Penyewa</th>
		    		<th>Merek Mobil</th>
		    		<th>No Polisi</th>
		    		<th>Lama Sewa</th>
		    		<th>Harga Sewa</th>
		    		<th>Status Bayar</th>
		    		<th>Tanggal Bayar</th>
		    		<th>Total Bayar</th>
		    		<th>Kurang</th>
		    	</tr>
	    	</thead>
	    	<tbody bgcolor='#fff'>
	<?php
		$no=1;
		while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	?>
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $rs["penyewa"]?></td>
				<td><?php echo $rs["merek"]?></td>
				<td><?php echo $rs["no_pol"]?></td>
				<td><?php echo $rs["lama_sewa"]?> Jam</td>
				<td><?php echo $rs["harga_sewa"]?></td>
				<td><?php echo $rs["status_bayar"]?></td>
				<td><?php echo $rs["tgl_bayar"]?></td>
				<td><?php echo $rs["total_bayar"]?></td>
				<td><?php echo $rs["kurang"]?></td>
			</tr>
	<?php
		$no++;
		}
	?>
			</tbody>
		</table>
<?
	}elseif($jenis=="kembali"){
?>
	<?php
	$sql = "SELECT sewa.id_sewa, penyewa.nama_penyewa AS Penyewa, mobil.no_polisi AS No_Polisi, mobil.merek AS Merek, sopir.nama_sopir As Sopir, jaminan.jenis_jaminan AS Jaminan, jaminan.no_jaminan AS No_Jaminan, jaminan.atas_nama AS Atas_Nama, sewa.tgl_sewa, lama_sewa, harga_sewa, status_bayar,jaminan.id_jaminan FROM penyewa, mobil, sopir,sewa, jaminan, bayar WHERE sewa.id_penyewa=penyewa.id_penyewa AND sewa.id_mobil=mobil.id_mobil AND sewa.id_sopir=sopir.id_sopir AND sewa.id_jaminan = jaminan.id_jaminan AND bayar.id_sewa = sewa.id_sewa AND status_bayar = 'Lunas' and sewa.id_sewa NOT IN(SELECT id_sewa from pengembalian)";
		$rsSewa = mysqli_query($kon, $sql) Or die ("error");
	?>

	<h1 align="center">RENTAL MOBIL FAMILY</h1>
	<h5 align="center">Alamat : Blok O, Banguntapan,Bantul, Yogyakarta</h5>
	<hr/>
	<h3 align="center">Laporan Daftar Penyewaan</h3>
	<h4 align="center">Periode : <?php echo $tglSekarang?></h4>
	<br/>
	<table border="1" align="center" width="100%">
	    	<thead bgcolor='#d9edf7'>
		    	<tr>
		    		<th>Id Sewa</th>
		    		<th>Penyewa</th>
		    		<th>No Polisi</th>
		    		<th>Merek</th>
		    		<th>Sopir</th>
		    		<th>Jaminan</th>
		    		<th>No Jaminan</th>
		    		<th>Atas Nama</th>
		    		<th>Tanggal Sewa</th>
		    		<th>Satus Bayar</th>
		    	</tr>
	    	</thead>
	    	<tbody bgcolor='#fff'>
	<?php
		while($rs = $rsSewa->fetch_array(MYSQLI_ASSOC)) {
	?>
			<tr>
				<td><?php echo $rs['id_sewa']?></td>
				<td><?php echo $rs["Penyewa"]?></td>
				<td><?php echo $rs["No_Polisi"]?></td>
				<td><?php echo $rs["Merek"]?></td>
				<td><?php echo $rs["Sopir"]?></td>
				<td><?php echo $rs["Jaminan"]?></td>
				<td><?php echo $rs["No_Jaminan"]?></td>
				<td><?php echo $rs["Atas_Nama"]?></td>
				<td><?php echo $rs["tgl_sewa"]?></td>
				<td><?php echo $rs["status_bayar"]?></td>
			</tr>
	<?php
		}
	?>
			</tbody>
		</table>
<?php
	}
?>
<br/>
<div align="center" id="cetak">
	<button onClick="cetak()">CETAK</button>
</div>
<p align="center" id="kembali"><button onclick="kembali()">KEMBALI</button></p>
