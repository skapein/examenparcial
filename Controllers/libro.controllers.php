<?php
error_reporting(0);
/*TODO: Requerimientos */
require_once('../config/sesiones.php');
require_once("../models/libro.models.php");
$Libro = new Libro;
 
switch ($_GET["op"]) {
    //ID_libro	Título	Género	Año_publicación	Editorial
    /*CRUD */	

       
    case 'todos':
        $datos = array();
        $datos = $Libro->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        
    case 'uno':
        $ID_libro = $_POST["ID_Libro"];
        $datos = array();
        $datos = $Libro->uno($ID_libro);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case "uno_2":
        $Título = $_POST["Título"];
        $datos = array();
        $datos = $Libro->uno_2($Título);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

        
    case 'insertar':
        $Título = $_POST["Título"];
        $Género = $_POST["fecha_inicio"];
        $Año_publicación = $_POST["Año_publicación"];
        $Editorial = $_POST["Editorial"];
        $datos = array();
        $datos = $Libro->Insertar($ID_libro, $Título, $Género, $Año_publicación, $Editorial);
        echo json_encode($datos);
        break;
        
    case 'actualizar':
        $Título = $_POST["Título"];
        $Género = $_POST["fecha_inicio"];
        $Año_publicación = $_POST["Año_publicación"];
        $Editorial = $_POST["Editorial"];
        $datos = array();
        $datos = $Libro->Actualizar($ID_libro, $Título, $Género, $Año_publicación, $Editorial);
        echo json_encode($datos);
        break;
        
        
    case 'eliminar':
        $$ID_libro = $_POST["i$ID_libro"];
        $datos = array();
        $datos = $Libro->Eliminar($$ID_libro);
        echo json_encode($datos);
        break;
       
    }
