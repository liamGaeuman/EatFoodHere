<?php
	$page_title = 'Order Online'; //set the page title
	require('includes/header.php');
	require('../../mysqli_connect.php'); // connect to the database
?>
<div>
<img src="assets/eWordFull.PNG" class="img-fluid" alt="...">
</div>

<div>
	<div class="bg-dark mb-0 text-light py-2">
	  <div class="container">
		<h1 class="display-4 text-center">Order Online</h1>
		<p class="lead text-center">Order online and come pick it up when it's ready!</p>
	  </div>
	</div>
</div>

<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header text-light" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h5><?php
				$q_cat = "SELECT category_name FROM Categories WHERE category_number=1";
				$r_cat = @mysqli_query($dbc, $q_cat); // Run the query.
				$cat = mysqli_fetch_array($r_cat, MYSQLI_ASSOC);	
				echo $cat['category_name'];
			?></h5>
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <?php
		$q = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option FROM Menu WHERE category_number=1";
		$r = @mysqli_query($dbc, $q); // Run the query.
		
		echo'<ul class=" list-unstyled">';
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			echo '<li class="media mb-3 mx-auto">
			<img src="assets/'.$row['food_filename'].'" class="mr-3" width="30" height="30">
			<div class="media-body">
			  <h6 class="mt-0 mb-1">'.$row['food_name'].' &nbsp $'.$row['food_price'].'</h6><input data-item="'.$row['food_name'].'" data-price='.$row['food_price'].' class="addButton" type="button" value="Add Item">
			  <hr>
			</div>
		  </li>';
		}
		echo'</ul>';
		?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn  text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h5><?php
				$q_cat = "SELECT category_name FROM Categories WHERE category_number=2";
				$r_cat = @mysqli_query($dbc, $q_cat); // Run the query.
				$cat = mysqli_fetch_array($r_cat, MYSQLI_ASSOC);	
				echo $cat['category_name'];
			?></h5>
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <?php
		$q2 = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option FROM Menu WHERE category_number=2";
		$r2 = @mysqli_query($dbc, $q2); // Run the query.
		
		echo'<ul class=" list-unstyled">';
		
		while ($row = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
			echo '<li class="media mb-3 mx-auto">
			<img src="assets/'.$row['food_filename'].'" class="mr-3" width="30" height="30">
			<div class="media-body">
			  <h6 class="mt-0 mb-1">'.$row['food_name'].' &nbsp $'.$row['food_price'].'</h6><input data-item="'.$row['food_name'].'" data-price='.$row['food_price'].' class="addButton" type="button" value="Add Item">
			  <hr>
			</div>
		  </li>';
		}
		echo'</ul>';
		?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h5><?php
				$q_cat = "SELECT category_name FROM Categories WHERE category_number=3";
				$r_cat = @mysqli_query($dbc, $q_cat); // Run the query.
				$cat = mysqli_fetch_array($r_cat, MYSQLI_ASSOC);	
				echo $cat['category_name'];
			?></h5>
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        <?php
		$q3 = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option FROM Menu WHERE category_number=3";
		$r3 = @mysqli_query($dbc, $q3); // Run the query.
		
		echo'<ul class=" list-unstyled">';
		
		while ($row = mysqli_fetch_array($r3, MYSQLI_ASSOC)) {
			echo '<li class="media mb-3 mx-auto">
			<img src="assets/'.$row['food_filename'].'" class="mr-3" width="30" height="30">
			<div class="media-body">
			  <h6 class="mt-0 mb-1">'.$row['food_name'].' &nbsp $'.$row['food_price'].'</h6><input data-item="'.$row['food_name'].'" data-price='.$row['food_price'].' class="addButton" type="button" value="Add Item">
			  <hr>
			</div>
		  </li>';
		}
		echo'</ul>';
		?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          <h5><?php
				$q_cat = "SELECT category_name FROM Categories WHERE category_number=4";
				$r_cat = @mysqli_query($dbc, $q_cat); // Run the query.
				$cat = mysqli_fetch_array($r_cat, MYSQLI_ASSOC);	
				echo $cat['category_name'];
			?></h5>
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
        <?php
		$q4 = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option FROM Menu WHERE category_number=4";
		$r4 = @mysqli_query($dbc, $q4); // Run the query.
		
		echo'<ul class=" list-unstyled">';
		
		while ($row = mysqli_fetch_array($r4, MYSQLI_ASSOC)) {
			echo '<li class="media mb-3 mx-auto">
			<img src="assets/'.$row['food_filename'].'" class="mr-3" width="30" height="30">
			<div class="media-body">
			  <h6 class="mt-0 mb-1">'.$row['food_name'].' &nbsp $'.$row['food_price'].'</h6><input data-item="'.$row['food_name'].'" data-price='.$row['food_price'].' class="addButton" type="button" value="Add Item">
			  <hr>
			</div>
		  </li>';
		}
		echo'</ul>';
		?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFive">
      <h2 class="mb-0">
        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          <h5><?php
				$q_cat = "SELECT category_name FROM Categories WHERE category_number=5";
				$r_cat = @mysqli_query($dbc, $q_cat); // Run the query.
				$cat = mysqli_fetch_array($r_cat, MYSQLI_ASSOC);	
				echo $cat['category_name'];
			?></h5>
        </button>
      </h2>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
        <?php
		$q5 = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option FROM Menu WHERE category_number=5";
		$r5 = @mysqli_query($dbc, $q5); // Run the query.
		
		echo'<ul class=" list-unstyled">';
		
		while ($row = mysqli_fetch_array($r5, MYSQLI_ASSOC)) {
			echo '<li class="media mb-3 mx-auto">
			<img src="assets/'.$row['food_filename'].'" class="mr-3" width="30" height="30">
			<div class="media-body">
			  <h6 class="mt-0 mb-1">'.$row['food_name'].' &nbsp $'.$row['food_price'].'</h6><input data-item="'.$row['food_name'].'" data-price='.$row['food_price'].' class="addButton" type="button" value="Add Item">
			  <hr>
			</div>
		  </li>';
		}
		echo'</ul>';
		?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingSix">
      <h2 class="mb-0">
        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          <h5>Sides</h5>
        </button>
      </h2>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
      <div class="card-body">
        <?php
		$q5 = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option FROM Menu WHERE is_side=1";
		$r5 = @mysqli_query($dbc, $q5); // Run the query.
		
		echo'<ul class=" list-unstyled">';
		
		while ($row = mysqli_fetch_array($r5, MYSQLI_ASSOC)) {
			echo '<li class="media mb-3 mx-auto">
			<img src="assets/'.$row['food_filename'].'" class="mr-3" width="30" height="30">
			<div class="media-body">
			  <h6 class="mt-0 mb-1">'.$row['food_name'].' &nbsp $'.$row['food_price'].'</h6><input data-item="'.$row['food_name'].'" data-price='.$row['food_price'].' class="addButton" type="button" value="Add Item">
			  <hr>
			</div>
		  </li>';
		}
		echo'</ul>';
		?>
      </div>
    </div>
  </div>
