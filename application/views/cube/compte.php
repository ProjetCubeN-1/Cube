<div class="container">
    <div class="card">
        <div class="card-header mt-2">
            <div class="col-lg-11 mt-2">
                <h2>Gérer mon compte</h2>
            </div>
        </div>
        <div class="card-body">
            <div class="col-sm-11 mt-2">
                <form method="post" action="/cube/compte">

                    <label class="mt-1" for="EntrerEmail">Nom*</label>
                    <input type="text" required="true" id="nom" name="nom" class="form-control mt-2" value="">

                    <label class="mt-1" for="EntrerEmail">Prénom*</label>
                    <input type="text" required="true" id="prenom" name="prenom" class="form-control mt-2">

                    <label class="mt-1" required="true" for="EntrerEmail">Adresse email*</label>
                    <input type="email" placeholder="exemple@exemple.fr" required="true" id="email" name="email" class="form-control mt-2">

                    <label class="mt-1" for="EntrerEmail">Mot de passe*</label>
                    <input type="password" required="true" id="pass" name="pass" class="form-control mt-2">

                    <label for="EntrerMdp">Confirmez le mot de passe*</label>
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