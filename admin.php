<?php
$css_sheet = "adminstyle";
require('common/header.php');

require("common/navbar.php");

if (isset($_SESSION['uid']) && $_SESSION['uid'] == 35) {

    $statement = $db->query('SELECT * FROM categorie');
    $categories = $statement->fetchAll();
    $statement = $db->query('SELECT * FROM souscategorie');
    $sous_categories = $statement->fetchAll();
    $statement = $db->query('SELECT * FROM item');
    $items = $statement->fetchAll();

?>

    <div class="container" style="margin-top: 30px;">
        <div class="row">

            <div class="col-12 col-sm-12 col-md-3">

                <br><br>
                <h4>Catégories</h4>

                <div class="list-group" id="list-tab">
                    <?php
                    foreach ($categories as $categorie) {
                        if ($categorie['id'] == 1) {
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
                        if ($categorie['id'] == 1) {
                            echo '<div id="categorie-' . $categorie['id'] . '" class="tab-pane fade show active">';
                        } else {
                            echo '<div id="categorie-' . $categorie['id'] . '" class="tab-pane fade show">';
                        }
                        echo '<div class="list-group">';
                        foreach ($sous_categories as $sous_categorie) {
                            if ($sous_categorie['categorie'] == $categorie['id']) {
                                if ($sous_categorie['id'] == 1) {
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
                        if ($sous_categorie['id'] == 1) {
                            echo '<div id="sous-categorie-' . $sous_categorie['id'] . '" class="tab-pane fade show active">';
                        } else {
                            echo '<div id="sous-categorie-' . $sous_categorie['id'] . '" class="tab-pane fade show">';
                        }

                        foreach ($items as $item) {
                            if ($item['souscategorie'] == $sous_categorie['id']) {


                                echo '
                                <div class="modal fade bd-example-modal-lg" id="modal-voir-item-' . $item['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">VOIR l\'item ' . $item['id'] . '</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h2>Nom de l\'item :</h2>
                            <p>' . $item['nom'] . '</p>
                            <h2>Prix de l\'item :</h2>
                            <p>prix : ' . number_format($item['prix'], 2, '.', '') . ' €</p>
                            <h2>Catégorie :</h2>
                            <p>' . $categorie['nom'] . '</p>
                            <h2>Sous-catégorie :</h2>
                            <p>' . $sous_categorie['nom'] . '</p>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <img src="Image/' . $item['image'] . '" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>                                
                                ';

                                echo '<div class="admin-list-element">';
                                echo '<p>' . $item['nom'] . '</p>';



                                echo '<div class="boutons">
                                <a class="btn-voir" type="button" data-toggle="modal" data-target="#modal-voir-item-' . $item['id'] . '"><i class="fas fa-eye"></i>&nbsp; Voir</a>
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


    <!-- Voir un item -->
    <div class="modal fade bd-example-modal-lg" id="modal-modifier-item-5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">VOIR l'item 5</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h2>Thomas</h2>
                            <p>prix : 50000€</p>
                            <p>sous-catégorie</p>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <img src="Image/casquette2.png" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

<?php
}
require('common/footer.php');
?>