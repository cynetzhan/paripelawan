<script src="<?= base_url('assets/tinymce/tinymce.min.js') ?>"></script>
<script>
tinymce.init({
            selector:"textarea#ket_objek"            
        });
</script>
<style>
#mceu_13 button{box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05) !important;}
#image-list {display:block;width:100%;max-height:340px;overflow:scroll;
    border:10px solid #adadad;margin-top:20px;}
   #image-list > li {list-style:none;margin:2px 5px;}
   #image-list > li > img {max-height:150px; float:left; }
   #image-list > li > img:hover { border:2px solid #269abc; padding:5px;}
</style>
<?= form_open_multipart($action,'name="objek_wisata"') ?>
 <input type="hidden" name="id_objek" value="<?= isset($id_objek)?$id_objek:'' ?>" />
 <div class="row uniform">
  <div class="6u$ 12u$(small)">
   <label>Nama Objek Wisata</label>
   <input type="text" name="nama_objek" value="<?= $nama_objek ?>" placeholder="Nama Objek Wisata" maxlength="30"/>
   <label for="featured_objek"><input type="checkbox" name="featured_objek" id="featured_objek" <?= ($featured_objek==0)?:"checked" ?> /> Tampilkan pada "Featured"</label>
  </div>
  <div class="6u$ 12u$(small)">
   <label>Jenis Wisata</label>
   <select name="id_wisata">
    <?php foreach($wisata as $row){ ?>
    <option value="<?= $row->id_wisata ?>" <?= ($id_wisata==$row->id_wisata)?"selected":"" ?> ><?= $row->nama_wisata ?></option>
    <?php } ?>
   </select>
  </div>
  <div class="6u$ 12u$(small)">
   <label>Alamat</label>
   <input type="text" name="alamat_objek" value="<?= $alamat_objek ?>" placeholder="Alamat Objek Wisata" maxlength="45"/>
  </div>
  <div class="6u$ 12u$(small)">
   <label>Koordinat</label>
   <input type="text" name="lat_objek" value="<?= $lat_objek ?>" placeholder="Latitude" maxlength="45"/>
   <input type="text" name="long_objek" value="<?= $long_objek ?>" placeholder="Longitude" maxlength="45"/>
  </div>
  <div class="12u$ 12u$(small)">
   <label>Keterangan Objek Wisata</label>
   <textarea name="ket_objek" id="ket_objek" style="height:150px"><?= $ket_objek ?></textarea>
  </div>
  <div class="8u$ 12u$(small)">
   <label>File Gambar</label>
   <?php if($gambar_objek != null){ ?>
   <table class="table table-bordered">
   <thead>
    <tr>
     <th>Gambar</th>
     <th>Nama File</th>
     <th>Aksi</th>
    </thead>
    <tbody>
    <?php foreach($gambar_objek as $gbr){ ?>
    <tr>
     <td><img src="<?= base_url('images/'.$gbr) ?>" style="max-width:150px;max-height:150px"/></td>
     <td style="vertical-align:middle"><?= $gbr ?></td>
     <td style="vertical-align:middle"><a href="<?= base_url('wisata/hapus_gambar/'.$id_objek.'/'.$gbr) ?>" class="button small"><span class="fa fa-close" style="font-size:1.5em"></span> Hapus Foto</a></td>
    </tr>
    <?php } ?>
    </tbody>
   </table>
   <button type="button" name="gambar_ganti" id="gambar_ganti" class="button small special"><span class="fa fa-plus" style="font-size:1.5em"></span> Tambah Gambar</button>
   <input type="file" name="images" id="images" class="hidden" />
   <?php } else { ?>
   <button type="button" name="gambar_ganti" id="gambar_ganti" class="button small special"><span class="fa fa-plus" style="font-size:1.5em"></span> Tambah Gambar</button>
   <input type="file" name="images" id="images" class="hidden" />
   <?php } ?><br>
   <small>Maksimal ukuran file: 2MB</small>
  </div>
  <div class="10u$ 12u$(small)">
   <label>Video Youtube
   <br>Hanya masukkan ID video atau link video dari Youtube. <br>Contoh: <span style="color:#660000">s1yOvxs5eM8</span> atau <span style="color:#660000">https://www.youtube.com/watch?v=s1yOvxs5eM8</span></label>
   <input type="text" name="kode_video" id="kode_video" value="<?= $kode_video ?>" />

  </div>
  <?php if(!empty($rincian_lain)) { ?>
  <div class="6u$ 12u$(small)">
   <h3>Rincian Lain</h3>
   <?php foreach($rincian_lain as $field) { ?>
    <label><?= $field ?></label>
    <input type="text" name="<?= strtolower(str_replace(' ','_',$field)) ?>" value="<?= (isset($rincian_data))?$rincian_data[$field]:'' ?>" />
   <?php } ?>
  </div>
  <?php } ?>
  </div>
  <div class="row uniform">
  <!--div class="8u$ 12u$(small)">
   <ul class="actions">
    <li><button type='button' class='button special' data-toggle='modal' data-target='#galeri-modal' ><span class="fa fa-file-image-o"></span> Tambah Gambar</button></li>
   </ul>
  </div-->
  <ul class="actions">
   <li><button type="submit" name="simpan" class="button special">Simpan</button></li>
   <li><a href="<?= $parent_link ?>" class="button">Batal</a></li>
  </ul>
 </div>
</form>
<!--div id="galeri-modal" class="modal fade" role="dialog">
 <div class="modal-dialog" style="z-index:9999">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Galeri Gambar</h4>
   </div>
   <div class="modal-body">
   <?php //echo form_open_multipart('artikel/aksi_upload');?>
     <input type="file" name="images" id="images" style="visibility:hidden" />
     <ul class="actions">
      <li><button type="button" id="uploadclick" class="button special"><span class="fa fa-plus"></span> Unggah Gambar</button></li>
     </ul>
    </form>
    <ul id="image-list">
     <?php 
     //$folder = new DirectoryIterator(FCPATH."images/");
     //foreach($folder as $img) {
      //if(!$img->isDot()){
     ?>
      <li><img class="img img-responsive galeri-item" src="<?php //base_url("images/".$img->getFilename()); ?>"/></li>
      <?php //} } ?>
    </ul>
   </div>
   <div class="modal-footer">
    <ul class="actions">
    <button type="button" class="button" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</button>
    </ul>
   </div>
  </div>
 </div>
</div-->
<script>
 $(document).ready(function(){
  $("#gambar_ganti").click(function() {
   $("input#images").click();
  });
 });
</script>