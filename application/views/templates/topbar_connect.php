    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true" data-bs-toggle="collapse" data-bs-target="#sidebar"><span class="navbar-toggler-icon"></span></button>
            <ul class="c-header-nav d-md-down-none">
            </ul>

            <img class="ml-5" src="/img/logo.png" width="150" height="80">

            <a class="navbar-brand" href="/cube/accueil">
                <h3 class="ml-5"><?php echo $title ?></h3>
            </a>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
            <?php

            if ($id_result->type == "super_admin") { ?>
                <a class="navbar-brand" href="/admin/board_superadmin">
                    <h3 class="ml-5">Tableau de bord</h3>
                    </i>
                </a>

            <?php } 

            if ($id_result->type == "admin") { ?>
                <a class="navbar-brand" href="/admin/board_admin">
                    <h3 class="ml-5">Tableau de bord</h3>
                    </i>
                </a>

            <?php } ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
        </div>


        <?php if ($this->session->id == '4') {
        } else { ?>
            <a class="c-header-nav-link mr-4" href="/cube/creation_ressources">
                <i class="fas fa-plus fa-lg" style="color:white;"></i>
            </a>
            <a class="c-header-nav-link mr-4" href="/cube/compte">
                <i class=" fas fa-cog fa-lg" style="color:white;"></i>
            </a>
        <?php } ?>
        <a class="c-header-nav-link mr-3" href="/login/index">
            <i class="fas fa-power-off fa-lg" style="color:white;"></i>
        </a>

    </nav>