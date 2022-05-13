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
          <select class="form-control" id="type" name="type">
            <option value="None">Indiquer le type de la ressource</option>

            <?php foreach ($result_type_ressource as $type_ressource) { ?>

              <option value="<?php echo $type_ressource->id_type_ressource ?>"><?php echo $type_ressource->type_ressource ?></option>

            <?php  } ?>

          </select><br>
        </div>
        <div>
          <h6>Contenu :</h6>
          <textarea class="form-control form-control-lg" id="text_contenu" name="text_contenu"></textarea><br>
        </div>
        <div>
          <h6>Catégorie :</h6>

          <select class="form-control" id="categorie" name="categorie">
            <option value="None">Indiquer la catégorie</option>

            <?php foreach ($result_categorie as $categorie) { ?>

              <option value="<?php echo $categorie->id_categorie ?>"><?php echo $categorie->nom_categorie ?></option>

            <?php  } ?>
          </select><br>
        </div>
        <div>
          <h6>type de relation :</h6>
          <select class="form-control" id="type_relation" name="type_relation">
            <option value="None">Indiquer le type de relation</option>

            <?php foreach ($result_type_relation as $type_relation) { ?>

              <option value="<?php echo $type_relation->id_type_relation ?>"><?php echo $type_relation->type_relation ?></option>

            <?php  } ?>
          </select><br>

        </div>
        <button class="btn btn-dark">Publier</button>
      </form>
    </div>
  </div>
</div>