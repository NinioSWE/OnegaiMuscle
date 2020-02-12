  <?php
	require_once("methods.php");
	$user = getUser($_GET['user']);
  ?>
  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="othersProfile">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><?=$user->username?></h2>

	<div class="container d-flex align-items-center flex-column">
      <!-- Masthead Avatar Image -->
	  <div style="display:inline-block">
      <img class="circular--landscape" style=";
    border-radius: 100%;
    border: 3px solid #2c3e50;" src="<?=$user->imageURL?>" alt="">
	  </div>
	</div>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

	

    </div>

    </div>
  </section>
  
  <!-- Portfolio Section -->
  <section class="page-section portfolio">
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
		  $temp = getTimes($_GET['user']);
		  foreach($temp as $row){
			  echo '<tr>
			<td>'.$row->runningTime.'</td>
			<td>'.$row->distance.'</td>
			<td>'.$row->dateOfRun.'</td>
		  </tr>';
		  }
		  ?>
		</table>
		
		<br>
		<br>
	 <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Graph</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
		
		<script>
		window.onload = function () {

		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: ""
			},
			axisY:{
				includeZero: false
			},
			data: [{        
				type: "line",       
				dataPoints: [
					<?php
					$stt = "";
					foreach($temp as $row){
					  $stt .= '{ y: '.$row->distance.' },';
				    }
					$stt = substr($stt,0,-1);
					  
					echo $stt;
					?>
				]
			}]
		});
		chart.render();

		}
		</script>
		<br>
		<div style="width:80%;margin:auto;"><div id="chartContainer" style="height: 370px; width: 100%;"></div></div>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    </div>
	

    </div>
  </section>