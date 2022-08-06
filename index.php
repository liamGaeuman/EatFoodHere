<?php
	$page_title = 'Eat Food Here'; //set the page title
	require('includes/header.php'); //connect the header and head
?> 
<div class="text-light">
	<!-- C A R O U S E L -->
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
		<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
		<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
		<div class="carousel-item active">
		  <img src="assets/restuarant.jpg" class="d-block w-100" alt="...">
		  <div class="carousel-caption d-none d-md-block">
			<h2>Eat Food Here</h2>
			<p>Bar and Grill</p>
		  </div>
		</div>
		<div class="carousel-item">
		  <img src="assets/burger2.jpg" class="d-block w-100" alt="...">
		  <div class="carousel-caption d-none d-md-block">
			<h2>Bar and Grill</h2>
			<p>Eat our amazing food!</p>
		  </div>
		</div>
		<div class="carousel-item">
		  <img src="assets/kitchen.jpg" class="d-block w-100" alt="...">
		  <div class="carousel-caption d-none d-md-block">
			<h2>Amazing staff</h2>
			<p>Our staff work their best to make sure you are satisfied</p>
		  </div>
		</div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
	<!-- C A R O U S E L -->
	
	<!-- Image -->
	<div>
	<img src="assets/eWordFull.PNG" class="img-fluid" alt="...">
	</div>
	<!-- Image -->
	
	<!-- H E L L O -->

	<div>
		<div class="bg-dark mb-0 jumbotron jumbotron-fluid">
		  <div class="container">
			<h1 class="display-4 text-center">Welcome!</h1>
			<p class="lead text-center">We'd love for you to join us!</p>
		  </div>
		</div>
	</div>
	<!-- H E L L O -->
	<div class="imageHolder">
	<img src="assets/food.jpg" class="img-fluid" alt="burgers and chicken wings">
	<a href="menu.php"><div id="menuButton" class="bg-dark centered"><h1 class="display-4 mx-2">Menu<h1></div></a>
	</div>
	<!-- T A K E O U T -->
	<div>
		<div class="rounded-0 bg-dark jumbotron mb-0">
		  <h1 class="display-4 text-center">We Do Takeout!</h1>
		  <p class="lead text-center">Order online or give us a call at <a href="#">(218)591-1234</a></p>
		  <hr class="my-4">
		  <p class="text-center" >Online ordering made simple</p>
		  <a class="btn btn-light btn-md" href="onlineOrder.php" role="button">Order Online</a>
		</div>
	</div>
	<!-- T A K E O U T -->
	<div>
	<img id="transfer" src="assets/eWordFull.PNG" class="img-fluid" alt="...">
	</div>
</div>
<?php
	require('includes/footer.php');
?>