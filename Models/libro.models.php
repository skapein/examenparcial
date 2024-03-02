<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');

class Libro
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Libro`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    /*TODO: Procedimiento para sacar un registro del libro*/
    public function uno($ID_libro)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Libro WHERE ID_libro = $ID_libro LIMIT 1";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function unoconnombre($nombre_libro)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT count(*) as numero FROM `Libro` WHERE `Título`='$nombre_libro'";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    
    public function Insertar($Título, $Géenero, $Año_publicacion, $Editorial)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `Libro`(`Título`, `Género`, `Año_publicación`, `Editorial`) VALUES ('$Título', '$Género', $Año_publicación, '$Editorial')";
        
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    /*TODO: Procedimiento para actualizar un libro*/
    public function Actualizar($ID_libro, $Título, $Género, $Año_publicación, $Editorial)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `Libro` SET `Título`='$Título', `Género`='$Género', `Año_publicación`=$Año_publicación, `Editorial`='$Editorial' WHERE `ID_libro`=$ID_libro";
        
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

  
    public function Eliminar($ID_libro)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `Libro` WHERE `ID_libro`=$ID_libro";
        
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
