    <div class="card p-2">
        <div class="row">
            <div class="col-3">
                <div class="input-group mb-3">
                    <form method="get" action="/search_controller/searchfunction">
                        <input type="search" class="form-control" id="search_ressources" name="search_ressources" placeholder="Nom de la Ressources">
                        <input type="submit" value="Valider">
                    </form>
                    <?php echo '
                    <pre>';
                    print_r('');
                    echo '</pre>'; ?>
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
            </div>