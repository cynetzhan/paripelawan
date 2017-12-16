<div class="media-list">
 <?php foreach($komentar as $row){ ?>
 <div class="media">
  <div class="pull-left">
   <img src="<?= base_url('assets/images/thumb-user.png') ?>" alt="user" />
  </div>
  <div class="media-body">
   <h4 class="media-heading"><?= $row['nama_pengirim_komentar'] ?></h4>
   <p><?= date('d F Y H:i:s',strtotime($row['tgl_komentar'])) ?></p>
   <p><?= $row['isi_komentar'] ?></p>
   <?php foreach($row['reply'] as $reply) { ?>
   <div class="media">
    <div class="pull-left">
     <img src="<?= base_url('assets/images/thumb-user.png') ?>" alt="user" />
    </div>
    <div class="media-body">
      <h4 class="media-heading"><?= $reply['nama_pengirim_komentar'] ?></h4>
      <p><?= date('d F Y H:i:s',strtotime($reply['tgl_komentar'])) ?></p>
      <p><?= $reply['isi_komentar'] ?></p>
    </div>
   </div>
  <?php } ?>
  </div>
 </div>
 <?php }?>
</div>
