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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script>
        function addNewRow() {
            const table = document.getElementById('articleTable');
            const newRow = table.insertRow();
            for (let i = 0; i < 7; i++) {
                const cell = newRow.insertCell(i);
                cell.contentEditable = true;
            }
            newRow.insertCell(7).innerHTML = `
                <button class="btn-modifier" onclick="alert('Modifier cet article')"><i class="bi bi-pencil"></i></button>
                <button class="btn-supprimer" onclick="deleteRow(this)"><i class="bi bi-trash"></i></button>
            `;
        }

        function deleteRow(button) {
            button.parentNode.parentNode.remove();
        }

        function validatePurchase() {
            alert('Achat validé avec un total.');
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

<button class="btn-ajouter" onclick="addNewRow()">+</button>
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
            <button class="btn-modifier" onclick="alert('Modifier cet article')"> <i class="bi bi-pencil"></i></button>
            <button class="btn-supprimer" onclick="deleteRow(this)">  <i class="bi bi-trash"></i></button>
        </td>
    </tr>
</table>

<h1>Total : <input type="text" id="total" /></h1>
<button class="btn-valider" onclick="validatePurchase()">Valider l'achat</button>

</body>
</html>