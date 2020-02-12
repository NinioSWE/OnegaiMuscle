  
   <?php
	require_once("methods.php");
  ?>
  
  <!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="users">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">Users</h2>
		
      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
	  
	        <!-- Portfolio Grid Items -->
      <div class="row">
		<?php
		  $temp = getAllUsers();
		  foreach($temp as $user){
			  ?>
			<!-- Portfolio Item 1 -->
			<div class="col-md-2 col-lg-2">
			  <div class="portfolio-item mx-auto">

				<a href="?user=<?=$user->id?>#othersProfile"><img class="img-fluid circular--landscape-small" src="<?=$user->imageURL?>" alt=""></a>
				<p style="text-align:center;"><?=$user->username?></p>
			  </div>
			</div>
			  
			  <?php
		  }
		?>
	  </div>


    </div>
  </section>