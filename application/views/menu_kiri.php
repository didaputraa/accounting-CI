<?php
$level = $this->session->userdata('level');
?>
<div id="kiri" style="float:left;">
    <div id="Profil" class="easyui-panel" title="Level : <?php echo strtoupper($level);?>" style="float:left;width:170px;height:90px;padding:5px;">
    <?php
    $id = $this->session->userdata('username');
    $foto = $this->app_model->getFoto($id);
    if(empty($foto)){
    ?>
    <img style="float:left;padding:2px;" src="<?php echo base_url();?>asset/foto_profil/ayah_profile.jpg" width="50" height="50" align="middle" />
    <?php }else{ ?>
    <img style="float:left;padding:2px;" src="<?php echo base_url();?>asset/foto_profil/<?php echo $foto;?>" width="50" height="50" align="middle" />
    <?php } ?>
    <p style="line-height:15px;">
    <b><?php echo $this->session->userdata('nama_lengkap');?></b><br />
    <a href="<?php echo site_url();?>/profile/edit/<?php echo $this->session->userdata('username');?>">Edit Profil</a>
    </p>
    </div>
    <div class="easyui-accordion" style="float:left;width:170px;">

    <?php
    if($level =='super admin' OR $level =='admin'){
    ?>

    <div id="menu1" title="Menu" data-options="iconCls:'icon-tip'"  style="overflow:auto;padding:5px 0px;">
        <div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
        <ul class="easyui-tree" >
            <?php
            if($level =='super admin'){
            ?>
            <li data-options="iconCls:'icon-surat_perintah'">
                <a href="<?php echo base_url();?>index.php/users">Users</a>
            </li>
            <?php } ?>
            <li data-options="iconCls:'icon-surat_perintah'">
                <a href="<?php echo base_url();?>index.php/rekening">Rekening</a>
            </li>
            <li data-options="iconCls:'icon-surat_perintah'">
                <a href="<?php echo base_url();?>index.php/kurs">Kurs</a>
            </li>
            <li data-options="iconCls:'icon-surat_keputusan'">
                <a href="<?php echo base_url();?>index.php/saldo_awal">Saldo Awal</a>
            </li>
            <li data-options="iconCls:'icon-surat_keluar'">
                <a href="<?php echo base_url();?>index.php/jurnal_umum">Jurnal Umum</a>
            </li>
            <li data-options="iconCls:'icon-surat_keluar'">
                <a href="<?php echo base_url();?>index.php/buku_besar">Buku Besar</a>
            </li>
            <li data-options="iconCls:'icon-surat_keluar'">
                <a href="<?php echo base_url();?>index.php/jurnal_penyesuaian">Jurnal Penyesuaian</a>
            </li>
             <!--</li>
            <li data-options="iconCls:'icon-surat_keluar'">
                <a href="<?php echo base_url();?>index.php/account_payable">Account Payable</a>
            </li>-->
            <!--<li data-options="iconCls:'icon-surat_keluar'">
                <a href="<?php echo base_url();?>index.php/account_received">Account Received</a>
            </li>-->
        </ul>
    </div>
    </div>
    <?php } ?>
    <!--<div id="menu2" title="Laporan" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
        <div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
        <ul class="easyui-tree">
            <li>
                <span><a href="<?php echo base_url();?>index.php/lap_buku_besar">Buku Besar</a></span>
            </li>
            <li>
                <span><a href="<?php echo base_url();?>index.php/lap_neraca_saldo">Neraca Saldo</a></span>
            </li>
            <li>
                <span><a href="<?php echo base_url();?>index.php/lap_neraca_lajur">Neraca Lajur</a></span>
            </li>
            <li>
                <span><a href="<?php echo base_url();?>index.php/lap_laba_rugi">Laba Rugi</a></span>
            </li>
            <li>
                <span><a href="<?php echo base_url();?>index.php/lap_neraca">Neraca</a></span>
            </li>
        </ul>-->


 <div id="menu2" title="Inventory" data-options="iconCls:'icon-tip'" style="overflow:auto;padding:5px 0px;">
        <div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
        <ul class="easyui-tree">
            </li>
             <li>
                <span><a href="<?php echo site_url('import'); ?>">Pemasukan Bahan Baku</a></span>
            </li>
            <li>
                <span><a href="<?php echo site_url('production'); ?>">Pemakaian Bahan Baku</a></span>
            </li>
            <li>
                <span><a href="<?php echo site_url('subkontrak'); ?>">Subkontrak</a></span>
            </li>
            <li>
                <span><a href="<?php echo site_url('finish_goods'); ?>">Pemasukan Produksi</a></span>
            </li>
            <li>
                <span><a href="<?php echo site_url('export'); ?>">Pengeluaran Produksi</a></span>
            </li>
            <li>
                <span><a href="<?php echo site_url('mutasi_bahan'); ?>">Mutasi Bahan</a></span>
            </li>
            <li>
                <span><a href="<?php echo site_url('mutasi_produksi'); ?>">Mutasi Hasil Produksi</a></span>
            </li>
            <li>
                <span><a href="<?php echo site_url('waste_scrap'); ?>">Waste/Scrap</a></span>
            </li>
            

    </div>
    </div>
    




