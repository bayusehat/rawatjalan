<h1><i><img src="<?php $_SERVER['DOCUMENT_ROOT'];?>assets/img/hospital-lg.png" style="width:30px;height:30px"></i> Cetak Nota </h1>
<hr>
<h3>Pembayaran 		  : <?php echo $rawat->pembayaran;?></h3>
<h3>Nomor Rawat Jalan : <?php echo $rawat->no_rj;?></h3>
<h3>Nomor Rekam Medis : <?php echo $rawat->no_rm;?></h3>
<h3>Nama Pasien       : <?php echo $rawat->nama_pasien;?></h3>
<h3>Usia              : 
<?php 
$tgl_lahir = $rawat->tanggal_lahir;
$today = date('Y-m-d');
$now = time();
  list($thn, $bln, $tgl) = explode('-',$tgl_lahir);
        $time_lahir = mktime(0,0,0,$bln, $tgl, $thn);

        $selisih = $now-$time_lahir;

        $tahun = floor($selisih/(60*60*24*365));
        $bulan = round(($selisih % (60*60*24*365) ) / (60*60*24*30));

        echo $tahun.' tahun'.$bulan.' bulan';
?></h3>
