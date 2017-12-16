<style>
 .media-body p{color:#4d4d4d}
</style>
<div class="container" style="margin-top:70px;min-height:70vh">
 <div class="row">
  <div class="col-md-8">
  <ol class="breadcrumb">
   <li><a href="<?= base_url('') ?>">Home</a></li>
   <li><a href="<?= base_url('publik/kategori/'.$artikel->id_kategori) ?>"><?= $artikel->nama_kategori ?></a></li>
   <li class="active"><span><?= $artikel->judul_artikel ?></span></li>
  </ol>
  <h2><?= $artikel->judul_artikel ?></h2>
  <p><small>Ditulis oleh <?= $artikel->nama_pegawai ?> pada <?= tanggal($artikel->tgl_terbit_artikel,true) ?></small></p>
      <?= $artikel->isi_artikel ?>
  </div>
 </div>
 <hr>
 <div class="row">
  <a name="kolom_komentar"></a>
  <div class="col-md-8">
   <h4>Kolom Komentar</h4>
   <form name="komentar" action="<?= base_url('publik/kirim_komentar') ?>" method="post">
    <input type="hidden" name="id_artikel" value="<?= $artikel->id_artikel ?>"/>
    <input type="hidden" name="parent_id" id="parent_id" value="0"/>
    <div class="form-group">
     <p id="nama_dibalas"></p>
     <button type="button" id="batal_balas" class="btn btn-sm btn-default hidden">Batal Membalas</a>
    </div>
    <div class="form-group">
     <label class="control-label" for="nama">Nama Pengirim</label>
     <input type="text" maxlength="25" name="nama_pengirim_komentar" id="nama" class="form-control"/>
    </div>
    <div class="form-group">
     <label class="control-label" for="isi_komentar">Komentar</label>
     <textarea name="isi_komentar" id="isi_komentar" class="form-control"></textarea>
    </div>
    <div class="form-group">
     <button type="submit" name="submitkomen" class="btn btn-info btn-block">Kirim Komentar</button>
    </div>
   </form>
   <div class="media-list" style="background-color:#fff">
    <?php foreach($komentar as $row){ ?>
    <div class="media">
     <div class="pull-left">
      <img src="<?= base_url('assets/images/thumb-user.png') ?>" alt="user" />
     </div>
     <div class="media-body">
      <h4 class="media-heading"><?= $row['nama_pengirim_komentar'] ?></h4>
      <p><?= tanggal($row['tgl_komentar'], true) ?></p>
      <p><?= $row['isi_komentar'] ?></p>
      <p><button type="button" class="btn btn-default replyto" comment-id="<?= $row['id_komentar'] ?>"><a href="#kolom_komentar"><span class="fa fa-reply"></span> Balas</a></button></p>
      <?php if(isset($row['reply'])) { 
             foreach($row['reply'] as $reply) { ?>
      <div class="media">
       <div class="pull-left">
        <img src="<?= base_url('assets/images/thumb-user.png') ?>" alt="user" />
       </div>
       <div class="media-body">
         <h4 class="media-heading"><?= $reply['nama_pengirim_komentar'] ?></h4>
         <p><?= tanggal($reply['tgl_komentar'],true) ?></p>
         <p><?= $reply['isi_komentar'] ?></p>
       </div>
      </div>
      <?php } } ?>
     </div>
    </div>
    <?php }?>
   </div>
  </div>
 </div>
</div>
<script>
 $(".replyto").click(function() {
  $this = $(this);
  id_komentar = $this.attr('comment-id');
  $("#parent_id").val(id_komentar);
  $("#nama_dibalas").html("Membalas <br><strong>" + $this.parent().siblings("h4").text() + "</strong> : " + $this.parent().prev().text());
  $("#batal_balas").removeClass("hidden");
 });
 $("#batal_balas").click(function(){
  $("#parent_id").val("0");
  $("#nama_dibalas").html("");
  $("#batal_balas").addClass("hidden");
 });
</script>