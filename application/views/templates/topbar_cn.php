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
            <img src="/img/logo.png" width="150" height="80">
            <a class="navbar-brand" href="/cube/accueil">
                <h3 class="ml-5"><?php echo $title ?></h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </div>
        <a class="c-header-nav-link mr-5" href="/cube/compte" style="color:white; text-decoration:none;">
            <h4>Compte</h4>
        </a>
        <div class="col-1"></div>
        <ul class="c-header-nav ml-auto mr-3">
            <a class="c-header-nav-link mr-3" href="/login/index">
                <h4><i class="fas fa-power-off fa-lg" style="color:white;"></i></h4>
            </a>
        </ul>
    </nav>