<?php

	$page_title = 'DIY'; //set the page title
	require('includes/header.php');
	require('../../mysqli_connect.php'); // connect to the database
?>
<div>
<img src="assets/eWordFull.PNG" class="img-fluid" alt="...">
</div>

<div>
	<div class="bg-dark my-0 p-2 text-light">
	  <div class="container">
		<h1 class="display-4 mb-0 text-center">Try It Yourself!</h1>
	  </div>
	</div>
</div>

<div id="menuNav">
	
</div>

<div class="text-light my-0 bg-dark container">
	<p class="lead mb-0 text-center">Here are our recipes!</p>
</div>
<div class="container" id="recipeDIY">
</div>
<?php
	require('includes/footer.php');
?>