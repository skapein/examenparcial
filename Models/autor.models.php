<?php
require_once('../config/conexion.php');

class Autor
{
    
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Autor`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($ID_autor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Autor` WHERE `ID_autor` = $ID_autor LIMIT 1";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    
    public function Insertar($Nombre, $Nacionalidad, $Año_nacimiento, $Género)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `Autor` (`Nombre`, `Nacionalidad`, `Año_nacimiento`, `Género`) 
                   VALUES ('$Nombre', '$Nacionalidad', $Año_nacimiento, '$Género')";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    
    public function Actualizar($ID_autor, $Nombre, $Nacionalidad, $Año_nacimiento, $Género)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `Autor` SET `Nombre` = '$Nombre', `Nacionalidad` = '$Nacionalidad', 
                   `Año_nacimiento` = $Año_nacimiento, `Género` = '$Género' WHERE `ID_autor` = $ID_autor";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

   
    public function Eliminar($ID_autor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `Autor` WHERE `ID_autor` = $ID_autor";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return true;
        } else {
            $con->close();
            return false;
        }
    }
}
?>
