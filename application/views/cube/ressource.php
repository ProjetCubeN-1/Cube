<div class="container">
    <div class="card">
        <div class="col-6">
            <h3><?php echo $result->nom_ressources
                ?></h3>
            <hr>
        </div>
        <div class="col-sm-8">
            <div class="contenu">
                <p><?php echo $result->contenu ?></p><br>
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
            foreach ($com->result() as $row) {
                foreach ($uid->result() as $uuid) {
            ?><p><?php echo $uuid->prenom ?> : <?php echo $row->contenu; ?></p>
                    <hr>

            <?php }
            } ?>
            <div class="card-footer">
                <form method="post" action="/cube/ressource2">
                    <textarea class="col-10 mb-4" placeholder="Ecrire un commentaire ..." name="contenu_commentaire" id="contenu_commentaire"></textarea><br>
                    <input type="submit" name="submit_commentaire" value="envoyer le commentaire">
                </form>
            </div>
        </div>
    </div>
</div>