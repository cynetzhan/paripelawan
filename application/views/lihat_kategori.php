<div class="4u$ 12u$(small)">
 <ul class="actions">
  <li><a href="<?= base_url('kategori/tambah/') ?>" class="button special"><span class="fa fa-plus"></span> Tambah Kategori</a></li>
 </ul>
</div>
<div class="6u$ 12u$">
 <div class="table-wrapper">
  <table class="alt">
   <thead>
    <tr>
     <th>ID Kategori</th>
     <th>Nama Kategori</th>
     <th>Aksi</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach($kategori as $row){ ?>
    <tr>
     <td><?= $row->id_kategori ?></td>
     <td><?= $row->nama_kategori ?></td>
     <td><a href="<?= base_url('kategori/lihat/'.$row->id_kategori) ?>">Lihat</a> | <a href="<?= base_url('kategori/ubah/'.$row->id_kategori) ?>">Ubah</a> | <a href="<?= base_url('kategori/hapus/'.$row->id_kategori) ?>">Hapus</a>
    </tr>
    <?php } ?>
   </tbody>
  </table>
 </div>
</div>
     