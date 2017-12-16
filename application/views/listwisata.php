<style>
 @media screen and (min-width: 768px){
  .carousel-caption{
   right:25%;
   left:10%;
   top: 13%;
   bottom: 0;
   width:fit-content;
  }
 }
 .banner-heading{
  position: absolute;
  top: 10%;
  left: 10%;
  font-size: 2em;
  font-weight: 700;
  padding: .3em;
  background-color: #282828;
  color: #d5b82a;
  z-index:200
 }
</style>
<div class="container-fluid" style="margin-top:50px;margin-bottom:50px;min-height:70vh;width:100%;padding:0">
 <div class="row">
  <div class="col-sm-12">
   <div id="banner" class="carousel slide" data-ride="carousel">
     <span class="banner-heading"><?= $judul ?> Unggulan di Pelalawan</span>
     <ol class="carousel-indicators">
       <?php for($i=0;$i<count($artikel_slider);$i++) { ?>
       <li data-target="#banner" data-slide-to="<?= $i ?>" <?= ($i!=0)?:"class='active'" ?></li>
       <?php } ?>
     </ol>
     <div class="carousel-inner">
      <?php $count=0; foreach($artikel_slider as $atk){ 
      $list_gambar = json_decode($atk->gambar_objek);
      $gambar = $list_gambar[0];
      ?>
       <div class="item <?= ($count!=0)?:"active" ?>" style="background-image:url('<?= ($gambar!='')?base_url('images/'.$gambar):base_url('assets/images/cover-default1.jpg') ?>');background-size:cover"><img src="trsp.png" style="height:450px;max-width:100%;opacity:0;" class="img-responsive"><a href="<?= base_url('publik/wisataobj/'.$atk->id_objek) ?>" class="carousel-caption"><h3 style="background-color:rgba(0,0,0,.7);padding:5px 20px"><?= $atk->nama_objek ?></h3></a></div>
      <?php $count++; } ?>
     </div>
     <a class="left carousel-control" href="#banner" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left"></span>
     </a>
     <a class="right carousel-control" href="#banner" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right"></span>
     </a>
   </div>
  </div>
 </div>
</div>
<div class="container">
 <div class="row">
  <div class="col-md-8">
   <div class="panel panel-primary">
    <div class="panel-heading">
     <h4><?= $judul ?></h4>
    </div>
    <div class="panel-body">  
     <?php foreach($objek as $row){ 
      $list_gambar = json_decode($row->gambar_objek);
      $gambar = $list_gambar[0];
     ?>
     <div class="post-preview">
      <div class="media">
       <div class="media-left"><img src="<?= base_url('images/'. ($gambar!=''?$gambar:'jexpla.png') )?>" alt="thumbs" class="media-object" style="max-height:100px;max-width:150px"/></div>
       <div class="media-body">
        <h2 class="media-heading"><a href="<?= base_url('publik/wisataobj/'.$row->id_objek) ?>"><?= $row->nama_objek ?></a></h2>
        <small><a href="<?= base_url('publik/wisata/'.$row->id_wisata) ?>"><?= $row->nama_wisata ?></a></small>
       </div>
      </div>
     </div>
     <hr>
     <?php } ?>
     <?php if(isset($older)) { ?>
     <a href="<?= base_url('publik/wisata/'.$id_wisata.'/'.$older) ?>" style="float:left" class="btn btn-info" ><span class="fa fa-arrow-left" ></span> Sebelumnya</a>
     <?php } if(isset($newer)) { ?>
     <a href="<?= base_url('publik/wisata/'.$id_wisata.'/'.$newer) ?>" class="btn btn-info" style="float:right">Selanjutnya <span class="fa fa-arrow-right"></span></a>
     <?php } ?>
    </div>
   </div>
  </div>
 </div>
</div>