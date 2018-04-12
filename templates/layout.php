<?php
ob_start();
session_start();
class layout
{
  public static function LoggedIn()
{
    $user = $_SESSION['login_user'];
    $string = '';
    if (isset($_SESSION['cart']))
{
    $results = $_SESSION['cart'];

    //print_r($results);
    //echo "<p></p>";
    if (empty($results))
    {
      $cartTableStart = '';
      $string = '<center>Your shopping cart is empty. Add some cars!</center>';
      $cartTableEnd = '';
      $cartTableCheckout = "";
    }
    else {
      $cartTableStart = '<div style="overflow-x:auto; width:100%;"><table class="table table-hover"><thead><th>Name</th><th>Price</th><th>Quantity</th><th>Options</th></thead><tbody>';
      $cartTableEnd = '</tbody></table></div>';
    foreach ($results as $outputCart)
    {
      //print_r($outputCart);
      //echo "<p></p>";

      //extract($outputCart);

      $string .= '<tr><td>' . $outputCart['name'] . '</td><td>' . $outputCart['price'] . '</td><td>' . $outputCart['quantity'] . '</td><td><a href="/product/deleteFromCart.php?id=' . $outputCart['uid'] . '">Delete From Cart</a></td></tr>';

    /*
      echo '<table>';
      echo '<tr>';
      echo '<td>id ' . $outputCart['id'] . '</td>';
      echo '<td>name ' . $outputCart['name'] . '</td>';
      echo '<td>price ' . $outputCart['price'] . '</td>';
      echo '<td>Delete Button</td>';
      echo '</tr>';
      echo '</table>';
      */
    }
    $cartTableCheckout = '<div style="position: absolute;right: 0px;padding-bottom: 10px;"><a href="/product/checkOut.php">Check Out</a></div>';

  }
  }
  if (!isset($_SESSION['cart']))
  {
    $cartTableStart = '';
    $string = '<center>Your shopping cart is empty. Add some cars!</center>';
    $cartTableEnd = '';
    $cartTableCheckout = "";

    //echo '';
  }
    //print_r($_SESSION['login_user']);
    $x = '
    <li><a href="#">Welcome, ' . $user['firstname'] . " " .  $user['lastname'] . '</a></li>
    <li><a  class="myBtn" id="myBtn" href="#">Cart</a></li>
    <li><a href="/login/logout.php">Logout</a></li>

    <li class="box" style="height:50px;">
    </li>
    </ul>
    </div>
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"><b>Shopping Cart</b></h4>
    </div>
    <div class="modal-body">
      <div class="row">
              <div class="well">
              ' . $cartTableStart . '
                ' . $string . '
                ' . $cartTableEnd . '
              </div>
              ' .$cartTableCheckout . '

      </div>
    </div>
    </div>

    </div>
    <script>
    $(document).ready(function(){

    $(".box").hide();
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
    modal.style.display = "none";
    }
    }
  });
    </script>';
    return $x;
}
public static function LoggedOut()
{
    $x = '
    <li class="box" style="height:50px;">


    <a>
    <form id="loginForm" method="POST" action="/login/login.php" novalidate="novalidate">
            <input type="text" style="color: black" id="email" name="email" value="" required="" title="Please enter your email" placeholder="Email">
            <input type="password" style="color: black" id="password" name="password" value="" required="" placeholder="password" title="Please enter your password">
        <button type="submit" style="color:black" >Login</button>
    </form>
    </a>


    </li>
    <li><a class="myBtn" id="myBtn" href="#">Log In</a></li>
    <li><a class="registerButton" id="registerButton" href="#">Register</a></li>
    </ul>
    </div>
    <div id="registerModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id=""><b>Register for hepnerd.com</b></h4>
    </div>
    <div class="modal-body">
      <div class="row">
              <div class="well">
              <form id="registerForm" action="/login/register.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  <fieldset>

                      <!-- Form Name -->
                      <!-- Text input-->
                      <div class="form-group">
                          <label class="col-md-3 control-label" for="firstName">First Name</label>
                          <div class="col-md-8">
                              <input id="firstName" name="firstName" type="text" class="form-control input-md" required="">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="lastName">Last Name</label>
                          <div class="col-md-8">
                              <input id="lastName" name="lastName" type="text" class="form-control input-md" required="">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="address">Address</label>
                          <div class="col-md-8">
                              <input id="address" name="address" type="text" class="form-control input-md" required="">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="city">City</label>
                          <div class="col-md-8">
                              <input id="city" name="city" type="text" class="form-control input-md" required="">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="state">State</label>
                          <div class="col-md-8">
                              <input id="state" name="state" type="text" class="form-control input-md" required="">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="zip">Zip Code</label>
                          <div class="col-md-8">
                              <input id="zip" name="zip" type="text" class="form-control input-md" required="">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="phone">Phone Number</label>
                          <div class="col-md-8">
                              <input id="phone" name="phone" type="text" class="form-control input-md" required="">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="email">Email Address</label>
                          <div class="col-md-8">
                              <input id="email" name="email" type="text" class="form-control input-md" required="">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="password">Password</label>
                          <div class="col-md-8">
                              <input id="password" name="password" type="password" class="form-control input-md" required="">
                          </div>
                      </div>


                      <!-- Button (Double) -->
                      <div class="form-group">
                          <label class="col-md-3 control-label" for="submit"></label>
                          <div class="col-md-8">
                              <button id="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
                          </div>
                      </div>

                  </fieldset>
              </form>
              </div>
      </div>
    </div>
    </div>

    </div>
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"><b>Login to hepnerd.com</b></h4>
    </div>
    <div class="modal-body">
      <div class="row">
              <div class="well">
                  <form id="loginForm" method="POST" action="/login/login.php" novalidate="novalidate">
                      <div class="form-group">
                          <label for="email" class="control-label">Email</label>
                          <input type="text" class="form-control" id="email" name="email" value="" required="" title="Please enter your email" placeholder="example@gmail.com">
                          <span class="help-block"></span>
                      </div>
                      <div class="form-group">
                          <label for="password" class="control-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                          <span class="help-block"></span>
                      </div>
                      <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                      <button type="submit" class="btn btn-success btn-block">Login</button>
                      <br/>
                      <p><a href="/login/register.php" class="btn btn-info btn-block">Register now!</a></p>
                  </form>
              </div>
      </div>
    </div>
    </div>

    </div>
    <script>
    $(document).ready(function(){

    $(".box").hide();

    var modal = document.getElementById("registerModal");

    // Get the button that opens the modal
    var btn = document.getElementById("registerButton");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
    modal.style.display = "none";
    }
    }
    });

    $(document).ready(function(){

    $(".box").hide();

    $("#myBtn").click(function(){
    if ($(this).hasClass("largeWidth"))
    {
    $(".box").animate({
    width: "toggle"
    });
    }
    });
    checkWidth();
    $(window).resize(checkWidth);
    function checkWidth()
    {
    //  alert($(window).width());
    if ($(window).width() > 980)
    {
    $("#myBtn").removeClass();
    $("#myBtn").addClass("largeWidth");
    }
    else
    {
    $("#myBtn").removeClass();
    $("#myBtn").addClass("smallWidth");
    }
    }



    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
    //alert("Hi");

    if ($("#myBtn").hasClass("smallWidth"))
    {
    //alert("Hi");
    modal.style.display = "block";
    }
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
    modal.style.display = "none";
    }
    }
    });

    </script>';
    return $x;
}
    public static function pageTop($title)
    {
      if (isset($_SESSION['login_user']))
      {
        $menu = static::LoggedIn();
      }

      if (!isset($_SESSION['login_user'])) {
        $menu = static::LoggedOut();
      }



      if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
        //echo "test works";
      }
      $serverRoot = $_SERVER['DOCUMENT_ROOT'];
        echo <<<pageTop
        <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Hepner's Haggles</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" lang="en" content="ADD SITE DESCRIPTION">
		<meta name="author" content="ADD AUTHOR INFORMATION">
		<meta name="robots" content="index, follow">

		<!-- icons -->
		<link rel="apple-touch-icon" href="../../assets/img/apple-touch-icon.png">
		<link rel="shortcut icon" href="../../assets/img/favicon.ico">

		<!-- Bootstrap Core CSS file -->
		<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <!-- JQuery scripts -->
      <script src="../../assets/js/jquery-1.11.2.min.js"></script>

    <!-- Bootstrap Core scripts -->
    <script src="../../assets/js/bootstrap.min.js"></script>

		<!-- Override CSS file - add your own CSS rules -->
		<link rel="stylesheet" href="../../assets/css/styles.css">

		<!-- Conditional comment containing JS files for IE6 - 8 -->
		<!--[if lt IE 9]>
			<script src="../../assets/js/html5.js"></script>
			<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<style>
    .box {
      display:none; !important;
    float:left;
    overflow: hidden;
}
/* Add padding and border to inner content
for better animation effect */
.box-inner{
    width: 400px;
  }
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    max-width: 518px;
}
/*@media screen and (max-width: 500px) {
  .modal-content {
    width:5px;
  }
}
@media screen and (min-width: 501px) {
  .modal-content {
    width:800px;
  }
}*/

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.floatRight
{
	display:inline;
	float:right;
}
		</style>

		<!-- Navigation -->
	    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
			<div class="container-fluid">

				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="../../index.php">Hepner's Haggles</a>
				</div>
				<!-- /.navbar-header -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
<!--						<li><a href="#">Nav item 1</a></li>
						<li><a href="#">Nav item 2</a></li>
						<li><a href="#">Nav item 3</a></li>
-->
            $menu

				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
		<!-- /.navbar -->
pageTop;
    }
	public static function pageBottom()
    {
    echo <<<pageBottom
    </div>
    <!-- /.row -->

    <hr>
    <footer class="margin-tb-3">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright &copy; Hepnerd.com 2018</p>
        </div>
      </div>
    </footer>
  </div>
  <!-- /.container-fluid -->


  </body>
</html>
pageBottom;
    }
    }
