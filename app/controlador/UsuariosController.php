<?php



class UsuariosController
{

    //Inicializamos las variables en blanco para que no den error al imprimirlos en los values
    //cuando cargamos la pagina la primera vez.

    function registrar()
    {
        $email = "";
        $password = "";
        $nombre = "";
        $telefono = "";
        $poblacion = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = new Usuario();
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
            $poblacion = filter_var($_POST['poblacion'], FILTER_SANITIZE_STRING);
            $error = false;

            //Comprobamos si existe un usuarios con el mismo correo
            $usuarioDAO = new UsuarioDAO(ConexionBD::conectar());
            if ($usuarioDAO->obtenerPorEmail($email)) {
                MensajeFlash::guardarMensaje("Email Repetido");
                MensajeFlash::imprimirMensajes();
                $error = true;
            }

            if (!$error) {
                //Encriptamos la contraseña
                $passwordCrypt = password_hash($password, PASSWORD_BCRYPT);
                $usuario->setEmail($email);
                $usuario->setPassword($passwordCrypt);
                $usuario->setNombre($nombre);
                $usuario->setTelefono($telefono);
                $usuario->setPoblacion($poblacion);
                //$usuario->setUid($);
                $usuarioDAO->insertar($usuario);
                header('Location: index.php?action=inicio');
                die();
            }
        }
        require 'app/vistas/registro.php';
    }

    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $passwordForm = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $usuarioDAO = new UsuarioDAO(ConexionBD::conectar());
            $usuario = $usuarioDAO->obtenerPorEmail($email);

            if (!$usuario) {
                MensajeFlash::guardarMensaje("El usuario o la contraseña no son valido");
                header("Location: index.php");
                die();
            } elseif (!password_verify($passwordForm, $usuario->getPassword())) {
                MensajeFlash::guardarMensaje("El usuario o la contraseña no son validos");
                header("Location: index.php");
                die();
            } else {
                //Datos correctos
                $_SESSION['email'] = $usuario->getEmail();
                $_SESSION['idUsuario'] = $usuario->getId();
                $_SESSION['nombre'] = $usuario->getNombre();
                $_SESSION['telefono'] = $usuario->getTelefono();
                $_SESSION['poblacion'] = $usuario->getPoblacion();
            }
        }else{
            require 'app/vistas/login.php';
        }
    }

    function logout()
    {
        session_destroy();
        setcookie("uid", "", 0);
        header("Location: index.php");
    }
}
