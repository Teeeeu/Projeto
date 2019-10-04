<?php

class QuestoesDAO{
	public $questao;
	public $tipo;

	private $con;

	function __construct(){
		$this->con = mysqli_connect("localhost", "root","etecia","projetopw");
}
public function inserir(){
		
		$sql = "INSERT INTO questoes VALUES (0, '$this->questao', '$this->tipo')";
		$rs = $this->con ->query($sql);
		if ($rs) 
			header ("Location: Questoes.php");
		else
		    echo $this->con->error;
	}
		public function buscar(){
		$sql = " SELECT * FROM questoes ";
		$rs = $this->con->query($sql);
		$listaDeQuestoes =  array();

		while ($linha = $rs->fetch_object()){
			
			$listaDeQuestoes[] = $linha;
		}
		return $listaDeQuestoes;
}

}
?>
