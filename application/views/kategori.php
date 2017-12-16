<div class="container" style="margin-top:70px;min-height:70vh">
 <div class="row">
  <div class="col-md-8">
   <div class="panel panel-primary">
    <div class="panel-heading">
     <h4><?= $judul ?></h4>
    </div>
    <div class="panel-body">  
     <?php foreach($artikel as $row){ ?>
     <div class="post-preview">
      <div class="media">
       <div class="media-left"><img src="<?= base_url('assets/images/'.'kat-'.$id_kategori.'.png') ?>" alt="thumbs" class="media-object" style="max-height:100px"/></div>
       <div class="media-body">
        <h2 class="media-heading"><a href="<?= base_url('publik/artikel/'.$row->id_artikel) ?>"><?= $row->judul_artikel ?></a></h2>
        <small>Posted by <a href="#"><?= $row->nama_pegawai ?></a> on <?= tanggal($row->tgl_terbit_artikel) ?></small>
       </div>
      </div>
     </div>
     <hr>
     <?php } ?>
     <?php if(isset($older)) { ?>
     <a href="<?= base_url('publik/kategori/'.$id_kategori.'/'.$older) ?>" style="float:left" class="btn btn-info" ><span class="fa fa-arrow-left" ></span> Sebelumnya</a>
     <?php } if(isset($newer)) { ?>
     <a href="<?= base_url('publik/kategori/'.$id_kategori.'/'.$newer) ?>" class="btn btn-info" style="float:right">Selanjutnya <span class="fa fa-arrow-right"></span></a>
     <?php } ?>
    </div>
   </div>
  </div>
 </div>
</div>