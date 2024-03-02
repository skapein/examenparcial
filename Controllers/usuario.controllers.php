<?php
error_reporting(0);
/*TODO: Requerimientos */
require_once('../config/sesiones.php');
require_once("../models/usuario.models.php");
//require_once("../models/Accesos.models.php");
$Usuarios = new Usuarios;
//$Accesos = new Accesos;
switch ($_GET["op"]) {
        
    case 'todos':
        $datos = array();
        $datos = $Usuarios->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
      
    case 'uno':
        $idUsuarios = $_POST["idUsuarios"];
        $datos = array();
        $datos = $Usuarios->uno($idUsuarios);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case "unoconCedula":
        $Cedula = $_POST["cedula"];
        $datos = array();
        $datos = $Usuarios->unoconCedula($Cedula);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case "unoconCorreo":
        $Correo = $_POST["Correo"];
        $datos = array();
        $datos = $Usuarios->unoconCorreo($Correo);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $Nombres = $_POST["Nombres"];
        $Apellidos = $_POST["Apellidos"];
        $Correo = $_POST["Correo"];
        $Contrasenia = $_POST["contrasenia"];
        $datos = array();
        $datos = $Usuarios->Insertar($Nombres, $Apellidos, $Correo, $Contrasenia);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $idUsuarios = $_POST["idUsuarios"];
        $Nombres = $_POST["Nombres"];
        $Apellidos = $_POST["Apellidos"];
        $Correo = $_POST["Correo"];
        $Contrasenia = $_POST["Contrasenia"];
     
        $datos = array();
        $datos = $Usuarios->Actualizar($idUsuarios, $Nombres, $Apellidos, $Correo, $Contrasenia);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $idUsuarios = $_POST["idUsuarios"];
        $datos = array();
        $datos = $Usuarios->Eliminar($idUsuarios);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para insertar */
    case 'login':
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];

        //TODO: Si las variables estab vacias rgersa con error
        if (empty($correo) or  empty($contrasenia)) {
            header("Location:../login.php?op=2");
            exit();
        }

        try {
            $datos = array();
            $datos = $Usuarios->login($correo, $contrasenia);
            $res = mysqli_fetch_assoc($datos);
        } catch (Throwable $th) {
            header("Location:../login.php?op=1");
            exit();
        }
        //TODO:Control de si existe el registro en la base de datos
        try {
            if (is_array($res) and count($res) > 0) {
                //if ((md5($contrasenia) == ($res["Contrasenia"]))) {
                if ((($contrasenia) == ($res["Contrasenia"]))) {
                    //$datos2 = array();
                    // $datos2 = $Accesos->Insertar(date("Y-m-d H:i:s"), $res["idUsuarios"], 'ingreso');

                    $_SESSION["idUsuarios"] = $res["idUsuarios"];
                    $_SESSION["Usuarios_Nombres"] = $res["Nombres"];
                    $_SESSION["Usuarios_Apellidos"] = $res["Apellidos"];
                    $_SESSION["Usuarios_Correo"] = $res["Correo"];
        
        



                    header("Location:../views/home.php");
                    exit();
                } else {
                    header("Location:../login.php?op=1");
                    exit();
                }
            } else {
                header("Location:../login.php?op=1");
                exit();
            }
        } catch (Exception $th) {
            echo ($th->getMessage());
        }
        break;
}
