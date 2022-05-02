<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "pas-co";
}

$statement = $db->query('SELECT * FROM categorie');
$categories = $statement->fetchAll();
$statement = $db->query('SELECT * FROM souscategorie');
$sous_categories = $statement->fetchAll();
$statement = $db->query('SELECT * FROM item');
$items = $statement->fetchAll();
?>

<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a href="index.php"> <img style="width: 100px;" href="#" src="Image/Logo_Club.png" alt="Logo_Club"></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            foreach ($categories as $categorie) {
                echo '<li class="nav-item dropdown" role="presentation" data-genres="' . $categorie['id'] . '">
                <a style="text-transform : uppercase;" class="nav-link dropdown-toggle" href="#' . $categorie['id'] . '" data-toggle="dropdown">';
                echo $categorie['nom'];
                echo '</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

                foreach ($sous_categories as $sous_categorie) {
                    if ($sous_categorie['categorie'] == $categorie['id']) {
                        echo '<a class="dropdown-item" href="index.php?id=' . $sous_categorie['id'] . '">' . $sous_categorie['nom'] . '</a>';
                    }
                }
                echo '</div>
                </li>';
            }

            ?>
        </ul>
    </div>

    <div class="nav-icons">
        <a href="connexion.php"><i class="fas fa-user fa-2x" style="color: black;"></i></a>
        <div class="block">
            <div class="circle">
                <div class="nav-item dropdown dropdown show" role="presentation">
                    <a role="button" data-toggle="dropdown">
                        <?php
                        if ($_SESSION['user'] != "pas-co")
                            echo '<p style="text-transform : uppercase;">' . $_SESSION['user'][0] . '</p>';
                        else
                            echo '<p style="text-transform : uppercase;"> <img src="image/vide.png" alt="vide"> </p>';
                        ?>
                    </a>
                    <div style="background: red;" class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a style="text-align: center;" class="dropdown-item" role="button">Déconnexion</a>
                        <?php
                        unset($_SESSION['uid']);
                        unset($_SESSION['user']);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <a href="panier.php"><i class="fas fa-cart-shopping fa-2x" style="color: black;"></i></a>
    </div>
</nav>