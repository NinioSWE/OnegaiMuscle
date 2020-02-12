
<?php
require_once("dbinit.php");
?>

<html lang="en">

<?php
require_once("header.php");
?>
<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Onegai Muscle</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
	     <ul class="navbar-nav ml-auto">
		<?php
		if(!isset($_SESSION['yourId']) && !isset($_GET['user'])){
		?>
		  <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#login">Login</a>
          </li>
		  <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#signin">Register</a>
          </li>
		<?php
		}elseif(!isset($_SESSION['yourId']) && isset($_GET['user'])){
		?>
		  <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="?#login">Login</a>
          </li>
		  <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="?#signin">Register</a>
          </li>
		<?php
		}
		elseif(isset($_SESSION['yourId']) && isset($_GET['user'])){
			?>
		  <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="logoutButton" style="cursor: pointer;">Logout</a>
          </li>
		  <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="?#profile">Profile</a>
          </li>
		  
			<?php
		}
		elseif(isset($_SESSION['yourId']) && !isset($_GET['user'])){
			?>
		  <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="logoutButton" style="cursor: pointer;">Logout</a>
          </li>
		  <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="?#profile">Profile</a>
          </li>
		  
			<?php
		}
		?>
		  
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#users">Users</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
	  <div style="display:inline-block">
		  <img style="height:35rem" src="img/Hibiki.png" alt="">
		  <img style="height:35rem" src="img/Akemi.png" alt="">
		  <img style="height:35rem" src="img/Satomi.png" alt="">
	  </div>



      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

    </div>
  </header>

  <?php
  if(!isset($_SESSION['yourId']) && !isset($_GET['user'])){
	  require_once("login.php");
	  
	  require_once("signin.php");
  }elseif(isset($_GET['user'])){
	  require_once("othersProfile.php");
  }
  else{
	  require_once("profile.php");
	  require_once("addTime.php");
	  require_once("table.php");
  }
  
  require_once("Users.php");
  ?>
  
  
  

  


  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">Ninio Sweden
            <br>Per Eriksson</p>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About OnegaiMuscle</h4>
          <p class="lead mb-0">Keep on running!</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; IDontOwnShit 2020</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>

  <script src="js/signin.js"></script>
  <script src="js/login.js"></script>
  <script src="js/logout.js"></script>
   <script src="js/addTime.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>

</html>
