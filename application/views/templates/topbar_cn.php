    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <button type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                <i class="fas fa-bars fa-lg"></i> 
            </button>

            <img class="ml-5" src="/img/logo.png" width="150" height="80">

            <a class="navbar-brand" href="/cube/accueil">
                <h3 class="ml-5"><?php echo $title ?></h3>
            </a>

 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
        </div>
        <a class="c-header-nav-link mr-4" href="/cube/creation_ressources">
            <i class="fas fa-plus fa-lg" style="color:white;"></i>
        </a>
        <a class="c-header-nav-link mr-4" href="/cube/compte">
            <i class=" fas fa-cog fa-lg" style="color:white;"></i>
        </a>
        <a class="c-header-nav-link mr-3" href="/login/index">
            <i class="fas fa-power-off fa-lg" style="color:white;"></i>
        </a>
    </nav>