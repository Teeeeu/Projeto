<?php

include "QuestoesDAO.php";

$acao = $_GET["acao"];

switch ($acao) {
	case 'inserir':
		$usuario = new QuestoesDAO();
		
		$usuario->enunciado = $_POST["Enunciado"];
		$usuario->tipo = $_POST["Tipo"];
		
		$usuario -> inserir();
		break;
	}



		?>