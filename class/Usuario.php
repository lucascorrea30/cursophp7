<?php 

class Usuario {

	// Atributos
	private $id_usuario;
	private $login;
	private $senha;
	private $data_criacao;

	// Construtor
	public function __construct() {

	}

	// GETs e SETs
	// ID Usuario
	public function getIdUsuario():int
	{
		return $this->id_usuario;
	}
	public function setIdUsuario($id_usuario)
	{
		$this->id_usuario = $id_usuario;
	}
	// Login
	public function getLogin():string
	{
		return $this->login;
	}
	public function setLogin($login)
	{
		$this->login = $login;
	}
	// Senha
	public function getSenha():string
	{
		return $this->senha;
	}
	public function setSenha($senha)
	{
		$this->senha = $senha;
	}
	// Data Criacao
	public function getDataCriacao()
	{
		return $this->data_criacao;
	}
	public function setDataCriacao($data_criacao)
	{
		$this->data_criacao = $data_criacao;
	}


	// Metodos
	public function loadById($id) {

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM `tb_usuario` WHERE `id_usuario` = :ID", array(
			':ID' => $id
			));

		if ( count($results) > 0 ) {
			$row = $results[0];

			$this->setIdUsuario($row['id_usuario']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDataCriacao(new DateTime($row['data_cadastro']));
		}

	}

	public function __toString() {
		return json_encode(array(
			'id_usuario' => $this->getIdUsuario(),
			'login' => $this->getLogin(),
			'senha' => $this->getSenha(),
			'data_criacao' => $this->getDataCriacao()->format("d/m/Y H:i:s")
			));
	}

} // Fim da Class

 ?>