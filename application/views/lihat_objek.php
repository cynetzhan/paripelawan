<div class="4u$ 12u$(small)">
 <ul class="actions">
  <li><a href="<?php echo base_url('wisata/tambah_objek/'); echo (isset($id_wisata))?$id_wisata:'' ?>" class="button special"><span class="fa fa-plus"></span> Tambah Objek Wisata</a></li>
 </ul>
</div>
<div class="12u$">
 <div class="table-wrapper">
  <table class="alt">
  <thead>
   <tr>
    <th>Nama Objek Wisata</th>
    <th>Jenis Wisata</th>
    <th>Aksi</th>
   </tr>
  </thead>
   <tbody>
    <?php 
    if($wisata != null){
     foreach($wisata as $row){ ?>
    <tr>
     <td>
      <strong><?= $row->nama_objek ?></strong>
      <br><small><?= $row->alamat_objek ?></small>
      <?= $row->featured_objek?"<br>&nbsp;<span class='fa fa-star' style='color:#ddbb00'></span> Ditampilkan di Slider Halaman Depan":"" ?> 
     </td>
     <td><a href="<?= base_url('wisata/lihat/'.$row->id_wisata) ?>" ><?= $row->nama_wisata ?></a></td>
     <td><a href="<?= base_url('publik/wisataobj/'.$row->id_objek) ?>" target="_blank"><span class="fa fa-external-link"></span> Lihat</a> | <a href="<?= base_url('wisata/ubah_objek/'.$row->id_objek) ?>"><span class="fa fa-edit"></span> Ubah</a> | <a href="<?= base_url('wisata/hapus_objek/'.$row->id_objek) ?>"><span class="fa fa-close"></span> Hapus</a>
     <br><a href="<?= base_url('wisata/ulasan/'.$row->id_objek) ?>"><span class="fa fa-star-o"></span> Lihat Ulasan</a>
     </td>
    </tr>
    <?php } 
    } else { ?>
    <tr>
     <td colspan='3' class="text-center">Belum ada objek wisata ditambahkan</td>
    </tr>
    <?php } ?>
   </tbody>
  </table>
 </div>
</div>
     