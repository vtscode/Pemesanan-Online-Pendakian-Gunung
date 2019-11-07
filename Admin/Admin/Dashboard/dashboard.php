<?php
include "../Proses/hakadmin.php";
?>
<?php
include '../../../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="icon" href="LogoG.png" type="image/png">
  <title>Peonpegu</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" href="../Stisla/node_modules/izitoast/dist/css/iziToast.min.css">
  <link rel="stylesheet" href="../Stisla/node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../Stisla/node_modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../Stisla/node_modules/fullcalendar/dist/fullcalendar.min.css">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../Stisla/node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../Stisla/node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="../Stisla/node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="../Stisla/node_modules/summernote/dist/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../Stisla/assets/css/style.css">
  <link rel="stylesheet" href="../Stisla/assets/css/components.css">
  <script src="../Stisla/node_modules/chart.js/dist/Chart.js"></script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>          
        </form>
        <?php 
        include '../../../koneksi.php';
        $id_user = @$_GET['id_user'];
        $query = "SELECT * FROM user WHERE id_user='$id_user'";
        $exe = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($exe);
        ?>       
        <script type="text/javascript">
          var tampil = localStorage.getItem('id_user');
          var tampil2 = localStorage.getItem('username');
          console.log("Siapa nama orang yang login tadi : ", tampil2);
          console.log("Berapa id tersebut : ", tampil);
        </script>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../Stisla/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><script type="text/javascript">document.write(tampil2);</script></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Keluar dalam 5 menit</div>
              <a href="../Pages/akun.php" onclick="location.href=this.href+'?id_user='+tampil;return false;" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil
              </a>
              <a href="../Pages/keamanan.php" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Pengaturan
              </a>
              <div class="dropdown-divider"></div>
              <a href="../../proses/logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="dashboard.php" onclick="location.href=this.href+'?id_user='+tampil;return false;">Peonpegu</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard.php" onclick="location.href=this.href+'?id_user='+tampil;return false;">St</a>
          </div>
          <center><div id="clock2"></div></center>
          <script type='text/javascript'>
            <!--
              var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
              var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
              var date = new Date();
              var day = date.getDate();
              var month = date.getMonth();
              var thisDay = date.getDay(),
              thisDay = myDays[thisDay];
              var yy = date.getYear();
              var year = (yy < 1000) ? yy + 1900 : yy;
              document.getElementById('clock2').innerHTML=thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
      //-->
    </script>          
    <center><div id="clock"></div></center>
    <script type="text/javascript">
      <!--
        function showTime() {
          var a_p = "";
          var today = new Date();
          var curr_hour = today.getHours();
          var curr_minute = today.getMinutes();
          var curr_second = today.getSeconds();
          if (curr_hour < 12) {
            a_p = "AM";
          } else {
            a_p = "PM";
          }
          if (curr_hour == 0) {
            curr_hour = 12;
          }
          if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
          }
          curr_hour = checkTime(curr_hour);
          curr_minute = checkTime(curr_minute);
          curr_second = checkTime(curr_second);
          document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }

        function checkTime(i) {
          if (i < 10) {
            i = "0" + i;
          }
          return i;
        }
        setInterval(showTime, 500);
    //-->
  </script>

  <!-- Menampilkan Hari, Bulan dan Tahun -->
  <ul class="sidebar-menu">
    <li class="menu-header">Beranda</li>
    <li class="nav-item dropdown active">
      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Beranda</span></a>
      <ul class="dropdown-menu">
        <li class="active"><a class="nav-link" href="dashboard.php" onclick="location.href=this.href+'?id_user='+tampil;return false;">Halaman Utama</a></li>
      </ul>
    </li>
    <li class="menu-header">Menu 1</li>
    <li class="nav-item dropdown">
      <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Menu 1</span></a>
      <ul class="dropdown-menu">
        <li><a class="nav-link" href="../Pengguna/index.php">Pengguna</a></li>
        <li><a class="nav-link" href="../Wisata/index.php">Wisata</a></li>
        <li><a class="nav-link" href="../Berita/index.php">Berita</a></li>
        <li><a class="nav-link" href="../Penulis/index.php">Penulis</a></li>
      </ul>
    </li>
    <li class="menu-header">Menu 2</li>
    <li class="nav-item dropdown">
      <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Menu 2</span></a>
      <ul class="dropdown-menu">
        <li><a class="nav-link beep beep-sidebar" href="../Testimoni/index.php" onclick="location.href=this.href+'?id_user='+tampil;return false;">Testimoni</a></li>
        <li><a class="nav-link beep beep-sidebar" href="../Komentar/index.php">Komentar</a></li>
        <li><a class="nav-link beep beep-sidebar" href="../Transaksi/index.php">Transaksi</a></li>
      </ul>
    </li>            
    <li class="menu-header">Menu 3</li>
    <li class="nav-item dropdown">
      <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Menu 3</span></a>
      <ul class="dropdown-menu">
        <li><a href="../Pages/sosial.php">Sosial Media</a></li>
        <li><a href="../Pages/keamanan.php">Privasi & Keamanan</a></li>
        <li><a href="../Pages/akun.php">Info Akun</a></li>
      </ul>
    </li>
    <li class="menu-header">Menu 4</li>
    <li class="nav-item dropdown">
      <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Menu 4</span></a>
      <ul class="dropdown-menu">
        <li><a href="../Info/kebijakan.php">Kebijakan Privasi</a></li>
        <li><a href="../Info/bantuan.php">Pusat Bantuan</a></li>
        <li><a href="../Info/infoakun.php">Info Aplikasi</a></li>
      </ul>
    </li>            
  </ul>

  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
      <i class="fas fa-rocket"></i> Dokumentasi
    </a>
  </div>
