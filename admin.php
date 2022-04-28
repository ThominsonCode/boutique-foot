<!doctype html>
<html lang="en">

<head>
    <title>Administration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/adminstyle.css">

    <!-- ICONES -->
    <script src="https://kit.fontawesome.com/cfbe1907bd.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require("common/navbar.php");
    ?>

    <?php
    if (isset($_COOKIE['user']) && $_COOKIE['user'] == 'administrateur') {
    ?>

        <?php

        //     require 'database.php';

        //     $db = Database::connect();
        //     $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category
        // FROM items LEFT JOIN categories ON items.category = categories.id
        // ORDER BY items.id DESC');

        // while ($item = $statement->fetch()) {
        //     echo '<tr>';
        //     echo '<td>' . $item['name'] . '</td>';
        //     echo '<td>' . $item['description'] . '</td>';
        //     echo '<td>' . number_format((float)$item['price'], 2, '.', '') . '€</td>';
        //     echo '<td>' . $item['category'] . '</td>';
        //     echo '<td width=300>';
        //     echo '<a class="btn btn-default" href="view.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-eye-open"></span> Voir</a> ';
        //     echo '<a class="btn btn-primary" href="update.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-pencil"></span> Modifier</a> ';
        //     echo '<a class="btn btn-danger" href="delete.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
        //     echo '</td>';
        //     echo '</tr>';
        // }

        // Database::disconnect();

        //-----------------------------------------------------------
        // require '../login/database.php';
        // $categories = [$db->query('');]
        // $sous_categories = $db->query('');
        // $items = $db->query('');


        $categories = [
            [
                'id' => 0,
                'nom' => 'homme'
            ],
            [
                'id' => 1,
                'nom' => 'femme'
            ],
            [
                'id' => 2,
                'nom' => 'enfant'
            ]
        ];
        $sous_categories = [
            [
                'id' => 0,
                'categorie' => 0,
                'nom' => 'homme-1'
            ],
            [
                'id' => 1,
                'categorie' => 0,
                'nom' => 'homme-2'
            ],
            [
                'id' => 2,
                'categorie' => 1,
                'nom' => 'femme-1'
            ],
            [
                'id' => 3,
                'categorie' => 1,
                'nom' => 'femme-2'
            ],
            [
                'id' => 4,
                'categorie' => 2,
                'nom' => 'enfant-1'
            ],
            [
                'id' => 5,
                'categorie' => 2,
                'nom' => 'enfant-2'
            ]
        ];
        $items = [
            [
                'id' => 0,
                'sous-categorie' => 0,
                'nom' => 'item 1',
                'prix' => '15.5'
            ],
            [
                'id' => 1,
                'sous-categorie' => 0,
                'nom' => 'item 2',
                'prix' => '15.5'
            ],
            [
                'id' => 2,
                'sous-categorie' => 1,
                'nom' => 'item 3',
                'prix' => '15.5'
            ],
            [
                'id' => 3,
                'sous-categorie' => 2,
                'nom' => 'item 4',
                'prix' => '15.5'
            ],
            [
                'id' => 4,
                'sous-categorie' => 3,
                'nom' => 'item 5',
                'prix' => '15.5'
            ],
            [
                'id' => 5,
                'sous-categorie' => 4,
                'nom' => 'item 6',
                'prix' => '15.5'
            ],
            [
                'id' => 6,
                'sous-categorie' => 5,
                'nom' => 'item 7',
                'prix' => '15.5'
            ]
        ];


        ?>

        <div class="container" style="margin-top: 30px;">
            <div class="row">

                <div class="col-12 col-sm-12 col-md-3">

                    <br><br>
                    <h4>Catégories</h4>

                    <div class="list-group" id="list-tab">
                        <?php
                        foreach ($categories as $categorie) {
                            if ($categorie['id'] == 0) {
                                echo '<button data-toggle="list" href="#categorie-' . $categorie['id'] . '" type="button" class="btn-admin active"><span>' . $categorie['nom'] . '</span></button>';
                            } else {
                                echo '<button data-toggle="list" href="#categorie-' . $categorie['id'] . '" type="button" class="btn-admin"><span>' . $categorie['nom'] . '</span></button>';
                            }
                        }
                        ?>
                        <button href="#" type="button" class="btn-admin btn-admin-ajouter" data-toggle="modal" data-target="#modal-ajouter-categorie"><span>AJOUTER</span></button>
                        <button href="#" type="button" class="btn-admin btn-admin-modifier" data-toggle="modal" data-target="#modal-modifier-categorie"><span>MODIFIER</span></button>
                        <button href="#" type="button" class="btn-admin btn-admin-supprimer" data-toggle="modal" data-target="#modal-supprimer-categorie"><span>SUPPRIMER</span></button>
                    </div>

                    <h4>Sous-catégories</h4>
                    <div class="tab-content liste-sous-categories">
                        <?php
                        foreach ($categories as $categorie) {
                            if ($categorie['id'] == 0) {
                                echo '<div id="categorie-' . $categorie['id'] . '" class="tab-pane fade show active">';
                            } else {
                                echo '<div id="categorie-' . $categorie['id'] . '" class="tab-pane fade show">';
                            }
                            echo '<div class="list-group">';
                            foreach ($sous_categories as $sous_categorie) {
                                if ($sous_categorie['categorie'] == $categorie['id']) {
                                    if ($sous_categorie['id'] == 0) {
                                        echo '<button data-toggle="list" href="#sous-categorie-' . $sous_categorie['id'] . '" type="button" class="btn-admin active"><span>' . $sous_categorie['nom'] . '</span></button>';
                                    } else {
                                        echo '<button data-toggle="list" href="#sous-categorie-' . $sous_categorie['id'] . '" type="button" class="btn-admin"><span>' . $sous_categorie['nom'] . '</span></button>';
                                    }
                                }
                            }
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>

                        <div class="list-group">
                            <button href="#" type="button" class="btn-admin btn-admin-ajouter" data-toggle="modal" data-target="#modal-ajouter-sous-categorie"><span>AJOUTER</span></button>
                            <button href="#" type="button" class="btn-admin btn-admin-modifier" data-toggle="modal" data-target="#modal-modifier-sous-categorie"><span>MODIFIER</span></button>
                            <button href="#" type="button" class="btn-admin btn-admin-supprimer" data-toggle="modal" data-target="#modal-supprimer-sous-categorie"><span>SUPPRIMER</span></button>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-sm-12 col-md-1"></div>

                <div class="col-12 col-sm-12 col-md-8">

                    <h2>Eléments</h2>
                    <hr>
                    <button type="button" class="btn btn-success" style="width: 100%; margin-bottom:10px;">Ajouter</button>

                    <div class="tab-content">

                        <?php
                        foreach ($sous_categories as $sous_categorie) {
                            if ($sous_categorie['id'] == 0) {
                                echo '<div id="sous-categorie-' . $sous_categorie['id'] . '" class="tab-pane fade show active">';
                            } else {
                                echo '<div id="sous-categorie-' . $sous_categorie['id'] . '" class="tab-pane fade show">';
                            }

                            foreach ($items as $item) {
                                if ($item['sous-categorie'] == $sous_categorie['id']) {
                                    echo '<div class="admin-list-element">';
                                    echo '<p>' . $item['nom'] . '</p>';

                                    echo '<div class="boutons">
                                <a href="" class="btn-voir"><i class="fas fa-eye"></i>&nbsp; Voir</a>
                                <a href="" class="btn-modifier"><i class="fas fa-pen"></i>&nbsp; Modifier</a>
                                <a href="" class="btn-supprimer"><i class="fas fa-trash"></i>&nbsp; Supprimer</a>
                            </div>';

                                    echo '</div>';
                                }
                            }

                            echo '</div>';
                        }
                        ?>

                        <!-- <div id="sous-categorie-0" class="tab-pane fade show active">

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

                    </div> -->

                    </div>
                </div>
            </div>
        </div>

        <!-- LES MODALES -->

        <!-- Ajouter catégorie -->
        <div class="modal fade bd-example-modal-lg" id="modal-ajouter-categorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">AJOUTER une catégorie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Nom de la catégorie</label>
                                <input name="nom-categorie" type="text" class="form-control" placeholder="Nom de la catégorie">
                            </div>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modifier catégorie -->
        <div class="modal fade bd-example-modal-lg" id="modal-modifier-categorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">MODIFIER une catégorie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Choisir une catégorie</label>
                                <select name="ancien-nom" class="form-control">
                                    <?php
                                    foreach ($categories as $categorie) {
                                        echo '<option>' . $categorie['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nouveau nom de la catégorie</label>
                                <input name="nom-categorie" type="text" class="form-control" placeholder="Nom de la catégorie">
                            </div>

                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Supprimer une catégorie -->
        <div class="modal fade bd-example-modal-lg" id="modal-supprimer-categorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">SUPPRIMER une catégorie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Choisissez une catégorie</label>
                                <select name="categorie-a-supprimer" class="form-control">
                                    <?php
                                    foreach ($categories as $categorie) {
                                        echo '<option>' . $categorie['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ajouter sous-catégorie -->
        <div class="modal fade bd-example-modal-lg" id="modal-ajouter-sous-categorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">AJOUTER une sous-catégorie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Catégorie parente</label>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nom de la sous-catégorie</label>
                                <input name="nom-sous-categorie" type="text" class="form-control" placeholder="Nom de la sous-catégorie">
                            </div>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modifier sous-catégorie -->
        <div class="modal fade bd-example-modal-lg" id="modal-modifier-sous-categorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">MODIFIER une sous-catégorie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Choisir une sous-catégorie</label>
                                <select name="ancien-nom-sous-categorie" class="form-control">
                                    <?php
                                    foreach ($sous_categories as $sous_categorie) {
                                        echo '<option value="' . $sous_categorie['id'] . '">' . $categories[$sous_categorie['categorie']]['nom'] . ' : ' . $sous_categorie['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nouveau nom de la sous-catégorie</label>
                                <input name="nom-sous-categorie" type="text" class="form-control" placeholder="Nom de la sous-catégorie">
                            </div>

                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Supprimer une sous-catégorie -->
        <div class="modal fade bd-example-modal-lg" id="modal-supprimer-sous-categorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">SUPPRIMER une sous-catégorie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Choisissez une sous-catégorie</label>
                                <select name="sous-categorie-a-supprimer" class="form-control">
                                    <?php
                                    foreach ($sous_categories as $sous_categorie) {
                                        echo '<option value="' . $sous_categorie['id'] . '">' . $categories[$sous_categorie['categorie']]['nom'] . ' : ' . $sous_categorie['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>