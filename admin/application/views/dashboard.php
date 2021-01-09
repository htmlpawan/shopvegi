<!doctype html>
<html lang="en">

<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
   <?php include("header.php"); ?>
	<!-- ICONS -->
</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
				<?php include('menu.php');
				/* include("dbcon.php");
				$sql = "select (select count(*) from add_product) as product_total";
				$query = mysqli_query($con,$sql);
				$rows = mysqli_fetch_assoc($query); */
				?>
				<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Overview</h3>
							<p class="panel-subtitle">Time: <?php echo date("M d, Y");  ?></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3"><a href="products/productlist">
									<div class="metric">
										<span class="icon"><i class="fa fa-cubes"></i></span>
										<p>
											<span class="number">100 <?php //print_r($row['product_total']); ?></span>
											<span class="title">Products</span>
										</p>
									</div></a>
								</div>
								<!-- <div class="col-md-3"><a href="products/newslist">
									<div class="metric">
										<span class="icon"><i class="fa fa-newspaper-o"></i></span>
										<p>
											<span class="number"><?php //print_r($row['news_total']); ?></span>
											<span class="title">News</span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3"><a href="products/sliderlist">
									<div class="metric">
										<span class="icon"><i class="fa fa-picture-o"></i></span>
										<p>
											<span class="number"><?php //print_r($row['slider_total']); ?></span>
											<span class="title">Home slider</span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3"><a href="products/bloglist">
									<div class="metric">
										<span class="icon"><i class="fa fa-rss"></i></span>
										<p>
											<span class="number"><?php //print_r($row['blog_total']); ?></span>
											<span class="title">Blogs</span>
										</p>
									</div></a>
								</div> -->
								
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
 <?php include("footer.php"); ?>
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
</body>

</html>