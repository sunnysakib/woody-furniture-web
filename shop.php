<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "woody_db";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Get data from database 
$result = $conn->query("SELECT * FROM products"); 
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="favicon.png">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href="css/style.css" rel="stylesheet">
		<title>Woody </title>
	</head>

	<body>

		<!-- Start NavBar -->
		<nav class="custom-navbar navbar navbar-expand-md navbar-dark sticky-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">Woody</a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarsWoody"
          aria-controls="navbarsWoody"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsWoody">
          <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li><a class="nav-link" href="shop.php">Shop</a></li>
            <li><a class="nav-link" href="about.html">About us</a></li>
            <li><a class="nav-link" href="services.html">Services</a></li>
            <li><a class="nav-link" href="blog.html">Blog</a></li>
            <li><a class="nav-link" href="contact.html">Contact us</a></li>
          </ul>

          <ul class="custom-navbar-icon navbar-nav mb-2 mb-md-0 ms-5">
            <li class="dropdown my-auto">
              <img
                class="dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                src="images/user.svg"
              />
              <ul class="dropdown-menu">
                <li>
                  <a id="loginn" class="dropdown-item" href="login.html"
                    >Login</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="adminLogin.html">Admin</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="nav-link" href="cart.html"
                ><img src="images/cart.svg"
              /></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End NavBar -->

		<!-- Start Shop banner Section -->
		<section class="shop-banner">
			<div class="shop-banner_content d-flex flex-column align-items-center">
				<img class="img-fluid" src="./images/logo.png" alt="logo.png">
				<h1>Shop</h1>
				<p>Home > Shop</p>
			</div>
		</section>
		<!-- End Shop banner Section -->

		<!-- Start Shop Product Section -->
		<section class="container shop-product text-center">
			<div class="row">
				<?php while($row = $result->fetch_assoc()){ ?> 
				<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
					<a class="product-item" href="productDetail.php?id=<?php echo $row['product_id']; ?>">
						<img class="img-fluid product-thumbnail" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
						<h3 class="product-title"><?php echo ($row['name']); ?></h3>
						<strong class="product-price"><?php echo ($row['price']); ?> Tk.</strong>

						<span class="icon-cross">
							<img src="images/cross.svg" class="img-fluid">
						</span>
					</a>
				</div> 
				<?php } ?> 
			</div>
		</section>
		<!-- End Shop Product Section -->
		

		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="images/sofa.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Woody<span>.</span></a></div>
						<p class="mb-4">we understand that buying furniture is more than a transaction, it's an investment in your comfort and style. Our services are tailored to make your shopping experience enjoyable and hassle-free.</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Our team</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy; 2028. All Rights Reserved. &mdash; Woody
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/25c9267c7e.js" crossorigin="anonymous"></script>
	</body>

</html>