</div>


<div class="bg-dark mb-0 py-1 text-light">
	<h1 class="display-4 text-center">Your Order</h1>
</div>
<ul id="orderList" class="list-group">
</ul>
<div class="bg-dark mb-0 py-1 text-light">
	<p id="totalView" class="text-center">Total: $0</p>	
</div>



<!-- Form -->

<form id="orderFoodForm"class="m-2" action="confirmation.php" method="POST">
    <div class="form-group">
      <label for="cardName">Name*</label>
      <input type="text" class="form-control" id="cardName" name="cardName" value="<?php if (isset($_POST['cardName'])) echo $_POST['cardName']; ?>" required >
    </div>
  <div class="form-group">
    <label for="cardNumber">Card Number*</label>
    <input type="text" class="form-control" id="cardNumber" name="cardNumber" value="<?php if (isset($_POST['cardNumber'])) echo $_POST['cardNumber']; ?>" required>
  </div>	
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="expMonth">Expiration Month*</label>
      <select name="expMonth" id="expMonth" class="form-control">
			<option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == 'none') echo "selected = 'selected'"?>value="mm">mm</option>
			<option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == '01') echo "selected = 'selected'"?>value="01">01</option>
			<option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == '02') echo "selected = 'selected'"?>value="03">02</option>
		    <option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == '03') echo "selected = 'selected'"?>value="03">03</option>
		    <option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == '04') echo "selected = 'selected'"?>value="04">04</option>
		    <option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == '05') echo "selected = 'selected'"?>value="05">05</option>
		    <option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == '06') echo "selected = 'selected'"?>value="06">06</option>
		    <option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == '07') echo "selected = 'selected'"?>value="07">07</option>
		    <option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == '08') echo "selected = 'selected'"?>value="08">08</option>
		    <option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == '09') echo "selected = 'selected'"?>value="09">09</option>
		    <option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == '10') echo "selected = 'selected'"?> value="10">10</option>
		    <option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == '11') echo "selected = 'selected'"?>value="11">11</option>
		    <option <?php if(isset($_POST['expMonth']) && $_POST['expMonth'] == '12') echo "selected = 'selected'"?>value="12">12</option>
      </select>
    </div>
	<div class="form-group col-md-4">
      <label for="expYear">Expiration Year*</label>
      <select id="expYear" name="expYear" class="form-control">
			<option <?php if(isset($_POST['expYear']) && $_POST['expYear'] == 'none') echo "selected = 'selected'"?>value="mm">yy</option>
			<option <?php if(isset($_POST['expYear']) && $_POST['expYear'] == '2021') echo "selected = 'selected'"?>value="2021">2021</option>
            <option <?php if(isset($_POST['expYear']) && $_POST['expYear'] == '2022') echo "selected = 'selected'"?>value="2022">2022</option>
			<option <?php if(isset($_POST['expYear']) && $_POST['expYear'] == '2023') echo "selected = 'selected'"?>value="2023">2023</option>
		    <option <?php if(isset($_POST['expYear']) && $_POST['expYear'] == '2024') echo "selected = 'selected'"?>value="2024">2024</option>
		    <option <?php if(isset($_POST['expYear']) && $_POST['expYear'] == '2025') echo "selected = 'selected'"?>value="2025">2025</option>
		    <option <?php if(isset($_POST['expYear']) && $_POST['expYear'] == '2026') echo "selected = 'selected'"?>value="2026">2026</option>
      </select>
    </div>
	<div class="form-group col-4">
		<label for="cvc">CVC*</label>
		<input type="text" class="form-control" id="cvc" name="cvc" value="<?php if (isset($_POST['cvc'])) echo $_POST['cvc']; ?>" required >
	  </div>
  </div>
  <button type="submit" id="orderButton" class="btn btn-dark">Place Order</button>
</form>


<!-- Form -->

<?php
	require('includes/footer.php');
?>