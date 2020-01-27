<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$nis = $_REQUEST['nis'];
		$sql = mysql_query("DELETE FROM tbl_laptop_pb WHERE nis='$nis'");
		if($sql > 0){
			$sql = mysql_query("SELECT * FROM tbl_laptop_pb ORDER BY nis");
		echo '<h2>Data Pengembalian HP</h2><hr>';
      echo '<div class="row">';
		echo '<table class="table table-bordered" width="100">';
		echo '<tr class="info" >
				<th>#</th>
				<th width="150">No Surat</th>
				<th width="95">Tanggal</th>
				<th>Kode User</th>
				<th width="100">Nama User</th>
				<th>Jabatan</th>
				<th>IT</th>
				<th width="85">Type</th>
				<th>No Inventory</th>
				<th>Keterangan</th>
				';
		echo '<th width="85"><a href="./admin.php?hlm=master&sub=pb_laptop&aksi=add"><img src="add-file.png" width="20" height="20" /></a></th></tr>';
		
		if( mysql_num_rows($sql) > 0 ){
			$no = 1;
			while(list($nis,$nama,$jabatan,$satuan_kerja,$tgl_surat,$it,$no_surat,$merek,$type,$sn,$no_inventory,$keterangan) = mysql_fetch_array($sql)){
				echo '<tr>';
				echo '<td>'.$no.'</td>';
				echo '<td>'.$nis.'</td>';
				echo '<td>'.$tgl_surat.'</td>';
				echo '<td>'.$it.'</td>';
				echo '<td>'.$nama.'</td>';
				echo '<td>'.$jabatan.'</td>';
				echo '<td>'.$no_surat.'</td>';
				echo '<td>'.$type.'</td>';
				echo '<td>'.$no_inventory.'</td>';
				echo '<td>'.$keterangan.'</td>'; 
				echo '<td><a href="./admin.php?hlm=master&sub=pb_laptop&aksi=edit&nis='.$nis.'"><img src="writing.png" width="20" height="20" /></a> ';
				echo '<a href="./admin.php?hlm=master&sub=pb_laptop&aksi=print&nis='.$nis.'"><img src="printer-with-paper.png" width="20" height="20" /></a> ';
				echo '<a href="./admin.php?hlm=master&sub=pb_laptop&aksi=delete&nis='.$nis.'"><img src="recycle-bin.png" width="20" height="20" /></a></td>';
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
		$sql = mysql_query("SELECT * FROM tbl_laptop_pb WHERE nis='$nis'");
		list($nis,$nama,$jabatan,$satuan_kerja,$tgl_surat,$no_surat,$it,$merek,$type,$sn,$no_inventory,$keterangan) = mysql_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus data ini:';
		echo '<br>Nama  : <strong>'.$nama.' ('.$no_surat.')</strong>';
		echo '<br>No Surat   : '.$nis;		
		echo '<br>Type   : '.$type;
		echo '<br>';
		echo '<a href="./admin.php?hlm=master&sub=pb_laptop&aksi=delete&submit=ya&nis='.$nis.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=pb_laptop" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}

?>