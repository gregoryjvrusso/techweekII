<?php 

class Palestra {
	private $id;
	private $nome;
	private $local;
	private $data;
	private $horario;
	private $limiteVagas;

	public function getId(){
  		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getLocal(){
		return $this->local;
	}

	public function setLocal($local){
		$this->local = $local;
	}

	public function getData(){
		$aux1 = explode("-", $this->data);
		$dataD = $aux1[2]; 
		$dataM = $aux1[1]; 

		return $dataD . "/" . $dataM;
	}

	public function getDataBanco(){
		return $this->data;
	}
	
	public function setData($data){
		$aux2 = explode ("/", $data);
		$data = $aux2[2] . "-". $aux2[1] . "-" . $aux2[0];

		$this->data = $data;
	}

	public function setDataBanco($data){
		$this->data = $data;
	}

	public function getHorario(){
		return $this->horario;
	}

	public function setHorario($horario){
		$this->horario = $horario;
	}

	public function getLimiteVagas(){
		return $this->limiteVagas;
	}

	public function setLimiteVagas($limiteVagas){
		$this->limiteVagas = $limiteVagas;
	}
}