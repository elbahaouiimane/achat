<?php
session_start();
require_once('config.php');

if (!isset($_SESSION['username'])) {
    header("Location: login_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Achats</title>
</head>
<body>
    <h2>Welcome to the purchase and invoice management system <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>