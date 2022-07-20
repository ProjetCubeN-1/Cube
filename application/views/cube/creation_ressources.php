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
          <input class="form-control form-control" id="text_titre" name="text_titre" required></input><br>
        </div>
        <div>
          <h6>Type :</h6>
          <select required class="form-control" id="type_contenu" name="type_contenu" value="">
            <?php
            foreach ($type->result() as $typ) {

            ?>
              <option value="<?php echo $typ->id_type_ressource ?>"><?php echo $typ->type_ressource ?></option>
            <?php
            }
            ?>
          </select><br />
        </div>
        <div>
          <h6>Contenu :</h6>
          <textarea class="form-control form-control-lg" id="text_contenu" name="text_contenu" required></textarea><br>
        </div>
        <div>
          <h6>Catégorie :</h6>
          <select class="form-control" id="categorie" name="categorie">

            <?php
            foreach ($categorie->result() as $cat) {
              if ($cat->valide_categorie == 'true') {
            ?>
                <option value="<?php echo $cat->id_categorie ?>"><?php echo $cat->nom_categorie ?></option>
            <?php
              }
            }
            ?>
          </select>
        </div>
        <div>
          <?php
          ?>
          <h6 class="mt-3">Type de relation :</h6>
          <select class="form-control" id="type_relation" name="type_relation" value="" required>
            <option value="1">Professionnelle</option>
            <option value="2">Famille</option>
          </select><br />
        </div>
        <button class="btn btn-dark">Publier</button>
      </form>
    </div>
  </div>
</div>