<?php
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if(isset($_REQUEST['submit'])){
		//proses update data user: username, password, status admin, fullname
		$iduser = $_REQUEST['iduser'];
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$fullname = $_REQUEST['fullname'];
		$admin = $_REQUEST['admin'];
		
		if(empty($password)){
			$query = "UPDATE user SET username='$username',admin='$admin',fullname='$fullname' WHERE iduser='$iduser'";
		} else {
			$query = "UPDATE user SET username='$username',password=md5('$password'),admin='$admin',fullname='$fullname' WHERE iduser='$iduser'";
		}
		
		if( mysql_query($query) > 0 ){
			echo '<h2>Daftar User</h2><hr>';
			
			$sql = mysql_query("SELECT iduser,username,admin,fullname FROM user ORDER BY iduser");
			
			//diasumsikan bahwa selalu ada user, minimal user awal yaitu: admin dan kasir
			$no = 1;
         echo '<div class="row">';
         echo '<div class="col-md-6">';
			echo '<table class="table table-bordered">';
			echo '<tr class="info"><th width="30">No.</th><th>Username</th><th>Nama Lengkap</th><th width="50">Admin</th>';
			echo '<th><a href="admin.php?hlm=master&aksi=baru" class="btn btn-default btn-xs">Tambah</a></th></tr>';
			while(list($id,$username,$admin,$fullname) = mysql_fetch_array($sql)){
				echo '<tr><td>'.$no.'</td>';
				echo '<td>'.$username.'</td>';
				echo '<td>'.$fullname.'</td>';
				echo '<td>';
				echo ($admin == 1) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '';
				echo '</td>';
				echo '<td><a href="admin.php?hlm=master&aksi=edit&id='.$id.'" class="btn btn-success btn-xs">Edit</a> ';
				echo '<a href="admin.php?hlm=master&aksi=hapus&id='.$id.'" class="btn btn-danger btn-xs">Hapus</a></td></tr>';
				$no++;
			}
			echo '</table>';
         echo '</div></div>';
		} else {
			echo '<div class="alert alert-warning" role="alert">ada ERROR dengan query!</div>';
		}
		
		
	} else {
		//form edit data user terpilih
		$id = $_REQUEST['id'];
		
		$sql = mysql_query("SELECT * FROM user WHERE iduser='$id'");
		list($iduser,$username,$password,$admin,$fullname) = mysql_fetch_array($sql);
?>
<h2>Edit User</h2><hr>
<form class="form-horizontal" method="post" action="admin.php?hlm=master&aksi=edit" role="form">
  <input type="hidden" name="iduser" value="<?php echo $iduser; ?>">
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" id="password" name="password"> <small>Biarkan kosong jika tidak berubah</small>
    </div>
  </div>
  <div class="form-group">
    <label for="fullname" class="col-sm-2 control-label">Fullname</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $fullname; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="admin" class="col-sm-2 control-label">Admin</label>
    <div class="col-sm-2">
      <select name="admin" class="form-control" id="admin">
		<option value="0" <?php echo ($admin==0) ? 'selected':''; ?>>Bukan</option>
		<option value="1" <?php echo ($admin==1) ? 'selected':''; ?>>Admin</option>
	  </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Simpan</button>
	  <a href="admin.php?hlm=master" class="btn btn-link">Batal</a>
    </div>
  </div>
 </form>
<?php
	}
}
?>