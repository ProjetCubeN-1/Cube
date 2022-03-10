<div class="card-body">
    <div class="col-sm-10 mt-2">
        <h3><?php //echo $result->nom_ressources 
            ?></h3>
        <hr>
    </div>
    <div class="col-sm-8">
        <div class="contenu">
            <p><?php echo $result->contenu ?></p>
        </div>
    </div>

    <form method="post" action="/cube/ressource2">
        <label for="titre_commentaire">titre commentaire</label><br>
        <input type="text" name="titre_commentaire" id="titre_commentaire"><br>
        <label for="contenu_commentaire">contenu du commentaire</label><br>
        <textarea name="contenu_commentaire" id="contenu_commentaire"></textarea><br>
        <input type="submit" name="submit_commentaire" value="envoyer le commentaire">
    </form>
    <?php if (isset($c_erreur)) {
        echo $c_erreur;
    } ?>
</div>