<?php if (isset($_SESSION['success'])) : ?>
    <div class="alert alert-success" role="alert">
        <?php 
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?php 
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        ?>
    </div>
<?php endif; ?>