<?php
	require_once 'head.html';
	include_once '../App/Controller/ProdutoController.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
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
								<li class="active"><a href="shop.php">Produtos</a></li>
								<li><a href="login.php"> Login/Cadastre-se </a></li>
								<li><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/5.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Produtos</h1>
				   					<h2 class="bread"><span><a href="index.html">Home</a></span> <span>Produtos</span></h2>
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
				<div class="row">
					<div class="col-md-10 col-md-push-2">
						<div class="row row-pb-lg">
						<?php
							$produtos = ProdutoController::allProdutos();
							foreach ($produtos as $produto) {
								echo 
							'<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/'.$produto[4].'.jpg'.');"
										<p class="tag"><span class="new"></span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
												<!--<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>--> 
												<!--<span><a href="#"><i class="icon-heart3"></i></a></span>-->
												<!--<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>-->
											</p>
										</div>
									</div>
									<div class="desc">
										<h3>'.$produto[1].'</h3>
										<p class="price"><span>'.round($produto[3],2).'</span></p>
									</div>
								</div>
							</div>';	
							}
						?>	
						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
									<li class="disabled"><a href="#">&laquo;</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">&raquo;</a></li>
								</ul>
							</div>
						</div>
					</div>
					
			</div>
		</div>

		<?php
			include_once("footer.html");
		?>
	</div>


	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	</body>
</html>

