<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ambiente_ropa/Controller/UtilitarioController.php';
    
    function generarContrasena()
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $contrasena = '';
        $max = strlen($caracteres) - 1;

        for ($i = 0; $i < 8; $i++) {
            $contrasena .= $caracteres[random_int(0, $max)];
        }

        return $contrasena;
    }

    function EnviarCorreo($asunto, $contenido, $destinatario)
    {
        try
        {
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            $correoSalida = "felipemoralestorelli@gmail.com";
            $contrasennaSalida = "nyng lxxa kcpj taau";

            if($contrasennaSalida == "")
            {
                return true; // Simulación de envío exitoso
            }

            $mail = new PHPMailer();
            $mail->CharSet = 'UTF-8';

            $mail->IsSMTP();
            $mail->IsHTML(true);
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = $correoSalida;
            $mail->Password = $contrasennaSalida;

            $mail->SetFrom($correoSalida);
            $mail->Subject = $asunto;
            $mail->MsgHTML($contenido);
            $mail->AddAddress($destinatario);
            $mail->send();
            return true;
        }
        catch (Exception $e)
        {
            AddError($e, 'EnviarCorreo', 0);
            return false;
        }
    }

    function CerrarSesion()
    {
        session_start();
        session_destroy();
        header("Location: ../../View/vInicio/IniciarSesion.php");
        exit();
    }