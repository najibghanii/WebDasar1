<?php
require_once "database.php";
require_once "user.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST["username"];
$email = $_POST["email"];
$asal = $_POST["asal"];
$password = $_POST["password"];
$password_ulang = $_POST["password_ulang"];



if(isset($_POST["setuju"])){
    echo "Anda telah menyetujui form";
    $database = new Database;
    $conn = $database->connect();
    echo "<br>";
    echo "Database terhubung <br>";

    $user = new User($conn);
    $user->create($username, $email, $asal, $password);  
}else{
    echo "Anda harus menyetujui form";
}
}