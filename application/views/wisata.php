<?php
$list_gambar = json_decode($objek->gambar_objek);
?>
<style>
 .media-body p{color:#4d4d4d}
</style>
<div class="container" style="margin-top:70px;min-height:70vh">
 <!--div class="row">
  <div class="col-sm-8">
   <ol class="breadcrumb">
   <li><a href="<?= base_url() ?>">Home</a></li>
   <li><a href="<?= base_url('publik/wisata/'.$objek->id_wisata) ?>"><?= $objek->nama_wisata ?></a></li>
   <li class="active"><span><?= $objek->nama_objek ?></span></li>
  </ol>
  </div>
 </div-->
 <div class="row">
  <div class="col-md-8">
  <h3 style="margin-top:5px"><?= $objek->nama_objek ?>
  <br><small><a href="<?= base_url('publik/wisata/'.$objek->id_wisata) ?>"><?= $objek->nama_wisata ?></a></small>
  </h3>
  <?php if(is_array($list_gambar) && count($list_gambar) != 0) { ?>
  <div id="banner" class="carousel slide" data-ride="carousel" data-interval="false">
     <ol class="carousel-indicators">
       <?php for($i=0;$i<count($list_gambar);$i++) { ?>
       <li data-target="#banner" data-slide-to="<?= $i ?>" <?= ($i!=0)?:"class='active'" ?>></li>
       <?php } ?>
       <?php if($objek->kode_video != '') { ?>
       <li data-target="#banner" data-slide-to="<?= $i+1 ?>"></li>
       <?php } ?>
     </ol>
     <div class="carousel-inner">
      <?php $count=0; foreach($list_gambar as $atk){ ?>
       <div class="item <?= ($count!=0)?:"active" ?>" style="background-image:url('<?= base_url('images/'.$atk) ?>');background-size:cover"><img src="<?= base_url('assets/images/trsp.png') ?>" style="height:450px;max-width:100%;opacity:0;" class="img-responsive"></div>
      <?php $count++; } 
      if($objek->kode_video !=  '') { ?>
      <div class="item"><iframe src="https://www.youtube.com/embed/<?= $objek->kode_video ?>" style="height:450px;width:100%" frameborder="0"></iframe></div>
      <?php } ?>
     </div>
     <a class="left carousel-control" href="#banner" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left" style="color:#d5b82a;font-size:2.5em"></span>
     </a>
     <a class="right carousel-control" href="#banner" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right" style="color:#d5b82a;font-size:2.5em"></span>
     </a>
   </div>
  <?php } else { ?>
   <div style="background-image:url('<?= base_url('assets/images/trsp.png') ?>');background-size:cover;height:250px;max-width:100%;vertical-align:middle;padding:20px"><h3 style="text-align:center;color:#aaa">Tidak Ada Foto</h3></div>
  <?php } ?>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#deskripsi">Deskripsi</a></li>
    <li><a data-toggle="tab" href="#ulasan">Ulasan</a></li>
  </ul>
  <div class="tab-content">
   <div id="deskripsi" class="tab-pane fade in active">
      
      <?php echo $objek->ket_objek ?>
    </div>
    <div id="ulasan" class="tab-pane fade">
     <h4><small style="color:#555">Ulasan mengenai:</small><br><?= $objek->nama_objek ?></h4>
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
          <span style="color:#ffbd00;font-size:1em">
          <?php for($i=1;$i<=$row->nilai_testi;$i++){
           echo "<span class='fa fa-star'></span>";}
           for($i=1;$i<=(5 - $row->nilai_testi);$i++){
            echo "<span class='fa fa-star-o'></span>";
           }
           ?>
           </span>
          <p><?= $row->isi_testi ?></p>
         </div>
        </div>
        <?php } 
        } else { ?>
        <p>Belum ada ulasan</p>
        <?php } ?>
       </div>
      <a name="kolom_komentar"></a>
      <div class="col-md-8">
       <h4>Beri Peringkat Objek Wisata Ini!</h4>
       <form name="komentar" action="<?= base_url('publik/kirim_testi') ?>" method="post">
        <input type="hidden" name="id_objek" value="<?= $objek->id_objek ?>"/>
        <div class="form-group">
         <label class="control-label" for="nilai">Nilai Objek Wisata</label>
         <input type="hidden" name="nilai_testi" id="nilai" value="0"/>
         <div id="stars" class="starrr" style="font-size:2em;color:#ffbd00;"></div>
        </div>
        <div class="form-group">
         <label class="control-label" for="nama">Nama</label>
         <input type="text" maxlength="25" name="nama_pengirim_testi" id="nama" class="form-control"/>
        </div>
        <div class="form-group">
         <label class="control-label" for="isi_testi">Ulasan</label>
         <textarea name="isi_testi" id="isi_testi" class="form-control"></textarea>
        </div>
        <div class="form-group">
         <button type="submit" name="submitkomen" class="btn btn-info btn-block">Kirim Ulasan</button>
        </div>
       </form>
       
      </div>
    </div>
   </div>
  </div>
  <div class="col-md-4">
   <table class="table table-striped">
    <thead>
    <tr>
     <th colspan="2" style="background-color:#282828; color:#fff;border-bottom:4px solid #d5b82a"><span style="font-size:1.5em;padding:5px"><span class="fa fa-map-marker" style="font-size:1.5em;color:#d5b82a"></span> <?= "Informasi Objek Wisata" ?></span></td>
    </tr>
    </thead>
    <tbody>
    <tr>
     <td style="text-align:center" colspan="2">
      <strong>Nilai Ulasan</strong><br>
      <span style="color:#ffbd00;font-size:1.5em"><strong><?= number_format($nilai_avg_testi[0]->total_nilai_testi,1) ?></strong></span>/5 &nbsp;
      <span style="font-size:1.5em;color:#ffbd00;">
      <?= show_rating($nilai_avg_testi[0]->total_nilai_testi) ?></span><br>
      <small style="color:#555">Dari <?= count($testi) ?> ulasan pengguna</small>
     </td>
    </tr>
    <tr>
     <td colspan="2" class="text-center">
     <a href="https://www.google.co.id/maps/@<?= $objek->lat_objek ?>,<?= $objek->long_objek ?>,8z?hl=id"><img src="https://maps.googleapis.com/maps/api/staticmap?center=<?= $objek->lat_objek ?>,<?= $objek->long_objek ?>&zoom=8&size=500x300&maptype=roadmap&format=png&key=AIzaSyCAlf-lTx36Tc0kBDw48kUNArBRKdlinPo" alt="Peta untuk <?= $objek->nama_objek ?>" class="img img-responsive"/><span class="fa fa-location-arrow"></span> Kunjungi Peta</a>
     </td>
    </tr>
    <tr>
     <th>Alamat</th>
     <td><?=  $objek->alamat_objek ?></td>
    </tr>
    <?php
     $rincian = json_decode($objek->rincian_objek,TRUE);
     $field = array_keys($rincian);
     foreach($field as $fd){ ?>
    <tr>
     <th><?= $fd ?></th>
     <td><?=  $rincian[$fd] ?></td>
    </tr>
     <?php } ?>
    </tbody>
   </table>
   
   <div class="panel panel-primary">
    <div class="panel-heading">
     Fasilitas dan Objek Wisata Terdekat
    </div>
    <div class="panel-body">
     <div class="list-group">
      <?php foreach($objek_sekitar as $obj){ ?>
       <a href="<?= base_url('publik/wisataobj/'.$obj->id_objek) ?>" class="list-group-item">
        <h4 class="list-group-item-heading"><?= $obj->nama_objek ?></h4>
        <span class="list-group-item-text"><span class="fa fa-map-marker"></span> Sekitar <?= ceil($obj->distance) ?> km dari sini</span>
       </a>
      <?php } ?>
     </div>
    </div>
   </div> 
  </div>
 </div>
</div>
<script>
 var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='fa fa-star-o'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      //whatever im gonna put the set rating here
      $("input#nilai").val(rating);
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('fa-star-o').addClass('fa-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('fa-star').addClass('fa-star-o');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('fa-star').addClass('fa-star-o');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});

$( document ).ready(function() {
      
  $('#stars').on('starrr:change', function(e, value){
    $('#count').html(value);
  });
  
  $('#stars-existing').on('starrr:change', function(e, value){
    $('#count-existing').html(value);
  });
});
</script>
