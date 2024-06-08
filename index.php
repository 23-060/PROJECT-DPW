<?php 
session_start();
require "function.php";
// $result = mysqli_query($conn, "SELECT * FROM anime");
// var_dump($result);
// mysqli_fetch_row(); || mengembalikan array numerik
// mysqli_fetch_assoc(); || mengembalikan array assosiatif
// mysqli_fetch_array(); || 2Duanya bisa
// mysqli_fetch_object();  || Mengembalikan Object

$mhs = query("SELECT * FROM anime ORDER BY id DESC");
if (isset($_POST["cari"])){
  $mhs = cari($_POST["keyword"]);
}

// Pastikan pengguna sudah login
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit();
}

// Ambil informasi pengguna dari database
$id = $_SESSION["id"];
$stmt = $conn->prepare("SELECT username FROM user WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();
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
      <button type="button" class="btn border-0 d-lg-block d-none"><a href="profil.php">
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
          <div class="collapse d-flex justify-content-between align-items-center" id="displayName">
            <span id="nameBlock"><?= htmlspecialchars($user['username']); ?></span>
            <button class="btn border-0" id="logOutBtn">
              <a href="logout.php"><i class="bi bi-box-arrow-right"></i></a>
            </button>
          </div>
        </li>
        <hr />
        <li class="nav-item my-auto">
          <a class="nav-link text-light link-primary" href="index.php">
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

    <!-- NAVBAR END -->
    <!-------------------------------------------- MAIN START ------------------------------------------------------>
    <!-- isi Anime -->
    <section>
        <div class="container " style="margin-top: 100px;">
            <div class="row ">
                <?php foreach($mhs as $row) : ?>
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="img/<?= $row['gambar']; ?>" class="card-img-top" alt="<?= $row['nama']; ?>" style="height:400px;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['nama']; ?></h5>
                                <p class="card-text">Genre: <?= $row['genre']; ?></p>
                                <a href="#" class="btn btn-primary">Tonton Sekarang!</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <hr style="height:5px;border-width:0;color:gray;background-color:gray">
            <?php if (htmlspecialchars($user['username']) == "admin") : ?>
                    <div class="row justify-content-center">
                        <div class="col-md-3 mb-4">
                            <div class="card h-100">
                                <a href="tambah.php">
                                    <img src="img/tambah.png" class="card-img-top" alt="Tambah" style="height:400px;">
                                </a>
                                <div class="card-body text-center">
                                    <h5 class="card-title">Tambah</h5>
                                    <p class="card-text">Tambahkan item baru.</p>
                                    <a href="tambah.php" class="btn btn-primary">TAMBAH</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Akhir  -->
    <div class="position-relative">
      <i
        class="bi bi-arrow-up-circle position-fixed bottom-0 end-0 m-4 fs-3"
        onclick="return document.documentElement.scrollTop = 0"
        style="cursor: pointer"
      ></i>
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
