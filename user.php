<?php 

    session_start();
    require_once('config/config.php');

    if (!isset($_SESSION['userId'])) {
        header('Location: login.php');
    }

    if ($_SESSION['userRank'] !== 0) {
        header('Location: admin.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        /* Show it is fixed to the top */
        body {
            min-height: 75rem;
            padding-top: 4.5rem;
        }
    </style>
</head>
<body>

<?php require_once('nav.php'); ?>

<main class="container">
    <div class="bg-light p-5 rounded">
        <?php require_once('alert.php'); ?>
        <?php 
            $database = new Database();
            $userData = $database->getUser($_SESSION['userId']);
        ?>
        <h3>Welcome, <?php echo $userData['username']; ?></h3>
        <hr>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat incidunt odio iusto iure aliquam quisquam ipsum adipisci voluptatibus, magnam et, id iste suscipit nemo, quo modi? Optio eum pariatur dolore!</p>
    </div>
</main>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>