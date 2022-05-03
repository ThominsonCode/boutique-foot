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

if (isset($_POST['supprimer-tous-item'])) {
    $statement = $db->query('DELETE FROM `historique` WHERE user=' . $_SESSION['uid'] . '');
}

require_once("common/navbar.php");

$user = null;
if (isset($_SESSION['uid'])) {
    foreach ($users as $a_user) {
        if ($a_user['id'] == $_SESSION['uid']) {
            $user = $a_user;
        }
    }

    require_once("common/navbar.php");

?>
    <h1>Bonjour <?= $user['nom']; ?></h1>
    <h3>Voici votre panier : <br><br></h3>

    <?php

    // on recup les articles de l'user

    $statement = $db->prepare('SELECT item FROM historique WHERE user = ?');
    $statement->execute(array($user['id']));
    $items = $statement->fetchAll();

    // var_dump($items);

    ?>
    <div style="margin-bottom:30px; width:100%; display:flex; justify-content:center;">
        <table>
            <tbody>
                <tr>
                    <th>Image du produit</th>
                    <th>Nom du produit</th>
                    <th>Prix du produit</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                foreach ($items as $item) {
                    $statement = $db->prepare('SELECT * FROM item WHERE id = ?');
                    $statement->execute(array($item['item']));
                    $item = $statement->fetch();

                    echo '
                    <tr>       
                        <td><img style="width: 50px;" src="image/' . $item['image'] . '"></td>
                        <td>' . $item['nom'] . '</td>
                        <td>' .  number_format($item['prix'], 2, '.', '') . ' €</td>
                        <td>  
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="supprimer-item-id" value="' . $item['id'] . '">
                            </div>
                            <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>';
                }
                ?>
            </tbody>
            <tfoot>
                <th style="text-align: center;" colspan="2">Prix Total</th>
                <?php
                $statement = $db->query('SELECT prix, SUM(prix) FROM item INNER JOIN historique ON item.id = historique.item WHERE user=' . $_SESSION['uid'] . '');
                $prix_total = $statement->fetch();
                echo '
                <td>' . number_format($prix_total[1], 2, '.', '') . ' €</td>
                ';
                ?>
                <td>
                    <?php
                    echo
                    '<form action="" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="supprimer-tous-item" value="' . $_SESSION['uid'] . '">
                        </div>
                        <button type="submit" class="btn btn-outline-danger">Tout supprimer</button>
                    </form>';
                    echo '
                </td>';
                    ?>
            </tfoot>
        </table>
    </div>




<?php
}

require('common/footer.php') ?>