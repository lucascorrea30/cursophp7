<?php 

class Usuario {

	// Atributos
	private $id_usuario;
	private $login;
	private $senha;
	private $data_criacao;

	// Construtor
	// public function __construct() {

	// }
	public function __construct($login="", $senha="") {
		$this->setLogin($login);
		$this->setSenha($senha);
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
			$this->setData($results[0]);
		}

	}

	public function login($login, $senha) {

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM `tb_usuario` WHERE `login` = :LOGIN AND `senha` = :SENHA", array(
			':LOGIN' => $login,
			':SENHA' => $senha
			));

		if ( count($results) > 0 ) {
			$this->setData($results[0]);
		} else {
			throw new Exception("Login e/ou Senha inválidos!", 1);
		}

	}

	private function setData($data) {
		$this->setIdUsuario($data['id_usuario']);
		$this->setLogin($data['login']);
		$this->setSenha($data['senha']);
		$this->setDataCriacao(new DateTime($data['data_cadastro']));
	}

	public static function getList() {

		$sql = new Sql();
		return $sql->select("SELECT * FROM `tb_usuario` ORDER BY `login`");

	}

	public static function search($login) {

		$sql = new Sql();
		return $sql->select("SELECT * FROM `tb_usuario` WHERE `login` LIKE :SEARCH ORDER BY `login`", array(
			':SEARCH' => "%". $login ."%"
			));

	}

	public function insert() {

		$sql = new Sql();

		$results = $sql->select("CALL sp_usuario_insert(:LOGIN, :SENHA)", array(
			':LOGIN' => $this->getLogin(),
			':SENHA' => $this->getSenha()
			));

		if ( count($results) > 0 ) {
			$this->setData($results[0]);
		} else {
			throw new Exception("Login e/ou Senha inválidos!", 1);
		}

	}

	public function update($login, $senha) {

		$this->setLogin($login);
		$this->setSenha($senha);

		$sql = new Sql();

		$sql->select("UPDATE `tb_usuario` SET `login` = :LOGIN, `senha` = :SENHA WHERE `id_usuario` = :ID", array(
			':LOGIN' => $this->getLogin(),
			':SENHA' => $this->getSenha(),
			':ID' => $this->getIdUsuario()
			));

	}

	// Metodos Magicos
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