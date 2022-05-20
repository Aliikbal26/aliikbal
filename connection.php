<?php
$username   = "root";
$hostname = "localhost";
$password = "";
$database = "portofolio";


$conn = mysqli_connect($hostname, $username, $password, $database);

function registrasi($data)
{
    global $conn;

    $firstName = strtolower(stripslashes($data["firstName"]));
    $lastName = strtolower(stripslashes($data["lastName"]));
    $email = (stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $passwordConf = mysqli_real_escape_string($conn, $data["password_conf"]);


    //cek konfirmasi password
    if ($password !== $passwordConf) {
        echo "<script>
        alert('Password tidak sesuai');
       </script>";


        // <div class='alert alert-secondary' role='alert'>
        // A simple secondary alert—check it out!
        // </div>

        return false;
    }


    //cek username
    $result = mysqli_query($conn, "SELECT email FROM register WHERE email ='$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah ada');
       </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO register VALUES('', '$firstName', '$lastName','$email', '$password')");

    return mysqli_affected_rows($conn);
}
