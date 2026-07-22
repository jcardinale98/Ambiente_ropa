<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Model/UtilitarioModel.php';

function ConsultarProductosDisponiblesModel()
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spConsultarProductosDisponibles()";
        $response = $conn -> query($sql);

        return $response;
        
    }
    catch(Exception $e)
    {
        AddError($e, 'ConsultarProductosDisponiblesModel');
        return false;
    }
}

function BuscarProductosModel($nombre, $consecutivoCategoria)
{
    try
    {
        $conn = OpenDB();

        $sql = "CALL spBuscarProductos('$nombre', $consecutivoCategoria)";
        $response = $conn -> query($sql);

        return $response;       
     
    }
    catch(Exception $e)
    {
        AddError($e, 'BuscarProductosModel');
        return false;
    }
}