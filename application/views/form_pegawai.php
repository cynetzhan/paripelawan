<form method="post" action="<?= $action; ?>" name="pegawai">
<input type="hidden" name="id_pegawai" value="<?= $id_pegawai; ?>" />
 <div class="row uniform">
  <?= validation_errors() ?>
  <h2 style="line-height:0;padding:1em 0em 0 1em;margin:0">Data Pribadi</h2>
  <div class="12u$">
   <label>NIP</label>
   <input type="text" name="ni_pegawai" value="<?= $ni_pegawai; ?>" placeholder="Nomor Induk Pegawai" />
  </div>
  <div class="12u$">
   <label>Nama Pegawai</label>
   <input type="text" name="nama_pegawai" value="<?= $nama_pegawai; ?>" placeholder="Nama pegawai"/>
  </div>
  <div class="12u$">
   <label>Alamat</label>
   <textarea name="alamat_pegawai" placeholder="Alamat"><?= $alamat_pegawai; ?></textarea>
  </div>
  <div class="12u$">
   <label>Telepon</label>
   <input type="text" name="telp_pegawai" value="<?= $telp_pegawai; ?>" placeholder="Nomor Telepon"/>
  </div>
 </div>
 <div class="row uniform">
  <h2 style="line-height:0;padding:1em 0em 0 1em;margin:0">Data Akun Sistem</h2>
  <div class="12u$">
   <label>Username</label>
   <input type="text" name="username_pegawai" value="<?= $username_pegawai; ?>" placeholder="Username Pegawai"/>
  </div>
  <?php if(!isset($nopasswordform)) { ?>
  <div class="12u$">
   <label>Password</label>
   <input type="password" name="password_pegawai" value="<?= $password_pegawai; ?>" placeholder="Password"/>
  </div>
  <?php } ?>
  <?php if(hak_akses(array(2))) : ?>
  <div class="12u$">
   <label>Level Akun</label>
   <select name="level_sistem_pegawai">
    <option value="1" <?= ($level_sistem_pegawai==1)?"selected":"" ?> >Operator</option>
    <option value="2" <?= ($level_sistem_pegawai==2)?"selected":"" ?> >Administrator</option>
   </select>
  </div>
  <?php endif; ?>
  <ul class="actions">
   <li><button type="submit" name="simpan" class="button special">Simpan</button></li>
  </ul>
 </div>
</form>