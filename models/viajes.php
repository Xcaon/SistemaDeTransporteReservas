<?php


class Viajes{

    private $db;

	private $id;

    private $ocupantes;

    private $fecha; 

	private $max_ocupantes;
    
    public function __construct(){
        $this->db = Database::connect();
    }

    function getAll(){
        $consulta = $this->db->query("SELECT * FROM viajes");

        return $consulta;
    }

	function plazasDisponibles(){
		$id = $this->id;
		$sql = "Select * from viajes where id = '$id'";
		$resultado = $this->db->query($sql);

		if ( $resultado && $resultado->num_rows == 1){
			return $resultado;
		}
	}

	function sumarPasajero($id_usuario){
		$id = $this->id;

		$sql = "SELECT ocupantes FROM viajes WHERE id = '$id'";
		$resultado = $this->db->query($sql);

		// Guardamos el resulado
		if ( $resultado->num_rows > 0){
			$fila = $resultado->fetch_assoc();
		}

		$ocupantes_totales = $fila["ocupantes"] + 1;

		$sql = "UPDATE viajes SET ocupantes = '$ocupantes_totales'WHERE id = '$id'";
		$result_query = $this->db->query($sql);
		
		$result = false;
		if ( $result_query){
			$result = true;
			$sql = "INSERT INTO `linea_trayectos` (`fk_usuario`, `fk_trayecto`) VALUES (1,'$id')";
			$query = $this->db->query($sql);
			if ($query === false) {
				// Se produjo un error en la consulta
				echo "Error en la consulta: " . $this->db->error;
				var_dump($_SESSION['id_login']);
				die();
			}
		
		}

		return $result;
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
	public function getOcupantes() {
		return $this->ocupantes;
	}
	
	/**
	 * @param mixed $ocupantes 
	 * @return self
	 */
	public function setOcupantes($ocupantes): self {
		$this->ocupantes = $ocupantes;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getFecha() {
		return $this->fecha;
	}
	
	/**
	 * @param mixed $fecha 
	 * @return self
	 */
	public function setFecha($fecha): self {
		$this->fecha = $fecha;
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

	/**
	 * @return mixed
	 */
	public function getMax_ocupantes() {
		return $this->max_ocupantes;
	}
	
	/**
	 * @param mixed $max_ocupantes 
	 * @return self
	 */
	public function setMax_ocupantes($max_ocupantes): self {
		$this->max_ocupantes = $max_ocupantes;
		return $this;
	}
}

?>