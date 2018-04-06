<?php
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
					}else{
						$cliente->saldo -=$_POST["saque"];
					}
				}
			}
		}
		
		$cliente->saldo -= $_POST["saque"];
				$xml->asXML($arquivo);
	}
	else if(isset($_POST["deposito"])){
		$cliente->saldo += $_POST["deposito"];
				$xml->asXML($arquivo);
	}
	else if(isset($_POST["transferencia"])){
		foreach($xml->cliente as $cliente){
			if(str_replace(" ","",$cliente->nome)==str_replace(" ","",$_POST["recebedor"])){
				$cliente->saldo += $_POST["transferencia"];
				$xml->asXML($arquivo);
				break;
			}
		}
	}
	else{
		header("location: index.php");
	}
	
	header("location: mostra_cliente.php")
?>