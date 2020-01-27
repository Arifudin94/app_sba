<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'add':
				include 'galeri/form_simpan.php.php';
				break;
			case 'edit':
				include 'galeri/form_ubah.php';
				break;
			case 'delete':
				include 'galeri/proses_hapus.php';
				break;
		}
	} else {
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
				<th>Kode User</th>
				<th>Nama User</th>
				<th>Jabatan</th>
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
		
		echo '</table></div>';
	}
}
?>