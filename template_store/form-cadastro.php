
		<form method="POST" class="colorlib-form" action="../App/Controller/emailExists.php"style="background-color: #808080;">
			<h2>Cadastre-se</h2>
		       	<div class="row">
			        <div class="col-md-12">
			            <div class="form-group">
							<div class="col-md-6">
								<label for="Nome">Nome</label>
								<input type="text" pattern="[A-Za-z-0-9., -]{4,255}$" name="Nome" id="Nome" class="form-control" placeholder="Ex: João" oninvalid="setCustomValidity('Por favor, insira pelo menos 7 letras!')">
							</div>
							<div class="col-md-6">
								<label for="dataNascimento"> Data de Nascimento </label>
								<input type="Date" name="dataNascimento" id="dataNascimento" class="form-control" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="1970-01-01" max="2000-01-01" placeholder="Digite sua data de nascimento">
							</div>
							<div class="col-md-6">
								<label for="cpf"> CPF </label>
								<input type="text"  pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
      title="Digite o CPF no formato 000.000.000-00" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="email">Email</label>
								<input type="email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" id="email" name="email" class="form-control" placeholder="Digite seu email">
							</div>
							<div class="col-md-6">
								<label for="senha">Senha</label>
								<input type="password" pattern="^.{6,15}$" id="senha" name="senha" class="form-control" title="Senha com no minímo 6 caracteres de letras e números" placeholder="Senha com no minímo 6 caracteres de letras e números">
							</div>
						</div>
						<div class="form-group">
							<div align="center">
								<label> <a href="login.php"> Login </a> </label> <br>
								<button type="submit" name="cadastrar" class="btn btn-primary">
   									Cadastrar
   								</button>

							</div>
						</div>
   					</div>
   				</div>
		</form>