<script src="<?= base_url('assets/tinymce/tinymce.min.js') ?>"></script>
<script>
tinymce.init({
            selector:"textarea#isi_artikel"            
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
<form method="post" action="<?= $action; ?>" name="artikel">
 <input type="hidden" name="id_artikel" value="<?= isset($id_artikel)?$id_artikel:'' ?>" />
 <input type="hidden" name="id_pegawai" value="<?= isset($id_pegawai)?$id_pegawai:$this->session->user_id ?>" />
 <div class="row uniform">
  <div class="8u 12u$(small)">
   <label>Nama Artikel</label>
   <input type="text" name="judul_artikel" value="<?= $judul_artikel ?>" placeholder="Judul Artikel" maxlength="70">
   <label for="highlight_slider"><input type="checkbox" name="highlight_slider" <?= ($highlight_slider==0)?:"checked" ?> /> Tampilkan di Slider Halaman Depan</label>
  </div>
  <div class="4u$ 12u$(small)">
   <label>Kategori</label>
   <select name="id_kategori">
    <?php foreach($kategori as $row){ ?>
    <option value="<?= $row->id_kategori ?>" <?= ($id_kategori==$row->id_kategori)?"selected":"" ?> ><?= $row->nama_kategori ?></option>
    <?php } ?>
   </select>
  </div>
  <div class="12u$">
   <label>Isi Artikel</label>
   <textarea name="isi_artikel" id="isi_artikel" style="height:350px"><?= $isi_artikel ?></textarea>
  </div>
  </div>
  <div class="row uniform">
  <div class="8u$ 12u$(small)">
   <ul class="actions">
    <li><button type='button' class='button special' data-toggle='modal' data-target='#galeri-modal' ><span class="fa fa-file-image-o"></span> Tambah Gambar</button></li>
   </ul>
  </div>
  <ul class="actions">
   <li><button type="submit" name="simpan" class="button special">Simpan</button></li>
   <li><button type="button" class="button">Batal</button></li>
  </ul>
 </div>
</form>
<div id="galeri-modal" class="modal fade" role="dialog">
 <div class="modal-dialog" style="z-index:9999">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Galeri Gambar</h4>
   </div>
   <div class="modal-body">
   <?php echo form_open_multipart('artikel/aksi_upload');?>
     <input type="file" name="images" id="images" style="visibility:hidden" />
     <ul class="actions">
      <li><button type="button" id="uploadclick" class="button special"><span class="fa fa-plus"></span> Unggah Gambar</button></li>
     </ul>
    </form>
    <ul id="image-list">
     <?php 
     $folder = new DirectoryIterator(FCPATH."images/");
     foreach($folder as $img) {
      if(!$img->isDot()){
     ?>
      <li><img class="img img-responsive galeri-item" src="<?= base_url("images/".$img->getFilename()); ?>"/></li>
      <?php } } ?>
    </ul>
   </div>
   <div class="modal-footer">
    <ul class="actions">
    <button type="button" class="button" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</button>
    </ul>
   </div>
  </div>
 </div>
</div>
<script>
  $(document).ready(function() {
   var input = document.getElementById("images"),formdata=false, img, reader, gambar;
    if(window.FormData){
     $("#btn").css('display','none');
    }
   
   function showUploadedItem(source){
    var list = $('#image-list');
    list.append("<li><img class='img img-responsive galeri-item' src='"+source+"'/></li>");
   }
   
   $("#uploadclick").click(function() {
    $("#images").click();
    return false;
   });
   
   $("#image-list").on('click','li>img.galeri-item', function() {
    $this = $(this);
    console.log("WAh!");
    tinymce.activeEditor.execCommand('mceInsertContent', false, '<img src="'+$this.prop('src')+'" class="img img-responsive"/>');
    $("#galeri-modal > div.modal-dialog > div > div.modal-footer > ul > button").click();
   });
   
    $("#images").change(function(evt) {
     formdata = new FormData();
     $this = $(this)[0];
     var i = 0, len = $this.files.length;
     $("#response").html("Uploading...");
     for(;i < len; i++){
      gambar = $this.files[i];
      if(gambar.type.match(/image.*/)){
      //  if(window.FileReader){
      //  reader = new FileReader();
      //  reader.onloadend = function (e) { 
      //   showUploadedItem(e.target.result);
      //  };
      //  reader.readAsDataURL(gambar);
      // } 
       if (formdata) {
        formdata.append("images", gambar);
       }
      }
     }
     $.ajax({
       url: "<?= base_url('artikel/aksi_upload') ?>",
       method: "POST",
       data: formdata,
       processData: false,
       contentType: false,
       success: function (res) {
        $("ul#image-list").html(res);
       }
      });
    });
  });
  
    
  </script>