<div id="sidebar" class="c-sidebar c-siderbar-light c-sidebar-fixed c-sidebar">
    <div class="c-sidebar-brand d-down-none">
        <img src="/img/cube.png" height="80px">
    </div>
    <ul class="c-sidebar-nav ps ps--active-y">
        <li class="c-sidebar-nav-dropdown">
            <font size="-2">
                <?php foreach ($ressources_menu as $menu_item) { ?>
                    <!-- Restriction ressources pour Citoyen NC-->

                    <?php if ($menu_item->valide != "false") {  ?>
                        <a class="c-sidebar-nav-link" href="/cube/ressource/<?php echo $menu_item->id_ressource; ?>"><?php echo $menu_item->nom_ressources ?></a>
                        <!-- <?php //} elseif ($menu_item->valide = "false" && $id_result->type = 'citoyen_nc') { 
                                ?>-->
                        <!-- <a class="c-sidebar-nav-link" href="#<?php //cho $menu_item->id_ressource; 
                                                                    ?>"><?php //echo $menu_item->nom_ressources 
                                                                        ?></a>-->
                <?php }
                } ?>
            </font>
        </li>
    </ul>
</div>