		
		<?php
			include_once '../DataBase/conexao.php';
			include_once '../App/Controller/ClienteController.php';

			$user = new ClienteController();

			if (isset($_POST['enviar'])) {
				$email = trim($_POST['email']);
				$senha = trim(md5($_POST['senha']));
				if ($user->login($email, $senha)) {
					header('Location: shop.php');
					exit;
				}else{
					echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL= login.php'>
							<script type=\"text/javascript\">
								alert(\"Senha ou email incorretos!\");
							</script>
						";
				}
			}
		?>


		<form align="center" method="POST" class="colorlib-form" action="" style="background-color: #808080;">
			<h2>Login</h2>
		       	<div class="row">
			        <div class="col-md-12">
						<div class="form-group">
							<div align="left" class="col-md-12">
								<label for="email">Email</label>
								<input type="text" id="email" name="email" class="form-control" placeholder="Digite seu email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" required>
							</div>	
							
							<div align="left" class="col-md-12">
								<label for="senha">Senha</label>
								<input type="password" id="senha" name="senha" class="form-control" placeholder="Digite sua senha" required>
							</div>
						</div> <br>

						<div class="form-group">
							<div align="center">
								<div>
								<br>
									<label> <a href="cadastro.php"> Cadastre-se </a> </label>
								</div>
								<input class="btn btn-primary" type="submit" name="enviar">
							</div>
						</div>
   					</div>
   				</div>
		</form>