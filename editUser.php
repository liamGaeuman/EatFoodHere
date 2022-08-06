<?php
	$page_title = 'Edit a User'; //set the page title
	require('includes/header.php'); //connect the header and head
	require('../../mysqli_connect.php'); // connect to the database
	
	if ((isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From maintenance.php
		$id = $_GET['id'];
	} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
		$id = $_POST['id'];
	} else { // No valid ID, kill the script.
		echo '<p class="error">This page has been accessed in error.</p>';
		include('includes/footer.php');
		exit();
	}
	
	$q = "SELECT food_name, food_description, food_price, food_filename, is_side, comes_with_side, dietary_option, category_number FROM Menu WHERE food_id=$id";
	$r = @mysqli_query($dbc, $q); // Run the query.

	$row = mysqli_fetch_array($r, MYSQLI_ASSOC)
?>
<h2 class="text-center mt-3">Edit Menu Item</h2>
<hr>
<div class="container">
		<div>
			<form action="#" method="POST" enctype="multipart/form-data">
				
				<div class="form-row">
				  <div class="form-group col-3">
					<label>Item Name</label>
					<input type="text" class="form-control" name="menuItemName" value="<?php echo $row['food_name'];?>">
				  </div>
				  <div class="form-group col-2">
					<label>Item Price</label>
					<input type="text" class="form-control" name="menuItemPrice" value="<?php echo $row['food_price'];?>">
				  </div>
				  <div class="form-group col-2">
					<label>Category Number</label>
					<input type="number" min="1" max="6" class="form-control" name="menuCategoryNum" value="<?php echo $row['category_number']; ?>">
				  </div>
				  <div class="form-group col-2">
					<label>Dietary Option</label>
					<select name="dietaryOption" class="form-control">
					  <option <?php if ($row['dietary_option'] == "none") echo "selected = 'selected'"; ?> value="none">None</option>
					  <option <?php if ($row['dietary_option'] == "vegan") echo "selected = 'selected'"; ?> value="vegan">Vegan</option>
					  <option <?php if ($row['dietary_option'] == "vegetarian") echo "selected = 'selected'"; ?> value="vegetarian">Vegetarian</option>
					</select>
				  </div>
				  <div class="form-group col-3">
					<label>Item Image</label>
					<input type="file" class="" name="menuItemFile" value="<?php echo $row['food_filename'];?>">
				  </div>
				</div> 
				  
				<div class="form-group">
					<label>Item Descriptoion</label>
					<textarea type="text" class="form-control" name="menuItemDescription"><?php echo $row['food_description'];?></textarea>
				</div>
					
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" name="isSide" <?php if ($row['is_side'] == 1) echo 'checked'; ?>>
					<label class="form-check-label">Item is a side</label>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" name="comesWithSide"<?php if ($row['comes_with_side'] == 1) echo 'checked'; ?>>
					<label class="form-check-label">Comes with a side</label>
				</div>
				  
				<button type="submit" name="addMenuItem-submit" class="mb-2 btn btn-dark">Make Edit</button>
				
			</form>
		</div>
	</div>
<hr>
<h5 class="text-center"><a href="maintenance.php">Back To Maintenance Page</a></h5>
<?php
if(isset($_POST['addMenuItem-submit'])) {
	
	$errors = []; // Initialize an error array.
	
	// Check for an item name:
	if (empty($_POST['menuItemName'])) {
		$errors[] = 'You forgot to enter an Item name.';
	} else {
		$itemName = mysqli_real_escape_string($dbc, trim($_POST['menuItemName']));
	}
	
	// Check for an item price:
	if (empty($_POST['menuItemPrice'])) {
		$errors[] = 'You forgot to enter an item price.';
	} else {
		$itemPrice = mysqli_real_escape_string($dbc, trim($_POST['menuItemPrice']));
	}
	
	// Check for an item description:
	if (empty($_POST['menuItemDescription'])) {
		$errors[] = 'You forgot to enter a description.';
	} else {
		$menuItemDescription = mysqli_real_escape_string($dbc, trim($_POST['menuItemDescription']));
	}
	
	// Check for an category number:
	if (empty($_POST['menuCategoryNum'])) {
		$errors[] = 'You forgot to enter a category number.';
	} else {
		$categoryNum = mysqli_real_escape_string($dbc, trim($_POST['menuCategoryNum']));
	}
	
	//covert boolean inputs for mysql
	if (isset($_POST['isSide'])){
		$side = 1;
	}else{
		$side = 0;
	}
	
	if (isset($_POST['comesWithSide'])){
		$withSide = 1;
	}else{
		$withSide = 0;
	}
	
	//check if both bool values are true
	if($withSide == 1 && $side == 1){
		$errors[] = 'A side connot come with a side.';
	}

	//create a variable for dietary option
	$dietOption = $_POST['dietaryOption'];

	// check for filename errors
	if(isset($_FILES['menuItemFile'])) {
		$tmp = $_FILES['menuItemFile']['tmp_name'];
		
		$file = $_FILES['menuItemFile']['name'];
		
		$ext = explode('.',$file);
		
		//$ext[0] contains file name
		//$ext[1] contains the extension
		
		$cont = false;
		
		switch($ext[1]){
			case 'png':
			case 'jpg':
			case 'gif':
			case 'bmp':
				$cont = true;
		}
		
		$newfile = md5($ext[0]);
		
		$done_file = $newfile.'.'.$ext[1];
		
		move_uploaded_file($tmp,'assets/'.$done_file);
		
		$fileQueryPart = "food_filename='$done_file'";
	}
	else{
		$fileQueryPart = "food_filename='".$row['food_filename']."'";
	}
	
	//check for errors
	if (empty($errors)) {
		$q = "UPDATE Menu Set food_name='$itemName', food_description='$menuItemDescription', 
		food_price=$itemPrice, is_side=$side, comes_with_side=$withSide
		, dietary_option='$dietOption', category_number=$categoryNum, " . $fileQueryPart . " WHERE food_id=$id LIMIT 1";	 
			 
		$r = @mysqli_query($dbc, $q); // Run the query.
		
		if ($r && mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			// Print a message:
			echo '<h4 class="text-center">One menu item entered successfully!</h4>';
		}else{
			// Public message:
			echo "<p class='error'>You could not be registered due to a system error. We apologize for any inconvenience.</p>";

			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
		}

	
	}else { // Report the errors.

		echo '<h1>Error!</h1>;
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><p>Please try again.</p><p><br></p>';

	} // End of if (empty($errors)) IF.

	mysqli_close($dbc); // Close the database connection.
}

include('includes/footer.php');
?>