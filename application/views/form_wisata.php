<form method="post" action="<?= $action; ?>" name="wisata">
 <input type="hidden" name="id_wisata" value="<?= isset($id_wisata)?$id_wisata:'' ?>" />
 <div class="row uniform">
  <div class="8u$ 12u$(small)">
   <label>Jenis Wisata</label>
   <input type="text" name="nama_wisata" value="<?= $nama_wisata ?>" placeholder="Nama Jenis Wisata" maxlength="25">
  </div>
  <ul class="actions">
   <li><button type="submit" name="simpan" class="button special">Simpan</button></li>
  </ul>
 </div>
</form>