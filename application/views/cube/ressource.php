<div class="card">
    <div class="col-6">
        <h3><?php echo $result->nom_ressources ?></h3>
        <form method="post" action="/cube/favoris">
            <input type="submit" name="favoris" value="Send"><i class="far fa-star"></i></input>
        </form>
        <hr>
    </div>
    <div class="col-sm-8">
        <div class="contenu">
            <p><?php echo $result->contenu ?></p>
            <hr>
            <br>
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
        <div class="card-footer">
            <form method="post" action="/cube/ressource/<?php echo $result->id_ressource ?>">
                <textarea class="col-10 mb-4" placeholder="Ecrire un commentaire ..." name="contenu_commentaire" id="contenu_commentaire"></textarea><br>
                <input type="submit" name="submit_commentaire" value="envoyer le commentaire">
            </form>
        </div>
    </div>
</div>