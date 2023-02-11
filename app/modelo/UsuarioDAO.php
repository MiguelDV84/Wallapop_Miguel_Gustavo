<?php

class UsuarioDAO
{
    private $conn;

    public function __construct($conn) {
        if (!$conn instanceof mysqli) { //Comprueba si $conn es un objeto de la clase mysqli
            return false;
        }
        $this->conn = $conn;
    }

    public function insertar(Usuario $u)
    {
        $query = "INSERT INTO usuarios (email, password, nombre, telefono, poblacion, foto) VALUES (?,?,?,?,?,?)";
        if (!$stmt = $this->conn->prepare($query)) {
            die("Error al preparar la sentencia" . $this->conn->error);
        }
        $email = $u->getEmail();
        $password = $u->getPassword();
        $nombre = $u->getNombre();
        $telefono = $u->getTelefono();
        $poblacion = $u->getPoblacion();
        $foto = $u->getFoto();
        
        $stmt->bind_param('ssssss', $email, $password, $nombre, $telefono, $poblacion, $foto);
        $stmt->execute();
    }

    public function obtenerPorEmail($email){
        $query = "SELECT * FROM usuarios WHERE email = ?";
        if(!$stmt = $this->conn->prepare($query)){
            die("Error al preparar la sentencia: " . $this->conn->error);
        }

        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $usuario = $result->fetch_object('Usuario');

        return $usuario;

    }
    
    public function actualizar(Usuario $u) {
        $sql = "UPDATE usuarios SET email = ?, uid = ? "
                . "WHERE id = ?";
        if (!$stmt = $this->conn->prepare($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }
        $id = $u->getId();
        $email = $u->getEmail();
        $uid = $u->getUid();
        $stmt->bind_param('ssi', $email, $uid, $id);
        $stmt->execute();
    }
    
    public function obtenerPorUid($uid) {
        $sql = "SELECT * FROM usuarios WHERE uid = ?";
        if (!$stmt = $this->conn->prepare($sql)) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }
        $stmt->bind_param('s', $uid);
        $stmt->execute();

        $result = $stmt->get_result();
        $usuario = $result->fetch_object('Usuario');
        //Para que netbeans reconozca el objeto de la clase Usuario  
        return $usuario;
    }
}
