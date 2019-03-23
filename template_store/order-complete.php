<?php
	session_start();
	include_once 'head.html';
	include_once '../DataBase/conexao.php';
	include_once '../App/Controller/ClienteController.php';

	$user = new ClienteController();
	$conn = new Conexao();
	$conn = $conn->conexao();

	$result = $user->isLoggedIn();

	$stmt4 = $conn->prepare('
		SELECT * FROM carrinho_has_produto;');
	$stmt4->execute();
	$count = 0;
	$count = $stmt4->rowCount();

	if($result == false){
		header('Location: login.php');
	}
	else if(!isset($_GET['enviar'])){
		header('Location: cart.php');
	}
?>

<!DOCTYPE HTML>
<html>

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
										echo '<li><a href="list.php"> Seus Produtos </a></li>';
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
				   					<h1>Finalizado</h1>
				   					<h2 class="bread"><span><a href="index.php">Home</a></span> <span><a href="cart.php">Carrinho de Compras</a></span> <span>Pagamento</span></h2>
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
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Carrinho de Compas</h3>
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
					<div class="col-md-10 col-md-offset-1 text-center">
						<span class="icon"><i class="icon-shopping-cart"></i></span>
						<h2>Obrigado por comprar, seu pedido está finalizado</h2>
						<p>
							<a href="index.php"class="btn btn-primary">Home</a>
							<a href="shop.php"class="btn btn-primary btn-outline">Continue comprando</a>
						</p>
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

