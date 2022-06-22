  <div class="container">
      <div class="mt-2">
          <div class="col-lg-12">
              <div class="col-lg-12 mt-3" style="background-color: rgba(255, 255, 255, 0.75);">
                  <h1 style="text-align:left">
                      <font style="color:secondary">
                          <center>
                              Bienvenue
                          </center>
                      </font>
                  </h1>
                  <h6 style="text-align:left">
                      <font style="color:secondary">
                          <center>
                              Inscrivez-vous
                          </center>
                      </font>
                  </h6>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-12 mt-5" style="background-color: rgba(255, 255, 255, 0.75); height:38em">
              <form method="post" action="/login/create">

                  <label class="mt-1" for="nom">Nom*</label>
                  <input type="text" required="true" id="nom" name="nom" class="form-control mt-2">

                  <label class="mt-1" for="prenom">Prénom*</label>
                  <input type="text" required="true" id="prenom" name="prenom" class="form-control mt-2">

                  <label class="mt-1" required="true" for="email">Adresse email*</label>
                  <input type="email" placeholder="exemple@exemple.fr" required="true" id="email" name="email" class="form-control mt-2">

                  <label class="mt-1" for="datenaissance">Date de naissance*</label>
                  <input type="date" required="true" id="datenaissance" name="datenaissance" class="form-control mt-2">

                  <label class="mt-1" for="pass">Mot de passe*</label>
                  <input type="password" required="true" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$" placeholder="8 à 15 caractères, un chiffre, une lettre majuscule, une lettre minuscule et un caractères spécial" title="8 à 15 caractères, un chiffre, une lettre majuscule, une lettre minuscule et un caractères spécial" id="pass" name="pass" class="form-control mt-2">

                  <label for="confmdp">Confirmez le mot de passe*</label>
                  <input type="password" require="true" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$" placeholder="8 à 15 caractères, un chiffre, une lettre majuscule, une lettre minuscule et un caractères spécial" title="8 à 15 caractères, un chiffre, une lettre majuscule, une lettre minuscule et un caractères spécial" id="confmdp" name="confmdp" class="form-control mt-2">

                  </br>

                  <div class="d-flex justify-content-between">
                      <button class="btn btn-block btn-outline-dark" type="submit">Inscription</button>
                  </div>

              </form>
          </div>
      </div>
  </div>