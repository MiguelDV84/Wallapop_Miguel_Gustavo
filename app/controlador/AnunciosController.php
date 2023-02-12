<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require 'app/modelo/Anuncio.php';
require 'app/modelo/AnuncioDAO.php';
require_once 'app/modelo/ConexionBD.php';

/**
 * Description of AnunciosController
 *
 * @author Alumno
 */
class AnunciosController {

    function inicio() {

        $anuncioDAO = new AnuncioDAO(ConexionBD::conectar());

        //Obtengo todos los mensajes de la BD
        $array_anuncios = $anuncioDAO->getAnuncios();
        
        
        //incluimos la vista
        require 'app/vistas/inicio.php';
    }

    function descripcion() {

        $anuncioDAO = new AnuncioDAO(ConexionBD::conectar());

        if (isset($_GET['pagina']) && is_numeric($_GET['pagina'])) {
            $pagina = (int) $_GET['pagina'];
        } else {
            $pagina = 1;
        }

        $anuncios_por_pagina = 4;

        $idAnuncio = $_GET['idAnuncio'];

        $usuario = $_SESSION['email'];
        //Obtengo todos los mensajes de la BD
        $anuncio = $anuncioDAO->getAnunciosIdAnuncio($idAnuncio);

        $array_anuncios = $anuncioDAO->getAnuncios();

        $fotos = $anuncioDAO->getImagenesAnuncios($idAnuncio);

        $usuario = $anuncioDAO->getUsuarioAnuncio($idAnuncio);

        
        //incluimos la vista
        require 'app/vistas/descripcion.php';
    }

}
