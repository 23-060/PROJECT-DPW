<?php
require "function.php";
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Truno</title>
    <link
      rel="shortcut icon"
      href="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg"
      type="image/x-icon"
    />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
  </head>
  <body>
    <section id="backToTop"></section>
    <!-- NAVBAR START -->
    <nav class="navbar fixed-top bg-dark py-2 border-bottom border-3 border-primary">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <button class="btn border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span><i class="bi bi-list fs-5"></i></span>
      </button>
      <a class="navbar-brand d-lg-inline-block d-none" href="index.php">
        <img src="img/truno.png" alt="logo" style="height:50px;">
      </a>
    </div>

    <div class="d-flex justify-content-center align-items-center flex-grow-1">
      <form action="" method="post" class="d-flex">
        <input type="text" name="keyword" style="width:400px; height:35px; margin-right:10px;" placeholder="Cari Judul Anime Disini" autocomplete="off" autofocus>
        <button type="submit" name="cari" style="height:35px; width:70px;">Cari</button>
      </form>
    </div>

    <div class="d-flex align-items-center">
      <button class="btn badge fs-6 bg-primary mx-2 d-md-block d-none"><a href="premium.php" class="text-light link-offset-2 link-underline link-underline-opacity-0">
        Premium <i class="bi bi-gem"></i></a>
      </button>

      <div class="dropdown">
        <button class="btn dropdown-toggle border-0 pe-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="uiButtonTheme">
          <i class="bi bi-moon-stars-fill"></i>
        </button>
        <ul class="dropdown-menu" style="min-width: 0px">
          <li class="dropdown-item">
            <button class="btn" id="darkButton">
              <i class="bi bi-moon-stars-fill"></i>
            </button>
          </li>
          <li class="dropdown-item">
            <button class="btn" id="lightButton">
              <i class="bi bi-brightness-high-fill"></i>
            </button>
          </li>
        </ul>
      </div>
      <button type="button" class="btn border-0 d-lg-block d-none"><a href="login.php">
        <i class="bi bi-person-fill my-auto fs-5 text-light"></i></a>
      </button>
    </div>
  </div>

  <div class="offcanvas offcanvas-start" style="width: 300px" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
    <div class="offcanvas-header">
    <img src="img/truno.png" alt="logo" style="height:50px;">
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="m-0" />
    <div class="offcanvas-body">
      <ul class="navbar-nav justify-content-start flex-grow-1">
        <li class="nav-item my-auto">
          <div class="collapse" id="displayButton">
            <a href="Login.html" class="bg-primary link-light rounded-5 py-0 w-100 mb-2 d-flex justify-content-center text-decoration-none" style="height: 35px">
              <span>Login</span>
            </a>
            <a href="Register.html" class="bg-primary link-light rounded-5 py-0 w-100 mb-4 d-flex justify-content-center text-decoration-none" style="height: 35px" type="submit">
              <span>Register</span>
            </a>
          </div>
          <div class="collapse d-flex justify-content-between align-items-center" id="displayName">
            <span id="nameBlock">User UID213452</span>
            <button class="btn border-0" id="logOutBtn">
              <i class="bi bi-box-arrow-right"></i>
            </button>
          </div>
        </li>
        <hr />
        <li class="nav-item my-auto">
          <a class="nav-link text-light link-primary" href="#">
            <i class="bi bi-house-door-fill"></i> Home
          </a>
        </li>
        <li class="nav-item my-auto">
          <a class="nav-link link-primary text-light" href="premium.php">
            <i class="bi bi-gem"></i> Premium
          </a>
        </li>
        <li class="nav-item my-auto">
          <a class="nav-link link-primary text-light" href="#">
            <i class="bi bi-grid"></i> Category
          </a>
        </li>
      </ul>
    </div>
    <hr class="m-0" />
    <div class="mx-3 my-2">Using bootstrap</div>
  </div>
