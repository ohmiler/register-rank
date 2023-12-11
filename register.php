<?php 

    session_start();
    
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
        
        <?php require_once('alert.php') ?>
        
        <h3>Sign up Page</h3>
        <hr>
        <form action="register_db.php" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control my-2" placeholder="username">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control my-2" placeholder="password">
            <label for="password">Confirm Password</label>
            <input type="password" name="c_password" class="form-control my-2" placeholder="confirm password">
            <input type="hidden" name="rank" value="0">
            <button type="submit" class="btn btn-primary my-2" name="register">Sign up</button>
        </form>
    </div>
</main>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>