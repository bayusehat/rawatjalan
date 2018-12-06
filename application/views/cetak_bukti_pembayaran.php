<style type="text/css">
	#tb-item{
    border-collapse: collapse;
}
</style>
<h1><i><img src="<?php $_SERVER['DOCUMENT_ROOT'];?>assets/img/hospital-lg.png" style="width:30px;height:30px"></i> BUKTI PEMBAYARAN</h1>
<hr>
<h3>Nomor Pembayaran : <?php echo $bayar->no_pembayaran;?></h3>
<h3>Jenis Pembayaran : <?php echo $bayar->jenis_pembayaran;?></h3>
<br>
			<table class="tb-item" id="tb-item" border="1">
				<tr>
					<th>
						No. Rawat Jalan 
					</th>
					<th>
						No. Rekam Medis
					</th>
					<th>
						Nama Pasien
					</th>
					<th>
						Jumlah
					</th>					
					<th>
						Biaya
					</th>
					<th colspan="2">
						Subtotal
					</th>
				</tr>
				<?php 
				$query = $this->db->query('SELECT no_rj,no_rm,nama_pasien,tarif,subtotal,jumlah FROM tb_detail_pembayaran WHERE no_pembayaran='.$bayar->no_pembayaran)->result();
				foreach($query as $value){
				echo'
				<tr>
					<td>'.$value->no_rj.'</td>
					<td>'.$value->no_rm.'</td>
					<td>'.$value->nama_pasien.'</td>
					<td>'.$value->jumlah.'</td>
					<td> Rp '.number_format($value->tarif,0,'.','.').'</td>
					<td colspan="2" style="text-align:right">'.number_format($value->subtotal,0,'.','.').'</td>
				</tr>';
				}
				?>
				<tr>
					<td colspan="5" class="whi"></td>
					<td class="rp yell">Total</td>
					<td class="price yell" style="text-align:right"><?php echo number_format($bayar->total,0,'.','.');?></td> 
				</tr>
				<tr>
					<td colspan="5" class="whi"></td>
					<td class="rp yell">Bayar </td>
					<td class="price yell" style="text-align:right"><?php echo number_format($bayar->bayar,0,'.','.');?></td> 
				</tr>
				<tr>
					<td colspan="5" class="whi"></td>
					<td class="rp yell">Kembali </td>
					<td class="price yell" style="text-align:right"><?php echo number_format($bayar->kembali,0,'.','.');?></td> 
				</tr>
			</table>
			<br>
			<div style="height: 100px;margin-left: 500px">
				<p>Tertanda,</p>
				<p style="margin-top: 90px"><?php echo $bayar->nama_pasien;?></p>
			</div>