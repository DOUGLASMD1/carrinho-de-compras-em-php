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
								<li class="active"><a href="index.php">Home</a></li>
								<li><a href="shop.php">Produtos</a></li>
								<li><a href="login.php"> Login/Cadastre-se </a></li>
								<li><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/img_bg_1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc"><br>
					   					<h1 class="head-1">Masculino</h1>
					   					<h2 class="head-2">Jeans</h2>
					   					<h2 class="head-3">Colecção</h2> <br>
					   					<p><a href="shop.php" class="btn btn-primary">Confira a coleção</a></p>
					   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc"><br>
					   					<h1 class="head-1">Feminino</h1>
					   					<h2 class="head-2">Venda</h2>
					   					<h2 class="head-3">45% desconto</h2><br>
					   					<p><a href="shop.php" class="btn btn-primary">Confira a coleção</a></p>
					   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Novo</h1>
					   					<h2 class="head-2">Coleção Abril</h2>
					   					<h2 class="head-3">com 30% <br> de desconto</h2>
					   					<p><a href="shop.php" class="btn btn-primary">Confira a coleção</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<?php
			include_once("footer.php");
		?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	</body>
</html>
