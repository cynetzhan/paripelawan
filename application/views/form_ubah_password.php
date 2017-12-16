<form method="post" action="<?= $action; ?>" name="password">
 <input type="hidden" name="id_pegawai" value="<?= isset($id_pegawai)?$id_pegawai:'' ?>" />
 <div class="row uniform">
  <?php if(!$is_admin) : ?>
  <div class="12u$ 12u$(small)">
   <label>Password lama</label>
   <input type="password" name="password_pegawai" value="" placeholder="Password Saat Ini">
  </div>
  <?php else : ?>
  <div class="12u$ 12u$(small)">
   <label>Password Administrator</label>
   <input type="password" name="password_admin" value="" placeholder="Password Administrator">
  </div>
  <?php endif; ?>
  <div class="12u$ 12u$(small)">
   <label>Password baru untuk <?= $username_pegawai." (".$nama_pegawai.")" ?></label>
   <input type="password" name="password_pegawai_baru" value="" placeholder="Password Baru">
  </div>
  <div class="12u$ 12u$(small)">
   <label>Masukkan kembali Password baru</label>
   <input type="password" name="password_pegawai_konfirmasi" value="" placeholder="Konfirmasi Password Baru">
  </div>
  <ul class="actions">
   <li><button type="submit" name="simpan" class="button special">Simpan</button></li>
  </ul>
 </div>
</form>