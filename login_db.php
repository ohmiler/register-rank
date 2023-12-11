<?php 

    session_start();
    require_once('config/config.php');

    $database = new Database();

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $database->loginUser($username, $password);
    }

?>