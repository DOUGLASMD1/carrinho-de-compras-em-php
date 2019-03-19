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
			require_once("head.html")
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
								<?php
									if ($result == true) {

										echo '
											<li class="active"><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>
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
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Carrinho de compras</h1>
				   					<h2 class="bread"><span><a href="index.php">Home</a></span> <span><a href="shop.php">Produto</a></span> <span>Carrinho de compras</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Carrinho de compras</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3> Pagamento </h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Finalizado</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-name">
							<div class="one-forth text-center">
								<span>Detalhes dos produtos</span>
							</div>
							<div class="one-eight text-center">
								<span>Preço</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantidade</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
							<div class="one-eight text-center">
								<span>Remover</span>
							</div>
						</div>
						<div class="product-cart">
							<div class="one-forth">
								<div class="product-img" style="background-image: url(images/item-7.jpg);">
								</div>
								<div class="display-tc">
									<h3>Nome do produto</h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$68.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<form action="#">
										<input type="text" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
									</form>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$120.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="#" class="closed"></a>
								</div>
							</div>
						</div>
						<div class="product-cart">
							<div class="one-forth">
								<div class="product-img" style="background-image: url(images/item-8.jpg);">
								</div>
								<div class="display-tc">
									<h3>Nome do produto</h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$68.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$120.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="#" class="closed"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="total-wrap">
							<div class="row">
								<div class="col-md-8">
									<form action="#">
										<div class="row form-group">
										</div>
									</form>
								</div>
								<div class="col-md-3 col-md-push-1 text-center">
									<div class="total">
										<div class="sub">
											<p><span>Subtotal:</span> <span>$200.00</span></p>
											<p><span>Desconto:</span> <span>$45.00</span></p>
										</div>
										<div class="grand-total">
											<p><span><strong>Total:</strong></span> <span>$450.00</span></p>
										</div>
									</div>

									<p><a href="checkout.php" class="btn btn-primary"> Proximo </a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		</div>

		<?php
			require_once("footer.html")
		?>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	</body>
</html>

