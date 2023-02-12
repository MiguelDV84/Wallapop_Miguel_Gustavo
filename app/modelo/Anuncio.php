<?php

class Anuncio {
    private $id;
    private $precio;
    private $titulo;
    private $descripcion;
    private $fecha;
    private $imagen;
    private $id_usuario;
        
    
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
	public function getPrecio() {
		return $this->precio;
	}
	
	/**
	 * @param mixed $precio 
	 * @return self
	 */
	public function setPrecio($precio): self {
		$this->precio = $precio;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTitulo() {
		return $this->titulo;
	}
	
	/**
	 * @param mixed $titulo 
	 * @return self
	 */
	public function setTitulo($titulo): self {
		$this->titulo = $titulo;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDescripcion() {
		return $this->descripcion;
	}
	
	/**
	 * @param mixed $descripcion 
	 * @return self
	 */
	public function setDescripcion($descripcion): self {
		$this->descripcion = $descripcion;
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
	public function getId_usuario() {
		return $this->id_usuario;
	}
	
	/**
	 * @param mixed $id_usuario 
	 * @return self
	 */
	public function setId_usuario($id_usuario): self {
		$this->id_usuario = $id_usuario;
		return $this;
	}
        
        public function getImagen() {
            return $this->imagen;
        }

        public function setImagen($imagen): void {
            $this->imagen = $imagen;
        }


}

?>