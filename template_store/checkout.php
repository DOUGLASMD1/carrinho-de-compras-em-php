<?php
	session_start();
	include_once 'head.html';
	include_once '../DataBase/conexao.php';
	include_once '../App/Controller/ClienteController.php';

	$user = new ClienteController();
	$result = $user->isLoggedIn();
	$conn = new Conexao();
	$conn = $conn->conexao();
	$stmt = $conn->prepare('SELECT * FROM estado');
	
	$stmt->execute();
	
	$resultado_estados = $stmt->fetchAll();
	$cpf = $_SESSION["user_cpf"];
	$stmt2 = $conn->prepare('
		SELECT produto.nome, produto.valor, produto.imagem, produto.idproduto, gerou.quantidade FROM produto 
		INNER JOIN
			(SELECT carrinho_has_produto.produto_idproduto, carrinho_has_produto.quantidade FROM carrinho_has_produto
				INNER JOIN produto ON carrinho_has_produto.produto_idproduto = produto.idproduto
				INNER JOIN carrinho ON carrinho_has_produto.carrinho_idcarrinho = carrinho.idcarrinho 
		        WHERE carrinho.cliente_cpf = "'.$cpf.'"
			GROUP BY carrinho_has_produto.produto_idproduto) as gerou 

		ON produto.idproduto = gerou.produto_idproduto
    	GROUP BY produto.nome;');

	$total = 0;
	$stmt2->execute();
	$resultado_carrinho = $stmt2->fetchAll();

	if($result == false){
		header('Location: login.php');
	}else if(!isset($_GET['proximo'])){
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
				   					<h1>Pagamento</h1>
				   					<h2 class="bread"><span><a href="index.php">Home</a></span> <span><a href="cart.php">Carrinho de compras</a></span> <span>Pagamento</span></h2>
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
				<form method="post" action="../App/Controller/insertFinalizado.php" class="colorlib-form">
				<div class="row">
					<div class="col-md-7">
						
							<h2>Endereço para entrega</h2>
			              	<div class="row">
				               <div class="col-md-12">
				                  <div class="form-group">
				                  	<label for="country">Estado</label>
				                    <div class="form-field">
				                     	<i class="icon icon-arrow-down3"></i>
				                     	<select class="form-control" name="id_estado" id="id_estado" required>
											<option value=""> Selecione...</option>
											 
												<?php foreach( $resultado_estados as $row ) { 
													echo '<option value="'.$row['Uf'].'">'.$row['Nome'].'</option>';
												} ?>

										</select>			                 
				                    </div>
				                </div>
				                  <div class="form-group">
				                  	<label for="id_cidade">Municipio</label>
				                     <div class="form-field">
				                     	<i class="icon icon-arrow-down3"></i>
				                     	<select class="form-control" name="id_cidade" id="id_cidade" required>
											<option value="#id_cidade">Selecione...</option>
										</select>			                 
				                     </div>

				                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
									<script type="text/javascript">
										$('#id_estado').change(function (){
											var valor = document.getElementById("id_estado").value;
											$.get("exibe_cidade.php?search=" + valor, function (data) {
												$("#id_cidade").find("option").remove();
												$('#id_cidade').append(data);
											});
										});
									</script>
				                  </div>
				               </div>
				            </div>
		            	
					</div>
					<div class="col-md-5">
						<div class="cart-detail">
							<h2>Total</h2>
							<ul>
								<?php 
									$count = 0;
									$total = 0;
									foreach( $resultado_carrinho as $row ) { 
										$count = $row[1]*$row[4];
										$total = $count + $total;
										echo '
										<li>
											<ul>
												<li><span>'.$row[4].' x '.$row[0].'</span> <span>R$ '.number_format($row[1]*$row[4],2,",",".").'</span></li>
											</ul>
										</li>';
									}
										echo '<li><span>Total</span> <span>R$ '.number_format($total,2,",",".").'</span></li>';
									?>
							</ul>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<p><input type="submit" style="background-color: green !important" class="btn btn-primary" value="Finalizar" name="enviar"></input></p>
								<p><a href="cart.php" class="btn btn-primary">Voltar para o carrinho </a></p>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
		</div>

		<?php
			include_once 'footer.html';
		?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	</body>
</html>

