<script type="text/javascript">
$(function() {
	$("#dataTable.detail tr:even").addClass("stripe1");
	$("#dataTable.detail tr:odd").addClass("stripe2");
	$("#dataTable.detail tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
/*function hapusData(id){
	var po_number = $("#po_number").val();
	var string = "po_number="+id;
	
	var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/import/hapusDetail",
			data	: string,
			cache	: false,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	}
}*/
</script>

<!--<table id="dataTable" class="detail" width="100%">
<tr>
	<th>No</th>
    <th>Po Number</th>
    <th>Jenis Dokumen</th>
    <th>Nomer Dokumen Pabean</th>
    <th>Tanggal Dokumen Pabean</th>
    <th>No Seri Barang</th>
    <th>No Bukti Penerimaan Barang</th>
    <th>Tanggal Bukti Penerimaan Barang</th>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Satuan</th>
    <th>Jumlah</th>
    <th>Mata Uang</th>
    <th>Nilai Barang</th>
    <th>Gudang</th>
    <th>Penerima Subkonbtrak</th>
    <th>Negara Asal Barang</th>
    <th>Hapus</th>
</tr>
<?php 
if($data->num_rows() > 0){
	$t_dr =0;
	$t_kr =0;
	$no=1;
	foreach($data->result() as $t){
		$nama_rek = $this->app_model->CariNamaRek($t->no_rek);
?>-->
	<tr>
    	<td align="center" width="20"><?php echo $no; ?></td>
            <td align="center" width="150" ><?php echo $db['po_number']; ?></td>
            <td align="center" width="150" ><?php echo $db['jenis_doc']; ?></td>
            <td align="center" width="150" ><?php echo $db['dokumen_pabean_no']; ?></td>
            <td align="center" width="150" ><?php echo $db['tanggal_dokumen_pabean']; ?></td>
            <td align="center" width="150" ><?php echo $db['no_seri_barang']; ?></td>
            <td align="center" width="150" ><?php echo $db['no_bukti_penerimaan_barang']; ?></td>
            <td align="center" width="150" ><?php echo $db['tanggal_bukti_penerimaan_barang']; ?></td>
            <td align="center" width="150" ><?php echo $db['kode_barang']; ?></td>
            <td align="center" width="150" ><?php echo $db['nama_barang']; ?></td>
            <td align="center" width="150" ><?php echo $db['satuan']; ?></td>
            <td align="center" width="150" ><?php echo $db['jumlah']; ?></td>
            <td align="center" width="150" ><?php echo $db['mata_uang']; ?></td>
            <td align="center" width="150" ><?php echo $db['nilai_barang']; ?></td>
            <td align="center" width="150" ><?php echo $db['gudang']; ?></td>
            <td align="center" width="150" ><?php echo $db['penerima_subkontrak']; ?></td>
            <td align="center" width="150" ><?php echo $db['negara_asal_barang']; ?></td>
        <td align="center" width="80">
            <?php echo "<a href='javascript:hapusData(\"{$t->no_bukti_penerimaan_barang}\")'>";?>
			<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
		</td>
	</tr>        
<!--<?php	
		$t_dr =$t_dr+$t->debet;
		$t_kr =$t_kr+$t->kredit;
		$no++;
	}
?>

<?php
}else{
	$t_dr =0;
	$t_kr =0;
?>
<tr>
	<td colspan="6" align="center">Tidak ada data</td>
</tr>
<?php 
}
?>
<tr>
	<td colspan="3" align="center"><b>Saldo</b></td>
    <td align="right"><b><?php echo number_format($t_dr);?></b></td>
    <td align="right"><b><?php echo number_format($t_kr);?></b></td>-->
</table>    <script type="text/javascript">
$(function() {
	$("#dataTable.detail tr:even").addClass("stripe1");
	$("#dataTable.detail tr:odd").addClass("stripe2");
	$("#dataTable.detail tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
function hapusData(id){
	var no_jurnal = $("#no_jurnal").val();
	var string = "no_jurnal="+no_jurnal+"&no_rek="+id;
	
	var pilih = confirm('Data yang akan dihapus no rek = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/jurnal_umum/hapusDetail",
			data	: string,
			cache	: false,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	}
}
</script>

<table id="dataTable" class="detail" width="100%">
<tr>
	<th>No</th>
    <th>#Rek</th>
    <th>Nama Rek</th>
    <th>Debet</th>
    <th>Kredit</th>
    <th>Hapus</th>
</tr>
<?php 
if($data->num_rows() > 0){
	$t_dr =0;
	$t_kr =0;
	$no=1;
	foreach($data->result() as $t){
		$nama_rek = $this->app_model->CariNamaRek($t->no_rek);
?>
	<tr>
    	<td width="5" align="center"><?php echo $no;?></td>
        <td width="100" align="center"><?php echo $t->no_rek;?></td>
        <td ><?php echo $nama_rek;?></td>
        <td align="right"><?php echo number_format($t->debet);?></td>
        <td align="right"><?php echo number_format($t->kredit);?></td>
        <td align="center" width="80">
            <?php echo "<a href='javascript:hapusData(\"{$t->no_rek}\")'>";?>
			<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
		</td>
	</tr>        
<?php	
		$t_dr =$t_dr+$t->debet;
		$t_kr =$t_kr+$t->kredit;
		$no++;
	}
?>

<?php
}else{
	$t_dr =0;
	$t_kr =0;
?>
<tr>
	<td colspan="6" align="center">Tidak ada data</td>
</tr>
<?php 
}
?>
<tr>
	<td colspan="3" align="center"><b>Saldo</b></td>
    <td align="right"><b><?php echo number_format($t_dr);?></b></td>
    <td align="right"><b><?php echo number_format($t_kr);?></b></td>
</table>    