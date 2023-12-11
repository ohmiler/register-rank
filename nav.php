<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Register Rank</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>

        <?php if (isset($_SESSION['userId'])) : ?>
        <li class="nav-item">
          <?php if ($_SESSION['userRank'] != 0) : ?>
            <a href="admin.php" class="nav-link">Admin Profile</a>
          <?php else: ?>
            <a href="user.php" class="nav-link">User Profile</a>
          <?php endif; ?>
        </li>
        <?php endif; ?>

      </ul>
      <div class="d-flex" role="search">
        <?php if (isset($_SESSION['userId'])) : ?>
          <a href="logout.php" class="btn btn-danger me-2">Logout</a>
        <?php else: ?>
          <a href="login.php" class="btn btn-primary me-2">Login</a>
          <a href="register.php" class="btn btn-primary">Sign up</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>