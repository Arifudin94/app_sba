<?php
include "koneksi.php";
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
   $nis = $_REQUEST['nis'];
   if(isset($_REQUEST['submit'])){
      //cetak nota pembayaran sesuai NIS dan BULAN
      $submit = $_REQUEST['submit'];
      $kls = $_REQUEST['kls'];
      $bln = $_REQUEST['bln'];
      
      //print: $nis, $nama, $kls, $bln, $tgl_bayar, $jml
      $sql = mysql_query("SELECT s.nama,p.tgl_bayar,p.jumlah FROM siswa s INNER JOIN pembayaran p ON s.nis = p.nis AND p.nis='$nis'");
      list($nama,$tgl_bayar,$jml) = mysql_fetch_array($sql);
      
      $printTestText = "NIS   : ".$nis."\n";
      $printTestText .= "NAMA  : ".$nama."\n";
      $printTestText .= "KELAS : ".$kls."\n\n";
      $printTestText .= "========================================\n";
      $printTestText .= str_pad($tgl_bayar,20);
		$printTestText .= str_pad($bln,3);
		$printTestText .= str_pad($jml,10," ",STR_PAD_LEFT)."\n";
      $printTestText .= "========================================\n";
      $printTestText .= "\n";
      $printTestText .= "\n";
      $printTestText .= str_pad("--= TERIMA KASIH =--",40," ",STR_PAD_BOtd)."\n";
      $printTestText .= "\n";
      
      //echo $printTestText;
      $handle = printer_open('PDFcreator');	             //nama printer
      printer_set_option($handle, PRINTER_MODE, "TEXT");  //mode printer: RAW, TEXT
      printer_write($handle, $printTestText);
      printer_close($handle);
      
      //tutup jendela setelah cetak
      echo '<script>window.close();</script>';
   } else {
      //cetak seluruh pembayaran sesuai NIS
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <meta name="description" content="">
    <meta name="autdor" content="">

    <title>.: SBA :.</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<style type="text/css">
             table {
                    widtd: 100%;
                    font-size: 12px;
                    color: #212121;
                }
                tr, td {
                    border: table-cell;
                    border: 1px  solid #444;
                    padding: 10px!important;

                }
                tr,td {
                    vertical-align: top!important;
                }
                #lbr {
                    font-size: 20px;
                }
                .isi {
                    height: 200px!important;
                }
                .tgh {
                    text-align: center;
                }
                .disp {
                    text-align: center;
                    margin: -.5rem 0;
                }
                .logodisp {
                    float: left;
                    position: relative;
                    widtd: 80px;
                    height: 80px;
                    margin: .5rem 0 0 .5rem;
                }
                #lead {
                    widtd: auto;
                    position: relative;
                    margin: 15px 0 0 75%;
                }
                .lead {
                    font-weight: bold;
                    text-decoration: underline;
                    margin-bottom: 10px;
                }
                #nama {
                    font-size: 30px!important;
                    font-weight: bold;
                    text-transform: uppercase;
                    margin: -10px 0 -5px 0;
                }
                .up {
                    font-size: 18px!important;
                    font-weight: normal;
                }
                .status {
                    font-size: 18px!important;
                    font-weight: normal;
                    margin-bottom: -.1rem;
                }
                #alamat {
                    margin-top: -15px;
                    font-size: 17px;
					margin-bottom: 25px;
                }
				#alamat2 {
                    margin-top: -15px;
                    font-size: 17px;
					margin-bottom: 25px;
					text-align: left;
                }
				#alamat3 {
                    margin-top: -17px;
                    font-size: 17px;
					margin-bottom: -20px;
					text-align: left;
					font-weight: bold;
                }
				#alamat4 {
                    margin-top: -18px;
                    font-size: 17px;
					margin: -2.5em 0 2.5em;
					text-align: left;
					font-weight: bold;
					text-decoration: underline;
					letter: 10px;
                }
                #lbr {
                    font-size: 18px;
                    font-weight: bold;
					text-align: right;
					margin: -8rem 0 3rem;
                }
                .separator {
                    border-bottom: 1px solid #616161;
                    margin: -2rem 0 2em;
                }
            @media print{
                body {
                    font-size: 12px;
                    color: #212121;
                }
                nav {
                    display: none;
                }
                table {
                    widtd: 100%;
                    font-size: 12px;
                    color: #212121;
					margin: -2em 0 2.5em;
                }
                tr, td {
                    border: table-cell;
                    border: 1px solid #444;
                    padding: 10px!important;

                }
                tr,td {
                    vertical-align: top!important;
                }
                #lbr {
                    font-size: 20px;
                }
                .isi {
                    height: 200px!important;
                }
                .tgh {
                    text-align: center;
					font-size: 16px;
                }
                .disp {
                    text-align: center;
                    margin: -.5rem 0;
                }
                .logodisp {
                    float: left;
                    position: relative;
                    widtd: 80px;
                    height: 80px;
                    margin: .5rem 0 0 .5rem;
                }
                #lead {
                    widtd: auto;
                    position: relative;
                    margin: 15px 0 0 75%;
                }
                .lead {
                    font-weight: bold;
                    text-decoration: underline;
                    margin-bottom: 10px;
                }
                #nama {
                    font-size: 28px!important;
                    font-weight: bold;
                    text-transform: uppercase;
                    margin: -10px 0 -5px 0;
                }
                .up {
                    font-size: 18px!important;
                    font-weight: normal;
                }
                .status {
                    font-size: 18px!important;
                    font-weight: normal;
                    margin-bottom: -.1rem;
                }
                #alamat {
                    margin-top: -15px;
                    font-size: 17px;
					margin-bottom: 25px;
                }
				#alamat2 {
                    margin-top: -15px;
                    font-size: 17px;
					margin-bottom: 30px;
					text-align: left;
                }
				#alamat3 {
                    margin-top: -17px;
                    font-size: 17px;
					margin-bottom: -20px;
					text-align: left;
					font-weight: bold;
                }
				#alamat4 {
                    margin-top: -18px;
                    font-size: 17px;
					margin: -2.5em 0 2.5em;
					text-align: left;
					font-weight: bold;
					text-decoration: underline;
					letter: 10px;
                }
                #lbr {
                    font-size: 16px;
                    font-weight: bold;
					text-align: right;
					margin: -6rem 0 3rem;
                }
                .separator {
                    border-bottom: 1px solid #616161;
                    margin: -2rem 0 2em;
                }

            }
        </style>
  </head>

  <body onload="window.print()">	
  <div class="disp">
