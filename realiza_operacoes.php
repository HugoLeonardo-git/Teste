<html>
	<head>
		<title>Index</title>
		<meta charset = "UTF-8" />
	</head>
</html>
<?php
	session_start();
	
	$arquivo = "clientes.xml";

	$xml = simplexml_load_file($arquivo);

	if(isset($_POST["saque"])){
			foreach($xml->cliente as $cliente){
				if(str_replace(" ","",$cliente->nome)==str_replace(" ","",$_SESSION["login"])){
					$valor_retirado = $_POST["saque"];
					$saldo = $cliente->saldo;
					$total = $saldo-$valor_retirado;
					if($total<0){
						echo "Não foi possível realizar a Operação. Saldo menor que 0.";
						echo '<a href = "mostra_cliente.php">Voltar</a>';
						die();
					}else{
						(int)$cliente->saldo -= (int)$_POST["saque"];
						$xml->asXML($arquivo);
					}
				}
			}
	
				
	}
	else if(isset($_POST["deposito"])){
		foreach($xml->cliente as $cliente){
			if(str_replace(" ","",$cliente->nome) == str_replace(" ","",$_SESSION["login"])){
				(int)$cliente->saldo += (int)$_POST["deposito"];
				break;
			}
		}
		$xml->asXML($arquivo);
	}
	else if(isset($_POST["transferencia"])){
		foreach($xml->cliente as $cliente){
			if(str_replace(" ","",$cliente->nome) == str_replace(" ","",$_POST["recebedor"])){
				(int)$cliente->saldo += (int)$_POST["transferencia"];
			}
			if(str_replace(" ","",$cliente->nome) == str_replace(" ","",$_SESSION["login"])){
				(int)$cliente->saldo -= (int)$_POST["transferencia"];
			}
			
		}
		$xml->asXML($arquivo);
	}
	else{
		header("location: index.php");
	}
	
	header("location: mostra_cliente.php");
?>