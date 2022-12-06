<?php include('../includes/connection.php');?>
<?php
	if(isset($_POST['deletefile'])) {
		$idFile = $_POST['idimg'];
		$sql = "DELETE FROM images WHERE id=:id";
		$statement = $link -> prepare($sql);
		$statement -> bindParam(':id', $idFile, PDO::PARAM_INT);
		if($statement -> execute()) {
			echo "<div class='alert alert-success'>Se borró con éxito</div>";
		}
	}
?>	
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>My Gallery</title>
	<meta charset="UTF-8">
	<meta name="description" content="Tulen Photography HTML Template"">
	<meta name="keywords" content="photo, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/themify-icons.css"/>
	<link rel="stylesheet" href="../css/accordion.css"/>
	<link rel="stylesheet" href="../css/fresco.css"/>
	<link rel="stylesheet" href="../css/owl.carousel.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="../css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Offcanvas Menu Section -->
	<div class="menu-wrapper">
		<div class="menu-switch">
			<i class="ti-menu"></i>
		</div>
		<div class="menu-social-warp">
			<div class="menu-social">
				<a href="#"><i class="ti-facebook"></i></a>
				<a href="#"><i class="ti-twitter-alt"></i></a>
				<a href="#"><i class="ti-linkedin"></i></a>
				<a href="#"><i class="ti-instagram"></i></a>
			</div>
		</div>
	</div>
	<div class="side-menu-wrapper">
		<div class="sm-header">
			<div class="menu-close">
				<i class="ti-arrow-left"></i>
			</div>
			<a href="index.html" class="site-logo">
				<img src="img/logo.png" alt="">
			</a>
		</div>
		<nav class="main-menu">
			<ul>
				
			<?php 
				$id = $_GET['id'];
			?>	
				<li><a href="gallery.php?id=<?=$id?>" class="active">Gallery</a></li>
				<li><a href="../../index.html">Log-out</a></li>
				
				
			</ul>
		</nav>
		<div class="sm-footer">
			<div class="sm-socail">
				<a href="#"><i class="ti-facebook"></i></a>
				<a href="#"><i class="ti-twitter-alt"></i></a>
				<a href="#"><i class="ti-linkedin"></i></a>
				<a href="#"><i class="ti-instagram"></i></a>
			</div>
			<div class="copyright-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
		</div>
	</div>
	<!-- Offcanvas Menu Section end -->

	<!-- Gallery Section end -->
	<section class="gallery-section">
		<div class="gallery-header">
			<?php
				$idUser = $_GET['id'];
				$sql2 = $link -> query("SELECT * FROM users WHERE id=$idUser");
				$result = $sql2 -> fetch();
				$nameUser = $result['name'];
			?>
			<h4>Gallery of <?=$nameUser?></h4>
			<button type="button" name="insert" style="float:right"><a href="insert.php?idUser=<?=$idUser?>">Insert</a></button>
			<!--<ul class="gallery-filter">
				<li class="filter all active"><a href="index.php">Insert</a></li>
				<li class="filter" data-filter=".featured"><a href="index.php">Featured</a></li>
				<li class="filter" data-filter=".people">People</li>
				<li class="filter" data-filter=".nature">Nature</li>
				<li class="filter" data-filter=".animal">Animal</li>
				<li class="filter" data-filter=".travel">Travel</li>
			</ul>!-->
			<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
  				<div class="container-fluid">
					
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="insert.php?idUser=<?=$idUser?>">Insertar</a>
						</li>
					</ul>
					</div>
				</div>
			</nav>-->
		</div>
		<div class="nice-scroll">
			<div class="gallery-warp">
				<div class="grid-sizer"></div>
				<?php
					$idUser = $_GET['id'];
					$sql = $link -> query("SELECT * FROM images WHERE idUser=$idUser");
					while($row = $sql -> fetch()) {?>
						<div class="gallery-item gi-big featured">
								<a href="modify.php?id=<?=$idUser?>&nameimg=<?=$row['nameimg']?>">
									<img src="uploadedimages/<?=$row['nameimg']?>" />
								</a>
							<div class="gi-hover">
								<h6><?=$row['nameimg']?></h6>
								<form action="#" method="post">
									<input type="hidden" name="idimg" value="<?=$row['id']?>">
									<input type="hidden" name="iduser" value="<?=$row['idUser']?>">
									<button type="submit" name="deletefile">Delete</button>
									<button type="submit" name="modifyfile"><a href="modify.php?id=<?=$idUser?>&nameimg=<?=$row['nameimg']?>">Modify</a></button>
								</form>
							</div>
						</div>
				<?php }?>
				
				
				<!--<div class="gallery-item people">
					<a class="fresco" href="img/gallery/2.jpg" data-fresco-group="projects">
						<img src="img/gallery/2.jpg" alt="">
					</a>
					<div class="gi-hover">
						<img src="img/gallery/author.jpg" alt="">
						<h6>Arthur Rose</h6>
					</div>
				</div>
				<div class="gallery-item nature">
					<a class="fresco" href="img/gallery/3.jpg" data-fresco-group="projects">
						<img src="img/gallery/3.jpg" alt="">
					</a>
					<div class="gi-hover">
						<img src="img/gallery/author.jpg" alt="">
						<h6>Arthur Rose</h6>
					</div>
				</div>
				<div class="gallery-item gi-long travel">
					<a class="fresco" href="img/gallery/4.jpg" data-fresco-group="projects">
						<img src="img/gallery/4.jpg" alt="">
					</a>
					<div class="gi-hover">
						<img src="img/gallery/author.jpg" alt="">
						<h6>Arthur Rose</h6>
					</div>
				</div>
				<div class="gallery-item gi-big animal">
					<a class="fresco" href="img/gallery/6.jpg" data-fresco-group="projects">
						<img src="img/gallery/6.jpg" alt="">
					</a>
					<div class="gi-hover">
						<img src="img/gallery/author.jpg" alt="">
						<h6>Arthur Rose</h6>
					</div>
				</div>
				<div class="gallery-item gi-big featured">
					<a class="fresco" href="img/gallery/5.jpg" data-fresco-group="projects">
						<img src="img/gallery/5.jpg" alt="">
					</a>
					<div class="gi-hover">
						<img src="img/gallery/author.jpg" alt="">
						<h6>Arthur Rose</h6>
					</div>
				</div>
				<div class="gallery-item travel">
					<a class="fresco" href="img/gallery/7.jpg" data-fresco-group="projects">
						<img src="img/gallery/7.jpg" alt="">
					</a>
					<div class="gi-hover">
						<img src="img/gallery/author.jpg" alt="">
						<h6>Arthur Rose</h6>
					</div>
				</div>
				<div class="gallery-item people">
					<a class="fresco" href="img/gallery/8.jpg" data-fresco-group="projects">
						<img src="img/gallery/8.jpg" alt="">
					</a>
					<div class="gi-hover">
						<img src="img/gallery/author.jpg" alt="">
						<h6>Arthur Rose</h6>
					</div>
				</div>
				<div class="gallery-item animal">
					<a class="fresco" href="img/gallery/9.jpg" data-fresco-group="projects">
						<img src="img/gallery/9.jpg" alt="">
					</a>
					<div class="gi-hover">
						<img src="img/gallery/author.jpg" alt="">
						<h6>Arthur Rose</h6>
					</div>
				</div>
				<div class="gallery-item gi-big travel">
					<a class="fresco" href="img/gallery/10.jpg" data-fresco-group="projects">
						<img src="img/gallery/10.jpg" alt="">
					</a>
					<div class="gi-hover">
						<img src="img/gallery/author.jpg" alt="">
						<h6>Arthur Rose</h6>
					</div>
				</div>
				<div class="gallery-item featured">
					<a class="fresco" href="img/gallery/11.jpg" data-fresco-group="projects">
						<img src="img/gallery/11.jpg" alt="">
					</a>
					<div class="gi-hover">
						<img src="img/gallery/author.jpg" alt="">
						<h6>Arthur Rose</h6>
					</div>
				</div>-->
			</div>
		</div>
	</section>
	<!-- Gallery Section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="../js/vendor/jquery-3.2.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/imagesloaded.pkgd.min.js"></script>
	<script src="../js/isotope.pkgd.min.js"></script>
	<script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/circle-progress.min.js"></script>
	<script src="../js/pana-accordion.js"></script>
	<script src="../js/fresco.min.js"></script>
	<script src="../js/main.js"></script>

	</body>
</html>
<?php include('../includes/disconnection.php');?>
