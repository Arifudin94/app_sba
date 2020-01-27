<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$nis = $_REQUEST['nis'];
		$nama = $_REQUEST['nama'];
		$jabatan = $_REQUEST['jabatan'];
		$satuan_kerja = $_REQUEST['satuan_kerja'];
		$tgl_surat = $_REQUEST['tgl_surat'];
		$no_surat = $_REQUEST['no_surat'];
		$it = $_REQUEST['it'];
		$merek = $_REQUEST['merek'];
		$type = $_REQUEST['type'];
		$sn = $_REQUEST['sn'];
		$no_inventory = $_REQUEST['no_inventory'];
		$keterangan = $_REQUEST['keterangan'];
		
		$sql = mysql_query("UPDATE tbl_laptop_pj SET nama='$nama', merek='$merek', jabatan='$jabatan', satuan_kerja='$satuan_kerja', tgl_surat='$tgl_surat',
		no_surat='$no_surat', it='$it', type='$type', sn='$sn', no_inventory='$no_inventory', keterangan='$keterangan' WHERE nis='$nis'");
		
		if($sql > 0){
			$sql = mysql_query("SELECT * FROM tbl_laptop_pj ORDER BY nis");
		echo '<h2>Data Peminjaman LAPTOP</h2><hr>';
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
		echo '<th width="85"><a href="./admin.php?hlm=master&sub=pj_laptop&aksi=add"><img src="add-file.png" width="20" height="20" /></a></th></tr>';
		
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
				echo '<td><a href="./admin.php?hlm=master&sub=pj_laptop&aksi=edit&nis='.$nis.'"><img src="writing.png" width="20" height="20" /></a> ';
				echo '<a href="./admin.php?hlm=master&sub=pj_laptop&aksi=print&nis='.$nis.'"><img src="printer-with-paper.png" width="20" height="20" /></a> ';
				echo '<a href="./admin.php?hlm=master&sub=pj_laptop&aksi=delete&nis='.$nis.'"><img src="recycle-bin.png" width="20" height="20" /></a></td>';
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
		$sql = mysql_query("SELECT * FROM tbl_laptop_pj WHERE nis='$nis'");
		list($nis,$nama,$jabatan,$satuan_kerja,$tgl_surat,$no_surat,$it,$merek,$type,$sn,$no_inventory,$keterangan) = mysql_fetch_array($sql);
?>
<h2>Edit Form Surat BA Peminjaman LAPTOP</h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=pj_laptop&aksi=edit" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nomor Surat</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="nis" name="nis" autocomplete="off" value="<?php echo $nis; ?>" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Kode User</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="no_surat" name="no_surat" autocomplete="off" value="<?php echo $no_surat; ?>" >
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama User</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?php echo $nama; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Jabatan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="jabatan" name="jabatan" autocomplete="off" value="<?php echo $jabatan; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Satuan Kerja</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="satuan_kerja" name="satuan_kerja" autocomplete="off" value="<?php echo $satuan_kerja; ?>" >
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Tanggal Surat</label>
		<div class="col-sm-2">
			<input type="date" class="form-control" id="tgl_surat" name="tgl_surat" autocomplete="off" value="<?php echo $tgl_surat; ?>" >
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">IT</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="it" name="it" autocomplete="off" value="<?php echo $it; ?>" >
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Merek</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="merek" name="merek" autocomplete="off" value="<?php echo $merek; ?>" >
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Type</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="type" name="type" autocomplete="off" value="<?php echo $type; ?>" >
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Serial Namber</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="sn" name="sn" autocomplete="off" value="<?php echo $sn; ?>" >
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nomor Inventory</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="no_inventory" name="no_inventory" autocomplete="off" value="<?php echo $no_inventory; ?>" >
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Keterangan</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="keterangan" name="keterangan" autocomplete="off" value="<?php echo $keterangan; ?>" >
		</div>
	</div>	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-default">Simpan</button>
			<a href="./admin.php?hlm=master&sub=pj_laptop" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>