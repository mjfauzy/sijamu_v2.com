<!doctype html>
<html lang="en">
<head>
  <title>SIJAMU - Sistem Informasi Jaminan Mutu</title>
  <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
  <meta content="MJFauzy" name="author"/>
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" /> SIJAMU</a>
    </div> 
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
      <li><a href="#" data-toggle="modal" data-target="#ModalProfil"><span class="glyphicon glyphicon-info-sign"></span> Profil</a></li>
      <li><a href="#" data-toggle="modal" data-target="#ModalTentangUjm"><span class="glyphicon glyphicon-bookmark"></span> Tentang UJM</a></li> 
      <li><a href="#" data-toggle="modal" data-target="#ModalKontak"><span class="glyphicon glyphicon-earphone"></span> Kontak</a></li> 
      <li><a href="#" data-toggle="modal" data-target="#ModalLoginForm"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

  <!-- Modal Login Form -->
    <div id="ModalLoginForm" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="logo-login text-center">
              <em class="glyphicon glyphicon-user"></em>
              <h4 class="modal-title">Login User</h4>
            </div>
          </div>
          <div class="modal-body">
            <!-- form login -->
            <form action="check-login.php" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control" required="true" />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control" required="true" />
              </div>
              <div class="text-right">
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                <button class="btn btn-danger" type="reset" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span> Batal</button>
              </div>
            </form>
            <!-- end form login -->
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal Profil -->
    <div id="ModalProfil" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="logo-login text-center">
              <em class="glyphicon glyphicon-info-sign"></em>
              <h4 class="modal-title">PROFIL PSTBM</h4>
            </div>
          </div>
          <div class="modal-body">
            <h2>Pusat Sains dan Teknologi Bahan Maju (PSTBM)</h2>
            <div class="row">
              <div class="col-md-4">
                <img src="images/gedung-pstbm.jpg" width="250" height="150">
              </div>
              <div class="col-md-8">
                <p>
                  Pusat Sains dan Teknologi Bahan Maju (PSTBM) berdasarkan PERKA BATAN No. 14 Tahun 2013 tanggal 27 Desember 2013, merupakan unit kerja dibawah Deputi Bidang Sains dan Aplikasi Teknologi Nuklir (SATN) yang mempunyai tugas melaksanakan perumusan dan pengendalian kebijakan teknis, pelaksanaan, dan pembinaan dan bimbingan di bidang penelitian dan pengembangan bahan maju berbasis teknologi nuklir, sains bahan industri nuklir, dan teknologi neutron.
                </p>
                <p>
                  Undang-undang No. 10 Tahun 1997 tentang Ketenaganukliran mengamanatkan bahwa perkembangan dan pemanfaatan tenaga nuklir dalam berbagai bidang kehidupan manusia di dunia sudah demikian maju sehingga pemanfaatan dan pengembangannya bagi pembangunan nasional yang berkesinambungan dan berwawasan lingkungan perlu ditingkatkan dan diperluas untuk mempercepat kesejahteraan dan daya saing bangsa.
                </p>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                <h3>Visi</h3>
                <p>
                  Visi PSTBM mengacu kepada visi organisasi induknya, yaitu BATAN. Visi BATAN disusun dengan mempertimbangkan dokumen perencanaan pembangunan nasional dan kebijakan litbang nasional yang berada di atasnya yaitu Rencana Pembangunan Jangka Panjang Nasional (RPJPN) 2005-2025, Rencana Pembangunan Jangka Menengah Nasional (RPJMN) 2015-2019, dan Jakstranas Iptek 2015- 2019.
                </p>
                <p>
                  Visi RPJPN 2005-2025 mengarah pada terwujudnya Indonesia sebagai negara yang mandiri, maju, adil dan makmur. Sementara itu, RPJMN 2015–2019 menekankan pada pembangunan keunggulan kompetitif perekonomian yang berbasis SDA lokal, SDM yang berkualitas, dan kemampuan iptek.
                </p>
              </div>
              <div class="col-md-4">
                <p><img src="images/struktur-organisasi-pstbm.jpg" width="250" height="150"></p>
              </div>
              <div class="col-md-12">
                <p>
                  BATAN sebagai lembaga pemerintah yang diberi amanat untuk melaksanakan penelitian, pengembangan dan pendayagunaan ilmu pengetahuan dan teknologi nuklir, turut bertanggung jawab untuk menciptakan keunggulan iptek tersebut, terutama di tingkat regional. Oleh karena itu, visi BATAN pada tahun 2015-2019 adalah sebagai berikut yaitu " “BATAN Unggul di Tingkat Regional, Berperan dalam Percepatan Kesejahteraan Menuju Kemandirian Bangsa”
                </p>
                <p>
                  PSTBM sebagai salah satu unit kerja yang ada di bawah kedeputian Sains dan Aplikasi Teknologi Nuklir memiliki tugas utama melaksanakan kegiatan litbang bahan maju menggunakan iptek nuklir. Dengan keunggulan fasilitas dan SDM yang dimiliki, maka PSTBM memiliki visi yang mengacu pada visi BATAN, yaitu " BATAN unggul di Tingkat Regional, Berperan dalam Percepatan Kesejahteraan Menuju Kemandirian Bangsa". Indikasi tercapainya visi tersebut antara lain diperolehnya beberapa prototipe bahan maju yang unggul dengan teknologi nuklir khususnya teknologi berkas neutron untuk aplikasi di bidang energi, kesehatan dan lingkungan. Indikator keberhasilan lainnya adalah termanfaatkannya fasilitas teknologi berkas neutron untuk litbang bahan maju dalam kerangka pengembangan sumber daya iptek nasional.
                </p>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <h3>Misi</h3>
                <p>
                  <ol>
                    <li>Melaksanakan penelitian  dan pengembangan di bidang sains bahan industri nuklir dan bahan maju berbasis teknologi nuklir.</li>
                    <li>Melaksanakan penelitian dan pengembangan di bidang pemanfaatan teknologi berkas neutron.</li>
                    <li>Melaksanakan pemantauan keselamatan kerja, kegiatan proteksi radiasi, dan operasi, pemeliharaan dan pengembangan elektromekanik dan instrumentasi fasilitas penelitian dan pengembangan teknologi bahan maju.</li>
                    <li>Melakukan pengembangan, pemantauan pelaksanaan dan audit internal sistem manajemen mutu penelitian dan pengembangan teknologi bahan maju.</li>
                    <li>Melaksanakan urusan perencanaan, persuratan dan kearsipan, kepegawaian, keuangan, perlengkapan dan rumah tangga, dokumentasi ilmiah dan publikasi serta pelaporan.</li>
                  </ol>
                </p>
                <a href="http://www.batan.go.id/index.php/id/pusat-sains-dan-teknologi-bahan-maju-pstbm-batan" target="_blank">Selengkapnya >></a>
              </div>
            </div>
            <div class="modal-footer text-right">
              <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
            </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal Tentang UJM -->
    <div id="ModalTentangUjm" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="logo-login text-center">
              <em class="glyphicon glyphicon-bookmark"></em>
              <h4 class="modal-title">Tentang UJM</h4>
            </div>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <h3>Unit Jaminan Mutu (UJM) - PSTBM</h3>
                <p>Unit Jaminan Mutu mempunyai tugas melakukan pengembangan, pemantauan pelaksanaan dan audit internal sistem manajemen mutu penelitian dan pengembangan teknologi bahan maju.</p>
                <p>Dalam melaksanakan kegiatan kelembagaan, litbang dan diseminasi hasil litbang, PSTBM berpegang pada Kebijakan Mutu sebagai berikut :
                  <ol>
                    <li>PSTBM memastikan dan memelihara mutu produk seluruh pelaksanaan fungsi organisasi dengan mengutamakan keselamatan.</li>
                    <li>PSTBM selalu meningkatkan mutu produknya dengan peningkatan profesionalisme sumber daya manusia dan membina jejaring kerja dengan pemangku kepentingan.</li>
                    <li>PSTBM selalu meningkatkan pelayanan administrasi teknis berdasarkan sistem mutu.</li>
                    <li>PSTBM memastikan semua produk yang dihasilkan melalui penerapan Sistem Standardisasi dan prinsip-prinsip Manajemen Mutu Terpadu pada setiap langkah kegiatannya.</li>
                  </ol>
                </p>
              </div>
            </div>
          </div>
          <div class="modal-footer text-right">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal Kontak -->
    <div id="ModalKontak" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="logo-login text-center">
              <em class="glyphicon glyphicon-user"></em>
              <h4 class="modal-title">Kontak</h4>
            </div>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <span class="glyphicon glyphicon-map-marker"></span> Alamat : Kawasan PUSPIPTEK Serpong Gedung 43, Setu, Tangerang Selatan 15310<br />
                <span class="glyphicon glyphicon-phone-alt"></span> Telp. : (021) 7560-922<br />
                <span class="glyphicon glyphicon-print"></span> Fax : 7560-926<br />
                <span class="glyphicon glyphicon-envelope"></span> Email : <a href="mailto:pstbm@batan.go.id" target="_blank">pstbm@batan.go.id</a>
              </div>
            </div>
          </div>
          <div class="modal-footer text-right">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span> Tutup</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
