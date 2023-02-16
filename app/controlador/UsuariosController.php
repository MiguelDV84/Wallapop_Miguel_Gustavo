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
        $foto = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = new Usuario();
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
            $poblacion = filter_var($_POST['poblacion'], FILTER_SANITIZE_STRING);
            $error = false;
            
            if ($_FILES['foto']['type'] != 'image/jpeg' &&
                    $_FILES['foto']['type'] != 'image/gif' &&
                    $_FILES['foto']['type'] != 'image/png' &&
                    $_FILES['foto']['type'] != 'image/webp') {

                MensajeFlash::guardarMensaje("El archivo no es una imagen");
                $error = true;
            }
            //Comprobamos si existe un usuarios con el mismo correo
            $usuarioDAO = new UsuarioDAO(ConexionBD::conectar());
            if ($usuarioDAO->obtenerPorEmail($email)) {
                MensajeFlash::guardarMensaje("Email Repetido");
                MensajeFlash::imprimirMensajes();
                $error = true;
            }

            if (!$error) {
                //Generamos un nombre aleatorio para la foto
                $nuevoNombre = md5(rand());
                //Cogemos la extensión
                $nombreOriginal = $_FILES['foto']['name'];
                $extension = substr($nombreOriginal, strrpos($nombreOriginal, '.'));
                $nuevoNombreCompleto = $nuevoNombre . $extension;

                //y en ese caso volvemos a generar un nombre
                while (file_exists('web/img/' . $nuevoNombreCompleto)) {
                    $nuevoNombre = md5(rand());
                    $nuevoNombreCompleto = $nuevoNombre . $extension;
                }

                //Movemomoves la foto a la carpeta donde los queramos guardar
                move_uploaded_file($_FILES['foto']['tmp_name'],
                        'web/img/' . $nuevoNombreCompleto);
                //Encriptamos la contraseña
                $passwordCrypt = password_hash($password, PASSWORD_BCRYPT);
                $usuario->setEmail($email);
                $usuario->setPassword($passwordCrypt);
                $usuario->setNombre($nombre);
                $usuario->setTelefono($telefono);
                $usuario->setPoblacion($poblacion);
                $usuario->setFoto($nuevoNombreCompleto);
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
                $_SESSION['nombre'] = $usuario->getNombre();
                $_SESSION['idUsuario'] = $usuario->getId();
                $_SESSION['foto'] = $usuario->getFoto();
                //Guardado de cookie. Generamos un uid aleatorio y lo guardamos en la BD y en la cookie
            $uid = sha1(time() + rand()) . md5(time());
            $usuario->setUid($uid);
            $usuarioDAO->actualizar($usuario);
            setcookie("uid", $uid, time() + 7 * 24 * 60 * 60);
            
            header("Location: index.php");
            die();
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
    
    //Se va a utilizar desde una conexión AJAX
    function comprobar_email() {
        //Indicar al navegador que la respuesta es un json
        header("Content-type: application/json; charset=utf-8");

        //Si no se ha enviado el email por post devolvemos un mensaje de error
        if (!isset($_POST['email'])) {
            print json_encode(["error" => "Falta parámetro email"]);
            die();
        }
        
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $usuarioDAO = new UsuarioDAO(ConexionBD::conectar());
        if ($usuarioDAO->obtenerPorEmail($email) != false) {
            //Devolvemos un json
            print json_encode(["repetido" => true]);
        } else {
            print json_encode(["repetido" => false]);
        }
        //Para simular un retardo en el servidor. Se quita después en producción.
        sleep(1);
    }

}