<?php
						
   $sql = mysql_query("SELECT * FROM tbl_laptop_pb WHERE nis='$nis'");
   list($nis,$nama,$satuan_kerja,$it,$keterangan,$no_surat,$jabatan,$type,$sn,$no_inventory,$sfile) = mysql_fetch_array($sql);
    echo '<h6 class="right" id="lbr">'.$nis.'</h6><br/><br/>';
	echo '<h5 class="alamat" id="nama">BERITA ACARA</h5><br/><br/>';
	echo '<h5 class="alamat" id="nama">SERAH TERIMA PERANGKAT IT</h5><br/><br/>';
	echo '<div class="separator"></div>';
	   echo '<div class="row">';
	   echo '<div class="col-sm-6">
			<table>';
			   echo '<h6 id="alamat">Pada hari ___________ tanggal ______ bulan ______________ tahun _________,</h6>';
			   echo '<h6 id="alamat2">yang bertanda tangan dibawah ini:</h6>';
			   
			   echo '<h6 id="alamat2">Nama&emsp;&emsp;&emsp;&emsp;:<p id="alamat3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;'.$jabatan.'</p></h6>';
			   echo '<h6 id="alamat2">Jabatan&emsp;&emsp;&emsp;:<p id="alamat3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;IT Desktop Support</p></h6>';
			   echo '<h6 id="alamat2">Satuan Kerja&nbsp;&ensp;:<p id="alamat3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;IT Infrastructure & Operations</p></h6>';
			 
			   echo '<h6 id="alamat2">yang selanjutnya disebut sebagai <u id="alamat3">PIHAK PERTAMA,</u></h6>';
			   
			   echo '<h6 id="alamat2">Nama&emsp;&emsp;&emsp;&emsp;:<p id="alamat3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;'.$nama.'</p></h6>';
			   echo '<h6 id="alamat2">Jabatan&emsp;&emsp;&emsp;:<p id="alamat3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;'.$satuan_kerja.' ('.$no_surat.')</p></h6>';
			   echo '<h6 id="alamat2">Satuan Kerja&nbsp;&ensp;:<p id="alamat3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;'.$it.'</</p></h6>';
			   
			   echo '<h6 id="alamat2">yang selanjutnya disebut sebagai <u id="alamat3">PIHAK KEDUA,</u></h6></br>';
			   
			   echo '<h6 style="text-align:justify;" id="alamat2">Dengan ini 
					 <b id="alamat3">PIHAK PERTAMA</b> menyerahkan kembali kepada 
					 <b id="alamat3">PIHAK KEDUA</b> perangkat -</h6>';
			   echo '<h6 id="alamat2">perangkat IT tersebut dibawah ini :</h6>';
	
			   echo '<tr><td class="tgh" width="30px">NO</td>';
			   echo '<td class="tgh" width="70px">Merek</td>';
			   echo '<td class="tgh" width="90px">Type</td>';
			   echo '<td class="tgh" width="120px">S/N</td>';
			   echo '<td class="tgh" width="150px">No Inventory</td>';
			   echo '<td class="tgh" width="220px">Keterangan</td>';
			   echo '</tr>';
   //tampilkan histori pembayaran, jika ada
   $qhp_pb = mysql_query("SELECT merek,type,sn,no_inventory,keterangan FROM tbl_laptop_pb WHERE nis='$nis'");
   if(mysql_num_rows($qhp_pb) > 0){
      $no = 1;
      while(list($merek,$type,$sn,$no_inventory,$keterangan) = mysql_fetch_array($qhp_pb)){
         echo '<tr><td>'.$no.'</td>';
         echo '<td>'.$merek.'</td>';
         echo '<td>'.$type.'</td>';
         echo '<td>'.$sn.'</td>';
         echo '<td>'.$no_inventory.'</td>';
         echo '<td>'.$keterangan.'</td>';
         echo '</tr>';
         echo '<tr><td>_</td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '</tr>';
         $no++;
      }
   } else {
      echo '<tr><td colspan="6"><em>Belum ada data!</em></td></tr>';
   }
   echo '</table></div></div>';
   echo '<h6 style="text-align:justify;" id="alamat2">Demikian Berita Acara ini dibuat untuk digunakan sebagai kepentingan perusahaan.</h6>';
?>
 </tbody>
            </table>
			    <div id="left"><br/><br/>
            </div>
        </div><br/>
            <div id="left"><br/>
                <h6 style="text-align:justify;" id="alamat">______________________&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
											&emsp;&emsp;&emsp;______________________</h6>
				<h6 style="text-align:justify;" id="alamat">&emsp;&emsp;Pihak Pertama, &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
											&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Pihak Kedua,</h6><br/><br/<br/>
				<h6 class="tgh" id="alamat">______________________</h6>
				<h6 class="tgh" id="alamat">Mengetahui,</h6>
            </div>
        </div>
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