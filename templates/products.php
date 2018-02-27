<?php

class product
{
    public static function products()
    {
    $db = connectToDb();
    $sql = 'select * from products';
    $posts = $db->query($sql);
    //date_default_timezone_set('America/New_York');
		$today = date("Y-m-d", strtotime('today'));
        echo <<<products
        <!-- Page Content -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="page-header">
						<h1>Product List</h1>
            <a href="/product/createProduct.php" style="float:right" type="button" class="btn btn-default">Add Product</a>
						<p>Posted by <span class="glyphicon glyphicon-user"></span> <a href="#">Nathanael Hepner</a> on <span class="glyphicon glyphicon-time"></span> $today</p>
					</div>
				</div>
			</div>
			<!-- /.row -->

			<div class="row margin-b-2">

products;
// Loop through the posts and display them
$count = 0;
$modalCount = 0;
while ($post = $posts->fetch_assoc()) {
  $title = $post['name'];
  $desc = $post['description'];
  $stock = $post['qty_available'];
  $price = $post['price'];
  $id = $post['id'];
  $row = "";
  $rowEnd = "";
  if ($count % 3 == 0 && $count != 0)
  {
    $row = "<div class='row margin-b-2'>";
    $rowEnd = "</div>";
  }
  if ($stock == 0)
  {
    $stock = "Out of stock";
  }
echo $rowEnd;
echo $row;
//echo $modalCount;
///product/viewProduct.php?id=" . $id . "
echo "<a style='color: black; text-decoration: none;' id='productBtn" . $modalCount . "' href='#'>";
echo '
<div class="col-sm-4 productBox">
  <img class="img-responsive thumbnail" src="http://placehold.it/700x350" alt="">
  <div class="caption">';
echo "<h4><p>" . $title . "</p><div class='stock'>Stock: " . $stock . "</div></h4>";
echo "<p>" . $desc . "</p>";
echo '</div></div>';
echo "</a>";
echo '<div id="myModal' . $modalCount . '" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" id="closing' . $modalCount . '" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <table align="center" class="table">
              <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Quantity Available</th>
                  <th></th>
                  <th></th>
              </tr>
              <tr>
              <th>' . $title . '</th>
              <th>' . $desc . '</th>
              <th>' . $price . '</th>
              <th>' . $stock . '</th>
              <th><h4><a href="/product/updateProduct.php?id=' . $id . '">Edit</a></h4></th>
              <th><h4><a href="/product/deleteProduct.php?id=' . $id . '">Delete</a></h4></th>
              </tr>
              </table>
              </div>
              </div>
              </div>';
echo '<script>
        var modal' . $modalCount . ' = document.getElementById("myModal' . $modalCount . '");

// Get the button that opens the modal
var btn' . $modalCount . ' = document.getElementById("productBtn'. $modalCount . '");

// Get the <span> element that closes the modal
var span = document.getElementById("closing' . $modalCount . '");

// When the user clicks on the button, open the modal
btn' . $modalCount . '.onclick = function() {
    modal' . $modalCount . '.style.display = "block";
  }


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal' . $modalCount . '.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == myModal' . $modalCount . ') {
        modal' . $modalCount . '.style.display = "none";
    }
}</script>';
$count++;
$modalCount++;
}
    }
  }
?>
