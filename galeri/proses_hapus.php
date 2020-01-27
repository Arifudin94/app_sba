<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$nis = $_REQUEST['nis'];
		$sql = mysql_query("DELETE FROM siswa WHERE nis='$nis'");
		if($sql > 0){
			$sql = mysql_query("SELECT * FROM siswa ORDER BY nis");
		echo '<h3>Data GALERI</h3>';
		echo '<div class="row">';
		echo '<table class="table table-bordered" width="100">';
		echo '<tr class="info" >
				<th>#</th>
				<th width="150">Foto</th>
				<th width="95">Peminjaman</th>
				<th>Holder</th>
				<th>Pengembalian</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				';
		echo '<th width="85"><a href="./admin.php?hlm=master&sub=galeri&aksi=add"><img src="add-file.png" width="20" height="20" /></a></th></tr>';
		
		if( mysql_num_rows($sql) > 0 ){
			$no = 1;
			while(list($nis,$nama,$jenis_kelamin,$foto,$foto1,$foto2,$foto3) = mysql_fetch_array($sql)){
				echo '<tr>';
				echo '<td>'.$no.'</td>';
				echo '<td><a href="galeri/images/'.$foto.'"><img src="galeri/images/'.$foto.'" width="100" height="100"></a></td>';
				echo '<td><a href="galeri/pj/'.$foto1.'" type="application/pdf">PDF</a></td>';
				echo '<td><a href="galeri/hl/'.$foto2.'">PDF</a></td>';
				echo '<td><a href="galeri/pb/'.$foto3.'">PDF</a></td>';
				echo '<td>'.$nis.'</td>';
				echo '<td>'.$nama.'</td>';
				echo '<td>'.$jenis_kelamin.'</td>';
				echo '<td><a href="./admin.php?hlm=master&sub=galeri&aksi=edit&nis='.$nis.'"><img src="writing.png" width="20" height="20" /></a> ';
				echo '<a href="./admin.php?hlm=master&sub=galeri&aksi=delete&nis='.$nis.'"><img src="recycle-bin.png" width="20" height="20" /></a></td>';
				echo '</tr>';
				$no++;
			}
		} else {
			echo '<tr><td colspan="5"><em>Belum ada data</em></td></tr>';
		}
		
		echo '</table></div></div>';
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
		$nis = $_REQUEST['nis'];
		$sql = mysql_query("SELECT * FROM siswa WHERE nis='$nis'");
		list($nis,$nama,$jenis_kelamin,$foto,$foto1,$foto2,$foto3) = mysql_fetch_array($sql);
		if(is_file("galeri/images/'.$foto.'"))
		unlink("galeri/images/'.$foto.'");
		echo '<div class="alert alert-danger">Yakin akan menghapus data ini:';
		echo '<br>Kode  : <strong>'.$nis.'</strong>';
		echo '<br>Nama   : '.$nama;		
		echo '<br>Jambatan  : '.$jenis_kelamin;
		echo '<br>';
		echo '<a href="./admin.php?hlm=master&sub=galeri&aksi=delete&submit=ya&nis='.$nis.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=galeri" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}

?>