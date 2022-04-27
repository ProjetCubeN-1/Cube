<?php
if ($id_result->type == "super_admin" or $id_result->type == "admin") { //acceder a la page de test 
?>
    <div class="card">
        <div class="card-header">

        </div>
    </div>
<?php }  ?>

<?php echo '<pre>';
print_r($afficher_test);
echo '</pre>'; ?>
<?php foreach ($afficher_test as $a) { ?>

    <a href="test_controller/<?= $a->id ?>">

        <h1><?= $a->uuid ?></h1>

    </a>
<?php } ?>