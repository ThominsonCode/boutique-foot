<?php
$css_sheet2 = "panierstyle";
$css_sheet = "style";
require('common/header.php');

$statement = $db->query('SELECT * FROM categorie');
$categories = $statement->fetchAll();
$statement = $db->query('SELECT * FROM souscategorie');
$sous_categories = $statement->fetchAll();
$statement = $db->query('SELECT * FROM item');
$items = $statement->fetchAll();
$statement = $db->query('SELECT * FROM utilisateur');
$users = $statement->fetchAll();
$statement = $db->query('SELECT * FROM historique');
$commandes = $statement->fetchAll();

if (isset($_POST['supprimer-item-id'])) {
    // echo 'SUPPRIMER un item du panier <br>';
    // echo 'item id : ' . $_POST['supprimer-item-id'];
    $statement = $db->prepare('DELETE FROM historique WHERE item = ? AND user = ?');
    $statement->execute(array($_POST['supprimer-item-id'], $_SESSION['uid']));
}


$user = null;
if (isset($_SESSION['uid'])) {
    foreach ($users as $a_user) {
        if ($a_user['id'] == $_SESSION['uid']) {
            $user = $a_user;
        }
    }

    require("common/navbar.php");

?>
    <h1>Bonjour <?= $user['nom']; ?></h1>
    <h3>Voici votre panier : <br><br></h3>

    <?php

    // on recup les articles de l'user

    $statement = $db->prepare('SELECT item FROM historique WHERE user = ?');
    $statement->execute(array($user['id']));
    $items = $statement->fetchAll();

    // var_dump($items);

    foreach ($items as $item) {
        $statement = $db->prepare('SELECT * FROM item WHERE id = ?');
        $statement->execute(array($item['item']));
        $item = $statement->fetch();
        echo '<hr><img width="200px;" height="200px;" src="image/' . $item['image'] . '">
                <h4>Prix : ' . number_format($item['prix'], 2, '.', '') . ' €</h4>
                <h3>' . $item['nom'] . '</h3>';
    ?>
        <form action="" method="POST">
            <div class="form-group">
                <?php echo '<input type="hidden" name="supprimer-item-id" value="' . $item['id'] . '">'; ?>
            </div>

            <button type="submit" class="btn btn-outline-danger">Supprimer</button>
        </form>

    <?php
    }
} else {
    ?>
    <h1 style="margin: 50px 50px;">Vous devez être connecté pour voir cette page. <br> Veuillez vous connecter.</h1>
    <div style="display: block; height:400px"></div>
<?php
}
require('common/footer.php') ?>