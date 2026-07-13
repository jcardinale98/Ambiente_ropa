<?php

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    function OpenDB()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        return new mysqli("127.0.0.1:3307", "root", "", "mn");
    }

    function CloseDB($conn)
    {
        $conn -> close();
    }

    function AddError($error, $accion)
    {
        $conn = OpenDB();

        $mensaje = $conn -> real_escape_string($error -> getMessage());
        $idUsuario = isset($_SESSION["ConsecutivoUsuario"]) ? $_SESSION["ConsecutivoUsuario"] : 0;

        $sql = "CALL spRegistrarError('$mensaje', '$accion', '$idUsuario')";
        $response = $conn -> query($sql);           
            
        CloseDB($conn);
    }