<!doctype html>
<html lang="en">

<head>
    <title>Administration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bouton-admin.css">

    <!-- ICONES -->
    <script src="https://kit.fontawesome.com/cfbe1907bd.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        require("header.php");
    ?>
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-3">
                <br><br>
                <h4>Catégories</h4>


                <div class="list-group" id="list-tab">
                    <button data-toggle="list" href="#categorie-1" type="button" class="btn-admin active"><span>Joueurs</span></button>
                    <button data-toggle="list" href="#categorie-2" type="button" class="btn-admin"><span>Hommes</span></button>
                    <button data-toggle="list" href="#categorie-3" type="button" class="btn-admin"><span>Femmes</span></button>

                    <button href="#" type="button" class="btn-admin btn-admin-ajouter"><span>AJOUTER</span></button>
                    <button href="#" type="button" class="btn-admin btn-admin-modifier"><span>MODIFIER</span></button>
                    <button href="#" type="button" class="btn-admin btn-admin-supprimer"><span>SUPPRIMER</span></button>
                </div>

                <h4>Sous-catégories</h4>
                <div class="tab-content liste-sous-categories">

                    <div id="categorie-1" class="tab-pane fade show active">
                        <div class="list-group" id="list-tab2">
                            <button data-toggle="list" href="#sous-categorie-1" t.36ype="button" class="btn-admin active"><span>Sous-catégorie 1</span></button>
                            <button data-toggle="list" href="#sous-categorie-2" type="button" class="btn-admin"><span>Sous-catégorie 2</span></button>
                            <button data-toggle="list" href="#sous-categorie-2" type="button" class="btn-admin"><span>Sous-catégorie 2</span></button>
                            <button data-toggle="list" href="#sous-categorie-2" type="button" class="btn-admin"><span>Sous-catégorie 2</span></button>

                            <button href="#" type="button" class="btn-admin btn-admin-ajouter"><span>AJOUTER</span></button>
                            <button href="#" type="button" class="btn-admin btn-admin-modifier"><span>MODIFIER</span></button>
                            <button href="#" type="button" class="btn-admin btn-admin-supprimer"><span>SUPPRIMER</span></button>
                        </div>
                    </div>
                    <div id="categorie-2" class="tab-pane fade">
                        <div class="list-group" id="list-tab3">
                            <button data-toggle="list" href="#sous-categorie-3" type="button" class="btn-admin"><span>Sous-catégorie 3</span></button>
                            <button data-toggle="list" href="#sous-categorie-4" type="button" class="btn-admin"><span>Sous-catégorie 4</span></button>

                            <button href="#" type="button" class="btn-admin btn-admin-ajouter"><span>AJOUTER</span></button>
                            <button href="#" type="button" class="btn-admin btn-admin-modifier"><span>MODIFIER</span></button>
                            <button href="#" type="button" class="btn-admin btn-admin-supprimer"><span>SUPPRIMER</span></button>

                        </div>
                    </div>
                    <div id="categorie-3" class="tab-pane fade">
                        <div class="list-group" id="list-tab3">
                            <button data-toggle="list" href="#sous-categorie-3" type="button" class="btn-admin"><span>Sous-catégorie 3</span></button>
                            <button data-toggle="list" href="#sous-categorie-4" type="button" class="btn-admin"><span>Sous-catégorie 4</span></button>
                            <button data-toggle="list" href="#sous-categorie-4" type="button" class="btn-admin"><span>Sous-catégorie 4</span></button>

                            <button href="#" type="button" class="btn-admin btn-admin-ajouter"><span>AJOUTER</span></button>
                            <button href="#" type="button" class="btn-admin btn-admin-modifier"><span>MODIFIER</span></button>
                            <button href="#" type="button" class="btn-admin btn-admin-supprimer"><span>SUPPRIMER</span></button>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-sm-12 col-md-1"></div>

            <div class="col-12 col-sm-12 col-md-8">

                <h2>Eléments</h2>
                <hr>
                <button type="button" class="btn btn-success" style="width: 100%; margin-bottom:10px;">Ajouter</button>

                <div class="tab-content">

                    <div id="sous-categorie-1" class="tab-pane fade show active">
                        <div class="admin-list-element">
                            <p>Premier élément</p>
                            <div class="boutons">
                                <a href="" class="btn-voir"><i class="fas fa-eye"></i>&nbsp; Voir</a>
                                <a href="" class="btn-modifier"><i class="fas fa-pen"></i>&nbsp; Modifier</a>
                                <a href="" class="btn-supprimer"><i class="fas fa-trash"></i>&nbsp; Supprimer</a>
                            </div>
                        </div>

                        <div class="admin-list-element">
                            <p>Second élément</p>
                            <div class="boutons">
                                <a href="" class="btn-voir"><i class="fas fa-eye"></i>&nbsp; Voir</a>
                                <a href="" class="btn-modifier"><i class="fas fa-pen"></i>&nbsp; Modifier</a>
                                <a href="" class="btn-supprimer"><i class="fas fa-trash"></i>&nbsp; Supprimer</a>
                            </div>
                        </div>
                    </div>


                    <div id="sous-categorie-2" class="tab-pane fade">
                        <div class="admin-list-element">
                            <p>Troisième élément</p>
                            <div class="boutons">
                                <a href="" class="btn-voir"><i class="fas fa-eye"></i>&nbsp; Voir</a>
                                <a href="" class="btn-modifier"><i class="fas fa-pen"></i>&nbsp; Modifier</a>
                                <a href="" class="btn-supprimer"><i class="fas fa-trash"></i>&nbsp; Supprimer</a>
                            </div>
                        </div>

                        <div class="admin-list-element">
                            <p>Quatrième élément</p>
                            <div class="boutons">
                                <a href="" class="btn-voir"><i class="fas fa-eye"></i>&nbsp; Voir</a>
                                <a href="" class="btn-modifier"><i class="fas fa-pen"></i>&nbsp; Modifier</a>
                                <a href="" class="btn-supprimer"><i class="fas fa-trash"></i>&nbsp; Supprimer</a>
                            </div>
                        </div>
                    </div>

                    <div id="sous-categorie-3" class="tab-pane fade">
                        <div class="admin-list-element">
                            <p>Quatrième élément</p>
                            <div class="boutons">
                                <a href="" class="btn-voir"><i class="fas fa-eye"></i>&nbsp; Voir</a>
                                <a href="" class="btn-modifier"><i class="fas fa-pen"></i>&nbsp; Modifier</a>
                                <a href="" class="btn-supprimer"><i class="fas fa-trash"></i>&nbsp; Supprimer</a>
                            </div>
                        </div>

                        <div class="admin-list-element">
                            <p>Cinquième élément</p>
                            <div class="boutons">
                                <a href="" class="btn-voir"><i class="fas fa-eye"></i>&nbsp; Voir</a>
                                <a href="" class="btn-modifier"><i class="fas fa-pen"></i>&nbsp; Modifier</a>
                                <a href="" class="btn-supprimer"><i class="fas fa-trash"></i>&nbsp; Supprimer</a>
                            </div>
                        </div>
                    </div>

                    <div id="sous-categorie-4" class="tab-pane fade">
                        <div class="admin-list-element">
                            <p>Sixième élément</p>
                            <div class="boutons">
                                <a href="" class="btn-voir"><i class="fas fa-eye"></i>&nbsp; Voir</a>
                                <a href="" class="btn-modifier"><i class="fas fa-pen"></i>&nbsp; Modifier</a>
                                <a href="" class="btn-supprimer"><i class="fas fa-trash"></i>&nbsp; Supprimer</a>
                            </div>
                        </div>

                        <div class="admin-list-element">
                            <p>Septième élément</p>
                            <div class="boutons">
                                <a href="" class="btn-voir"><i class="fas fa-eye"></i>&nbsp; Voir</a>
                                <a href="" class="btn-modifier"><i class="fas fa-pen"></i>&nbsp; Modifier</a>
                                <a href="" class="btn-supprimer"><i class="fas fa-trash"></i>&nbsp; Supprimer</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>