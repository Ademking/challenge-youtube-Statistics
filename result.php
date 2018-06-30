
<?php

require "get_video_data.php";
require "get_channel_data.php";

$d1 = get_data($_GET['id']);

$title = $d1[0];
$description = $d1[1];
$channelID = $d1[2];
$channelName = $d1[3];
$date_published = $d1[4];
$tags = $d1[5];
$thumbnail = $d1[6]; 
$comments = $d1[7];
$dislikes = $d1[8];
$likes = $d1[9];
$views = $d1[10];

$d2 = get_data_channel($channelID);
 $subscount = $d2[0];
 $nb_vid = $d2[1];
 $nb_views = $d2[2];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Result</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <title>Album example for Bootstrap</title>

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>

  <body class=" bg-light">

    <header>
      <div class="collapse bg-dark" >
       
      </div>
     
    </header>

    <main role="main">



      <div class="py-3 bg-light">
        <div class="container">

          <div class="row">
            <div class="col">
              <a href="index.html" class="btn btn-primary"><i class="fas fa-angle-left"></i> Back To Home</a>
              <hr>

            </div>
          </div>
            

          <div class="row">
            
          
            <div class="col-md-6">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                <canvas id="chart-area"></canvas>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card mb-4 box-shadow">
              <img class="card-image" height="225px" src="<?php echo $thumbnail; ?>" alt="" srcset="">
                <div class="card-body">
                  <h6>Title : <?php echo $title?></h6>
                </div>
              </div>
            </div>



            <div class="col-md-3 d-flex">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <p class="card-text">Tags :</p>
                    <?php
                      
                    echo implode($tags, ',');
                    ?>
                    
                </div>
              </div>
            </div>

            <div class="col-md-3 d-flex">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <p class="card-text">Info :</p>
                    
                    <h6>Channel : <?php echo $channelName?></h6>
                    <h6>Subscribers : <?php echo number_format($subscount);?></h6>
                    <h6>Videos Uploaded : <?php echo number_format($nb_vid); ?></h6>
                    <h6>Views : <?php echo $views?></h6>
                </div>
              </div>
            </div>

            <div class="col-md-6 d-flex">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <p class="card-text">Description :</p>
                    <h6><?php echo substr($description, 0, 300) . '...'?></h6>
                </div>
              </div>
            </div>

        </div>
        </div>
        </div>

    </main>

<script>
    
    window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};

		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [<?php echo $dislikes;?> , <?php echo $likes;?>],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Dislikes',
					'Likes',
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Video Likes / Dislikes'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myDoughnut = new Chart(ctx, config);
		};
</script>

  </body>
</html>
