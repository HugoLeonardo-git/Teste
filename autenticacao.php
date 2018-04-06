<?php
	session_start();
	$arquivo = "clientes.xml";
	
	if(file_exists($arquivo)){
		
		$xml = simplexml_load_file($arquivo);
		
		foreach($xml->cliente as $cliente){
			if($cliente->email == $_POST["email"] && $cliente->senha == $_POST["senha"]){
				$_SESSION['login'] = $cliente->nome;
				break;
			}
		}
	}
	header("location: index.php");
		

?>