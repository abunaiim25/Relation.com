<?php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);//for active nav
?>
  
  <!--Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light py-2 fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <h3 class="icon-relation"><img height="30" src="assets/images/love.png" alt=""> Relation.com</h3>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav navbar-nav  ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?= $page=="index.php"?'active':''?>" aria-current="page" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= $page=="profile.php"?'active':''?>" aria-current="page" href="profile.php">Profile</a>
          </li>

         
          <?php if (isset($_SESSION['auth'])) { ?>
            <li class="nav-item">
            <a class="nav-link " aria-current="page" data-bs-toggle="modal" data-bs-target="#postModal">Post</a>
          </li>
          <?php }?>
           

          <?php if (isset($_SESSION['auth'])) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['auth_user']['name'] ?>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item " href="auth/logout.php">Logout</a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link <?= $page=="auth/login.php"?'active':''?>" aria-current="page" href="auth/login.php">Login</a>
            </li>

            <li class="nav-item">
            <a class="nav-link <?= $page=="auth/register.php"?'active':''?>" aria-current="page" href="auth/register.php">Register</a>
          </li>
          <?php } ?>

         
         
         
        </ul>
        
      </div>
    </div>
  </nav>