</aside>
</div>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Halaman Utama</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            &nbsp;<i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Data Akun</h4>
              <?php 
              $query = "SELECT COUNT(*) AS user FROM user";
              $exe = mysqli_query($conn,$query);
              $bu = mysqli_fetch_array($exe);
              ?>
              <h3><?php echo $bu['user']; ?></h3>                    
            </div>
            <a href="../Pengguna/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            &nbsp;<i class="fas fa-book" aria-hidden="true"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Data Wisata</h4>
            </div>
            <?php 
            $query = "SELECT COUNT(*) AS wisata FROM wisata";
            $exe = mysqli_query($conn,$query);
            $bu = mysqli_fetch_array($exe);
            ?>
            <h3><?php echo $bu['wisata']; ?></h3>
            <a href="../Wisata/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>                  
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            &nbsp;<i class="fas fa-book"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Data Berita</h4>
            </div>
            <?php 
            $query = "SELECT COUNT(*) AS berita FROM berita";
            $exe = mysqli_query($conn,$query);
            $bu = mysqli_fetch_array($exe);
            ?>
            <h3><?php echo $bu['berita']; ?></h3>
            <a href="../Berita/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>                  
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            &nbsp;<i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Data Penulis</h4>
            </div>
            <?php 
            $query = "SELECT COUNT(*) AS penulis FROM penulis";
            $exe = mysqli_query($conn,$query);
            $bu = mysqli_fetch_array($exe);
            ?>
            <h3><?php echo $bu['penulis']; ?></h3>
            <a href="../Penulis/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>                  
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-danger bg-danger">
            &nbsp;<i class="fas fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Data Testimoni</h4>
            </div>
            <?php 
            $query = "SELECT COUNT(*) AS testimoni FROM testimoni";
            $exe = mysqli_query($conn,$query);
            $bu = mysqli_fetch_array($exe);
            ?>
            <h3><?php echo $bu['testimoni']; ?></h3>
            <a href="../Testimoni/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>                                    
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-info bg-info">
            &nbsp;<i class="fas fa-user-friends"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Data Komentar</h4>
            </div>
            <?php 
            $query = "SELECT COUNT(*) AS komentar FROM komentar";
            $exe = mysqli_query($conn,$query);
            $bu = mysqli_fetch_array($exe);
            ?>
            <h3><?php echo $bu['komentar']; ?></h3>
            <a href="../Komentar/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>                                    
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-success bg-success">
            &nbsp;<i class="fas fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Data Transaksi</h4>
            </div>
            <?php 
            $query = "SELECT COUNT(*) AS transaksi FROM transaksi";
            $exe = mysqli_query($conn,$query);
            $bu = mysqli_fetch_array($exe);
            ?>
            <h3><?php echo $bu['transaksi']; ?></h3>
            <a href="../Transaksi/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>                                    
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Doughnut Chart</h4>
          </div>
          <div class="card-body">
            <canvas id="MyDoughnutChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Pie Chart</h4>
          </div>
          <div class="card-body">
            <canvas id="MyPieChart"></canvas>
          </div>
        </div>
      </div>
    </div>          
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Calendar</h4>
          </div>
          <div class="card-body">
            <div class="fc-overflow">
              <div id="myEvent"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Indonesian Map</h4>
          </div>
          <div class="card-body">
            <div id="visitorMap3"></div>
          </div>
        </div>
      </div>
    </div>          
  </div>
