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
								<li><a href="login.php"> Login/Cadastre-se </a></li>
								<li class="active"><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Pagamento</h1>
				   					<h2 class="bread"><span><a href="index.html">Home</a></span> <span><a href="cart.html">Carrinho de compras</a></span> <span>Pagamento</span></h2>
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
								<h3>Carrinho de Compras</h3>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3>Pagamento</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Finalizado</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
						
					</div>
					<div class="col-md-5">
						<div class="cart-detail">
							<h2>Total</h2>
							<ul>
								<li>
									<span>Subtotal</span> <span>$100.00</span>
									<ul>
										<li><span>1 x Nome Produto</span> <span>$99.00</span></li>
										<li><span>1 x Nome Produto</span> <span>$78.00</span></li>
									</ul>
								</li>
								<li><span>Desconto</span> <span>$0.00</span></li>
								<li><span>Completo</span> <span>$180.00</span></li>
							</ul>
						</div>
						<div class="cart-detail">
							<h2>Metodo de Pagamento</h2>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" name="optradio">Direto site banco</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" name="optradio">Boleto Pagamento</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" name="optradio">Cartao de Credito Paypal</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
									   <label><input type="checkbox" value="">Li e aceito os termos e condições</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p><a href="order-complete.php" class="btn btn-primary">Finalizar</a></p>
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
