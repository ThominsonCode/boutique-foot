<?php
$css_sheet2 = "panierstyle";
$css_sheet = "style";
require('common/header.php');
require("common/navbar.php");

$statement = $db->query('SELECT * FROM categorie');
$categories = $statement->fetchAll();
$statement = $db->query('SELECT * FROM souscategorie');
$sous_categories = $statement->fetchAll();
$statement = $db->query('SELECT * FROM item');
$items = $statement->fetchAll();

?>

<h1>Votre panier</h1>
<?php
$statement = $db->query('SELECT * FROM item WHERE id = 25');
$items = $statement->fetchAll();

foreach ($items as $item) {
    echo '<img width="200px;" height="200px;" src="image/' . $item['image'] . '">
                <h4>Prix: ' . number_format($item['prix'], 2, '.', '') . ' €</h4>
                <h3>' . $item['nom'] . '</h3>';
}
?>

<p>Lubin</p>



<?php require('common/footer.php') ?>