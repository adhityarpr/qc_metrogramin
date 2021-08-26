<?php

require("../database/connection.php");
$username_form = $_POST["username"];
$password_form = $_POST["password"];

if (isset($_POST)) {
    $query = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username_form' AND password = '$password_form'");

    $data = mysqli_fetch_assoc($query);

    if ($query->num_rows > 0) {
        $data_session = [
            "is_logged_in" => true,
            "username" => $data["username"],
            "fullname" => $data["fullname"],
        ];
        session_start();
        $_SESSION = $data_session;
        //kalau password benar
        header("Location: ../index.php");
    } else {
        //kalau password salah
        header("Location: ../login.php");
    }
}
