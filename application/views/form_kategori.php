<form method="post" action="<?= $action; ?>" name="kategori">
 <input type="hidden" name="id_kategori" value="<?= isset($id_kategori)?$id_kategori:'' ?>" />
 <div class="row uniform">
  <div class="8u$ 12u$(small)">
   <label>Nama Kategori</label>
   <input type="text" name="nama_kategori" value="<?= $nama_kategori ?>" placeholder="Nama Kategori" maxlength="25">
  </div>
  <ul class="actions">
   <li><button type="submit" name="simpan" class="button special">Simpan</button></li>
  </ul>
 </div>
</form>