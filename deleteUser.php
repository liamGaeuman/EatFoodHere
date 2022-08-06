<?php
require('../../mysqli_connect.php'); // connect to the database

$iD = $_GET['id'];
	
$q = "SELECT food_name FROM Menu WHERE food_id=$iD";
$r = @mysqli_query($dbc, $q);
$row = mysqli_fetch_array($r, MYSQLI_NUM);

$page_title = "Delete an item: $row[0]";
	
require('includes/header.php'); //connect the header and head
	
	
	// Check for a valid user ID, through GET or POST:
if ((isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From maintenance.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include('includes/footer.php');
	exit();
}
?>
<br>
<h3 class="text-center">Are you sure you want to delete this user?</h3>
<hr>
<form action="#" method="POST">
	<input type="hidden" name="id" value=<?php echo $id;?>>
	<button name="kill" type="submit" class="btn btn-danger btn-lg btn-block">Y E S</button>
	<br>
	<a href="maintenance.php"><button type="" class="btn btn-success btn-lg btn-block">N O</button></a>
</form>
<hr>
<?php



if(isset($_POST['kill'])){
	$q = "DELETE FROM Menu WHERE food_id=$id LIMIT 1";
	$r = @mysqli_query($dbc, $q);
	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

		// Print a message:
		echo '<h4 class="text-center">The user has been deleted.</h4>';

	} else { // If the query did not run OK.
		echo '<p class="error">The user could not be deleted due to a system error.</p>'; // Public message.
		echo '<p>' . mysqli_error($dbc) . '<br>Query: ' . $q . '</p>'; // Debugging message.
	}
 
}
?>
<a href="maintenance.php"><h5 class="text-center">Return To Maintenance Page</h5></a>

<?php
include('includes/footer.php');
?>