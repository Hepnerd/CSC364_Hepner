<?php
class layout
{
    public static function pageTop($title)
    {
        echo <<<pageTop
        <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Hepner's Haggles</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" lang="en" content="ADD SITE DESCRIPTION">
		<meta name="author" content="ADD AUTHOR INFORMATION">
		<meta name="robots" content="index, follow">

		<!-- icons -->
		<link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">
		<link rel="shortcut icon" href="/assets/img/favicon.ico">

		<!-- Bootstrap Core CSS file -->
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css">

		<!-- Override CSS file - add your own CSS rules -->
		<link rel="stylesheet" href="/assets/css/styles.css">

		<!-- Conditional comment containing JS files for IE6 - 8 -->
		<!--[if lt IE 9]>
			<script src="/assets/js/html5.js"></script>
			<script src="/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<style>
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
.stock
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
					<a class="navbar-brand" href="http://hepnerd.com">Hepner's Haggles</a>
				</div>
				<!-- /.navbar-header -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="#">Nav item 1</a></li>
						<li><a href="#">Nav item 2</a></li>
						<li><a href="#">Nav item 3</a></li>
            <li><a id="myBtn" href="#">Log In/Create Account</a></li>
					</ul>
				</div>
        <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Login to hepnerd.com</h4>
</div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
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
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember" id="remember"> Remember login
                                  </label>
                                  <p class="help-block">(if this is a private computer)</p>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Login</button>
                              <a href="#" id="helpbtn" class="btn btn-default btn-block">Help to login</a>
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> See all your orders</li>
                          <li><span class="fa fa-check text-success"></span> Fast re-order</li>
                          <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                          <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                          <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                          <br/>

                      </ul>
                      <p><a href="/login/register.php" class="btn btn-info btn-block">Yes please, register now!</a></p>
                  </div>
              </div>
          </div>
          </div>

        </div>
        <script>
        var modal = document.getElementById('myModal');

// Get the button that opens the modal
var helpbtn = document.getElementById("helpbtn");
helpbtn.onclick = function() {
  $('#helpbtn').text("Figure it out yourself");
}
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
</script>
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

  <!-- JQuery scripts -->
    <script src="assets/js/jquery-1.11.2.min.js"></script>

  <!-- Bootstrap Core scripts -->
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
pageBottom;
    }
    }
?>
