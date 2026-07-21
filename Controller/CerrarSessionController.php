<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}


/*
|--------------------------------------------------------------------------
| Eliminar todas las variables de sesión
|--------------------------------------------------------------------------
*/

$_SESSION = array();


/*
|--------------------------------------------------------------------------
| Eliminar la cookie de sesión
|--------------------------------------------------------------------------
*/

if (ini_get("session.use_cookies"))
{
    $parametros = session_get_cookie_params();

    setcookie(
        session_name(),
        "",
        time() - 42000,
        $parametros["path"],
        $parametros["domain"],
        $parametros["secure"],
        $parametros["httponly"]
    );
}


/*
|--------------------------------------------------------------------------
| Destruir la sesión
|--------------------------------------------------------------------------
*/

session_destroy();


/*
|--------------------------------------------------------------------------
| Regresar a la pantalla de inicio de sesión
|--------------------------------------------------------------------------
*/

header(
    "Location: /Ambiente_ropa/View/vInicio/login.php"
);

exit();