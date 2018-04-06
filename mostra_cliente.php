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
				<br/>
			</form>
				
			<form action = "realiza_operacoes.php" method = "post">	
				<label>
					Fazer depósito
					<input type = "number" name = "deposito"/>
				</label>
				<br/>
			</form>
			
			<form action = "realiza_operacoes.php" method = "post">			
				<label>
					Tranferir
					<input type = "number" name = "tranferencia"/>
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
				<br/>
			
			</form>
			
<?php
		}

?>
</html>