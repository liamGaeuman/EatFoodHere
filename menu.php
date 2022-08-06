<?php

	$page_title = 'Menu'; //set the page title
	require('includes/header.php');
	require('../../mysqli_connect.php'); // connect to the database
?>
<div>
<img src="assets/eWordFull.PNG" class="img-fluid" alt="...">
</div>

<div>
	<div class="bg-dark mb-0 py-2 text-light">
	  <div class="container">
		<h1 class="display-4 text-center">Menu</h1>
	  </div>
	</div>
</div>

<div id="accordion">
  <h3><?php
	$q_cat = "SELECT category_name FROM Categories WHERE category_number=1";
	$r_cat = @mysqli_query($dbc, $q_cat); // Run the query.
	$cat = mysqli_fetch_array($r_cat, MYSQLI_ASSOC);	
	echo $cat['category_name'];
  ?></h3>
  <div>
    <?php
		$q = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option FROM Menu WHERE category_number=1";
		$r = @mysqli_query($dbc, $q); // Run the query.
		
		echo'<ul class=" list-unstyled">';
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			
			//convert number to bool
			$getSideItem = 'no';
			if($row['comes_with_side'] == 1){
				$getSideItem = 'yes';
			}
			echo '<li class="media mb-3 mx-auto">
			<img src="assets/'.$row['food_filename'].'" class="mr-3" width="65" height="65">
			<div class="media-body">
			  <h5 class="mt-0 mb-1">'.$row['food_name'].'</h5>
			  <p>'.$row['food_description'].'</p>
			  <p> <small>Dietary option: '.$row['dietary_option'].'</small> &nbsp | &nbsp <small>Price:$'.$row['food_price'].'</small> &nbsp | &nbsp 
			  <small>Comes with side: '.$getSideItem.'</small></p>
			  <hr>
			</div>
		  </li>';
		}
		echo'</ul>';
	?>
  </div>
  <h3><?php
	$q_cat = "SELECT category_name FROM Categories WHERE category_number=2";
	$r_cat = @mysqli_query($dbc, $q_cat); // Run the query.
	$cat = mysqli_fetch_array($r_cat, MYSQLI_ASSOC);	
	echo $cat['category_name'];
  ?></h3>
  <div>
    <?php
		$q2 = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option FROM Menu WHERE category_number=2";
		$r = @mysqli_query($dbc, $q2); // Run the query.
		
		echo'<ul class=" list-unstyled">';
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			
			//convert number to bool
			$getSideItem = 'no';
			if($row['comes_with_side'] == 1){
				$getSideItem = 'yes';
			}
			echo '<li class="media mb-3 mx-auto">
			<img src="assets/'.$row['food_filename'].'" class="mr-3" width="65" height="65">
			<div class="media-body">
			  <h5 class="mt-0 mb-1">'.$row['food_name'].'</h5>
			  <p>'.$row['food_description'].'</p>
			  <p> <small>Dietary option: '.$row['dietary_option'].'</small> &nbsp | &nbsp <small>Price:$'.$row['food_price'].'</small> &nbsp | &nbsp 
			  <small>Comes with side: '.$getSideItem.'</small></p>
			  <hr>
			</div>
		  </li>';
		}
		echo'</ul>';
	?>
  </div>
  <h3><?php
	$q_cat = "SELECT category_name FROM Categories WHERE category_number=3";
	$r_cat = @mysqli_query($dbc, $q_cat); // Run the query.
	$cat = mysqli_fetch_array($r_cat, MYSQLI_ASSOC);	
	echo $cat['category_name'];
  ?></h3>
  <div>
    <?php
		$q3 = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option FROM Menu WHERE category_number=3";
		$r = @mysqli_query($dbc, $q3); // Run the query.
		
		echo'<ul class=" list-unstyled">';
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			
			//convert number to bool
			$getSideItem = 'no';
			if($row['comes_with_side'] == 1){
				$getSideItem = 'yes';
			}
			echo '<li class="media mb-3 mx-auto">
			<img src="assets/'.$row['food_filename'].'" class="mr-3" width="65" height="65">
			<div class="media-body">
			  <h5 class="mt-0 mb-1">'.$row['food_name'].'</h5>
			  <p>'.$row['food_description'].'</p>
			  <p> <small>Dietary option: '.$row['dietary_option'].'</small> &nbsp | &nbsp <small>Price:$'.$row['food_price'].'</small> &nbsp | &nbsp 
			  <small>Comes with side: '.$getSideItem.'</small></p>
			  <hr>
			</div>
		  </li>';
		}
		echo'</ul>';
	?>
  </div>
  <h3><?php
	$q_cat = "SELECT category_name FROM Categories WHERE category_number=4";
	$r_cat = @mysqli_query($dbc, $q_cat); // Run the query.
	$cat = mysqli_fetch_array($r_cat, MYSQLI_ASSOC);	
	echo $cat['category_name'];
  ?></h3>
  <div>
    <?php
		$q4 = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option FROM Menu WHERE category_number=4";
		$r = @mysqli_query($dbc, $q4); // Run the query.
		
		echo'<ul class=" list-unstyled">';
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			
			//convert number to bool
			$getSideItem = 'no';
			if($row['comes_with_side'] == 1){
				$getSideItem = 'yes';
			}
			echo '<li class="media mb-3 mx-auto">
			<img src="assets/'.$row['food_filename'].'" class="mr-3" width="65" height="65">
			<div class="media-body">
			  <h5 class="mt-0 mb-1">'.$row['food_name'].'</h5>
			  <p>'.$row['food_description'].'</p>
			  <p> <small>Dietary option: '.$row['dietary_option'].'</small> &nbsp | &nbsp <small>Price:$'.$row['food_price'].'</small> &nbsp | &nbsp 
			  <small>Comes with side: '.$getSideItem.'</small></p>
			  <hr>
			</div>
		  </li>';
		}
		echo'</ul>';
	?>
  </div>
  <h3><?php
	$q_cat = "SELECT category_name FROM Categories WHERE category_number=5";
	$r_cat = @mysqli_query($dbc, $q_cat); // Run the query.
	$cat = mysqli_fetch_array($r_cat, MYSQLI_ASSOC);	
	echo $cat['category_name'];
  ?></h3>
  <div>
    <?php
		$q5 = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option FROM Menu WHERE category_number=5";
		$r = @mysqli_query($dbc, $q5); // Run the query.
		
		echo'<ul class=" list-unstyled">';
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			
			//convert number to bool
			$getSideItem = 'no';
			if($row['comes_with_side'] == 1){
				$getSideItem = 'yes';
			}
			echo '<li class="media mb-3 mx-auto">
			<img src="assets/'.$row['food_filename'].'" class="mr-3" width="65" height="65">
			<div class="media-body">
			  <h5 class="mt-0 mb-1">'.$row['food_name'].'</h5>
			  <p>'.$row['food_description'].'</p>
			  <p> <small>Dietary option: '.$row['dietary_option'].'</small> &nbsp | &nbsp <small>Price:$'.$row['food_price'].'</small> &nbsp | &nbsp 
			  <small>Comes with side: '.$getSideItem.'</small></p>
			  <hr>
			</div>
		  </li>';
		}
		echo'</ul>';
	?>
  </div>
  <h3>Sides</h3>
  <div>
    <?php
		$q6 = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option FROM Menu WHERE is_side=1";
		$r = @mysqli_query($dbc, $q6); // Run the query.
		
		echo'<ul class=" list-unstyled">';
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			
			//convert number to bool
			$getSideItem = 'no';
			if($row['comes_with_side'] == 1){
				$getSideItem = 'yes';
			}
			echo '<li class="media mb-3 mx-auto">
			<img src="assets/'.$row['food_filename'].'" class="mr-3" width="65" height="65">
			<div class="media-body">
			  <h5 class="mt-0 mb-1">'.$row['food_name'].'</h5>
			  <p>'.$row['food_description'].'</p>
			  <p> <small>Dietary option: '.$row['dietary_option'].'</small> &nbsp | &nbsp <small>Price:$'.$row['food_price'].'</small> &nbsp | &nbsp 
			  <small>Comes with side: '.$getSideItem.'</small></p>
			  <hr>
			</div>
		  </li>';
		}
		echo'</ul>';
	?>
  </div>
</div>

<?php
	require('includes/footer.php');
?>