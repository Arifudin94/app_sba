<?php
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['sub'] )){
		
		$sub = $_REQUEST['sub'];
		
		switch($sub){
			case 'pj_hp':
				include 'hp/peminjaman/pj_hp.php';
				break;
			case 'holder_hp':
				include 'hp/holder/holder_hp.php';
				break;
			case 'pb_hp':
				include 'hp/pengembalian/pb_hp.php';
				break;
			case 'pj_laptop':
				include 'laptop/peminjaman/pj_laptop.php';
				break;
			case 'holder_laptop':
				include 'laptop/holder/hl_laptop.php';
				break;
			case 'pb_laptop':
				include 'laptop/pengembalian/pb_laptop.php';
				break;
			case 'pj_headset':
				include 'headset/peminjaman/pj_headset.php';
				break;
			case 'holder_headset':
				include 'headset/holder/hl_headset.php';
				break;
			case 'pb_headset':
				include 'headset/pengembalian/pb_headset.php';
				break;
			case 'galeri':
				include 'galeri/index.php';
				break;
		}
	} else {
		//tampilkan daftar user		
		if(isset($_REQUEST['aksi'])){
			$aksi = $_REQUEST['aksi'];
			
			switch($aksi){
				case 'baru':
					include 'user_baru.php';
					break;
				case 'edit':
					include 'user_edit.php';
					break;
				case 'hapus':
					include 'user_hapus.php';
					break;
			}
		} else {
			echo '<h2>Daftar User</h2><hr>';
			
			$sql = mysql_query("SELECT iduser,username,admin,fullname FROM user ORDER BY iduser");
			
			//diasumsikan bahwa selalu ada user, minimal user awal yaitu: admin dan kasir
			$no = 1;
         echo '<div class="row">';
         echo '<div class="col-md-6">';
			echo '<table class="table table-bordered">';
			echo '<tr class="info"><th width="30">No.</th><th>Username</th><th>Nama Lengkap</th><th width="50">Admin</th>';
			echo '<th><a href="admin.php?hlm=master&aksi=baru"><img src="add-file.png" width="20" height="20" /></a></th></tr>';
			while(list($id,$username,$admin,$fullname) = mysql_fetch_array($sql)){
				echo '<tr><td>'.$no.'</td>';
				echo '<td>'.$username.'</td>';
				echo '<td>'.$fullname.'</td>';
				echo '<td>';
				echo ($admin == 1) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '';
				echo '</td>';
				echo '<td><a href="admin.php?hlm=master&aksi=edit&id='.$id.'"><img src="writing.png" width="20" height="20" /></a> ';
				echo '<a href="admin.php?hlm=master&aksi=hapus&id='.$id.'"><img src="recycle-bin.png" width="20" height="20" /></a></td></tr>';
				$no++;
			}
			echo '</table>';
         echo '</div></div>';
		}
	}
}
?>