<div class="card">
    <div class="card-body">
        <div class="col-lg-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>date de naissance</th>
                        <th>email</th>
                        <th>type</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result->result() as $info) { ?>
                        <form method="post" action="/admin/change_type">

                            <tr>
                                <td style="display:none;"><input type="text" readonly name="user_id" value="<?php echo $info->id_utilisateur ?>"></td>
                                <td><?php echo $info->nom ?></td>
                                <td><?php echo $info->prenom ?></td>
                                <td><?php echo $info->date_naissance ?></td>
                                <td><?php echo $info->email ?></td>
                                <td>
                                    <select <?php if ($info->type == 'citoyen_nc') { ?> disabled="disabled" <?php } ?> class="form-control" id="type" name="type" value="<?php echo $info->type ?>">
                                        <option <?php if ($info->type == "super_admin") {
                                                    echo "selected";
                                                } ?> value="super_admin">super_admin</option>

                                        <option <?php if ($info->type == "admin") {
                                                    echo "selected";
                                                } ?> value="admin">admin</option>

                                        <option <?php if ($info->type == "modérateur") {
                                                    echo "selected";
                                                } ?> value="modérateur">modérateur</option>

                                        <option <?php if ($info->type == "citoyen_connecté") {
                                                    echo "selected";
                                                } ?> value="citoyen_connecté">citoyen_connecté</option>
                                        <?php if ($info->type == "citoyen_nc") { ?>
                                            <option selected value="citoyen_nc">citoyen_nc</option>
                                        <?php }
                                        ?>
                                    </select>
                                </td>
                                <?php if ($info->type != "citoyen_nc") { ?>
                                    <td><input type="submit" value="Valider"></td>
                            <?php }
                            } ?>
                            </tr>
                        </form>


                </tbody>
            </table>
        </div>
        <!--<button class="btn btn-danger" name="action" value=""><i class="fas fa-trash-alt"></i> Supprimer</button>

            -->


    </div>
</div>
