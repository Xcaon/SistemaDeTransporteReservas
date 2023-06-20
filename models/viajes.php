<?php


class Viajes{

    private $db;

    private $ocupantes;

    private $fecha; 
    
    public function __construct(){
        $this->db = Database::connect();
    }

    function getAll(){
        $consulta = $this->db->query("SELECT * FROM viajes");

        return $consulta;
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
}

?>