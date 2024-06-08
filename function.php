<?php 
$servername = "127.0.0.1"; // Use IP address instead of hostname
$username = "root";
$password = "";
$dbname = "truno";

$conn = mysqli_connect($servername, $username, $password, $dbname);

function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}
function tambah($data){
  global $conn;
  $nama = htmlspecialchars($data["nama"]);
  $genre = htmlspecialchars($data["genre"]);
  $sipnosis = htmlspecialchars($data["sipnosis"]);
  $gambar = upload();
  if( !$gambar ){
    return false;
  }

  $query = "INSERT INTO anime VALUES('','$nama','$genre','$sipnosis','$gambar')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function upload(){
  $namafile = $_FILES["gambar"]["name"];
  $ukuran = $_FILES["gambar"]["size"];
  $error = $_FILES["gambar"]["error"];
  $tmpname = $_FILES["gambar"]["tmp_name"];
  if($error === 4){
    echo "<script>alert('Pilih Gambar Terlebih Dahulu');</script>";
    return false;
  }
  // Cek apakah yang di upload adalah gambar
  $ekstensigambarvalid = ['jpg', 'jpeg', 'png', 'webp'];
  $ekstensigambar = explode('.', $namafile);
  $ekstensigambar = strtolower(end($ekstensigambar));
  if( !in_array($ekstensigambar, $ekstensigambarvalid)){
    echo "<script>alert('Yang Anda Upload Bukan Gambar');</script>";
    return false;
  }
  // cek jika ukuran file terlalu besar 
  if($ukuran > 2000000){
    echo "<script>alert('Ukuran Gambar Terlalu Besar');</script>";
    return false;
  }
  // Lolos Pengecekan Gambar siap di uploaod
  // generate nama baru
  $namafilebaru = uniqid();
  $namafilebaru .= '.';
  $namafilebaru .= $ekstensigambar;
  move_uploaded_file($tmpname, 'img/' . $namafilebaru);
  return $namafilebaru;
}

function hapus($id){ 
  global $conn;
  mysqli_query($conn, "DELETE FROM anime WHERE id = $id");
  return mysqli_affected_rows($conn);
}
function ubah($data){
  global $conn;
  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $genre = htmlspecialchars($data["genre"]);
  $sipnosis = htmlspecialchars($data["sipnosis"]);
  $gambarlama = ($data["gambarlama"]);
  // Cek Apakah user pilih gambar baru atau tidak
  if($_FILES["gambar"]["error"] === 4){
    $gambar = $gambarlama;
  } else {
    $gambar = upload();
  }

  $query = "UPDATE anime SET

              nama = '$nama',
              genre = '$genre',
              sipnosis = '$sipnosis',
              gambar = '$gambar'
              WHERE id = $id";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
function cari($keyword){
  $query = "SELECT * FROM anime 
            WHERE 
            nama LIKE '%$keyword%' OR
            genre LIKE '%$keyword%' OR
            sipnosis LIKE '%$keyword%'";
  return query($query);
}


function daftar($data){
  global $conn;
  if (isset($_POST["register"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirm_password = htmlspecialchars($_POST["password2"]);

    // Periksa apakah password dan konfirmasi password cocok
    if ($password !== $confirm_password) {
        echo "Password dan konfirmasi password tidak cocok.";
        exit();
    }

    // Periksa apakah username sudah ada
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username sudah digunakan.";
        exit();
    }

    // Hash password sebelum disimpan
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Simpan pengguna baru ke database
    $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password_hashed);
    
    if ($stmt->execute()) {
        echo "Registrasi berhasil. Silakan login.";
        header("Location: login.php");
        exit();
    } else {
        echo "Registrasi gagal. Silakan coba lagi.";
    }

    $stmt->close();
  // $username = strtolower(stripslashes($data["username"]));
  // $password = mysqli_real_escape_string($conn, $data["password"]);
  // $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  // $dob = mysqli_real_escape_string($conn, $data["dob"]);

  // // Check if the username is already taken
  // $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
  // if(mysqli_fetch_assoc($result)){
  //   echo "<script>alert('Username Sudah Terdaftar')</script>";
  //   return false;
  }

  // Check password confirmation
  if($password !== $password2){
    echo "<script>alert('Konfirmasi Password Tidak Sesuai')</script>";
    return false;
  } 
  // Encrypt the password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Insert the new user into the database
  $query = "INSERT INTO user (username, password, dob) VALUES('$username', '$password', '$dob')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

?>