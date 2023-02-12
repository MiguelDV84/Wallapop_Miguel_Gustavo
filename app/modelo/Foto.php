<?php

class Foto {

    private $id;
    private $id_anuncio;
    private $foto;
    private $principal;

   

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
    public function getId_anuncio() {
        return $this->id_anuncio;
    }

    /**
     * @param mixed $id_anuncio 
     * @return self
     */
    public function setId_anuncio($id_anuncio): self {
        $this->id_anuncio = $id_anuncio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFoto() {
        return $this->foto;
    }

    /**
     * @param mixed $foto 
     * @return self
     */
    public function setFoto($foto): self {
        $this->foto = $foto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrincipal() {
        return $this->principal;
    }

    /**
     * @param mixed $principal 
     * @return self
     */
    public function setPrincipal($principal): self {
        $this->principal = $principal;
        return $this;
    }

}

?>