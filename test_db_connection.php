<?php
// Test de conexión y ubicación del procedimiento spRegistrarUsuario
include_once __DIR__ . '/Model/UtilitarioModel.php';

try {
    $conn = OpenDB();
} catch (Exception $e) {
    echo "Error abriendo conexión: " . htmlspecialchars($e->getMessage());
    exit;
}

if ($conn->connect_errno) {
    echo "Connect error ({$conn->connect_errno}): " . htmlspecialchars($conn->connect_error);
    exit;
}

echo "Host info: " . htmlspecialchars($conn->host_info) . "<br>";

$res = $conn->query("SELECT DATABASE() AS db");
if ($res) {
    $row = $res->fetch_assoc();
    echo "Base de datos actual: " . htmlspecialchars($row['db']) . "<br>";
} else {
    echo "No se pudo obtener la base de datos actual: " . htmlspecialchars($conn->error) . "<br>";
}

// Buscar en information_schema dónde existe el procedimiento
$sql = "SELECT ROUTINE_SCHEMA, ROUTINE_NAME, ROUTINE_TYPE FROM information_schema.ROUTINES WHERE ROUTINE_NAME = 'spRegistrarUsuario'";
$res = $conn->query($sql);
if ($res && $res->num_rows > 0) {
    echo "Procedimiento 'spRegistrarUsuario' encontrado en:\n";
    while ($r = $res->fetch_assoc()) {
        echo "- Schema: " . htmlspecialchars($r['ROUTINE_SCHEMA']) . " (" . htmlspecialchars($r['ROUTINE_TYPE']) . ")<br>";
    }
} else {
    echo "No se encontró 'spRegistrarUsuario' en information_schema.ROUTINES o no hay permisos para verlo.<br>";
}

// Intentar mostrar la definición del procedimiento (puede fallar por permisos)
$res2 = $conn->query("SHOW CREATE PROCEDURE spRegistrarUsuario");
if ($res2) {
    $row2 = $res2->fetch_assoc();
    if (isset($row2['Create Procedure'])) {
        echo "<h3>Definición (SHOW CREATE PROCEDURE):</h3>";
        echo "<pre>" . htmlspecialchars($row2['Create Procedure']) . "</pre>";
    } else {
        // MySQL puede devolver con otra clave dependiendo de versión
        echo "<h3>SHOW CREATE PROCEDURE result:</h3><pre>" . htmlspecialchars(print_r($row2, true)) . "</pre>";
    }
} else {
    echo "No se pudo ejecutar SHOW CREATE PROCEDURE: " . htmlspecialchars($conn->error) . "<br>";
}

CloseDB($conn);

echo "<br>Prueba completa. Si la base de datos actual no es 'bdproyecto', revisa la configuración en Model/UtilitarioModel.php (host/puerto/usuario/DB).";
