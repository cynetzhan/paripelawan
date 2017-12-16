<div class="12u$">
 <div class="table-wrapper">
  <table class="alt">
   <thead>
    <th colspan="2">Profil Pengguna</th>
   </thead>
   <tbody>
    <tr>
     <td>Nama Pegawai</td>
     <td><?= $pegawai_profil->nama_pegawai ?></td>
    </tr>
    <tr>
     <td>Nomor Induk Pegawai/Karyawan</td>
     <td><?= $pegawai_profil->ni_pegawai ?></td>
    </tr>
    <tr>
     <td>Alamat</td>
     <td><?= $pegawai_profil->alamat_pegawai ?></td>
    </tr>
    <tr>
     <td>Telepon</td>
     <td><?= $pegawai_profil->telp_pegawai ?></td>
    </tr>
    <tr>
     <td>Username</td>
     <td><?= $pegawai_profil->username_pegawai ?></td>
    </tr>
    <tr>
     <td>Jabatan</td>
     <td><?= akunlv($pegawai_profil->level_sistem_pegawai) ?></td>
    </tr>
    <tr>
     <td>Aksi</td>
     <td><a href="<?= base_url('pegawai/ubah/'.$pegawai_profil->id_pegawai) ?>">Ubah Profil</a> | <a href="<?= base_url('pegawai/ubah_password/'.$pegawai_profil->id_pegawai) ?>">Ubah Password</a></td>
    </tr>
   </tbody>
  </table>
 </div>
</div>
<?php if(hak_akses(array(2))): ?>
<div class="4u$ 12u$(small)">
 <ul class="actions">
  <li><a href="<?= base_url('pegawai/tambah/') ?>" class="button special"><span class="fa fa-plus"></span> Tambah Pegawai</a></li>
 </ul>
</div>
<div class="12u$">
 <div class="table-wrapper">
  <table class="alt">
   <thead>
    <tr>
     <th>NIP</th>
     <th>Nama</th>
     <th>Username</th>
     <th>Tingkat</th>
     <th>Aksi</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach($pegawai as $row){ ?>
    <tr>
     <td><?= $row->ni_pegawai ?></td>
     <td><?= $row->nama_pegawai ?></td>
     <td><?= $row->username_pegawai ?></td>
     <td><?= akunlv($row->level_sistem_pegawai) ?></td>
     <td><a href="<?= base_url('pegawai/ubah/'.$row->id_pegawai) ?>">Ubah</a> | <a href="<?= base_url('pegawai/ubah_password/'.$row->id_pegawai) ?>">Ubah Password</a> | <a href="<?= base_url('pegawai/hapus/'.$row->id_pegawai) ?>">Hapus</a>
    </tr>
    <?php } ?>
   </tbody>
  </table>
 </div>
</div>
<?php endif; ?>
     