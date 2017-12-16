<div class="4u$ 12u$(small)">
 <ul class="actions">
  <li><a href="<?= base_url('wisata/tambah/') ?>" class="button special"><span class="fa fa-plus"></span> Tambah Jenis Wisata</a></li>
 </ul>
</div>
<div class="8u$ 12u$">
 <div class="table-wrapper">
  <table class="alt">
   <thead>
    <tr>
     <th>ID Jenis Wisata</th>
     <th>Nama Jenis Wisata</th>
     <th>Aksi</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach($wisata as $row){ ?>
    <tr>
     <td><?= $row->id_wisata ?></td>
     <td><?= $row->nama_wisata ?></td>
     <td><a href="<?= base_url('wisata/lihat/'.$row->id_wisata) ?>">Lihat</a> | <a href="<?= base_url('wisata/ubah/'.$row->id_wisata) ?>">Ubah</a> | <a href="<?= base_url('wisata/hapus/'.$row->id_wisata) ?>">Hapus</a>
    </tr>
    <?php } ?>
   </tbody>
  </table>
 </div>
</div>
     