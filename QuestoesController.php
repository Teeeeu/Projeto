<?php

include "QuestoesDAO.php";

$acao = $_GET["acao"];

switch ($acao) {
	case 'inserir':
		$questao = new QuestoesDAO();
		
		$questao->Enunciado = $_POST["Enunciado"];
		$questao->Tipo = $_POST["Tipo"];
		
		$questao -> inserir();
		break;
	}



		?>