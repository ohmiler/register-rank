<?php 

    session_start();
    require_once('config/config.php');

    $database = new Database();

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $rank = $_POST['rank'];
        $database->regUser($username, $password, $c_password, $rank);
    }

?>