<?php
session_start();
if($mensagem == 1){
	$msg = 'O Registro foi inserido/alterado com sucesso!';
}else{
	$msg = 'Um erro aconteceu, tente novamente mais tarde.';
}	
$_SESSION['msg'] = $msg;


header('Location: '.site_url().'equipe');