    <div class="container">
        <div class="mt-2">
            <div class="container marketing col-12">
                <div class="col-lg-12 mt-3" style="background-color: rgba(255, 255, 255, 0.75);min-height:20px;">
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
                                Connectez-vous
                            </center>
                        </font>
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mt-5" style="background-color: rgba(255, 255, 255, 0.75); height:240px">
                <form method="post" action="/login/auth">

                    <label class="mt-1" for="email">Adresse email</label>
                    <input type="email" placeholder="exemple@exemple.fr" id="email" name="email" class="form-control mt-2">
                    <br>
                    <label class="d-flex justify-content-between" for="pass">Mot de passe
                        <a href="/login/pass_verif_oublie"> Mot de passe oublié ?</a></label>
                    <input type="password" id="pass" name="pass" class="form-control mt-2">
                    <br>
                    <div class="d-flex justify-content-end">
                        <button name="action" value="Connect" class="btn text-white" type="submit" style="background-color:#03979e">Connexion</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 mt-5" style="background-color: rgba(255, 255, 255, 0.75); height:240px">
                <h2 class="mt-5 text-center mb-5" for="devis">Créer un compte ?</h2>
                <div class="col-lg-12 justify-content-between">
                    <a href="/login/creation" class="mt-5 col-lg-12 btn text-white btn-lg" style="background-color:#03979e">Créer un compte</a>
                </div>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="col-lg-12 p-3" style="background-color: rgba(255, 255, 255, 0.75);">
                    <p style="text-align:left">
                        <font style="color:secondary">
                            <center>
                                <form method="post" action="/login/index_nc">
                                    <button name="action" value="nc_connect" class="btn text-white" type="submit" style="background-color:#03979e">Consulter le site en tant que citoyen non connecté</button>
                                </form>
                            </center>
                        </font>

                    </p>
                </div>
            </div>
        </div>
    </div>