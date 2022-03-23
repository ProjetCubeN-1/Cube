    <div class="card p-2">
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group mb-3">
                    <form method="get" action="/search_controller/searchfunction">
                        <div class="d-flex">
                            <input type="search" class="form-control" id="search_ressources" name="search_ressources" placeholder="Nom de la Ressources">
                            <input class="btn btn-secondary" type="submit" value="Valider">
                        </div>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header">
                        Vos favoris
                    </div>
                    <div class="card-body">
                        <ul>
                            <?php foreach ($favoris_menu as $menu_item) { ?>
                                <li><a href="/cube/ressource/<?php echo $menu_item->id_ressources; ?>"><?php echo $menu_item->nom_ressources ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Mis de coté
                    </div>
                    <div class="card-body">
                        <ul>
                            <?php foreach ($mcote as $cote) { ?>
                                <li><a href="/cube/ressource/<?php echo $cote->id_ressource; ?>"><?php echo $cote->nom_ressources ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>