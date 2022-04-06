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
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <br><br>
                <h4>Catégories</h4>


                <div class="list-group" id="list-tab" role="tablist">
                    <button data-toggle="list" href="#categorie1" type="button" class="btn btn-outline-dark active">Joueurs</button>
                    <button data-toggle="list" href="#categorie2" type="button" class="btn btn-outline-dark">Hommes</button>
                </div>


                <h4>Sous-catégories</h4>

                <div class="list-group" id="list-tab" role="tablist">

                    <button data-toggle="list" href="#sous-categorie-1" type="button" class="btn btn-outline-secondary active">Sous-catégorie 1</button>
                    <button data-toggle="list" href="#sous-categorie-2" type="button" class="btn btn-outline-secondary">Sous-catégorie 2</button>

                    <button data-toggle="list" href="#sous-categorie-3" type="button" class="btn btn-outline-secondary">Sous-catégorie 3</button>
                    <button data-toggle="list" href="#sous-categorie-4" type="button" class="btn btn-outline-secondary">Sous-catégorie 4</button>

                </div>

            </div>
            <div class="col-md-9">

                <h2>Eléments</h2>
                <hr>
                <button type="button" class="btn btn-success" style="width: 100%; margin-bottom:10px;">Ajouter</button>

                <div class="tab-content">

                    <div id="sous-categorie-1" class="tab-pane fade show active">

                        <div class="admin-list-element">
                            <p>Premier élément</p>
                            <div class="boutons">
                                <a href="" class="btn btn-outline-primary">Voir</a>
                                <a href="" class="btn btn-outline-warning">Modifier</a>
                                <a href="" class="btn btn-outline-danger">Supprimer</a>
                            </div>
                        </div>

                        <div class="admin-list-element">
                            <p>Second élément</p>
                            <div class="boutons">
                                <a href="" class="btn btn-outline-primary">Voir</a>
                                <a href="" class="btn btn-outline-warning">Modifier</a>
                                <a href="" class="btn btn-outline-danger">Supprimer</a>
                            </div>
                        </div>
                    </div>


                    <div id="sous-categorie-2" class="tab-pane fade">
                        <div class="admin-list-element">
                            <p>Troisième élément</p>
                            <div class="boutons">
                                <a href="" class="btn btn-outline-primary">Voir</a>
                                <a href="" class="btn btn-outline-warning">Modifier</a>
                                <a href="" class="btn btn-outline-danger">Supprimer</a>
                            </div>
                        </div>

                        <div class="admin-list-element">
                            <p>Quatrième élément</p>
                            <div class="boutons">
                                <a href="" class="btn btn-outline-primary">Voir</a>
                                <a href="" class="btn btn-outline-warning">Modifier</a>
                                <a href="" class="btn btn-outline-danger">Supprimer</a>
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