<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <div class="col-lg-11">
                <h2>Gérer mon compte</h2>
            </div>
        </div>
        <div class="card-body">
            <div class="col-sm-11 mt-2">
                <form method="post" action="/cube/info_compte">

                    <label class="mt-1" for="nom">Nom*</label>
                    <input type="text" id="nom" name="nom" class="form-control mt-2">

                    <label class="mt-1" for="prenom">Prénom*</label>
                    <input type="text" id="prenom" name="prenom" class="form-control mt-2">

                    <label class=" mt-1" for="email">Adresse email*</label>
                    <input type="email" placeholder="exemple@exemple.fr" id="email" name="email" class="form-control mt-2">

                    <label class=" mt-1" for="pass">Mot de passe*</label>
                    <input type="password" required="true" id="pass" name="pass" class="form-control mt-2">

                    <label for="confmdp">Confirmez le mot de passe*</label>
                    <input type="password" id="confmdp" name="confmdp" class="form-control mt-2">
                    </br>
                    <div class="col-sm-3 mt-3">
                        <button class="btn btn-block btn-outline-dark" type="submit">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>