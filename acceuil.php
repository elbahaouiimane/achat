<?php
session_start();
require_once('config.php');

if (!isset($_SESSION['username'])) {
    header("Location: login_page.php");
    exit();

}
if (!isset($_SESSION['articles'])) {
    $_SESSION['articles'] = []; // Initialiser comme tableau vide
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Goods purchase</title>
    
    <link rel="stylesheet" href="acceuil_style.css">
    
    <script>
        function addProductRow() {
            const table = document.getElementById("productTable").getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();
            newRow.innerHTML = `
                <td>
                    <select name="article[]">
                        <option value="">Choose an item</option>
                        <option value="1">Item A afficher par sap</option>
                        <option value="2">Item B afficher par sap</option>
                    </select>
                </td>
                <td>prix fixe afficher par sap</td>
                <td><input type="number" name="quantite[]" min="1" /></td>
                <td>afficher par sap</td>
                <td><button type="button" class="delete" onclick="removeProductRow(this)">Delete</button></td>
            `;
        }

        function removeProductRow(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
</head>
<body>
<img src="image/logol.png" alt="Logo" class="logo">
<br>
<br>
<br>
<h1>Goods purchase</h1>

<form action="" method="POST"> <!-- Modifié pour rester sur la même page -->
    <label for="fournisseur">Select the provider</label>
    <select id="fournisseur" name="fournisseur_id">
        <option value="">Choose the provider</option>
        <option value="1">Provider A afficher par sap</option>
        <option value="2">Provider B afficher par sap</option>
    </select>

    <table id="productTable">
        <thead>
            <tr>
                <th>Product</th>
                <th>Unit price</th>
                <th>Quantity</th>
                <th>Gross total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['articles'] as $article): ?>
            <tr>
                <td>
                    <select name="article[]">
                        <option value="<?= $article['id'] ?>"><?= $article['name'] ?></option>
                        <option value="1">Item A afficher par sap</option>
                        <option value="2">Item B afficher par sap</option>
                    </select>
                </td>
                <td><?= $article['price'] ?></td>
                <td><input type="number" name="quantite[]" min="1" /></td>
                <td>calculer ici</td>
                <td><button type="button" class="delete" onclick="removeProductRow(this)">Delete</button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button type="button" class="add" onclick="addProductRow()">Add an order</button>
    <button type="submit" class="validate">Validate purchase</button>
</form>

<?php
// Traitement du formulaire pour ajouter les articles dans la session
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $articles = $_POST['article'];
    $quantites = $_POST['quantite'];

    foreach ($articles as $index => $article) {
        if (!empty($article)) {
            $_SESSION['articles'][] = [
                'id' => $article,
                'name' => "Article " . $article, // Remplacez par la vraie logique
                'price' => $index == 0 ? 10 : 15 // Exemple de prix
            ];
        }
    }
}
?>
</body>
</html>