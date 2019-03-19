<!DOCTYPE HTML>
<html>
	<head>
		<?php
			include_once("head.html")
		?>
	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.php">Use New Mic</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="shop.php">Produtos</a></li>
								<li class="active"><a href="login.php"> Login/Cadastre-se </a></li>
								<li><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

			<div class="row">
				<div class="container" style="width: 50%">
					<?php
						include_once "form-cadastro.php";
					?>
				</div>
			</div>

		</div>

		<footer id="colorlib-footer" role="contentinfo">

			<div class="copy">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							<span class="block">
								Copyright &copy;
								<script>document.write(new Date().getFullYear());</script> 
								Todos os direitos reservados bla bla bla by 
								<a href="#" target="_blank">Grupo A</a>
							</span> 
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	</body>
</html>

