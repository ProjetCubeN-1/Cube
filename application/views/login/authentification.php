    <div class="mt-2">
    <div class="container marketing col-12" style="margin-top: 0%;">
        <p>
            &nbsp;
        </p>
        <div class="col-lg-11" style="background-color: rgba(255, 255, 255, 0.75);min-height:20px;">
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

            <label class="mt-1" for="EntrerEmail">Adresse email</label>
            <input type="email" placeholder="exemple@exemple.fr" id="EntrerEmail" name="email" class="form-control mt-2">
            <br>
            <label class="d-flex justify-content-between" for="EntrerMdp">Mot de passe
                <a href="/login/pass_verif_oublie"> Mot de passe oublié ?</a></label>
            <input type="password" id="EntrerMdp" name="pass" class="form-control mt-2">
            <br>
            <div class="d-flex justify-content-end">
                <button name="action" value="Connect" class="btn btn-dark" type="submit">Connexion</button>
            </div>
        </form>
    </div>
    &nbsp;&nbsp;
    <div class="col-lg-5 mt-5" style="background-color: rgba(255, 255, 255, 0.75); height:240px">
        <h2 class="mt-5 text-center" for="devis">Créer un compte ?</h2>
        <div class="col-12 justify-content-between">
            <a href="/login/creation" class="mt-5 col-lg-12 btn btn-dark btn-lg">Créer un compte</a>
        </div>
    </div>
</div>

    