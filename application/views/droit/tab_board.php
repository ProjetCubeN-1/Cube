<?php
if ($id_result->type == "super_admin" or $id_result->type == "admin") { //acceder a la page de test 
?>
    <div class="card">
        <div class="card-header">
            <h5>Pour acceder a la page de test cliquer sur le bouton :
                <a href="/test_controller/index"><input type="submit" class="btn btn-info" value="Page de test"></a>
            </h5>
        </div>
    </div>
<?php }
?> <?php if ($id_result->type == "super_admin") { //changer type utilisateurs 
    ?> <div class="card">
        <div class="card-header">
            <h5>Changer type utilisateur</h5>
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date de naissance</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($uid->result() as $info) {

                        ?>
                            <?php if ($info->type != "citoyen_nc") { ?>
                                <form method="post" action="/admin/change_type">

                                    <tr>
                                        <td style="display:none;"><input type="text" readonly name="user_id" value="<?php echo $info->id_utilisateur ?>"></td>
                                        <td><?php echo $info->nom ?></td>
                                        <td><?php echo $info->prenom ?></td>
                                        <td><?php echo $info->date_naissance ?></td>
                                        <td><?php echo $info->email ?></td>
                                        <td>
                                            <select <?php if ($info->type == "citoyen_nc") { ?> disabled="disabled" <?php } ?> class="form-control" id="type" name="type" value="<?php echo $info->type ?>">
                                                <option <?php if ($info->type == "super_admin") {
                                                            echo "selected";
                                                        } ?> value="1">super_admin</option>

                                                <option <?php if ($info->type == "admin") {
                                                            echo "selected";
                                                        } ?> value="2">admin</option>

                                                <option <?php if ($info->type == "modérateur") {
                                                            echo "selected";
                                                        } ?> value="3">modérateur</option>

                                                <option <?php if ($info->type == "citoyen_connecte") {
                                                            echo "selected";
                                                        } ?> value="4">citoyen_connecté</option>
                                                <?php if ($info->type == "citoyen_nc") { ?>
                                                    <option selected value="5">citoyen_nc</option>
                                                <?php }
                                                ?>
                                            </select>
                                        </td>
                                        <?php if ($info->type != "citoyen_nc") { ?>
                                            <td><input type="submit" class="btn btn-info" value="Valider"></td>
                                <?php }
                                    }
                                }
                                ?>
                                    </tr>
                                </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>


<?php if ($id_result->type == "admin" or $id_result->type == "super_admin") { //Désactivé un compte citoyen 
?>
    <div class="card">
        <div class="card-header">
            <h5>Désactiver un compte citoyen</h5>
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post" action="/admin/desactive_citoyen">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>nom</th>
                                <th>prenom</th>
                                <th>email</th>
                                <th>type</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($citoyen->result() as $conf_citoyen) { ?>
                                <tr>
                                    <td style="display:none;"><input type="text" readonly name="id_user" value="<?php echo $conf_citoyen->id_utilisateur ?>"></td>
                                    <td><?php echo $conf_citoyen->nom ?></td>
                                    <td><?php echo $conf_citoyen->prenom ?></td>
                                    <td><?php echo $conf_citoyen->email ?></td>
                                    <td>
                                        <select class="form-control" id="confirme" name="confirme" value="<?= $conf_citoyen->confirme ?>">
                                            <option <?php if ($conf_citoyen->confirme == "1") {
                                                        echo "selected";
                                                    } ?> value="1">Activé</option>

                                            <option <?php if ($conf_citoyen->confirme == "0") {
                                                        echo "selected";
                                                    } ?> value="0">Désactivé</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="submit" name="action" class="btn btn-warning" value="Valider"></input>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($id_result->type == "admin" or $id_result->type == "super_admin") { //Supprimer une ressources 
?>
    <div class="card">
        <div class="card-header">
            <h5>Supprimer une ressource</h5>
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post" action="/admin/supprimer_ressources">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom de la ressource</th>
                                <th>Catégorie</th>
                                <th>Type de relation</th>
                                <th>Type de ressource</th>
                                <th>id du créateur</th>
                                <th>Sélectionner</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($ressources_categorie_relation_type->result() as $resultat) {
                            ?>
                                <tr>
                                    <td style="display:none;"><input type="text" readonly name="ressource_id_text" value="<?php echo $resultat->id_ressource ?>"></td>
                                    <td><?php echo $resultat->id_ressource ?></td>
                                    <td><?php echo $resultat->nom_ressources ?></td>
                                    <td><?php echo $resultat->nom_categorie ?></td>
                                    <td><?php echo $resultat->type_relation ?></td>
                                    <td><?php echo $resultat->type_ressource ?></td>
                                    <td><?php echo $resultat->id_utilisateur ?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="ressource_id[]" value="<?= $resultat->id_ressource ?>" id="<?php echo $resultat->id_ressource ?>">
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php if ($id_result->type != "modérateur") { ?>
                        <input type="submit" name="action" class="btn btn-danger" value="Supprimer"></input>
                    <?php } ?>
                </form>

            </div>
        </div>
    </div>
<?php } ?>
<?php if ($id_result->type == "admin" or $id_result->type == "super_admin" or $id_result->type == "modérateur") { //Gerer une ressource 
?>
    <div class="card">
        <div class="card-header">
            <h5>Gérer une ressource</h5>
        </div>
        <div class="card-body">
            <div class="col-12">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom de la ressource</th>
                            <th>Catégorie</th>
                            <th>Type de relation</th>
                            <th>Type de ressource</th>
                            <th>id du créateur</th>
                            <th>Valide</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($ressources_categorie_relation_type->result() as $resultat) { ?>
                            <form method="get" action="/admin/ressource_valide">
                                <tr>
                                    <td style="display:none;"><input type="text" readonly name="ressource_id" value="<?php echo $resultat->id_ressource ?>"></td>
                                    <td><?php echo $resultat->nom_ressources ?></td>
                                    <td><?php echo $resultat->nom_categorie ?></td>
                                    <td><?php echo $resultat->type_relation ?></td>
                                    <td><?php echo $resultat->type_ressource ?></td>
                                    <td><?php echo $resultat->id_utilisateur ?></td>
                                    <td>

                                        <select class="form-control" id="valide" name="valide" value="<?= $resultat->valide ?>">
                                            <option <?php if ($resultat->valide == "true") {
                                                        echo "selected";
                                                    } ?> value="true">true</option>

                                            <option <?php if ($resultat->valide == "false") {
                                                        echo "selected";
                                                    } ?> value="false">false</option>
                                        </select>
                                    </td>
                                    <td><input type="submit" name="action" class="btn btn-secondary" value="Valider"></td>
                                </tr>
                            </form>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($id_result->type == "admin" or $id_result->type == "super_admin") { //Supprimer une catégorie 
?>
    <div class="card">
        <div class="card-header">
            <h5>Supprimer une catégorie</h5>
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post" action="/admin/supprimer_categorie">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom de la catégorie</th>
                                <th>id du créateur</th>
                                <th>Sélectionner</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($categorie->result() as $resultat) { ?>
                                <tr>
                                    <td style="display:none;"><input type="text" readonly name="categorie_id_text" value="<?php echo $resultat->id_categorie ?>"></td>
                                    <td><?php echo $resultat->id_categorie ?></td>
                                    <td><?php echo $resultat->nom_categorie ?></td>
                                    <td><?php echo $resultat->id_utilisateur ?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="categorie_id[]" value="<?= $resultat->id_categorie ?>" id="<?php echo $resultat->id_categorie ?>">
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php if ($id_result->type != "modérateur") { ?>
                        <input type="submit" name="action" class="btn btn-danger" value="Supprimer"></input>
                    <?php } ?>
                </form>

            </div>
        </div>
    </div>
<?php } ?>

<?php if ($id_result->type == "admin" or $id_result->type == "super_admin") { //Supprimer une catégorie 
?>
    <div class="card">
        <div class="card-header">
            <h5>Gérer une catégorie</h5>
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post" action="/admin/supprimer_categorie">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom de la catégorie</th>
                                <th>id du créateur</th>
                                <th>Sélectionner</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($categorie->result() as $resultat) { ?>
                                <tr>
                                    <td style="display:none;"><input type="text" readonly name="categorie_id_text" value="<?php echo $resultat->id_categorie ?>"></td>
                                    <td><?php echo $resultat->id_categorie ?></td>
                                    <td><?php echo $resultat->nom_categorie ?></td>
                                    <td><?php echo $resultat->id_utilisateur ?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="categorie_id[]" value="<?= $resultat->id_categorie ?>" id="<?php echo $resultat->id_categorie ?>">
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php if ($id_result->type != "modérateur") { ?>
                        <input type="submit" name="action" class="btn btn-danger" value="Supprimer"></input>
                    <?php } ?>
                </form>

            </div>
        </div>
    </div>
<?php } ?>