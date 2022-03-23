<div class="card">
    <div class="col-lg-6">
        <div class="row d-flex">
            <?php if ($user->type != 'citoyen_nc') { ?>

                <?php if (!$favoris) { ?>
                    <div class="mr-3">
                        <form method="post" action="/cube/ajout_favoris/<?php echo $result->id_ressource ?>">
                            <input type="submit" name="favoris" class="ml-2 btn btn-secondary" value="Ajouter aux favoris"></input>
                        </form>
                    </div>
                <?php } else { ?>
                    <div class="mr-3">
                        <form method="post" action="/cube/retirer_favoris/<?php echo $result->id_ressource ?>">
                            <input type="submit" name="favoris" class=" ml-2 btn btn-secondary" value="Retirer des favoris"></input>
                        </form>
                    </div>
                <?php } ?>

                <?php if ($result->mis_de_cote != '1') {
                ?>
                    <div class="mr-3">
                        <form method="post" action="/cube/mettre_cote/<?php echo $result->id_ressource ?>">
                            <input type="submit" name="cote" class="btn btn-secondary" value="Mettre de coté"></input>
                        </form>
                    </div>
                <?php } else {
                ?>
                    <div class="mr-3">
                        <form method="post" action="/cube/retirer_mettre_cote/<?php echo $result->id_ressource ?>">
                            <input type="submit" name="cote" class="btn btn-secondary" value="Retirer mettre de coté"></input>
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
        Espace commentaires :
    </div>
    <div class="card-body">
        <?php
        foreach ($get_com as $row) { ?>
            <p><?php echo $row->prenom ?> : <?php echo $row->contenu ?></p>
            <hr>
        <?php }
        ?>
        <?php if ($this->session->id == '4') {
        } else { ?>
            <div class="card-footer">
                <form method="post" action="/cube/ressource/<?php echo $result->id_ressource ?>">
                    <textarea class="col-10 mb-4" placeholder="Ecrire un commentaire ..." name="contenu_commentaire" id="contenu_commentaire"></textarea><br>
                    <input type="submit" name="submit_commentaire" value="envoyer le commentaire">
                </form>
            </div>
        <?php } ?>
    </div>
</div>