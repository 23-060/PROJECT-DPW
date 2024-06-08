<?php
require "function.php";

if( isset($_POST["submit"]) ){

  if(tambah($_POST) > 0){
    echo "<script> 
    alert('Data Berhasil Di Tambahkan!'); 
    document.location.href = 'index.php';
    </script>";
  } else{
    echo "<script> 
    alert('Data Gagal Di Tambahkan!');
    </script>";
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Anime</title>
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
<body class="container">
  <h1 class="text-center">Tambah Daftar Anime</h1>
  <form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="nama" class="form-label">Nama Anime</label>
    <input type="text" name="nama" class="form-control" id="nama">
  </div>
  <div class="mb-3">
    <label for="genre" class="form-label">Genre</label>
    <input type="text" name="genre" class="form-control" id="genre">  
  </div>
  <div class="mb-3">
    <label for="sipnosis" class="form-label">Sipnosis</label>
    <input type="sipnosis" name="sipnosis" class="form-control" id="sipnosis" style="height:100px;">  
  </div>
  <div class="mb-3">
    <label for="gambar">Gambar</label> 
    <input type="file" id="gambar" name="gambar" placeholder="gambar">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Tambah Anime</button>
</form>
  <!-- <form action="" method="post" enctype="multipart/form-data">
    <label for="nama">Nama :</label>
    <input type="text" id="nama" name="nama" placeholder="Nama Anime"><br>
    <label for="genre">Genre :</label>
    <input type="text" id="genre" name="genre" placeholder="genre"><br>
    <label for="sipnosis">Sipnosis :</label> 
    <input type="text" id="sipnosis" name="sipnosis" placeholder="sipnosis"><br>
    <label for="gambar">Gambar :</label> 
    <input type="file" id="gambar" name="gambar" placeholder="gambar"><br>
    <button type="submit" name="submit">Tambah Anime</button>
  </form> -->

  <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    >
  </script>
</body>
</html>