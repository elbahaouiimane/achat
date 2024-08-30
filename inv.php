<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "achatapp"; // Assure-toi que ce nom correspond à ta base de données

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour récupérer les achats et les détails associés
$sql = "SELECT 
            h.id AS historique_id,
            h.produit,
            h.quantité,
            h.prix,
            h.date_achat,
            a.fournisseur,
            a.remise,
            a.montant_final
        FROM 
            historique_achats h
        LEFT JOIN 
            achats_détails a ON h.id = a.historique_id";

$result = $conn->query($sql);

$achats = array();

if ($result->num_rows > 0) {
    // Stocker les résultats dans un tableau
    while($row = $result->fetch_assoc()) {
        $achats[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Achats</title>
    <link rel="stylesheet" href="accstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<header>
    <div class="nav-container">
        <img src="image/logol.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="receptionm.php">Réception de Marchandises</a></li>
                <li><a href="inv.php">Historique des Achats</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </div>
    <div class="divider"></div>
</header>

<div class="container">
    <h1>Historique des Achats</h1>
    <table id="achats-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Date d'achat</th>
                <th>Fournisseur</th>
                <th>Remise</th>
                <th>Montant Final</th>
            </tr>
        </thead>
        <tbody>
            <!-- Les lignes des achats seront ajoutées ici par JavaScript -->
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const achats = <?php echo json_encode($achats); ?>;
        const tableBody = document.querySelector('#achats-table tbody');
        tableBody.innerHTML = ''; // Clear any existing rows

        achats.forEach(achat => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${achat.historique_id}</td>
                <td>${achat.produit}</td>
                <td>${achat.quantité}</td>
                <td>${achat.prix}</td>
                <td>${achat.date_achat}</td>
                <td>${achat.fournisseur || 'N/A'}</td>
                <td>${achat.remise || 'N/A'}</td>
                <td>${achat.montant_final || 'N/A'}</td>
            `;
            tableBody.appendChild(row);
        });
    });
</script>
</body>
</html>