<div id="menu2" title="Laporan" data-options="iconCls:'icon-print'" style="overflow:auto;padding:5px 0px;">
        <div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
        <ul class="easyui-tree">
            <li>
                <span><a href="<?php echo base_url();?>index.php/lap_buku_besar">Buku Besar</a></span>
            </li>
            <li>
                <span><a href="<?php echo base_url();?>index.php/lap_neraca_saldo">Neraca Saldo</a></span>
            </li>
            <li>
                <span><a href="<?php echo base_url();?>index.php/lap_neraca_lajur">Neraca Lajur</a></span>
            </li>
            <li>
                <span><a href="<?php echo base_url();?>index.php/lap_laba_rugi">Laba Rugi</a></span>
            </li>
            <li>
                <span><a href="<?php echo base_url();?>index.php/lap_neraca">Neraca</a></span>
            </li>
            <li data-options="iconCls:'icon-surat_keluar'">
                <a href="<?php echo base_url();?>index.php/account_payable">Account Payable</a>
            </li>
            <li data-options="iconCls:'icon-surat_keluar'">
                <a href="<?php echo base_url();?>index.php/account_received">Account Received</a>
            </li>
        </ul>






   <!-- <div id="menu3" title="Inventory" data-options="iconCls:'icon-tip'" style="overflow:auto;padding:5px 0px;">
        <div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
        <ul class="easyui-tree">
            </li>
            <li data-options="iconCls:'icon-surat_keluar'">
                <a href="<?php echo base_url();?>index.php/account_payable">Account Payable</a>
            </li>
            <li data-options="iconCls:'icon-surat_keluar'">
                <a href="<?php echo base_url();?>index.php/account_received">Account Received</a>
            </li>-->
           <!-- <li>
                <span><a href="<?php echo base_url();?>index.php/purchase">Purchase</a></span>
            </li>
            <li>
                <span><a href="<?php echo base_url();?>index.php/warehouse">Warehouse</a></span>
            </li>
            <li>
                <span><a href="<?php echo base_url();?>index.php/export">Export</a></span>
            </li>
          <li>
                <span><a href="<?php echo base_url();?>index.php/lap_laba_rugi">Laba Rugi</a></span>
            </li>
            <li>
                <span><a href="<?php echo base_url();?>index.php/lap_neraca">Neraca</a></span>
            </li>-->
        </ul>
    </div>
    </div>
    <div id="menu4" title="Grafik" data-options="iconCls:'icon-grafik'" style="overflow:auto;padding:5px 0px;">
        <div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
        <ul class="easyui-tree">
            <li>
                <span><a href="<?php echo base_url();?>index.php/grafik">Jurnal</a></span>
            </li>
        </ul>
    </div>
    </div>
    </div>
</div>