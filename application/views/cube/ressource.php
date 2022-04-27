<div class="card">
    <div class="col-lg-6">
        <div class="row d-flex">
            <?php if ($user->type != 'citoyen_nc') { ?>

                <?php if (!$favoris) { ?>
                    <div class="mr-3">
                        <form method="post" action="/cube/ajout_favoris/<?php echo $result->id_ressource ?>">
                            <input type="submit" name="favoris" class="ml-2 btn btn-secondary" value="Ajouter aux favoris">
                        </form>
                    </div>
                <?php } else { ?>
                    <div class="mr-3">
                        <form method="post" action="/cube/retirer_favoris/<?php echo $result->id_ressource ?>">
                            <input type="submit" name="favoris" class=" ml-2 btn btn-secondary" value="Retirer des favoris">
                        </form>
                    </div>
                <?php
                } ?>

                <?php if ($result->mis_de_cote != '1') {
                ?>
                    <div class="mr-3">
                        <form method="post" action="/cube/mettre_cote/<?php echo $result->id_ressource ?>">
                            <input type="submit" name="cote" class="btn btn-secondary" value="Mettre de coté">
                        </form>
                    </div>
                <?php } else {
                ?>
                    <div class="mr-3">
                        <form method="post" action="/cube/retirer_mettre_cote/<?php echo $result->id_ressource ?>">
                            <input type="submit" name="cote" class="btn btn-secondary" value="Retirer mettre de coté">
                        </form>
                    </div>
                <?php }
                ?>
            <?php } ?>
        </div>
    </div>
    <hr>
    <div class="card-body">
        <h1><?php echo $result->nom_ressources ?></h1>
        <hr>
        <div class="col-sm-8">
            <div class="contenu">
                <p><?php echo $result->contenu ?></p>
                <br>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5>Espace commentaires : </h5>
    </div>
    <div class="card-body">
        <?php
        foreach ($get_com as $row) { ?>
            <form method="post" action="/cube/delete_commentaire/<?php echo $result->id_ressource ?>">
                <div class="row">
                    <div class="col-7 d-flex">
                        <input style="display:none" type="text" readonly name="com_id" value="<?php echo $row->id_commentaire ?>">
                        <p class="col-3 mt-3">(<?php echo $row->date_commentaire ?>)</p>
                        <label class="mt-3 mr-3" for="nom"><?php echo $row->prenom ?>:</label>
                        <input type="text" id="nom" name="nom" class="form-control mt-2" value="<?php echo $row->contenu ?>">

                        <?php if ($id_result->type == "admin" or $id_result->type == "super_admin" or $id_result->type == "modérateur") { ?>
                            <button type="submit" class="close ml-3" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button></p>
                        <?php } ?>
                    </div>
                </div>
                <hr>
            </form>
        <?php }
        ?>
        <form method="post" action="/cube/ressource/<?php echo $result->id_ressource ?>">

            <?php if ($this->session->id == '4') {
            } else { ?>
                <div class="card-footer">
                    <textarea class="col-10 mb-4" placeholder="Ecrire un commentaire ..." name="contenu_commentaire" id="contenu_commentaire"></textarea><br>
                    <input type="submit" name="submit_commentaire" class="ml-2 btn btn-secondary" value="envoyer le commentaire">
                <?php } ?>
        </form>
    </div>
</div>
</div>