<?php 

class Presenca {
	private $id;
	private $idAluno;
	private $idPalestra;
	private $presenca;

	public function getId(){
  		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getIdAluno(){
		return $this->idAluno;
	}

	public function setIdAluno($idAluno){
		$this->idAluno = intval($idAluno);
	}

	public function getIdPalestra(){
		return $this->idPalestra;
	}

	public function setIdPalestra($idPalestra){
		$this->idPalestra = intval($idPalestra);
	}

	public function getPresenca(){
		return $this->presenca;
	}

	public function setPresenca($presenca){
		$this->presenca = intval($presenca);
	}
}