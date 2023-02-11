<?php 
class Usuario {
    private $id;
    private $email;
    private $password;
    private $nombre;
    private $telefono;
    private $poblacion;
    private $foto;
    private $uid;


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
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param mixed $email 
	 * @return self
	 */
	public function setEmail($email): self {
		$this->email = $email;
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
		$this->password = $password;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNombre() {
		return $this->nombre;
	}
	
	/**
	 * @param mixed $nombre 
	 * @return self
	 */
	public function setNombre($nombre): self {
		$this->nombre = $nombre;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTelefono() {
		return $this->telefono;
	}
	
	/**
	 * @param mixed $telefono 
	 * @return self
	 */
	public function setTelefono($telefono): self {
		$this->telefono = $telefono;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPoblacion() {
		return $this->poblacion;
	}
	
	/**
	 * @param mixed $poblacion 
	 * @return self
	 */
	public function setPoblacion($poblacion): self {
		$this->poblacion = $poblacion;
		return $this;
	}
        
        public function getUid() {
            return $this->uid;
        }

        public function setUid($uid): void {
            $this->uid = $uid;
        }
        
        public function getFoto() {
            return $this->foto;
        }

        public function setFoto($foto): void {
            $this->foto = $foto;
        }



}


?>