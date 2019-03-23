<?php
	session_start();

	include_once 'head.html';
	include_once '../App/Controller/ListController.php';
	include_once '../App/Controller/ClienteController.php';

	$user = new ClienteController();
	$result = $user->isLoggedIn();

	if($result == false){
		header('Location: login.php');
	}
	
?>

<!DOCTYPE HTML>
<html>
	<body>

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
										echo '<li class="active"><a href="list.php"> Seus Produtos </a></li>';

										echo '
											<li><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>
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
			   	<li style="background-image: url(images/11.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Seus Produtos</h1>
				   					<h2 class="bread"><span><a href="index.php">Home</a></span> <span>Seus Produtos</span></h2>
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
						</div>
						<?php
							$pCarrinho = ListController::selectList();
							foreach($pCarrinho as $produto) {
								echo '<div class="product-cart">
								<div class="one-forth">
									<div class="product-img" style="background-image: url(images/'.$produto[2].'.jpg);">
									</div>
									<div class="display-tc">
										<h3>'.$produto[0].'</h3>
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
										<span class="price">R$ '.number_format($produto[1],2,",",".").'</span>
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
										<span class="price">'.$produto[3].'</span>
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
										<span class="price">R$ '.number_format($produto[3]*$produto[1],2,",",".").'</span>
									</div>
								</div>
							</div>';  

							}
						?>
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

