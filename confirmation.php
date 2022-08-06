<?php
	$page_title = 'Confirmation'; //set the page title
	require('includes/header.php');
?>
<div>
<img src="assets/eWordFull.PNG" class="img-fluid" alt="...">
</div>
<div class="bg-dark mb-0 py-1 text-light">
<?php
	$name = $_POST['cardName'];
	echo "<h1 class='display-4 text-center'>Thank you, $name</h1>";
?>
<div>
<!-- Modal -->
<div class="modal fade" id="orderModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-body" id="exampleModalLabel">Thank you for your purchase!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-body">Your order will be ready for pickup in 15 minutes!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div>
<img src="assets/eWordFull.PNG" class="img-fluid" alt="...">
</div>
<?php
	require('includes/footer.php');
?>