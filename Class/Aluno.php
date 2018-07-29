<?php 
require_once("banco-presenca.php");

class Aluno {

	private $id;
	private $nome_aluno;
	private $email;
	private $faculdade;
	private $sala;
	private $outras;
	private $cpf;

	public function getId(){
  		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNomeAluno(){
		return $this->nome_aluno;
	}

	public function getPrimeiroNome(){
		$nome = explode(" ", $this->nome_aluno);
		return $nome[0];
	}

	public function setNomeAluno($nome){
		$this->nome_aluno = $nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getFaculdade(){
		return $this->faculdade;
	}

	public function setFaculdade($faculdade){
		$this->faculdade = $faculdade;
	}

	public function getSala(){
		return $this->sala;
	}

	public function setSala($sala){
		$this->sala = $sala;
	}

	public function getOutras(){
		return $this->outras;
	}

	public function setOutras($outras){
		$this->outras = $outras;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	function buscarPalestrasAlterar($idPalestra){
		var_dump($this->$id);
		var_dump($conexao);
		var_dump($idPalestra);
		$presencas = listaPresencaAluno($conexao, $this->id);
		$autenticador = false;
		foreach($presencas as $presenca){
		var_dump($presenca);
		if($presenca->getIdPalestra() == $idPalestra)
			$autenticador = true;
		}
		var_dump($autenticador);die;
		if($autenticador)
			return "checked";
		else
			return null;
		}
}