<?php
require "connection.php";
//$conn = mysqli_connect($hostname, $username, $password, $database);

if (isset($_POST["tRegist"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('Username berhasil di tambahkan');
        </script>";
    } else {
        echo mysqli_error(($conn));
    }
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
    <title>Register</title>
</head>

<body>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6 text-center">
            <h2 class="text-center mb-2 pb-2">Create New Account</h2>
        </div>
        <div class="row justify-content-center">
            <form action="" method="POST">
                <div class="row justify-content-center">
                    <div class="col-md-2 mt-3">
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" require>
                    </div>
                    <div class="col-md-2 mt-3">
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" require>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-1 mt-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com" require>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-1 mt-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" require>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-1 mt-3">
                        <input type="password" class="form-control" name="password_conf" id="password_conf" placeholder="Confirm Password" require>
                    </div>
                </div>
                <!-- <div class="row justify-content-center">
                    <div class="col-md-4 mr-3 ml-3 mt-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I Accept</label>
                    </div>
                </div> -->
                <div class="row mt-3 justify-content-center">
                    <div class="col-md-4 d-grid gap-2">
                        <button type="submit" class="btn btn-primary" name="tRegist">Create Your Account</button>
                        <p class="mt-2">Sudah Punya akun ? <a href="login.php">Login</a></p>

                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>