<div class="card mt-2 ml-2 mr-2 ">
    <div class="card-header d-flex justify-content-between">
        Gestion des ressources<a href="/cube/creation_ressources">Ajouter une ressource</a>

    </div>
    <div class="card-body">
        <div class="col-lg-12">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result->result() as $ressources) { ?>
                            <tr>
                                <td><?php echo $ressources->id_ressource ?></td>
                                <td><?php echo $ressources->nom_ressources ?></td>
                                <td><?php echo $ressources->categorie ?></td>
                                <td><?php echo $ressources->type_relation ?></td>
                                <td><?php echo $ressources->type_ressource ?></td>
                                <td><?php echo $ressources->id_utilisateur ?></td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ressource_id[]" value="<?= $ressources->id_ressource ?>" id="<?php echo $ressources->id_ressource ?>">
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-danger" value="Supprimer"></input>
            </form>
        </div>
    </div>
</div>
<div class="card col-lg-6 mt-2 ml-2 mr-2">
    <div class="card-header d-flex justify-content-between">
        Gestion des catégorie <a href="">Ajouter une catégorie</a>
    </div>
    <div class="card-body">
        <div class="col-lg-12">
            <form method="post" action="#">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Catégorie
                            </th>
                            <th>
                                Sélectionner
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result->result() as $ressources) { ?>
                            <tr>
                                <td><?php echo $ressources->categorie ?></td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ressource_id[]" value="<?= $ressources->id_ressource ?>" id="<?php echo $ressources->id_ressource ?>">
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-danger" value="Supprimer"></input>
            </form>
        </div>
    </div>
</div>