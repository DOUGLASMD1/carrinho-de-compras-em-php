<?php
	session_start();
	include_once 'head.html';
	include_once '../App/Controller/ClienteController.php';

	$user = new ClienteController();

	$result = $user->isLoggedIn();

?>

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
								<?php
									if ($result == true) {
										echo '<li><a href="list.php"> Seus Produtos </a></li>';

										echo '<li><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>
											<li><a href="../App/Controller/logout.php"> Sair </a></li>';
									}else{
										echo '<li><a href="login.php"> Login/Cadastre-se </a></li>';
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
				   	<li style="background-image: url(images/6.jpg);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
					   				<div class="slider-text-inner">
					   					<div class="desc"><br>
						   					<h1 class="head-1" style="font-size: 35px">Masculino</h1>
						   					<h2 class="head-2">Jeans</h2>
						   					<h2 class="head-3" style="font-size: 20px">Colecção</h2> <br>
						   					<p><a href="shop.php" class="btn btn-primary">Confira a coleção</a></p>
						   					</div>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				   	<li style="background-image: url(images/7.jpg);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
					   				<div class="slider-text-inner">
					   					<div class="desc"><br>
						   					<h1 class="head-1" style="font-size: 35px">Feminino</h1>
						   					<h2 class="head-2">Venda</h2>
						   					<h2 class="head-3" style="font-size: 20px">45% desconto</h2><br>
						   					<p><a href="shop.php" class="btn btn-primary">Confira a coleção</a></p>
						   					</div>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				   	<li style="background-image: url(images/8.jpg);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
					   				<div class="slider-text-inner">
					   					<div class="desc">
						   					<h1 class="head-1" style="font-size: 35px">Novo</h1>
						   					<h2 class="head-2">Coleção <br>Abril</h2>
						   					<h2 class="head-3" style="font-size: 20px">com 30% <br> de desconto</h2>
						   					<p><a href="shop.php" class="btn btn-primary">Confira a coleção</a></p>
					   					</div>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
			  	</ul>
		  	</div>
		  	
			<?php
				include_once("footer.html")
			?>
		</aside>
	</div>

	</body>
</html>

