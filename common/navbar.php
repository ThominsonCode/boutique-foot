<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "pas-co";
    // echo 'ok!!';
} else {
    // include('index.php');
    // echo $_SESSION['user'];
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
                echo '<li class="nav-item dropdown">
                <a style="text-transform : uppercase;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown-homme" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                echo $categorie['nom'];
                echo '</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

                foreach ($sous_categories as $sous_categorie) {
                    if ($sous_categorie['categorie'] == $categorie['id']) {
                        echo '<a class="dropdown-item" href="#">' . $sous_categorie['nom'] . '</a>';
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
                <?php
                echo '<p style="text-transform: uppercase;">' . $_SESSION['user'][0] . '</p>';
                ?>
            </div>
        </div>
        <a href="panier.php"><i class="fas fa-cart-shopping fa-2x" style="color: black;"></i></a>
    </div>
</nav>