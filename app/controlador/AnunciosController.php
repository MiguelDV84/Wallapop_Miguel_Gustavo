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

        //Obtengo todos los anuncios de la BD
        $array_anuncios = $anuncioDAO->getAnuncios();
        
        $array_fotos_principales = array();
        
        foreach ($array_anuncios as $anuncio){
                $id_anuncio_foto = $anuncio->getId();
        
                $array_fotos_principales[]= $anuncioDAO->getFotoPrincipal($id_anuncio_foto);
        }
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


        
        //Obtenemos el anuncio para la descripcion del anuncio
        $anuncio = $anuncioDAO->getAnunciosIdAnuncio($idAnuncio);
        
        //Para mostrar otros anuncios en descripcion.php
        $array_anuncios = $anuncioDAO->getAnuncios();
        
        //Obtenemos las imagenes de la tabla fotografias del anuncio de la descripción
        $fotos = $anuncioDAO->getImagenesAnuncios($idAnuncio);
        
        
        //Para mostrar el usuario que ha subido el producto
        $usuario = $anuncioDAO->getUsuarioAnuncio($idAnuncio);

        
        //incluimos la vista
        require 'app/vistas/descripcion.php';
    }

}
