<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: landing.php");
}
require "connection.php";
//require"connection.php";

//Apakah jika ingin mempunyai profesi harus mempunyai gelar atau title dibidang tertentu?
//bagaimana cara mengimbangi kemajuan teknologi yang semakin pesat?
//apakah orang yg mempunyai profesi hanya orang yg mempunyai gelar atau title di bidang tertentu ?
//dikatakan orang berprofesi apakah hanya orang yang mempunyai gelar atau title dibidang tertentu saja? 


if (isset($_POST['login'])) {

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM register WHERE email='$email'");

    //cek email

    if (mysqli_num_rows($result) == 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //session login
            $_SESSION["login"] = true;
            header("Location: landing.php");
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- link bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="row  justify-content-center mt-5">
        <div class="col-md-4">
            <h2 class="text-center">Selamat Datang</h2>
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    Silahkan Masukan Email dan Password dengan benar!
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row  justify-content-center">
        <form action="" method="POST">
            <div class="row justify-content-center">
                <!-- <div class="row justify-content-center">
                    <div class="col-md-2 mt-3">
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" require>
                    </div>
                    <div class="col-md-2 mt-3">
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" require>
                    </div>
                </div> -->
                <div class="row justify-content-center">
                    <div class="col-md-4 mt-3">

                        <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 mt-3 ">

                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 mt-3 ">

                        <input class="form-check-input" id="remember" name="remember" type="checkbox">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 mt-3 d-grid grap-2">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                        <p class="mt-2">Belum Punya akun ? <a href="registrasi.php">Creat Account</a></p>
                    </div>

                </div>
            </div>
        </form>
    </div>
    </div>
</body>

</html>