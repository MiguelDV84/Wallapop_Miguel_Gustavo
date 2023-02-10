<?php

class AnuncioDAO{
    private $conn;

    public function __construct($conn) {
        if (!$conn instanceof mysqli) { //Comprueba si $conn es un objeto de la clase mysqli
            return false;
        }
        $this->conn = $conn;
    }

    public function getAnuncios(){
        $query = "SELECT * FROM anuncios ORDER BY fecha DESC";
        if(!$result = $this->conn->query($query)){
            die("Error al ejecutar la QUERY" . $this->conn->error);
        }
        $array_anuncios = array();
        while($anuncio = $result->fetch_object('Anuncio')){
            $array_anuncios[] = $anuncio;
        }
        return $array_anuncios;
    }

    public function getAnunciosIdUsuario($idUser){
        $query = "SELECT * FROM anuncios WHERE id_usuario = ?";
        if(!$stmt =  $this->conn->prepare($query)){
            die("Error al ejecutar la QUERY" . $this->conn->error);
        }

        $stmt->bind_param('i', $idUser);
        $stmt->execute();

        $result = $stmt->get_result();
        $anuncio = $result->fetch_object('Anuncio');

        return $anuncio;

    }
    
    public function getAnunciosIdAnuncio($idAnuncio){
        $query = "SELECT * FROM anuncios WHERE id = ?";
        if(!$stmt =  $this->conn->prepare($query)){
            die("Error al ejecutar la QUERY" . $this->conn->error);
        }

        $stmt->bind_param('i', $idAnuncio);
        $stmt->execute();

        $result = $stmt->get_result();
        $anuncio = $result->fetch_object('Anuncio');

        return $anuncio;

    }
    
    
    public function getImagenesAnuncios($idAnuncio){
        $query = "SELECT * FROM anuncios WHERE id_anuncio = ?";
        if(!$stmt =  $this->conn->prepare($query)){
            die("Error al ejecutar la QUERY" . $this->conn->error);
        }

        $stmt->bind_param('i', $idAnuncio);
        $stmt->execute();

        $result = $stmt->get_result();
        $anuncio = $result->fetch_object('Anuncio');

        return $anuncio;
    }
}
