<html>
	<body>
		<h2>Cadastre um novo cliente</h2>
		<form action = "registra_cadastro.php" method = "post">
			<label>
				Nome:
			<input type = "text" name = "nome">
			</label><br />
			<label>
				Email:
			<input type = "email" name = "email">
			</label><br />
			<label>
				Senha:
			<input type = "password" name = "senha">
			</label><br />
			<label>
				CPF:
			<input type = "number" name = "cpf">	
			</label><br />
			<input type = "submit" value = "Cadastrar">
		</form>
	</body>
</html>