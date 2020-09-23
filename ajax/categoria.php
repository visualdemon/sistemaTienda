<?php

require_once "../config/conexion.php";

$categoria=new categoria();

$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";


switch ($_GET["op"]){
    case 'guardadyeditar':
        if (empty($idcategoria)){
            $rspta=$categoria->insertar($nombre,$descripcion);
            echo $rspta ? "Categoría Registrada" : " Categoría no se pudo registrar";
        }
        else {
            $rspta=$categoria->editar($idcategoria,$nombre,$descripcion);
            echo $rspta ? "Categoría Actualizada" : " Categoría no se pudo actualziar";
        }
        break;
    case 'desactivar':
        $rspta=$categoria->desactivar($idcategoria);
        echo $rspta ? "Categoría DEsactivada" : " Categoría no se pudo desactivar";
        break;
    case 'activar':
        $rspta=$categoria->activar($idcategoria);
        echo $rspta ? "Categoría Activada" : " Categoría no se pudo Activar";
        break;
    case 'mostrar':
        $rspta=$categoria->activar($idcategoria);
        //codificar a json
        echo json_encode($rspta);
        break;
    case 'listar':
        $rspta=$categoria->listar();
        //Declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>$reg->idcategoria,
                "1"=>$reg->nombre,
                "2"=>$reg->categoria,
                "3"=>$reg->condicion
            );
        }

        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo json_encode($results);

    break;
}

