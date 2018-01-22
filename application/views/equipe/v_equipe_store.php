<?php
session_start();

$_SESSION['msg'] = $mensagem;
$_SESSION['msgid'] = $msgid;

header('Location: '.site_url().'equipe');