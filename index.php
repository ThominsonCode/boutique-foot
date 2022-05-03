<?php

$css_sheet = "style";
require('common/header.php');

if (isset($_POST['ajouter-item-id'])) {
    if (isset($_SESSION['uid'])) {
        // echo '<script>alert("Vous avez ajoutés un item dans le panier");</script>';
        // echo 'item id : ' . $_POST['ajouter-item-id'];
        // echo 'vous etes : ' . $_SESSION['uid'];
        $statement = $db->prepare('INSERT INTO historique (user, item) values (?,?)');
        $statement->execute(array($_SESSION['uid'], $_POST['ajouter-item-id']));
    } else {
        echo '<script>alert("Vous n\'êtes pas connectés. Veuillez vous connecter.");</script>';
    }
}

require("common/navbar.php");

?>

<main>



    <?php
    if (!isset($_GET['id'])) {
        echo '
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin : auto 17%;">

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="Image/limoges.png" alt="...">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="Image/football.jpg" alt="...">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="Image/boutique.png" alt="...">
            </div>
        </div>

        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="fas fa-hand-point-left fa-3x" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="fas fa-hand-point-right fa-3x" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>

    <div id="nouveaute" style="background-color: rgb(211,211,211); padding: 20px">
        <h4>Nouveautés FootClub 2022</h4>
        <p>Retrouvez les nouveaux produits officiels FootClub 2022</p>
        <div class="row">';
        $statement = $db->query("SELECT * FROM item WHERE id = 25 OR id = 3 OR id = 37 OR id = 47");
        $items = $statement->fetchAll();

        // echo '<div class="container-fluid"><div class="row">';
        foreach ($items as $item) {
            echo '
            <div style="margin:50px 0px" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="container">
                    <div class="thumbnail">
                        <div>
                            <img alt="' . $item['nom'] . '"src="image/' . $item['image'] . '" width="300px;" height="300px;">
                            <p class="prix">' . number_format($item['prix'], 2, '.', '') . ' €</p>
                            <p class="new">Nouveauté</p>
                        </div>
                        <div class="caption">
                            <a href="#">
                                <h3 style="text-transform : uppercase; margin-top:20px; margin-right:10px; width:180px; font-size: 100%;">' . $item['nom'] . '</h3>
                            </a>
                            <form action="" method="POST">
            <div class="form-group">
                <input type="hidden" name="ajouter-item-id" value="' . $item['id'] . '">
            </div>

            <button style="width:150px; height:50px;" type="submit" class="btn btn-outline-danger">Ajouter au panier</button>
        </form>
                        </div>
                    </div>
                </div>
                </div>';
        }
        // echo '</div>';
        // echo '</div>';
        echo '
        </div>
    </div>


    <div class="red">
        <div class="maps">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <iframe class="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2779.9038853334882!2d1.25658681597062!3d45.83320647910701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f934ba64f155db%3A0xc9be8a78c7adf06b!2sNum%C3%A9ro%2010%20LIMOGES!5e0!3m2!1sen!2sfr!4v1600791155310!5m2!1sen!2sfr" width="100%" height="400">
                    </iframe>
                </div>
                <div class="col-sm-6 col-md-6 description" style="display: flex; flex-direction:column; justify-content:center;">
                    <h2 id="TitreBoutique">Boutique Officiel du Club</h2><br>
                    <p>
                        &nbsp;
                        <span><u> Adresse :</u> 22 Boulevard Carnot 87000 LIMOGES </span>
                    </p>
                </div>
            </div>
        </div>
    </div>';
    } else {
        $statement = $db->query('SELECT * FROM souscategorie');
        $souscategories = $statement->fetchAll();

        echo '<div class="tab-content">';

        foreach ($souscategories as $souscategory) {
            echo '<div class="row">';

            $statement = $db->prepare('SELECT * FROM item WHERE item.souscategorie = ?');
            $statement->execute(array($souscategory['id']));

            while ($item = $statement->fetch()) {
                if ($item['souscategorie'] == $_GET['id']) {
                    echo
                    '<div style="margin:50px" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                    <div>
                        <img alt="' . $item['nom'] . '"src="image/' . $item['image'] . '" width="200px;" height="200px;">
                        <p class="prix">' . number_format($item['prix'], 2, '.', '') . ' €</p>
                    </div>
                    <div class="caption">
                        <a href="#">
                            <h3 style="text-transform : uppercase; width:180px; margin-top:20px; font-size: 100%;">' . $item['nom'] . '</h3>
                        </a>
                        
                        <form action="" method="POST">
            <div class="form-group">
                <input type="hidden" name="ajouter-item-id" value="' . $item['id'] . '">
            </div>

            <button style="width:150px; height:50px;" type="submit" class="btn btn-outline-danger">Ajouter au panier</button>
        </form>
                    </div>
                </div>
            </div>';
                }
            }
            echo '</div>
        </div>';
        }
        echo '</div>';
    }
    ?>


    <?php
    require('common/footer.php');
    ?>