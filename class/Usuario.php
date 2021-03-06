<?php

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario() {
		return $this->idusuario;
	}

	public function setIdusuario($idusuario) {
		$this->idusuario = $idusuario;
	}

	public function getDeslogin() {
		return $this->deslogin;
	}

	public function setDeslogin($deslogin) {
		$this->deslogin = $deslogin;
	}
	
	public function getDessenha() {
		return $this->dessenha;
	}

	public function setDessenha($dessenha) {
		$this->dessenha = $dessenha;
	}
	
	public function getDtcadastro() {
		return $this->dtcadastro;
	}

	public function setDtcadastro($dtcadastro) {
		$this->dtcadastro = $dtcadastro;
	}
	
	public function loadById($id) {

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array("ID"=>$id));

		if (count($results) > 0) {

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

		}

	}

	public static function getList() {

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
	}

	public static function search($login) {

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin;", array(':SEARCH'=>"%".$login."%"));
	}

	public function login($login, $password) {

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(':LOGIN'=>$login, ':PASSWORD'=>$password));

		if (count($results) > 0) {

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

		} else {
			echo "Usuário ou Senha inválido!";
		}

	}

	public function __toString() {

		return json_encode(array(
			"id do usuario"=>$this->getIdusuario(),
			"login"=>$this->getDeslogin(),
			"senha"=>$this->getDessenha(),
			"data de cadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

		));
	}
}
?>