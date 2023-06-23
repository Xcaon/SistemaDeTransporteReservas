<?php

require_once 'config/db.php';

class Usuario {

    private $db;

	private $id;

    private $nombre;

    private $password;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function login(){

		$nombre = $this->getNombre();
		$password = $this->getPassword();
        $sql = "SELECT * FROM usuario WHERE nombre = '$nombre' && password = '$password'"; 
		// En caso de error solo devuelve el false
        $resultado = $this->db->query($sql);

		$result = false;
		// Por eso hay que comprobar el numero de rows
		if ($resultado && $resultado->num_rows == 1){
			$result = true;
		}
	
		return $result;
    }

	public function getUserID(){
		$nombre = $this->nombre;
		$password = $this->password;
		$sql = "SELECT * FROM usuario WHERE nombre = '$nombre' AND password = '$password'";
		$resultado = $this->db->query($sql);

		Utils::mostrarError($resultado);
		
		return $resultado;

	}

	/**
	 * @return mixed
	 */
	public function getNombre() {
		return $this->nombre;
	}
	
	/**
	 * @param mixed  
	 * @return self
	 */
	public function setNombre($nombre): self {
		$this->nombre = $this->db->real_escape_string($nombre);
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}
	
	/**
	 * @param mixed $password 
	 * @return self
	 */
	public function setPassword($password): self {
		$this->password = $this->db->real_escape_string($password);
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDb() {
		return $this->db;
	}
	
	/**
	 * @param mixed $db 
	 * @return self
	 */
	public function setDb($db): self {
		$this->db = $db;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
}

?>
