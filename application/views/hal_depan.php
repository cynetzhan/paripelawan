<style>
 .multi-item-carousel .carousel-inner > .item {
  -webkit-transition: 500ms ease-in-out left;
  transition: 500ms ease-in-out left;
}
.multi-item-carousel .carousel-inner .active.left {
  left: -33%;
}
.multi-item-carousel .carousel-inner .active.right {
  left: 33%;
}
.multi-item-carousel .carousel-inner .next {
  left: 33%;
}
.multi-item-carousel .carousel-inner .prev {
  left: -33%;
}
@media all and (transform-3d), (-webkit-transform-3d) {
  .multi-item-carousel .carousel-inner > .item {
    -webkit-transition: 500ms ease-in-out left;
    transition: 500ms ease-in-out left;
    -webkit-transition: 500ms ease-in-out all;
    transition: 500ms ease-in-out all;
    -webkit-backface-visibility: visible;
            backface-visibility: visible;
    -webkit-transform: none!important;
            transform: none!important;
  }
}
.multi-item-carousel .carousel-control.left,
.multi-item-carousel .carousel-control.right {
  background-image: none;
}
</style>
<div class="container" id="featured-section">
 <div class="row">
  <div class="col-md-6">
   <div id="banner" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
       <?php for($i=0;$i<count($artikel_slider);$i++) { ?>
       <li data-target="#banner" data-slide-to="<?= $i ?>" <?= ($i!=0)?:"class='active'" ?></li>
       <?php } ?>
     </ol>
     <div class="carousel-inner">
      <?php $count=0; foreach($artikel_slider as $atk){ ?>
       <div class="item <?= ($count!=0)?:"active" ?>" style="background-image:url('<?= ($atk->cover_artikel!=null)?base_url($atk->cover_artikel):base_url('assets/images/cover-default1.jpg') ?>');background-size:cover"><img src="trsp.png" style="height:450px;max-width:100%;opacity:0;" class="img-responsive"><a href="<?= base_url('publik/artikel/'.$atk->id_artikel) ?>" class="carousel-caption"><h3 style="background-color:rgba(0,0,0,.7);padding:5px 20px"><?= $atk->judul_artikel ?></h3></a></div>
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
  <div class="col-md-6">
   <div class="row">
    <div class="col-sm-12">
     <h2 style="color:#fff">Selamat Datang Di Portal Pariwisata Kabupaten Pelalawan<br><small>Riau, Indonesia</small></h2>
    </div>
   </div>
   <div class="row">
    <div class="col-sm-12 text-center">
     <h3 style="color:#fff">Jelajahi Pelalawan!</h3>
     
     <a href="<?= base_url('publik/wisata/6') ?>" ><img class="icoco" src="<?= base_url('assets/images/ico-objek.png') ?>" alt="Objek Wisata" data-toggle="tooltip" data-placement="bottom" title="Objek Wisata" /></a>
     <a href="<?= base_url('publik/wisata/1') ?>" ><img class="icoco" src="<?= base_url('assets/images/ico-hotel.png') ?>" alt="Hotel dan Penginapan" data-toggle="tooltip" data-placement="bottom" title="Hotel dan Penginapan" /></a>
     <a href="<?= base_url('publik/wisata/4') ?>" ><img class="icoco" src="<?= base_url('assets/images/ico-event.png') ?>" alt="Event" data-toggle="tooltip" data-placement="bottom" title="Event" /></a>
     <a href="<?= base_url('publik/wisata/2') ?>" ><img class="icoco" src="<?= base_url('assets/images/ico-kuliner.png') ?>" alt="Kuliner" data-toggle="tooltip" data-placement="bottom" title="Kuliner" /></a>
     <a href="<?= base_url('publik/wisata/5') ?>" ><img class="icoco" src="<?= base_url('assets/images/ico-kerajinan.png') ?>" alt="Kerajinan Lokal" data-toggle="tooltip" data-placement="bottom" title="Kerajinan Lokal" /></a>
    </div>
   </div>
  </div>
 </div>
</div>
<div class="container-fluid">
 <div class="row">
  <div class="col-sm-12">
   <div class="row" style="background-image: url(assets/images/crop.jpg);background-attachment:fixed">
    <div class="col-sm-12 col-md-8 col-md-offset-4" style="background-color:rgba(0,0,0,.6);color:#fff;padding:20px">
     <h2>Pelalawan
     <br><small>Tuah Negeri Seiya Sekata</small></h2>
     <p class="text-justify">Kabupaten Pelalawan dengan luas 13.924,94 km², dibelah oleh aliran Sungai Kampar, serta pada kawasan ini menjadi pertemuan dari Sungai Kampar Kanan dan Sungai Kampar Kiri. Kabupaten Pelalawan memilik beberapa pulau yang relatif besar yaitu: Pulau Mendol, Pulau Serapung dan Pulau Muda serta pulau-pulau yang tergolong kecil seperti: Pulau Tugau, Pulau Labuh, Pulau Baru Pulau Ketam, dan Pulau Untut.</p>
     <p class="text-justify">Struktur wilayah merupakan daratan rendah dan bukit-bukit, dataran rendah membentang ke arah timur dengan luas wilayah mencapai 93 % dari total keseluruhan. Secara fisik sebagian wilayah ini merupakan daerah konservasi dengan karakteristik tanah pada bagian tertentu bersifat asam dan merupakan tanah organik, air tanahnya payau, kelembaban dan temperatur udara agak tinggi.
     </p>
     <a href="<?= base_url('') ?>" class="btn btn-primary" style="float:right"><span class="fa fa-chevron-right"></span> Baca Lebih Banyak Mengenai Pelalawan</a>
    </div>
   </div>
  </div>
 </div>
</div>
<div class="container" style="margin-top:70px">
 <div class="row">
  <div class="col-sm-12">
   <div class="panel panel-success">
    <div class="panel-heading">
     <h4>Tempat Wisata Pilihan</h4>
    </div>
    <div class="panel-body">
     <div class="row">
     <?php foreach($objek as $row){ 
      $list_gambar = json_decode($row->gambar_objek);
      $gambar = $list_gambar[0];
     ?>
     <div class="col-sm-2">
       <div class="thumbnail">
        <img src="<?= base_url('images/'. ($gambar!=''?$gambar:'jexpla.png') )?>" alt="thumbs" class="img-rounded img-responsive" style="height:100px;max-width:150px"/>
        <div class="caption text-center">
         <strong><a href="<?= base_url('publik/wisataobj/'.$row->id_objek) ?>"><?= $row->nama_objek ?></a></strong><br>
         <small><a href="<?= base_url('publik/wisata/'.$row->id_wisata) ?>"><?= $row->nama_wisata ?></a></small>
        </div>
       </div>
      </div>
     <?php } ?>
     </div>
    </div>
   </div>
  </div>
 </div>
 <div class="row">
  <div class="col-md-8">
   <div class="panel panel-primary">
    <div class="panel-heading">
     <h4>Artikel Terbaru</h4>
    </div>
    <div class="panel-body">  
     <?php foreach($publik as $row){ ?>
     <div class="post-preview">
      <div class="media">
       <div class="media-left"><img src="<?= base_url(($row->cover_artikel!=''?$row->cover_artikel:'images/jexpla.png') )?>" alt="thumbs" class="media-object" style="max-height:100px;max-width:150px"/></div>
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
    </div>
   </div>
  </div>
  <div class="col-md-4">
   <div class="panel panel-primary">
    <div class="panel-heading">Ulasan Terbaru</div>
    <div class="panel-body">
     <?php foreach($testi_baru as $row){ 
      $list_gambar = json_decode($row->gambar_objek);
      $gambar = $list_gambar[0];
     ?>
      <div class="media">
       <div class="pull-left">
        <img src="<?= base_url('images/'. ($gambar!=''?$gambar:'jexpla.png') )?>" alt="thumbs" class="img-circle img-responsive thumbnail" style="height:50px;max-width:150px"/>
       </div>
       <div class="media-body">
        <h4 class="media-heading"><?= $row->nama_pengirim_testi ?><br><small style="color:#333">pada <a href="<?= base_url('publik/wisataobj/'.$row->id_objek) ?>"><?= $row->nama_objek ?></a></small></h4>
        <?php for($i=1;$i<=$row->nilai_testi;$i++){
         echo "<span class='fa fa-star'></span>";}
         for($i=1;$i<=(5 - $row->nilai_testi);$i++){
          echo "<span class='fa fa-star-o'></span>";
         }
         ?>
        <p><?= $row->isi_testi ?></p>
       </div>
      </div>
      <hr>
     <?php } ?>
    </div>
   </div>
  </div>
 </div>
</div>
<script>
 $('.multi-item-carousel').carousel({
  interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  } else {
  	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
</script>