<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header("Location: login_page.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reception de marchandises</title>
    <link rel="stylesheet" href="accstyle.css">
    <script>
        // Fonction pour ajouter une nouvelle ligne au tableau
        function addNewRow() {
            const table = document.getElementById('articleTable'); // Récupère le tableau
            const newRow = table.insertRow(); // Insère une nouvelle ligne
            
            // Crée des cellules éditables pour chaque colonne
            for (let i = 0; i < 7; i++) {
                const cell = newRow.insertCell(i);
                cell.contentEditable = true; // Permet l'édition des cellules
            }
            // Ajoute les boutons "Modifier" et "Supprimer" à la dernière cellule
            newRow.insertCell(7).innerHTML = `
                <button onclick="alert('Modifier cet article')">Modifier</button>
                <button onclick="deleteRow(this)">Supprimer</button>
            `;
        }

        // Fonction pour supprimer une ligne
        function deleteRow(button) {
            button.parentNode.parentNode.remove(); // Supprime la ligne correspondante
        }

        // Fonction pour valider l'achat
        function validatePurchase() {
            alert('Achat validé avec un total.'); // Alerte pour la validation
        }
    </script>
</head>
<body>
<header>
    <div class="nav-container">
        <img src="image/logol.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="receptionm.php">Reception de Marchandises</a></li>
                <li><a href="logout.php">Deconnexion</a></li>
            </ul>
        </nav>
    </div>
    <div class="divider"></div>
</header>

<h1>Nom Fournisseur : <input type="text" id="fournisseur" /></h1>
<h1>Date : <input type="date" id="date_achat" /></h1>

<button onclick="addNewRow()">Ajouter</button> <!-- Bouton pour ajouter une nouvelle ligne -->

<table id="articleTable">
    <tr>
        <th>Numéro d'article</th>
        <th>Description d'article</th>
        <th>Quantité</th>
        <th>Prix unitaire</th>
        <th>Magasin</th>
        <th>Code UM</th>
        <th>Total brut (DI)</th>
        <th>Actions</th>
    </tr>
    <tr>
        <td contentEditable="true"></td>
        <td contentEditable="true"></td>
        <td contentEditable="true"></td>
        <td contentEditable="true"></td>
        <td contentEditable="true"></td>
        <td contentEditable="true"></td>
        <td contentEditable="true"></td>
        <td>
            <button onclick="alert('Modifier cet article')">Modifier</button> <!-- Bouton Modifier -->
            <button onclick="deleteRow(this)">Supprimer</button> <!-- Bouton Supprimer -->
        </td>
    </tr>
    <!-- Vous pouvez ajouter d'autres lignes ici si nécessaire -->
</table>

<h1>Total : <input type="text" id="total" /></h1>
<button onclick="validatePurchase()">Valider l'achat</button> <!-- Bouton pour valider l'achat -->
    
</body>
</html>