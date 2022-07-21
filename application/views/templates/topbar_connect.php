    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#03979e">
        <div class="container-fluid">

            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true" data-bs-toggle="collapse" data-bs-target="#sidebar"><span class="navbar-toggler-icon"></span></button>
            <ul class="c-header-nav d-md-down">
            </ul>

            <a href="/cube/accueil"><img class="ml-5" src="/img/logo.png" width="150" height="80"></a>

            <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                <!-- <p class="ml-5">Bienvenu</p> -->
            <!-- </div> -->
        
            <?php if ($id_result->type == "super_admin" or $id_result->type == "admin" or $id_result->type == "modérateur") {
            ?>
                <a class="navbar-brand" href="/admin/tab_board">
                    <h3 class="ml-5">Tableau de bord</h3>
                    </i>
                </a>

            <?php }
            ?>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
            <?php if ($this->session->id != "4") { ?>
                <a class="c-header-nav-link mr-4" href="/cube/creation_ressources">
                    <i class="fas fa-plus fa-lg" style="color:white;"></i>
                </a>
            <?php } ?>

            <a class="c-header-nav-link mr-3" href="/login/index">
                <i class="fas fa-power-off fa-lg" style="color:white;"></i>
            </a>
        </div>

    </nav>