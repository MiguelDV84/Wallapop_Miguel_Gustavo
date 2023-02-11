<?php

class AnuncioDAO {

    private $conn;

    public function __construct($conn) {
        if (!$conn instanceof mysqli) { //Comprueba si $conn es un objeto de la clase mysqli
            return false;
        }
        $this->conn = $conn;
    }

    public function getAnuncios() {
        $query = "SELECT * FROM anuncios ORDER BY fecha DESC";
        if (!$result = $this->conn->query($query)) {
            die("Error al ejecutar la QUERY" . $this->conn->error);
        }
        $array_anuncios = array();
        while ($anuncio = $result->fetch_object('Anuncio')) {
            $array_anuncios[] = $anuncio;
        }
        return $array_anuncios;
    }

    public function getImagenesAnuncios($idAnuncio) {
        $sql = "SELECT * FROM fotografias WHERE id_anuncio = ?";
        if (!$stmt = $this->conn->prepare($sql)) {
            die("Error al preparar la SQL " . $this->conn->error);
        }
        if (!$stmt->bind_param("i", $idAnuncio)) {
            die("Error al ligar los parámetros " . $stmt->error);
        }
        if (!$stmt->execute()) {
            die("Error al ejecutar la SQL " . $stmt->error);
        }
        $result = $stmt->get_result();

        $fotos = array();
        while ($foto = $result->fetch_object('Foto')) {
            $fotos[] = $foto;
        }
        return $fotos;
    }

    public function getAnunciosIdUsuario($idUser) {
        $query = "SELECT * FROM anuncios WHERE id_usuario = ?";
        if (!$stmt = $this->conn->prepare($query)) {
            die("Error al ejecutar la QUERY" . $this->conn->error);
        }

        $stmt->bind_param('i', $idUser);
        $stmt->execute();

        $result = $stmt->get_result();
        $anuncio = $result->fetch_object('Anuncio');

        return $anuncio;
    }

    public function getAnunciosIdAnuncio($idAnuncio) {
        $query = "SELECT * FROM anuncios WHERE id = ?";
        if (!$stmt = $this->conn->prepare($query)) {
            die("Error al ejecutar la QUERY" . $this->conn->error);
        }

        $stmt->bind_param('i', $idAnuncio);
        $stmt->execute();

        $result = $stmt->get_result();
        $anuncio = $result->fetch_object('Anuncio');

        return $anuncio;
    }
    
    public function getUsuarioAnuncio($idAnuncio) {
    $sql = "SELECT anuncios.id, anuncios.precio, anuncios.titulo, anuncios.descripcion, anuncios.fecha, anuncios.imagen, anuncios.id_usuario, usuarios.*
            FROM anuncios
            INNER JOIN usuarios ON anuncios.id_usuario = usuarios.id
            WHERE anuncios.id = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $idAnuncio);
    $stmt->execute();
    $result = $stmt->get_result();

    $usuarioAnuncio = $result->fetch_object("Usuario");
    return $usuarioAnuncio;
    }
}
