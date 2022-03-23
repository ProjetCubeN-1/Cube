<div class="mt-2">
    <div class="container marketing col-lg-12" style="margin-top: 0%;">
        <p>
            &nbsp;
        </p>
        <div class="col-lg-11" style="background-color: rgba(255, 255, 255, 0.75);min-height:20px;">
            <h1 style="text-align:left">
                <font style="color:secondary">
                    <center>
                        Réinitialisez votre mot de passe
                    </center>
                </font>
            </h1>
            <h6 style="text-align:left">
                <font style="color:secondary">
                    <center>
                        Entrez votre adresse email
                    </center>
                </font>
            </h6>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-6 mt-5 ml-3" style="background-color: rgba(255, 255, 255, 0.75); height:140px">
            <form method="post" action="/login/sendmail">
                <label class="mt-1" for="verifemail">email</label>
                <input type="email" placeholder="exemple@exemple.fr" id="verifemail" name="verifemail" class="form-control mt-2">
                <div class="d-flex justify-content-between">
                    <button name="action" class="btn btn-outline-dark mt-3" type="submit" value="GetLink">Obtenir un lien</button>
                </div>
            </form>
        </div>
    </div>
</div>