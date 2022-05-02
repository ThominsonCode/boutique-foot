<?php
$css_sheet = "style";
require('common/header.php');

require("common/navbar.php");
?>

<main>

    <!-- <div style="display: block; position: absolute; width: 100%; height: 100px; z-index: -1;">
        </div> -->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">

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
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="container">
                    <div class="thumbnail">
                        <div>
                            <a href="/pantalon-om-football-heritage-bleu-520670h"">
                                <img alt=" Pantalon OM Football Heritage Bleu" src="https://api.prod.panini.cloud/pub/media/catalog/product/resized/300/5/2/520670h.jpg" width="50%">
                                <p class="prix">80,00€</p>
                            </a>
                            <p class="new">Nouveauté</p>
                        </div>
                        <div class="caption">
                            <a href="#">
                                <h3 style="font-size: 100%;">Pantalon OM Football Heritage Bleu</h3>
                            </a>
                            <button>Ajouter au panier</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="container">
                    <div class="thumbnail">
                        <div>
                            <a href="/pantalon-om-football-heritage-bleu-520670h"">
                                <img alt=" Pantalon OM Football Heritage Bleu" src="https://api.prod.panini.cloud/pub/media/catalog/product/resized/300/5/2/520670h.jpg" width="50%">
                                <p class="prix">80,00€</p>
                            </a>
                            <p class="new">Nouveauté</p>
                        </div>
                        <div class="caption">
                            <a href="#">
                                <h3 style="font-size: 100%;">Pantalon OM Football Heritage Bleu</h3>
                            </a>
                            <button>Ajouter au panier</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="container">
                    <div class="thumbnail">
                        <div>
                            <a href="/pantalon-om-football-heritage-bleu-520670h"">
                                <img alt=" Pantalon OM Football Heritage Bleu" src="https://api.prod.panini.cloud/pub/media/catalog/product/resized/300/5/2/520670h.jpg" width="50%">
                                <p class="prix">80,00€</p>
                            </a>
                            <p class="new">Nouveauté</p>
                        </div>
                        <div class="caption">
                            <a href="#">
                                <h3 style="font-size: 100%;">Pantalon OM Football Heritage Bleu</h3>
                            </a>
                            <button>Ajouter au panier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="red">
        <div class="maps">
            <div class="row">
                <div class="col-lg-6">
                    <iframe class="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2779.9038853334882!2d1.25658681597062!3d45.83320647910701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f934ba64f155db%3A0xc9be8a78c7adf06b!2sNum%C3%A9ro%2010%20LIMOGES!5e0!3m2!1sen!2sfr!4v1600791155310!5m2!1sen!2sfr" width="100%" height="400">
                    </iframe>
                </div>
                <div class="col-lg-6 description">
                    <h2 id="TitreBoutique">Boutique Officiel du Club</h2>
                    <p>
                        &nbsp;
                        <span><u> Adresse :</u> 22 Boulevard Carnot 87000 LIMOGES </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <img src="Image/Logo_Club.png" alt="Logo_Club" style="height: 160px;">
        <p>Suivez le FootClub 2022 sur les réseaux sociaux !</p>
        <div>
            <a href="https://www.instagram.com/limogesfoot/" class="fab fa-facebook fa-5x" style="color: #FAA307;"></a>
            <a href="https://www.facebook.com/limogesfoot/" class="fab fa-instagram fa-5x" style="color: #FAA307;"></a>
            <a href="https://twitter.com/lfc_limoges" class="fab fa-twitter fa-5x" style="color: #FAA307;"></a>
        </div>
    </footer>

    <div class="copyright-section">
        <span>© FootClub 2022 Tous droits réservés</span>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</main>
</body>

</html>