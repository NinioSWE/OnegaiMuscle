  <?php
	require_once("methods.php");
  ?>
  
  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="login">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Time table</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

		<table class="table table-bordered">
		  <tr>
			<th>Time</th>
			<th>Distance</th>
			<th>Date</th>
		  </tr>
		  <?php
		  $temp = getTimes($_SESSION['yourId']);
		  foreach($temp as $row){
			  echo '<tr>
			<td>'.$row->runningTime.'</td>
			<td>'.$row->distance.'</td>
			<td>'.$row->dateOfRun.'</td>
		  </tr>';
		  }
		  ?>
		</table>

    </div>

    </div>
  </section>