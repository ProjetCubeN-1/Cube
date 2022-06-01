<div class="container">
  <div class="card">
    <div class="card-header">
      Créer une ressource
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
          <select class="form-control" id="text_categorie" name="text_categorie" value="">
            <option value="None">Indiquer la catégorie</option>
            <option value="Monde professionnel">Monde professionnel</option>
            <option value="Qualité de vie">Qualité de vie</option>
          </select><br />
        </div>
        <div>
          <h6>type de relation :</h6>
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