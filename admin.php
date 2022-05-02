<?php
$css_sheet = "adminstyle";
require('common/header.php');

require("common/navbar.php");

if (isset($_SESSION['uid']) && $_SESSION['uid'] == 35) {

    if (isset($_POST['ajouter-item-id-sous-categorie']) && isset($_POST['ajouter-item-nom']) && isset($_POST['ajouter-item-prix'])) {
        $sc_id = $_POST['ajouter-item-id-sous-categorie'];
        $item_nom = $_POST['ajouter-item-nom'];
        $item_prix = $_POST['ajouter-item-prix'];
        echo 'id sous-categorie : ' . $sc_id . '<br>';
        echo 'nom item : ' . $item_nom . '<br>';
        echo 'prix : ' . $item_prix . '<br>';

        $statement = $db->prepare('INSERT INTO item (nom, prix, souscategorie, image) values (?,?,?,?)');
        $statement->execute(array($item_nom, $item_prix, $sc_id, 'casquette1.png'));
    }

    if (isset($_POST['modifier-item-id']) && isset($_POST['modifier-item-id-sous-categorie']) && isset($_POST['modifier-item-nouveau-nom']) && isset($_POST['modifier-item-nouveau-prix'])) {
        $item_id = $_POST['modifier-item-id'];
        $sc_id = $_POST['modifier-item-id-sous-categorie'];
        $item_nom = $_POST['modifier-item-nouveau-nom'];
        $item_prix = $_POST['modifier-item-nouveau-prix'];
        echo 'id item : ' . $item_id . '<br>';
        echo 'id sous-categorie : ' . $sc_id . '<br>';
        echo 'nouveau nom : ' . $item_nom . '<br>';
        echo 'nouveau prix : ' . $item_prix . '<br>';

        $statement = $db->prepare('UPDATE item set nom = ?, souscategorie = ?, prix= ? WHERE id = ?');
        $statement->execute(array($item_nom, $sc_id, $item_prix, $item_id));
    }

    if (isset($_POST['supprimer-item-id'])) {
        $item_id = $_POST['supprimer-item-id'];
        echo 'id item : ' . $item_id . '<br>';

        $statement = $db->prepare('DELETE FROM item WHERE id = ?');
        $statement->execute(array($item_id));
    }

    if (isset($_POST['ajouter-categorie-nom'])) {
        $c_nom = $_POST['ajouter-categorie-nom'];
        echo 'nom categorie : ' . $c_nom . '<br>';
    }

    if (isset($_POST['modifier-categorie-id']) && isset($_POST['modifier-categorie-nouveau-nom'])) {
        $c_id = $_POST['modifier-categorie-id'];
        $c_nom = $_POST['modifier-categorie-nouveau-nom'];
        echo 'id categorie : ' . $c_id . '<br>';
        echo 'catégorie nouveau nom : ' . $c_nom . '<br>';
    }

    if (isset($_POST['supprimer-categorie-id'])) {
        $c_id = $_POST['supprimer-categorie-id'];
        echo 'id categorie : ' . $c_id . '<br>';
    }

    if (isset($_POST['ajouter-sous-categorie-id-categorie']) && isset($_POST['ajouter-sous-categorie-nom'])) {
        $c_id = $_POST['ajouter-sous-categorie-id-categorie'];
        $sc_nom = $_POST['ajouter-sous-categorie-nom'];
        echo 'id categorie : ' . $c_id . '<br>';
        echo 'sous-catégorie nouveau nom : ' . $sc_nom . '<br>';
    }

    if (isset($_POST['modifier-sous-categorie-id']) && isset($_POST['modifier-sous-categorie-id-categorie']) && isset($_POST['modifier-sous-categorie-nouveau-nom'])) {
        $sc_id = $_POST['modifier-sous-categorie-id'];
        $c_id = $_POST['modifier-sous-categorie-id-categorie'];
        $sc_nom = $_POST['modifier-sous-categorie-nouveau-nom'];
        echo 'id sous-categorie : ' . $sc_id . '<br>';
        echo 'id categorie : ' . $c_id . '<br>';
        echo 'nouveau nom sous-catégorie : ' . $sc_nom . '<br>';
    }

    if (isset($_POST['supprimer-sous-categorie-id'])) {
        echo 'id sous-categorie : ' . $_POST['supprimer-sous-categorie-id'] . '<br>';
    }






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
                <button type="button" class="btn btn-success" style="width: 100%; margin-bottom:10px;" data-toggle="modal" data-target="#modal-ajouter-item">Ajouter</button>

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
                                $c = null;
                                $c_id = $sous_categorie['categorie'];
                                foreach ($categories as $categorie) {
                                    if ($categorie['id'] == $c_id) {
                                        $c = $categorie;
                                        break;
                                    }
                                }

                                // ==============================================================================

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

                                // ==============================================================================



                                echo '<div class="modal fade bd-example-modal-lg" id="modal-modifier-item-' . $item['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modifier l\'item ' . $item['id'] . '</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                        
                                            <p>Nom actuel : <strong>' . $item['nom'] . '</strong></p>
                                            <p>Catégorie actuelle : <strong>' . $c['nom'] . '</strong></p>
                                            <p>Sous-catégorie actuelle : <strong>' . $sous_categorie['nom'] . '</strong></p>
                        
                                            <form action="" method="POST">
                                                <div class="form-group">
                                                    <label>Choisir une nouvelle sous-catégorie</label>
                                                    <select name="modifier-item-id-sous-categorie" class="form-control">';

                                foreach ($categories as $a_categorie) {
                                    foreach ($sous_categories as $a_sous_categorie) {
                                        if ($a_sous_categorie['categorie'] == $a_categorie['id']) {
                                            echo '<option value="' . $a_sous_categorie['id'] . '">' . $a_categorie['nom'] . ' : ' . $a_sous_categorie['nom'] . '</option>';
                                        }
                                    }
                                }
                                echo '
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nouveau nom de l\'item</label>
                                                    <input name="modifier-item-nouveau-nom" type="text" class="form-control" placeholder="Nouveau nom de l\'item">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nouveau prix de l\'item</label>
                                                    <input name="modifier-item-nouveau-prix" type="number" step=0.01 class="form-control" placeholder="Nouveau prix de l\'item">
                                                </div>
                                                <input type="hidden" name="modifier-item-id" value="' . $item['id'] . '">
                        
                                                <button type="submit" class="btn btn-primary">Valider</button>
                                            </form>
                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';


                                // ==============================================================================


                                echo '<div class="modal fade bd-example-modal-lg" id="modal-supprimer-item-' . $item['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">SUPPRIMER l\'item ' . $item['id'] . '</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h2>Etes-vous sûr de vouloir supprimer cet item ?</h2>
            <p>' . $item['nom'] . '</p>
            <form action="" method="POST">
                <div class="form-group">
                <input type="hidden" name="supprimer-item-id" value="' . $item['id'] . '">
                        
                <button type="submit" class="btn btn-primary">Valider</button></div>
             </form>

             </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
    </div>
</div>
</div>';


                                // ==============================================================================



                                echo '<div class="admin-list-element">';
                                echo '<p>' . $item['nom'] . '</p>';



                                echo '<div class="boutons">
                                <a class="btn-voir" type="button" data-toggle="modal" data-target="#modal-voir-item-' . $item['id'] . '"><i class="fas fa-eye"></i>&nbsp; Voir</a>
                                <a href="" class="btn-modifier" type="button" data-toggle="modal" data-target="#modal-modifier-item-' . $item['id'] . '"><i class="fas fa-pen"></i>&nbsp; Modifier</a>
                                <a href="" class="btn-supprimer" type="button" data-toggle="modal" data-target="#modal-supprimer-item-' . $item['id'] . '"><i class="fas fa-trash"></i>&nbsp; Supprimer</a>
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
                            <input name="ajouter-categorie-nom" type="text" class="form-control" placeholder="Nom de la catégorie">
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
                            <select name="modifier-categorie-id" class="form-control">
                                <?php
                                foreach ($categories as $categorie) {
                                    echo '<option value="' . $categorie['id'] . '">' . $categorie['nom'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nouveau nom de la catégorie</label>
                            <input name="modifier-categorie-nouveau-nom" type="text" class="form-control" placeholder="Nom de la catégorie">
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
                            <select name="supprimer-categorie-id" class="form-control">
                                <?php
                                foreach ($categories as $categorie) {
                                    echo '<option value="' . $categorie['id'] . '">' . $categorie['nom'] . '</option>';
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
                            <select name="ajouter-sous-categorie-id-categorie" class="form-control">
                                <?php
                                foreach ($categories as $categorie) {
                                    echo '<option value="' . $categorie['id'] . '">' . $categorie['nom'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nom de la sous-catégorie</label>
                            <input name="ajouter-sous-categorie-nom" type="text" class="form-control" placeholder="Nom de la sous-catégorie">
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
                            <select name="modifier-sous-categorie-id" class="form-control">
                                <?php
                                foreach ($categories as $categorie) {
                                    foreach ($sous_categories as $sous_categorie) {
                                        if ($sous_categorie['categorie'] == $categorie['id']) {
                                            echo '<option value="' . $sous_categorie['id'] . '">' . $categorie['nom'] . ' : ' . $sous_categorie['nom'] . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nouvelle catégorie parente</label>
                            <select name="modifier-sous-categorie-id-categorie" class="form-control">
                                <?php
                                foreach ($categories as $categorie) {
                                    echo '<option value="' . $categorie['id'] . '">' . $categorie['nom'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nouveau nom de la sous-catégorie</label>
                            <input name="modifier-sous-categorie-nouveau-nom" type="text" class="form-control" placeholder="Nom de la sous-catégorie">
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
                            <select name="supprimer-sous-categorie-id" class="form-control">
                                <?php
                                foreach ($categories as $categorie) {
                                    foreach ($sous_categories as $sous_categorie) {
                                        if ($sous_categorie['categorie'] == $categorie['id']) {
                                            echo '<option value="' . $sous_categorie['id'] . '">' . $categorie['nom'] . ' : ' . $sous_categorie['nom'] . '</option>';
                                        }
                                    }
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

    <!-- Ajouter item -->
    <div class="modal fade bd-example-modal-lg" id="modal-ajouter-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">AJOUTER un item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Sous-catégorie :</label>
                            <select name="ajouter-item-id-sous-categorie" class="form-control">
                                <?php
                                foreach ($categories as $categorie) {
                                    foreach ($sous_categories as $sous_categorie) {
                                        if ($sous_categorie['categorie'] == $categorie['id']) {
                                            echo '<option value="' . $sous_categorie['id'] . '">' . $categorie['nom'] . ' : ' . $sous_categorie['nom'] . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nom de l'item</label>
                            <input name="ajouter-item-nom" type="text" class="form-control" placeholder="Nom de l'item">
                        </div>
                        <div class="form-group">
                            <label>Prix</label>
                            <input name="ajouter-item-prix" type="number" step=0.01 class="form-control" placeholder="Nom de la sous-catégorie">
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
} else {
?>
    <h1>Vous n'avez pas les permissions requises pour voir cette page. <br> Veuillez vous connecter.</h1>
    <div style="display: block; height:400px"></div>
<?php
}
require('common/footer.php');
?>