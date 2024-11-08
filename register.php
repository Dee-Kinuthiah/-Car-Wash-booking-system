<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Online Booking - Car Wash</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<div class="clearfix">
			<div class="logo">
				<a href="index.php"><img src="images/logo1.png" alt="LOGO" height="70" width="120"></a>
			</div>
			<ul class="navigation">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="about.php">About us</a>
				</li>
				<li >
					<a href="book.php">Book Online</a>
				</li>
				<li>
					<a href="services.php">Our Services</a>
				</li>
				<li>
					<a href="gallery.php">Gallery</a>
					
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="contents">
		<div class="clearfix">
			<div class="sidebar">
				<div>
					<h2>Book online</h2>
					<ul>
						<li>
							<a href="#">Hand Wash</a>
						</li>
						<li>
							<a href="#">Deluxe Wash</a>
						</li>
						<li>
							<a href="#">Detailing Wash</a>
						</li>
					</ul>
				</div>
				<div>
					<h2>Account</h2>
					<p>
                                            <?php 
					include 'login.php';
                                            ?>
					</p>
				</div>
			</div>
			<div class="main">
				
                                <hr>
				<?php 
				include 'account.php';
                                 ?>	
			</div>
		</div>
	</div>
	<div id="footer">
		<div class="clearfix">
			
			
			
		</div>
		<div id="footnote">
			<div class="clearfix">
				<div class="connect">
					<a href="#" class="facebook"></a><a href="#" class="twitter"></a><a href="#" class="googleplus"></a><a href="#" class="pinterest"></a>
				</div>
				<p>
					© Copyright 2024 Dee'nga Car Wash Booking. All Rights Reserved.
				</p>
			</div>
		</div>
	</div>
</body>
</html>