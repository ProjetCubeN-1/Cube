<div class="container mt-5">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      Créer une ressource
      <form method="post" action="/cube/ajout_categorie">
        <button class="btn btn-light">Ajouter une catégorie</button>
      </form>
    </div>
    <div class="card-body">
      <form method="post" action="/cube/publier_ressources">
        <div>
          <h6>Titre :</h6>
          <input class="form-control form-control" id="text_titre" name="text_titre"></input><br>
        </div>
        <div>
          <h6>Type :</h6>
          <select class="form-control" id="type_contenu" name="type_contenu" value="">
            <option value="None">Indiquer le type de contenu</option>
            <option value="Vidéo">Vidéo</option>
            <option value="Article">Article</option>
            <option value="Défi">Défi</option>
          </select><br />
        </div>
        <div>
          <h6>Contenu :</h6>
          <textarea class="form-control form-control-lg" id="text_contenu" name="text_contenu"></textarea><br>
        </div>
        <div>
          <h6>Catégorie :</h6>

          <select class="form-control" id="categorie" name="type_relation">
            <option value="None">Indiquer la catégorie</option>

            <?php
            foreach ($categorie->result() as $cat) {
            ?>
              <option value="<?php echo $cat->nom_categorie ?>"><?php echo $cat->nom_categorie ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div>
          <h6>Type de relation :</h6>
          <select class="form-control" id="type_relation" name="type_relation" value="">
            <option value="None">Indiquer le type de relation</option>
            <option value="Professionnelle">Professionnelle</option>
            <option value="Famille">Famille</option>
          </select><br />
        </div>
        <button class="btn btn-dark">Publier</button>
      </form>
    </div>
  </div>
</div>