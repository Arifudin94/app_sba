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
					font-weight: bold;
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
                    font-size: 22px!important;
                    font-weight: bold;
                    text-transform: uppercase;
                    margin: -50px 0 25px 0;
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
                    margin-top: -35px;
                    font-size: 16px;
					margin-bottom: 22px;
                }
				#alamat2 {
                    margin-top: -15px;
                    font-size: 15px;
					text-align: left;
                }
				#alamat3 {
                    margin-top: -17px;
                    font-size: 16px;
					margin-bottom: 20px;
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
						
   $sql = mysql_query("SELECT * FROM tbl_headset_hl WHERE nis='$nis'");
   list($nis,$nama,$satuan_kerja,$it,$keterangan,$no_surat,$jabatan,$type,$sn,$no_inventory,$sfile) = mysql_fetch_array($sql);
    echo '<h6 class="right" id="lbr">'.$nis.'</h6><br/><br/>';
	echo '<h5 class="alamat" id="nama">SURAT PERNYATAAN</h5><br/><br/>';
	echo '<h5 class="alamat" id="nama">HOLDER IT</h5><br/>';
	   echo '<div class="row">';
	   echo '<div class="col-sm-6">
			<table>';
			   echo '<h6 id="alamat2">Surat Pernyataan Holder IT ini dibuat pada  tanggal ____ bulan ____________ tahun ______, oleh :</h6>';
			   
			   echo '<h6 id="alamat2">Nama&emsp;&emsp;&emsp;&emsp;&nbsp;:<p id="alamat3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$nama.'</p></h6>';
			   echo '<h6 id="alamat2">Jabatan&emsp;&emsp;&emsp;&nbsp;:<p id="alamat3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$satuan_kerja.' ('.$no_surat.')</p></h6>';
			   echo '<h6 id="alamat2">Satuan Kerja&emsp;:<p id="alamat3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.$it.'</</p></h6>';
			   echo '<h6 id="alamat2">dengan ini menyatakan beberapa hal sebagai berikut :</h6></br>';
			   echo '<h6 id="alamat3"><u id="alamat3">INDENTIFIKASI PERANGKAT IT</u></h6>';
			   echo '<h6 id="alamat2">Telah menerima perangkat IT dengan spesifikasi sebagai berikut :</h6>';
	
			   echo '<tr><td class="tgh" width="30px">NO</td>';
			   echo '<td class="tgh" width="70px">Merek</td>';
			   echo '<td class="tgh" width="90px">Type</td>';
			   echo '<td class="tgh" width="120px">S/N</td>';
			   echo '<td class="tgh" width="150px">No Inventory</td>';
			   echo '<td class="tgh" width="220px">Keterangan</td>';
			   echo '</tr>';
   //tampilkan histori pembayaran, jika ada
   $qhp_hl = mysql_query("SELECT merek,type,sn,no_inventory,keterangan FROM tbl_headset_hl WHERE nis='$nis'");
   if(mysql_num_rows($qhp_hl) > 0){
      $no = 1;
      while(list($merek,$type,$sn,$no_inventory,$keterangan) = mysql_fetch_array($qhp_hl)){
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
   
			   echo '<h6 id="alamat3"><u id="alamat3">PENGGUNAAN PERANGKAT IT</u></h6>';
			   echo '<h6 style="text-align:justify;" id="alamat2">&emsp;Hanya akan menggunakan, mengakses menggunakan dan mengelola <b>PERANGKAT IT</b> sesuai ketentuan yang berlaku.</h6>';
			   echo '<h6 id="alamat3"><u id="alamat3">HAK MILIK PERANGKAT IT</u></h6>';
			   echo '<h6 style="text-align:justify;" id="alamat2">&emsp;Kepemilikan <b>PERANGKAT IT</b> adalah milik <b>PERUSAHAAN</b>, dan <b>HOLDER IT</b> sebagai <b>PENGGUNA</b> untuk kepentingan sesuai ketentuan yang berlaku.</h6>';
			   echo '<h6 id="alamat3"><u id="alamat3">KEHILANGAN DAN KERUSAKAN PERANGKAT IT</u></h6>';
			   echo '<h6 style="text-align:justify;" id="alamat2">
				<ol>
				  <li><b>HOLDER IT</b> bertanggung jawab penuh atas kehilangan dan kerusakan <b>PERANGKAT IT</b> selama <b>PERANGKAT IT</b> berada dibawah penguasaan <b>HOLDER IT</b> sesuai ketentuan yang berlaku.</li>
				  <li><b>HOLDER IT</b> wajib untuk memberikan laporan tertulis kepada <b>PERUSAHAAN</b> selambat-lambatnya 1 (satu) hari setelah tanggal kehilangan <b>PERANGKAT IT</b> terjadi.</li>
				  <li>Dalam hal terjadi kehilangan atau kerusakan terhadap <b>PERANGKAT IT</b> yang disebabkan oleh pihak ketiga,  <b>HOLDER IT</b> tetap bertanggung jawab terhadap perusahaan.</li>
				</ol>
				</h6>';
			   echo '<h6 id="alamat3"><u id="alamat3">PERBUATAN YANG DILARANG</u></h6>';
			   echo '<h6 style="text-align:justify;" id="alamat2">&emsp;Selama menguasai dan menggunakan 
			   <b>PERANGKAT IT</b>, <b>HOLDER IT</b> dilarang untuk melakukan tindakan-tindakan sebagai berikut:<br/>
			 	a.	&nbsp;Menjual;<br/>
				b.	&nbsp;Menggadaikan;<br/>
				c.	&nbsp;Menyewakan;<br/>
				d.	&nbsp;Meminjamkan;<br/>
				e.	&nbsp;Menjaminkan;<br/>
				f.	&nbsp;&nbsp;Mengadakan perubahan-perubahan atau modifikasi;<br/>
				g.&nbsp; Hal-hal lainnya yang bertujuan untuk mengalihkan Hak Milik dari <b>PERANGKAT IT</b> kepada pihak <br/>  
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lain.
				</h6>';
?>
 </tbody>
            </table>
			    <div id="left"><br/><br/>
            </div>
        </div><br/>
            <div id="left">
				<h6 style="text-align:justify;" id="alamat">&emsp;&emsp;&emsp;Hormat Saya, &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
											&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Mengetahui,</h6><br/><br/><br/><br/><br/>
											
                <h6 style="text-align:justify;" id="alamat">(____________________)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
											&emsp;&emsp;&emsp;&emsp;&emsp;(____________________)</h6>
            </div>
        </div>
   </div> <!-- /container -->


    <!-- Bootstrap core JavaScript, Placed at tde end of tde document so tde pages load faster -->
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
}
?>