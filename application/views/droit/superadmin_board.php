<div class="card">
    <div class="card-body">
        <div class="col-8">
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
                                        <input class="form-check-input" type="checkbox" name="cocher" value="<?php $ressources->id_ressource ?>" id="cocher">
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-danger" name="supprimer" value="Supprimer"></input>
            </form>

        </div>
    </div>
</div>