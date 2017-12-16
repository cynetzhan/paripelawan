<div class="12u$">
 <h2><small>Komentar untuk artikel:</small><br>
 <?= $artikel->judul_artikel ?>
 </h2>
 <div class="media-list" style="background-color:#fff">
  <?php foreach($komentar as $row){ ?>
  <div class="media">
   <div class="pull-left">
    <img src="<?= base_url('assets/images/thumb-user.png') ?>" alt="user" />
   </div>
   <div class="media-body">
    <h4 class="media-heading"><?= $row['nama_pengirim_komentar'] ?><small> (<?= tanggal($row['tgl_komentar'], true) ?>)</small></h4>
    <p><?= $row['isi_komentar'] ?>
    <br><button type="button" class="button small" comment-id=""><a href="<?= base_url('artikel/hapus_komentar/'.$row['id_komentar']) ?>"><span class="fa fa-close"></span> Hapus</a></button></p>
    <?php if(isset($row['reply'])) { 
           foreach($row['reply'] as $reply) { ?>
    <div class="media">
     <div class="pull-left">
      <img src="<?= base_url('assets/images/thumb-user.png') ?>" alt="user" />
     </div>
     <div class="media-body">
       <h4 class="media-heading"><?= $reply['nama_pengirim_komentar'] ?><small> (<?= tanggal($reply['tgl_komentar'], true) ?>)</small></h4>
       <p><?= $reply['isi_komentar'] ?>
       <br><button type="button" class="button small" comment-id=""><a href="<?= base_url('artikel/hapus_komentar/'.$reply['id_komentar']) ?>"><span class="fa fa-close"></span> Hapus</a></button></p>
     </div>
    </div>
    <?php } } ?>
   </div>
  </div>
  <?php }?>
 </div>
</div>
     