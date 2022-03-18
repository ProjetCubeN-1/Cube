<div id="sidebar" class="c-sidebar c-siderbar-light c-sidebar-fixed c-sidebar bg-success">
    <div class="c-sidebar-brand d-down-none">
        <img src="" height="80px">
    </div>
    <ul class="c-sidebar-nav ps ps--active-y">
        <li class="c-sidebar-nav-dropdown">
            <?php foreach ($ressources_menu as $menu_item) { ?>
                <a class="c-sidebar-nav-link" href="/cube/ressource/<?php echo $menu_item->id_ressource; ?>"><?php echo $menu_item->nom_ressources ?></a>
            <?php } ?>
        </li>
    </ul>
</div>