<p>Hai, Selamat datang <b><?php echo $this->session->userdata('nama_lengkap');?></b> di Manajemen <b><?php echo $nama_program;?></b></p>
<br />
<table class="list" width="100%">
	<thead>
    <td class="btn" colspan="6"><center><b>Menu Utama</b></center></td>
    </thead>
    <tr>
    	<td class="btn" align="center" width="20%"><a href="<?php echo base_url();?>index.php/import"><img src="<?php echo base_url();?>asset/images/surat_perintah.png" /><br />
        <b>Pemasukan Bahan Baku</b></a>
        </td>
        <td align="center" width="20%"><a href="<?php echo base_url();?>index.php/production"><img src="<?php echo base_url();?>asset/images/berita.png" /><br />
        <b>Pemakaian Bahan Baku</b></a>
        </td>
        <td  class="btn" align="center" width="20%"><a href="<?php echo base_url();?>index.php/buku_besar"><img src="<?php echo base_url();?>asset/images/surat_keputusan.png" /><br />
        <b>Buku Besar</b></a>
        </td>
		<td align="center" width="20%"><a href="<?php echo base_url();?>index.php/lap_laba_rugi"><img src="<?php echo base_url();?>asset/images/surat_keluar.png" /><br />
        <b>Laba Rugi</b></a>
        </td>
        <td class="btn" align="center" width="20%"><a href="<?php echo base_url();?>index.php/lap_neraca"><img src="<?php echo base_url();?>asset/images/keuangan.png" /><br />
        <b>Neraca</b></a>
        </td>
	</tr>       
</table> 
<!--Catatan : 
<ol>
<li>Kasus yang ditangani pada akuntansi standard ini adalah Perusahaan Jasa</li>
<li>Pastikan jurnal Anda diisi dengan benar</li>
<li>Aplikasi ini terhubung dengan Sistem IT Inventory</li>
<li>Untuk menu inventory akan singkronisasi apabila klik refresh</li>
<li>Jika ada perubahan No.Rek (COA) pada Prive Pemilik Modal. Ubah/edit pada kode program lap_neraca/view_data</li>-
</ol>-->
