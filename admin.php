<?php
session_start();
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>.: SBA :.</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<style type="text/css">
	body {
	min-height: 200px;
	padding-top: 70px;
	background-image: url();
	}
   @media print {
      .noprint {
         display: none;
      }
   }
	</style>

</head>

  <body>

    <?php include "menu.php"; ?>

  <div class="container">
	
	<?php
	if( isset($_REQUEST['hlm'] )){
		
		$hlm = $_REQUEST['hlm'];
		
		switch( $hlm ){
			case 'master':
				include "master.php";
				break;
			case 'user':
				include "profil.php";
				break;
		}
	} else {
	?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2 align="center">APLIKASI SURAT BERITA ACARA</h2>
      </div>
	  
	<?php
	#DATA HP
	echo '<h4>DATA HP</h4><hr>';
		echo '<div class="row">';
		echo '<table class="table table-bordered" >';
		echo '<tr>';
	#Data Peminjaman HP
	$sql    ="SELECT * FROM tbl_hp_pj ORDER BY nis";
	$query    =mysql_query($sql);
	$data    =array();
	
		while(($row    =mysql_fetch_array($query)) != null){
		$data[] =$row;
	}
	$count    =count($data);
	echo '<td align="center">Data Peminjaman HP <b>('.$count.')</b></td>';
	#Data Holder HP
	$sql    ="SELECT * FROM tbl_hp_hl ORDER BY nis";
	$query    =mysql_query($sql);
	$data    =array();
	
		while(($row    =mysql_fetch_array($query)) != null){
		$data[] =$row;
	}
	$count    =count($data);
	echo '<td align="center">Data Holder HP <b>('.$count.')</b></td>';
	#Data Pengembalian HP
	$sql    ="SELECT * FROM tbl_hp_pb ORDER BY nis";
	$query    =mysql_query($sql);
	$data    =array();
	
		while(($row    =mysql_fetch_array($query)) != null){
		$data[] =$row;
	}
	$count    =count($data);
	echo '<td align="center">Data Pengembalian HP <b>('.$count.')</b></td>';
	echo '</tr>';
	echo '</table></div>';
	?>
	
	<?php
	#DATA LAPTOP
	echo '<h4>DATA LAPTOP</h4><hr>';
		echo '<div class="row">';
		echo '<table class="table table-bordered">';
		echo '<tr>';
	#Data Peminjaman LAPTOP
	$sql    ="SELECT * FROM tbl_laptop_pj ORDER BY nis";
	$query    =mysql_query($sql);
	$data    =array();
	
		while(($row    =mysql_fetch_array($query)) != null){
		$data[] =$row;
	}
	$count    =count($data);
	echo '<td align="center">Data Peminjaman Laptop <b>('.$count.')</b></td>';
	#Data Holder LAPTOP
	$sql    ="SELECT * FROM tbl_laptop_hl ORDER BY nis";
	$query    =mysql_query($sql);
	$data    =array();
	
		while(($row    =mysql_fetch_array($query)) != null){
		$data[] =$row;
	}
	$count    =count($data);
	echo '<td align="center">Data Holder Laptop <b>('.$count.')</b></td>';
	#Data Pengembalian LAPTOP
	$sql    ="SELECT * FROM tbl_laptop_pb ORDER BY nis";
	$query    =mysql_query($sql);
	$data    =array();
	
		while(($row    =mysql_fetch_array($query)) != null){
		$data[] =$row;
	}
	$count    =count($data);
	echo '<td align="center">Data Pengembalian Laptop <b>('.$count.')</b></td>';
	echo '</tr>';
	echo '</table></div>';
	?>
	
	<?php
	#DATA HEADSET
	echo '<h4>DATA HEADSET</h4><hr>';
		echo '<div class="row">';
		echo '<table class="table table-bordered">';
		echo '<tr>';
	#Data Peminjaman HEADSET
	$sql    ="SELECT * FROM tbl_headset_pj ORDER BY nis";
	$query    =mysql_query($sql);
	$data    =array();
	
		while(($row    =mysql_fetch_array($query)) != null){
		$data[] =$row;
	}
	$count    =count($data);
	echo '<td align="center">Data Peminjaman Headset <b>('.$count.')</b></td>';
	#Data Holder HEADSET
	$sql    ="SELECT * FROM tbl_headset_hl ORDER BY nis";
	$query    =mysql_query($sql);
	$data    =array();
	
		while(($row    =mysql_fetch_array($query)) != null){
		$data[] =$row;
	}
	$count    =count($data);
	echo '<td align="center">Data Holder Headset <b>('.$count.')</b></td>';
	#Data Pengembalian HEADSET
	$sql    ="SELECT * FROM tbl_headset_pb ORDER BY nis";
	$query    =mysql_query($sql);
	$data    =array();
	
		while(($row    =mysql_fetch_array($query)) != null){
		$data[] =$row;
	}
	$count    =count($data);
	echo '<td align="center">Data Pengembalian Headset <b>('.$count.')</b></td>';
	echo '</tr>';
	echo '</table></div></div>';
	?>
	<?php
	}
	?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(".force-logout").alert().delay(3000).slideUp('slow', function(){
			window.location = "./logout.php";
		});
      function fnCetak() {
         window.print();
      }
	</script>
  </body>

</html>
<?php
}
?>