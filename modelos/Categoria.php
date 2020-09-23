<?php
// require conexion

require "../config/Conexion.php";

Class Categoria {

    public function __construct()
    {

    }

    // implemetar metodo para ingreassr registros
    public function insertar($nombre,$descripcion)
    {
        $sql="INSERT INTO categoria (nombre, descripcion,condicion)
        VALUES ('$nombre','$descripcion','1')";
        return ejecutarConsulta($sql);
    }

    //implementamos un método para editar registros
    public function editar ($idcategoria,$nombre,$descripcion)
    {
        $sql="UPDATE categoria SET nombre='$nombre',descripcion='$descripcion' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }

    //Metodo para desactivar categorías
    public function desactivar($idcategoria)
    {
        $sql="UPDATE categoria SET condicion='0' WHERE idcategoria='$idcategoria'";
        return  ejecutarConsulta($sql);
    }

    //Metodo para activar categorías
    public function activar($idcategoria)
    {
        $sql = "UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }

    //implementar metodo para mostrar los datos

    public function mostrar($idcategoria)
    {
        $sql="SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
        return ejecutarConsultaSimpleFila($sql);
    }

    // metodo para listar registros
    public function listar()
    {
        $sql="SELECT * FROM categoria";
        return ejecutarConsulta(sql);
    }
}

