<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
	$("#tanggal_dokumen_pabean").datepicker({
			dateFormat:"yy-mm-dd"
    });
    $("#tanggal_bukti_penerimaan_barang").datepicker({
			dateFormat:"yy-mm-dd"
    });
	
	$("#view").show();
	$("#form").hide();
	
	$("#tambah").click(function(){
		$("#view").hide();
		$("#form").show();
		$("#po_number").focus();
		return false();
	});
	
	function kosong(){
		$(".kosong").val('');
		$(".angka").val('');
		$("#po_number").val('');
		$("#jenis_doc").val('');
		$("#dokumen_pabean_no").val('');
		$("#tanggal_dokumen_pabean").val('');
		$("#no_seri_barang").val('');
		$("#no_bukti_penerimaan_barang").val('');
		$("#tanggal_bukti_penerimaan_barang").val('');
		$("#kode_barang").val('');
		$("#nama_barang").val('');
		$("#satuan").val('');
		$("#jumlah").val('');
		$("#mata_uang").val('');
		$("#nilai_barang").val('');
		$("#gudang").val('');
		$("#penerima_subkontrak").val('');
		$("#negara_asal_barang").val('');
		return false();
	}
	$("#simpan").click(function(){
		var po_number	= $("#po_number").val();
		var jenis_doc 		= $("#jenis_doc").val();
		var dokumen_pabean_no 	= $("#dokumen_pabean_no").val();
		var tanggal_dokumen_pabean	= $("#tanggal_dokumen_pabean").val();
		var no_seri_barang	= $("#no_seri_barang").val();
		var no_bukti_penerimaan_barang	= $("#no_bukti_penerimaan_barang").val();
		var tanggal_bukti_penerimaan_barang	= $("#tanggal_bukti_penerimaan_barang").val();
		var kode_barang	= $("#kode_barang").val();
		var nama_barang	= $("#nama_barang").val();
		var satuan	= $("#satuan").val();
		var jumlah	= $("#jumlah").val();
		var mata_uang	= $("#mata_uang").val();
		var nilai_barang	= $("#nilai_barang").val();
		var gudang	= $("#gudang").val();
		var penerima_subkontrak	= $("#penerima_subkontrak").val();
		var negara_asal_barang	= $("#negara_asal_barang").val();

		var string = "po_number="+po_number+"&jenis_doc="+jenis_doc+"&dokumen_pabean_no="+dokumen_pabean_no+"&tanggal_dokumen_pabean="+tanggal_dokumen_pabean+"&no_seri_barang="+no_seri_barang+"&no_bukti_penerimaan_barang="+no_bukti_penerimaan_barang+"&tanggal_bukti_penerimaan_barang="+tanggal_bukti_penerimaan_barang+"&kode_barang="+kode_barang+"&nama_barang="+nama_barang+"&satuan="+satuan+"&jumlah="+jumlah+"&mata_uang="+mata_uang+"&nilai_barang="+nilai_barang+"&gudang="+gudang+"&penerima_subkontrak="+penerima_subkontrak+"&negara_asal_barang="+negara_asal_barang;
		
		if(po_number.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Po Number Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});
			$("#po_number").focus();
			return false;
		}
		/*if(jenis_doc.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jenis Document Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});
			$("#jenis_doc").focus();
			return false;
		}*/
		

$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/import/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data,
					timeout:2000,
					showType:'slide'
				});
				tampil_data();
			}
		});
function tampil_data(){
		var po_number = $("#po_number").val();
		var string = "po_number="+po_number;
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/po_number/DetailImport",
			data	: string,
			cache	: false,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	}

		/*$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/import/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data,
					timeout:2000,
					showType:'slide'
				});
			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
				return false();
			}
		});*/
		return false();
	});
	
	/*$("#tambah_data").click(function(){
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/import/tambah",
			cache	: false,
			success	: function(data){
				kosong();
				$("#no_rek").focus();
			}
		});*/
		return false();
	});

$("#tambah_data").click(function(){
		$(".kosong").val('');
		$(".angka").val('');
		$("#po_number").focus();
		//buat_nojurnal();
	});
	
	$("#kembali").click(function(){
		window.location.assign('<?php echo base_url();?>index.php/import');
		return false();
	});


function editData(id){
	var string = "id="+id;
	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/import/edit",
			data	: string,
			cache	: true,
			dataType : "json",
			success	: function(data){
				$("#view").hide();
				$("#form").show();
				
				$("#po_number").focus();

				$("#po_number").val(id);
				$("#jenis_doc").val(data.jenis_doc);
				$("#dokumen_pabean_no").val(data.dokumen_pabean_no);
				$("#tanggal_dokumen_pabean").val(data.tanggal_dokumen_pabean);
				$("#no_seri_barang").val(data.no_seri_barang);
				$("#no_bukti_penerimaan_barang").val(data.no_bukti_penerimaan_barang);
				$("#tanggal_bukti_penerimaan_barang").val(data.tanggal_bukti_penerimaan_barang);
				$("#kode_barang").val(data.kode_barang);
				$("#nama_barang").val(data.nama_barang);
				$("#satuan").val(data.satuan);
				$("#jumlah").val(data.jumlah);
				$("#mata_uang").val(data.mata_uang);
				$("#nilai_barang").val(data.nilai_barang);
				$("#gudang").val(data.gudang);
				$("#penerima_subkontrak").val(data.penerima_subkontrak);
				$("#negara_asal_barang").val(data.negara_asal_barang);
				return false();
			}
	});
}
</script>
<div id="view">

    <div style="float:left; padding-bottom:5px;">
    <button type="button" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
    
    <a href="<?php echo base_url();?>index.php/import">
    <button type="button" name="refresh" id="refresh" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">Refresh</button>
    </a>
    </div>
    <div style="float:right; padding-bottom:5px;">
    <form name="form" method="post" action="<?php echo base_url();?>index.php/import">
    Cari Perihal : <input type="text" name="txt_cari" id="txt_cari" size="50" />
    <button type="submit" name="cari" id="cari" class="easyui-linkbutton" data-options="iconCls:'icon-search'">Cari</button>
    </form>
    </div>

