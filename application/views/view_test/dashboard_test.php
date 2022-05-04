<?php
if ($id_result->type == "super_admin" or $id_result->type == "admin") { //acceder a la page de test 
?><div class="card">
        <div class="card-header">
            <h5>Liste des tests :</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <?php foreach ($afficher_test as $key => $value) {
                        if ($key % 2 == 0) { ?>
                            <a href="test_<?= $value->uuid ?>">
                                <h6><?= $value->uuid . ' : ' . $value->nom ?></h6>
                            </a>
                            <hr>
                    <?php }
                    } ?>
                </div>
                <div class="col-6">
                    <?php foreach ($afficher_test as $key => $value) {
                        if ($key % 2 == 1) { ?>
                            <a href="test_<?= $value->uuid ?>">
                                <h6><?= $value->uuid . ' : ' . $value->nom ?></h6>
                            </a>
                            <hr>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>