
<?php
	session_start();
	include_once 'head.html';
	include_once '../App/Controller/ClienteController.php';

	$user = new ClienteController();

	$result = $user->isLoggedIn();
	if($result){
		header('Location: shop.php');
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
								<li class="active"><a href="login.php"> Login/Cadastre-se </a></li>
								<?php
									if ($result == true) {
										echo '<li><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>';
									}
								?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

			<div class="row">
				<div class="container" style="width: 30%">
					<?php
						include_once("form-login.php")
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

	<?php
		include_once 'footer.html'
	?>
	
	</body>
</html>

