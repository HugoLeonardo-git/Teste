<?php
	include("cabecalho.php");
	var_dump($_SESSION["login"]);
	if(!isset($_SESSION["login"])){
?>

		<form action = "autenticacao.php" method = "post" >
		
			<label>
				Email:
			<input type = "text" name = "email" />
			</label><br />
			<label>
				Senha:
			<input type = "password" name = "senha" />
			</label><br />
			<label>
			<input type = "submit" value = "Logar!" />
			</label><br />
			<p>Não possui conta? <a href = "cadastro.php">Cadastre-se</a></p>
		
		</form>

<?php
	}else{
		header("location: mostra_cliente.php");
	}

?>