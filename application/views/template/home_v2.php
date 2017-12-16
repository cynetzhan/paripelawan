<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul ?> - Portal Pariwisata Pelalawan, Riau</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?= base_url('assets/css/bootflat.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/site.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?= base_url('assets/js/jqBootstrapValidation.js') ?>"></script>
    <style>
     .goog-te-gadget {color:#fff !important}
     .goog-te-combo {color:#000 !important}
     .goog-logo-link {color:#fff !important}
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
                
                <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/images/pi-emas.png') ?>" alt="Portal Pariwisata Pelalawan" style="max-height:40px;float:left;margin: -5px 5px 0px 10px;"/><img src="<?= base_url('assets/images/ico-pela.png') ?>" alt="Portal Pariwisata Pelalawan" style="max-height:35px;float:left"/></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form role="search" class="navbar-form navbar-right" action="<?= base_url('publik/cari')?>" method="get" >
                 <div class="form-search search-only">
                  <i class="search-icon glyphicon glyphicon-search"></i>
                  <input type="text" class="form-control search-query" name="query" placeholder="Pencarian"/>
                 </div>
                </form>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Profil</a>
                        <ul class="dropdown-menu">
                         <?php
                         $profil = $this->ModelArtikel->read_all(0,0,"webinfo_artikel.id_kategori = 7");
                         foreach($profil as $atk){ ?>
                         <li><a href="<?= base_url('publik/artikel/'.$atk->id_artikel) ?>"><?= $atk->judul_artikel ?></a></li>
                         <?php } ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Destinasi Wisata</a>
                        <ul class="dropdown-menu">
                         <?php
                         //$this->load->model('ModelWisata');
                         $menuwisata = $this->ModelWisata->read_all();
                         foreach($menuwisata as $menu){ ?>
                         <li><a href="<?= base_url('publik/wisata/'.$menu->id_wisata)?>"><?= $menu->nama_wisata ?></a></li>
                         <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Post Content -->
    <?= $contents ?>

    <hr>

    <!-- Footer -->
    <footer class="footer">
     <div class="container">
      <div class="clearfix">
       <dl class="footer-nav">
        <dd class="nav-title text-center"><img src="<?= base_url('assets/images/logokab.png') ?>" style="max-height:150px" /><br>
        <dd class="nav-title"><img src="<?= base_url('assets/images/pi-emas-med.png') ?>" style="max-height:150px" />
        </dd>
       </dl>
       <dl class="footer-nav">
        <dd class="nav-title">
        <div style="padding-right:10px;">
         <strong>Dinas Pariwisata Kabupaten Pelalawan</strong>
         <br>Jl. Swa Praja, Komplek Perkantoran Pemda Bhakti Praja Pangkalan Kerinci
         <br>Kabupaten Pelalawan, Provinsi Riau 28381
         <br>Indonesia
         <br><br>
         <strong>Informasi Kontak:</strong>
         <br>Telp/Fax: +62761-493755 
         <br>Email: pariwisatapelalawan@yahoo.com
        </div>
        </dd>
       </dl>
       <!--dl class="footer-nav">
        <dt class="nav-title">Tentang Pelalawan</dt>
        <dd class="nav-item"><a href="#">Profil</a></dd>
        <dd class="nav-item"><a href="#">Berita</a></dd>
        <dd class="nav-item"><a href="#">Pesona Indonesia</a></dd>
       </dl-->
       <dl class="footer-nav">
        <dt class="nav-title">Tentang Pelalawan</dt>
        <dd class="nav-item"><a href="<?= base_url('publik/kategori/7') ?>">Profil</a></dd>
        <dd class="nav-item"><a href="<?= base_url('publik/kategori/6') ?>">Berita</a></dd>
        <dd class="nav-item"><a href="https://pesona.indonesia.travel">Pesona Indonesia</a></dd>
        <br>
        <dt class="nav-title">Fasilitas</dt>
        <dd class="nav-item"><a href="<?= base_url('publik/wisata/1') ?>">Penginapan dan Hotel</a></dd>
        <dd class="nav-item"><a href="<?= base_url('publik/wisata/3') ?>">Biro Wisata</a></dd>
        
       </dl>
       <dl class="footer-nav">
        <dt class="nav-title">Destinasi Wisata</dt>
        <dd class="nav-item"><a href="<?= base_url('publik/wisata/7') ?>">Objek Wisata</a></dd>
        <dd class="nav-item"><a href="<?= base_url('publik/wisata/2') ?>">Kuliner</a></dd>
        <dd class="nav-item"><a href="<?= base_url('publik/wisata/5') ?>">Kerajinan Lokal</a></dd>
        <dd class="nav-item"><a href="<?= base_url('publik/wisata/4') ?>">Event dan Budaya</a></dd>
       </dl>
       <dl class="footer-nav">
        <dt class="nav-title">Terjemahkan</dt>
        <dd class="nav-item">
         <div id="google_translate_element"></div>
        </dd>
       </dl>
      </div>
     </div>
     <div class="container">
      <div class="clearfix">
       
       <div class="footer-copyright text-center">Hak Cipta © <?= date('Y') ?> Kabupaten Pelalawan
       <br>Beberapa ikon pada situs ini didesain oleh <a href="https://freepik.com" alt="freepik">Freepik</a> dari <a href="https://flaticon.com" alt="flaticon">Flaticon</a>
      </div>
     </div>
    </footer>
    <script type="text/javascript">
     $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
     });
     function googleTranslateElementInit() {
      new google.translate.TranslateElement({
       pageLanguage: 'id',
       includedLanguages: 'en'
      }, 'google_translate_element');
     }
     </script>
     <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>
