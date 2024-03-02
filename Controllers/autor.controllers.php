<?php
error_reporting(0);
/*TODO: Requerimientos */
require_once('../config/sesiones.php');
require_once("../models/autor.models.php");
$autor = new Autor;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $autor->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $id_autor = $_POST["ID_autor"];
        $datos = array();
        $datos = $autor->uno($ID_autor);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Nacionalidad = $_POST["Nacionalidad"];
        $año_nacimiento = $_POST["Año_nacimiento"];
        $Género = $_POST["Género"];
        $datos = array();
        $datos = $autor->insertar($Nombre, $Nacionalidad, $Año_nacimiento, $Género);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $ID_autor = $_POST["ID_autor"];
        $Nombre = $_POST["Nombre"];
        $Nacionalidad = $_POST["Nacionalidad"];
        $Año_nacimiento = $_POST["Año_nacimiento"];
        $Género = $_POST["Género"];
        $datos = array();
        $datos = $autor->actualizar($ID_autor, $Nombre, $Nacionalidad, $Año_nacimiento, $Género);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $ID_autor = $_POST["ID_autor"];
        $datos = array();
        $datos = $autor->eliminar($ID_autor);
        echo json_encode($datos);
        break;
}