<div class="container" style="margin-top:70px;min-height:70vh">
 <div class="row">
  <div class="col-md-12">
   <div class="panel panel-primary">
    <div class="panel-heading">Pencarian</div>
    <div class="panel-body">
     <p>Ketikkan kata kunci dalam kolom pencarian</p>
     <form role="search" action="<?= base_url('publik/cari')?>" method="get" >
      <div class="form-search search-only">
        <i class="search-icon glyphicon glyphicon-search"></i>
        <input type="text" class="form-control search-query" name="query" placeholder="Pencarian" value="<?= $query ?>" />
      </div>
      <br>
      <div class="form-group">
       <button type="submit" class="form-control btn btn-default">Cari</button>
      </div>
     </form>
    </div>
   </div>
   <div class="panel panel-default">
    <div class="panel-heading">
     <h4>Hasil pencarian objek wisata dengan kata kunci "<?= $query ?>"</h4>
    </div>
    <div class="panel-body">  
     <?php 
     if($wisata != null){
      ?>
      <div class="row">
      <?php foreach($wisata as $row){ 
      $list_gambar = json_decode($row->gambar_objek);
      $gambar = $list_gambar[0];
      ?>
      <div class="col-sm-2">
       <div class="thumbnail">
        <img src="<?= base_url('images/'. ($gambar!=''?$gambar:'jexpla.png') )?>" alt="thumbs" class="img-rounded img-responsive" style="height:100px;max-width:150px"/>
        <div class="caption text-center">
         <a href="<?= base_url('publik/wisataobj/'.$row->id_objek) ?>"><?= $row->nama_objek ?></a><br>
         <small><a href="<?= base_url('publik/wisata/'.$row->id_wisata) ?>"><?= $row->nama_wisata ?></a></small>
        </div>
       </div>
      </div>
     <?php } ?>
     </div>
     <?php if(count($artikel) > 6 ){ ?>
     <a href="<?= base_url('publik/cari_wisata?query='.$query) ?>" class="btn btn-primary"><i class="fa fa-chevron-right"></i> Lihat Selengkapnya</a>
     <?php }
     } else { ?>
     <h5>Tidak ditemukan hasil pencarian dengan kata kunci "<?= $query ?>"</h5>
     <?php } ?>
    </div>
   </div>
   <div class="panel panel-default">
    <div class="panel-heading">
     <h4>Hasil pencarian artikel dengan kata kunci "<?= $query ?>"</h4>
    </div>
    <div class="panel-body">  
     <?php 
     if($artikel != null){
      foreach($artikel as $row){ ?>
      <div class="post-preview">
       <div class="media">
        <div class="media-left"><img src="<?= ($row->cover_artikel!=null)?base_url($row->cover_artikel):base_url('assets/images/'.'jexpla.png') ?>" alt="thumbs" class="media-object" style="max-height:100px;max-width:120px"/></div>
        <div class="media-body">
         <h2 class="media-heading"><a href="<?= base_url('publik/artikel/'.$row->id_artikel) ?>"><?= $row->judul_artikel ?></a></h2>
         <small>Posted by <a href="#"><?= $row->nama_pegawai ?></a> on <?= tanggal($row->tgl_terbit_artikel) ?></small>
         <p>
         <?= text_preview($row->isi_artikel,5) ?>
         </p>
        </div>
       </div>
      </div>
      <hr>
     <?php } ?>
     <br>
     <a href="<?= base_url('publik/cari_artikel?query='.$query) ?>" class="btn btn-primary"><i class="fa fa-chevron-right"></i> Lihat Selengkapnya</a>
     <?php } else { ?>
     <h5>Tidak ditemukan hasil pencarian dengan kata kunci "<?= $query ?>"</h5>
     <?php } ?>
    </div>
   </div>
  </div>
 </div>
</div>