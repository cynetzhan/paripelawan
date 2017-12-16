<div class="12u$">
 <h2><small>Ulasan mengenai:</small><br>
 <?= $objek->nama_objek ?>
 </h2>
 <div class="media-list" style="background-color:#fff">
  <?php 
  if($testi != null){
   foreach($testi as $row){ ?>
  <div class="media">
   <div class="pull-left">
    <img src="<?= base_url('assets/images/thumb-user.png') ?>" alt="user" />
   </div>
   <div class="media-body">
    <h4 class="media-heading"><?= $row->nama_pengirim_testi ?><small> (<?= tanggal($row->tgl_testi, true) ?>)</small></h4>
    <?php for($i=1;$i<=$row->nilai_testi;$i++){
     echo "<span class='fa fa-star'></span>";}
     for($i=1;$i<=(5 - $row->nilai_testi);$i++){
      echo "<span class='fa fa-star-o'></span>";
     }
     ?>
    <p><?= $row->isi_testi ?>
    <br><button type="button" class="button small" comment-id=""><a href="<?= base_url('artikel/hapus_testi/'.$row->id_testi) ?>"><span class="fa fa-close"></span> Hapus</a></button></p>
   </div>
  </div>
  <?php } 
  } else { ?>
  <p>Belum ada ulasan</p>
  <?php } ?>
 </div>
</div>
     