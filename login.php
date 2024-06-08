<?php
session_start();
require "function.php";

if (isset($_POST["login"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Menggunakan prepared statements untuk mencegah SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Verifikasi password dengan hash
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
            exit();
        } else {
            // Password salah
            echo "Password salah.";
        }
    } else {
        // Username tidak ditemukan
        echo "Username tidak ditemukan.";
    }

    $stmt->close();
}

    // cek username
//     if (mysqli_num_rows($result) === 1) {
//         $row = mysqli_fetch_assoc($result);
//         if (password_verify($password, $row["password"])) {
//             header("Location: index.php");
//             exit;
//         } else {
//             $error = true;
//         }
//     } else {
//         $error = true;
//     }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Log-In</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
</head>
<body style="background-color:black;">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="index.php" class="btn btn-link font-weight-bold">Kembali</a>
                                <img src="img/global.jpg" alt="" style="max-width: 100%;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-5" style="color: #475CFD">Log-In</h1>
                                    </div>
                                    <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <p>Username atau Password salah</p>
                                    </div>
                                    <?php endif; ?>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control mt-5 rounded-pill gradien" id="username" placeholder="Masukkan Username Anda">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control rounded-pill gradien" id="password" placeholder="Password">
                                        </div>
                                        <div class="form-group d-flex">
                                            <input type="checkbox" name="check" class="mx-2" style="margin-top:-14px;" id="check">
                                            <p style="font-size: 15px;"> Simpan Akun</p>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-success btn-block rounded-pill">Log-In</button>
                                        <p>Belum Memiliki Akun? <a href="registrasi.php">Register</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