</section>
</div>
<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
  </div>
  <div class="footer-right">
    2.3.0
  </div>
</footer>
</div>
</div>
<script >
  var ctx = document.getElementById("MyDoughnutChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["Admin", "User"],      
      datasets: [{
        label: '',
        data: [
        <?php 
        $admin = mysqli_query($conn,"SELECT * FROM user WHERE level = 'admin'");
        echo mysqli_num_rows($admin);
        ?>, 
        <?php 
        $user = mysqli_query($conn,"SELECT * FROM user WHERE level = 'user'");
        echo mysqli_num_rows($user);
        ?>           
        ],
        backgroundColor: [
        '#fc544b',
        '#6777ef',
        ],
      }],
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
      },
    }
  });
</script>
<script>
  var ctx = document.getElementById("MyPieChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ["Sumatra", "Jawa", "Kalimantan", "Sulawesi", "Papua"],      
      datasets: [{
        label: '',
        data: [
        <?php 
        $sumatra = mysqli_query($conn,"SELECT * FROM wisata WHERE id_kategori='1'");
        echo mysqli_num_rows($sumatra);
        ?>, 
        <?php 
        $jawa = mysqli_query($conn,"SELECT * FROM wisata WHERE id_kategori='2'");
        echo mysqli_num_rows($jawa);
        ?>,
        <?php 
        $kalimantan = mysqli_query($conn,"SELECT * FROM wisata WHERE id_kategori='3'");
        echo mysqli_num_rows($kalimantan);
        ?>, 
        <?php 
        $sulawesi = mysqli_query($conn,"SELECT * FROM wisata WHERE id_kategori='4'");
        echo mysqli_num_rows($sulawesi);
        ?>,
        <?php 
        $papua = mysqli_query($conn,"SELECT * FROM wisata WHERE id_kategori='5'");
        echo mysqli_num_rows($papua);
        ?>                                                                
        ],
        backgroundColor: [
        '#63ed7a',
        '#ffa426',
        '#fc544b',
        '#6777ef',
        'yellow',
        ],
      }],
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
      },
    }
  });  
</script>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="../Stisla/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="../Stisla/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
<script src="../Stisla/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="../Stisla/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../Stisla/node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="../Stisla/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="../Stisla/node_modules/izitoast/dist/js/iziToast.min.js"></script>
<script src="../Stisla/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="../Stisla/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../Stisla/node_modules/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>

<script src="../Stisla/node_modules/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Template JS File -->
<script src="../Stisla/assets/js/scripts.js"></script>
<script src="../Stisla/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="../Stisla/assets/js/page/modules-vector-map.js"></script>
<script src="../Stisla/assets/js/page/modules-calendar.js"></script>
<script src="../Stisla/assets/js/page/index-0.js"></script>
<script src="../Stisla/assets/js/page/modules-chartjs.js"></script>
</body>
</html>
