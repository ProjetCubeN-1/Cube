<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Cube</title>
    <link rel="stylesheet" href="/vendor/coreui/coreui/dist/css/coreui.css">
    <link rel="stylesheet" href="/vendor/coreui/coreui/dist/css/style.css">
    <link rel="stylesheet" href="/vendor/fortawesome/font-awesome/css/all.min.css">
    <script src="/vendor/@coreui/coreui/dist/js/coreui.bundle.js"></script>
    <script src="/vendor/coreui/js/main.js"></script>
    <script src="/vendor/coreui/coreui/dist/js/coreui.js"></script>
    <script src="/vendor/coreui/coreui/dist/js/coreui.bundle.js"></script>
    <script src="/vendor/components/jquery/jquery.min.js"></script>
    <script src="/vendor/coreui/coreui/dist/js/coreui.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Projet Cube</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col md-8"></div>
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <form method="post" action="/login/auth">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </div>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-lock"></i></span>
                                </div>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button name="action" value="Connect" class="btn btn-primary px-4" type="submit">Connexion</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-link px-0">Forgot password?</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>Sign up</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <button type="button" class="btn btn-primary active mt-3">Register Now!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="container2 p-4 mt-4 d-flex justify-content-between text-white align-items-center bg-danger">
        <div> Contact</div>
        <div> Mentions légales</div>
    </footer>
    </div>
    </div>
</body>

</html>