<?php
	include("cabecalho.php");
	
	$arquivo = "clientes.xml";

	
	if(file_exists($arquivo)){
		
		$xml = simplexml_load_file($arquivo);
		
		foreach($xml->cliente as $cliente){
			if(str_replace(" ","",$cliente->nome) == str_replace(" ","",$_SESSION['login'])){
				
				echo"Nome :" . $cliente->nome . "<br/>";
				
				echo"Email :" . $cliente->email . "<br/>";
				
				echo"CPF :" . $cliente->cpf . "<br/>";
				
				echo"Saldo :" . $cliente->saldo . "<br/>";
				
				break;
				
			}
		}
	?>
			
			<form action = "realiza_operacoes.php" method = "post">
			
				<label>
					Fazer saque
					<input type = "number" name = "saque"/>
				</label>
				
				<input type = "submit" name="ok" value = "ok"/>
			</form>
				
			<form action = "realiza_operacoes.php" method = "post">	
				<label>
					Fazer depósito
					<input type = "number" name = "deposito"/>
				</label>
				
				<input type = "submit" name="ok" value = "ok"/>
				
			</form>
			
			<form action = "realiza_operacoes.php" method = "post">			
				<label>
					Tranferir
					<input type = "number" name = "transferencia"/>
					Para
					<select name = "recebedor">
					
						<?php
						
							foreach($xml->cliente as $cliente){ ?>
								
								<option><?=$cliente->nome;?>
								
						<?php
							}
						?>
					
					</select>
				</label>
				
				<input type = "submit" name="ok" value = "ok"/>
			
			</form>
			<br />
		<a href="sair.php">Sair</a>
<?php

		}

?>
</html>