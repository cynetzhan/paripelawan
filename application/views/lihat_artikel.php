<div class="row uniform">
<div class="4u$ 12u$(small)">
 <ul class="actions">
  <li><a href="<?php echo base_url('artikel/tambah/'); echo (isset($id_kategori))?$id_kategori:'' ?>" class="button special"><span class="fa fa-plus"></span> Tambah Artikel</a></li>
 </ul>
</div>
</div>
<form name="cariartikel" method="get" action="<?= base_url('artikel/index') ?>">
<div class="row uniform">
 <div class="4u">
  <input type="text" class="form-control search-query" name="query" id="query" placeholder="Pencarian"/>
 </div>
 <div class="2u$ 12u$">
  <button type="submit" class="form-control button special">Cari</button>
 </div>
</div>
</form>
<div class="row uniform">
 <div class="12u$">
 <div class="table-wrapper">
  <table class="alt">
  <thead>
   <tr>
    <th>Artikel</th>
    <th>Kategori</th>
    <th>Aksi</th>
   </tr>
  </thead>
   <tbody>
    <?php 
    if($artikel != null){
     foreach($artikel as $row){ ?>
    <tr>
     <td>
      <strong><?= $row->judul_artikel ?></strong>
      <br><small><?= $row->tgl_terbit_artikel ?></small>
      <?= $row->highlight_slider?"<br>&nbsp;<span class='fa fa-star' style='color:#ddbb00'></span> Ditampilkan di Slider Halaman Depan":"" ?> 
     </td>
     <td><a href="<?= base_url('kategori/lihat/'.$row->id_kategori) ?>" ><?= $row->nama_kategori ?></a></td>
     <td><a href="<?= base_url('publik/artikel/'.$row->id_artikel) ?>" target="_blank"><span class="fa fa-external-link"></span> Lihat</a> | <a href="<?= base_url('artikel/ubah/'.$row->id_artikel) ?>"><span class="fa fa-edit"></span> Ubah</a> | <a href="<?= base_url('artikel/hapus/'.$row->id_artikel) ?>"><span class="fa fa-close"></span> Hapus</a>
     <br><a href="<?= base_url('artikel/komentar/'.$row->id_artikel) ?>"><span class="fa fa-comment"></span> Lihat Komentar</a>
     </td>
    </tr>
    <?php }
    } else { ?>
    <tr>
     <td colspan="3" class="text-center">Belum ada artikel ditambahkan</td>
    </tr>
    <?php } ?>
   </tbody>
  </table>
 </div>
</div>
</div>
     