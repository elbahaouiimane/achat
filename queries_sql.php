<?php
$serverName = "x.x.x"; // Replace with your SQL Server name or IP address
$connectionOptions = array(
    "Database" => "S", // Replace with your database name
    "Uid" => "sa", // Replace with your SQL Server username
    "PWD" => "b" // Replace with your SQL Server password
);

try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database={$connectionOptions['Database']}", $connectionOptions['Uid'], $connectionOptions['PWD']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>





