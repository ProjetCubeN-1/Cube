    <div class="col-lg-6">
        <?php

        foreach ($data as $d) { ?>
            <a href="/cube/ressource/<?php echo $d->id_ressource; ?>">
                <h3><?php echo $d->nom_ressources ?></h3>
            </a>
            <hr>
        <?php } ?>
    </div>