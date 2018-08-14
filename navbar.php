<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand" style="color: #fff;" href="index.php">XSS Session Hijacking</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color: #fff;" href="index.php">Home</a>
      </li>

      <?php
        if (isset($_SESSION['USERNAME'])) {
          echo '<li class="nav-item">
              <a class="nav-link" style="color: #fff;" href="blog.php">Blog</a>
                </li>';
        }
      ?>

    </ul>

      <!--  should check if logged in or not -->

    <form class="form-inline my-2 my-lg-0">
      <?php
        if (!isset($_SESSION['USERNAME'])) {
          echo "<a class='nav-link' style='color: #fff;' href='register.php'>Register</a>
                <a class='nav-link' style='color: #fff;' href='login.php'>Login</a>";
        }else{
         echo "<a class='nav-link' href='#' style='color: #fff;'>you logged in as " . $_SESSION['USERNAME'] . "</a>";
         echo "<a class='nav-link' href='logout.php' style='color: #fff;'>Logout</a>";
        }
      ?>
      
    </form>

      <!-- end of check -->
  </div>
</nav>
</body>
</html>