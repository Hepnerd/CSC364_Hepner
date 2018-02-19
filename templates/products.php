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
            <a href="/createProduct/createProduct.php" style="float:right" type="button" class="btn btn-default">Add Product</a>
						<p>Posted by <span class="glyphicon glyphicon-user"></span> <a href="#">Nathanael Hepner</a> on <span class="glyphicon glyphicon-time"></span> $today</p>
					</div>
				</div>
			</div>
			<!-- /.row -->

			<div class="row margin-b-2">

products;
// Loop through the posts and display them
$count = 0;
while ($post = $posts->fetch_assoc()) {
  $title = $post['name'];
  $desc = $post['description'];
  $stock = $post['qty_available'];
  $row = "";
  $rowEnd = "";
  if ($count % 3 == 0 && $count != 0)
  {
    $row = "<div class='row margin-b-2'>";
    $rowEnd = "</div>";
  }
echo $rowEnd;
echo $row;
echo '
<div class="col-sm-4 productBox">
  <img class="img-responsive thumbnail" src="http://placehold.it/700x350" alt="">
  <div class="caption">';
echo "<h4><a href='#'>" . $title . "</a><div class='stock'>Stock: " . $stock . "</div></h4>";
echo "<p>" . $desc . "</p>";
echo '</div></div>';
$count++;
}
    }
  }
?>