<div style="padding:10px;"></div>
<table id="dataTable" width="100%">
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
    <th>Aksi</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){  
		?>    
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
            <!--<td ><?php echo $db['id_import']; ?></td>-->
            <td align="center" width="80">
            <?php echo "<a href='javascript:editData(\"{$db['po_number']}\")'>";?>
			<img src="<?php echo base_url();?>asset/images/ed.png" title='Edit'>
			</a>
            <a href="<?php echo base_url();?>index.php/import/hapus/<?php echo $db['po_number'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
			<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
    </tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="6" align="center" >Tidak Ada Data</td>
        </tr>
    <?php	
	}
?>
</table>
<?php echo "<table align='center'><tr><td>".$paginator."</td></tr></table>"; ?>

</div>
<div id="form">
<fieldset class="atas">
<table width="100%">
<!--<tr>
	<td width="10%">Rek Induk</td>
    <td width="5">:</td>
    <td>
    <select name="rek_induk" id="rek_induk" class="combo">
    <option value="0">-PILIH-</option>
    <?php
	foreach($list->result() as $t){
	?>
    <option value="<?php echo $t->no_rek;?>"><?php echo $t->nama_rek;?></option>
    <?php } ?>
    </select>
    </td>
</tr>-->
<tr>    
	<td>Po Number</td>
    <td>:</td>
    <td><input type="text" name="po_number" id="po_number"class="form-control" required="true" size="50" maxlength="50" /></td>
</tr>
<tr>    
	<td>Jenis Dokumen</td>
    <td>:</td>
    <td><input type="text" name="jenis_doc" id="jenis_doc"  size="50" maxlength="50" /></td>
</tr>
<tr>    
	<td>No Dokumen Pabean</td>
    <td>:</td>
    <td><input type="text" name="dokumen_pabean_no" id="dokumen_pabean_no"  size="50" maxlength="50" /></td>
</tr>
<tr>    
            <td>Tanggal Dokumen Pabean</td>
            <td>:</td>
            <td>
            <input type="text" name="tanggal_dokumen_pabean" id="tanggal_dokumen_pabean" size="15" maxlength="15" />
            </td>
        </tr> 
<tr>    
	<td>No Seri barang</td>
    <td>:</td>
    <td><input type="text" name="no_seri_barang" id="no_seri_barang"  size="50" maxlength="50" /></td>
</tr>
<tr>    
	<td>No Bukti Penerimaan Barang</td>
    <td>:</td>
    <td><input type="text" name="no_bukti_penerimaan_barang" id="no_bukti_penerimaan_barang"  size="50" maxlength="50" /></td>
</tr>
<tr>    
            <td>Tanggal Bukti Penerimaan Barang</td>
            <td>:</td>
            <td>
            <input type="text" name="tanggal_bukti_penerimaan_barang" id="tanggal_bukti_penerimaan_barang" size="15" maxlength="15" />
            </td>
        </tr> 
	<td>Kode Barang</td>
    <td>:</td>
    <td><input type="text" name="kode_barang" id="kode_barang"  size="50" maxlength="50" /></td>
</tr>
<tr>    
	<td>Nama barang</td>
    <td>:</td>
    <td><input type="text" name="nama_barang" id="nama_barang"  size="50" maxlength="50" /></td>
</tr>
<tr>    
	<td>Satuan</td>
    <td>:</td>
    <td><input type="text" name="satuan" id="satuan"  size="50" maxlength="50" /></td>
</tr>
<tr>    
	<td>Jumlah</td>
    <td>:</td>
    <td><input type="text" name="jumlah" id="jumlah"  size="50" maxlength="50" /></td>
</tr>
<tr>    
	<td>Mata Uang</td>
    <td>:</td>
    <td><input type="text" name="mata_uang" id="mata_uang"  size="50" maxlength="50" /></td>
</tr>
<tr>    
	<td>Nilai Barang</td>
    <td>:</td>
    <td><input type="text" name="nilai_barang" id="nilai_barang"  size="50" maxlength="50" /></td>
</tr>
<tr>    
	<td>Gudang</td>
    <td>:</td>
    <td><input type="text" name="gudang" id="gudang"  size="50" maxlength="50" /></td>
</tr>
<tr>    
	<td>Penerima Subkontrak</td>
    <td>:</td>
    <td><input type="text" name="penerima_subkontrak" id="penerima_subkontrak"  size="50" maxlength="50" /></td>
    <tr>    
	<td>Negara Asal barang</td>
    <td>:</td>
    <td><input type="text" name="negara_asal_barang" id="negara_asal_barang"  size="50" maxlength="50" /></td>
</tr>
</tr>
</table>
</fieldset>
<fieldset class="bawah">
<table width="100%">
<tr>
	<td colspan="3" align="center">
    <button type="button" name="simpan" id="simpan" class="easyui-linkbutton" data-options="iconCls:'icon-save'">SIMPAN</button>
    <button type="button" name="tambah_data" id="tambah_data" class="easyui-linkbutton" data-options="iconCls:'icon-add'">TAMBAH</button>
    <button type="button" name="kembali" id="kembali" class="easyui-linkbutton" data-options="iconCls:'icon-back'">KEMBALI</button>
    </td>
</tr>
</table>  
</fieldset>   
</div>