</nav>

    <!-------------------------------------------- MAIN START ------------------------------------------------------>
    <!-- isi di bawah sini ya anak pintar -->
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 d-flex justify-content-center mt-5" style="margin-left: -130px;">
          <div class="profil">
              <img
                src="img/Nerdhida.jpg"
                alt="profil"
                class="img-fluid rounded-circle"
                style="height: 100px; width: 100px"
              />
          </div>
          </div>
          <div class="mt-3">
            <h3>Nerdhida</h3>
            <p>Silahkan Memilih Paket Premium Anda</p>
          </div>
        </div>
        <div class="col-12 col-md-6 mt-5 text-end" style="margin-left: -220px;">
          <p class="text-muted mt-5">
            <i class="fa-solid fa-arrow-right-arrow-left"></i> Batalkan
            Langganan
          </p>
        </div>
      </div>
      <!-- pilih premium -->

      <div class="container mt-5 d-md-flex">
        <div class="row justify-content-center">
          <!-- Card 1 -->
          <div class="col-md-3 mb-4">
            <div class="card">
              <h2 class="text-center mx-3">Fans <br>
              IDR 25,000/bulan
              </h2>
              <p class="text-center">TERMASUK PPN</p>
              <!-- <hr style="height:5px;border-width:0;color:gray;background-color:gray"> -->
              <div class="card-body text-center">
                <button type="button" class="btn btn-outline-warning">GRATIS TRIAL 7-HARI</button>
                <h5 class="card-title mt-3" style="font-size: 15px;"><a href="#" class="link-light link-offset-2 link-underline link-underline-opacity-0">Skip Gratisan</a></h5>
                <p class="card-text">Streaming seluruh anime yang ada Truno bebas iklan dan tonton episode baru segera setelah Jepang</p>
                <hr style="height:5px;border-width:0;color:gray;background-color:gray">
                <p>PLUS</p>
                <p class="text-start" style="font-size: 12px;"><i class="fa-solid fa-check" style="color: #63E6BE;"></i> - Streaming di 1 perangkat dalam satu waktu</p>
              </div>
            </div>
          </div>
          <!-- Card 2 -->
          <div class="col-md-3 mb-4">
            <div class="card">
              <h2 class="text-center mx-3">Sultan<br>
              IDR 39,000/bulan
              </h2>
              <p class="text-center">TERMASUK PPN</p>
              <!-- <hr style="height:5px;border-width:0;color:gray;background-color:gray"> -->
              <div class="card-body text-center">
                <button type="button" class="btn btn-outline-warning">GRATIS TRIAL 7-HARI</button>
                <h5 class="card-title mt-3" style="font-size: 15px;"><a href="#" class="link-light link-offset-2 link-underline link-underline-opacity-0">Skip Gratisan</a></h5>
                <p class="card-text">Streaming seluruh anime yang ada Truno bebas iklan dan tonton episode baru segera setelah Jepang</p>
                <hr style="height:5px;border-width:0;color:gray;background-color:gray">
                <p>PLUS</p>
                <p class="text-start" style="font-size: 12px;"><i class="fa-solid fa-check" style="color: #63E6BE;"></i> - Streaming hingga 4 perangkat sekaligus</p>
                <p class="text-start" style="font-size: 12px;"><i class="fa-solid fa-check" style="color: #63E6BE;"></i> - Menonton Saat Offline</p>
                <p class="text-start" style="font-size: 12px;"><i class="fa-solid fa-check" style="color: #63E6BE;"></i> - Akses Resolusi 4K</p>
              </div>
            </div>
          </div>
          <!-- Card 3 -->
          <div class="col-md-3 mb-4">
            <div class="card">
              <h2 class="text-center mx-3">Sultan <br>
              IDR 390,000/thn
              </h2>
              <p class="text-center">TERMASUK PPN</p>
              <!-- <hr style="height:5px;border-width:0;color:gray;background-color:gray"> -->
              <div class="card-body text-center">
                <button type="button" class="btn btn-outline-warning">GRATIS TRIAL 7-HARI</button>
                <h5 class="card-title mt-3" style="font-size: 15px;"><a href="#" class="link-light link-offset-2 link-underline link-underline-opacity-0">Skip Gratisan</a></h5>
                <p class="card-text">Streaming seluruh anime yang ada Truno bebas iklan dan tonton episode baru segera setelah Jepang</p>
                <hr style="height:5px;border-width:0;color:gray;background-color:gray">
                <p>PLUS</p>
                <p class="text-start" style="font-size: 12px;"><i class="fa-solid fa-check" style="color: #63E6BE;"></i> - Streaming hingga 4 perangkat sekaligus</p>
                <p class="text-start" style="font-size: 12px;"><i class="fa-solid fa-check" style="color: #63E6BE;"></i> - Menonton Saat Offline</p>
                <p class="text-start" style="font-size: 12px;"><i class="fa-solid fa-check" style="color: #63E6BE;"></i> - Akses Resolusi 4K</p>
                <p class="text-start" style="font-size: 12px;"><i class="fa-solid fa-check" style="color: #63E6BE;"></i> - Diskon 16% untuk Paket Bulanan</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-------------------------------------------- MAIN END -------------------------------------------------------->

    <!-- FOOTER START -->
    <footer class="container-fluid bg-dark border-top border-2 border-primary">
      <p class="text-center my-auto">&copy; Lorem Ipsum Dolor Sit Amet</p>
    </footer>
    <!-- FOOTER END -->

    <!-- modal untuk menampilkan info lebih lanjut sebuah lagu -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

