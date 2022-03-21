<div class="card">
    <div class="card-body">
        <div class="col-8">
            <form method="post" action="/admin/change_type_utilisateur">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>nom</th>
                            <th>prenom</th>
                            <th>date de naissance</th>
                            <th>email</th>
                            <th>type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result->result() as $info) { ?>
                            <tr>
                                <td><?php echo $info->id_utilisateur ?></td>
                                <td><?php echo $info->nom ?></td>
                                <td><?php echo $info->prenom ?></td>
                                <td><?php echo $info->date_naissance ?></td>
                                <td><?php echo $info->email ?></td>
                                <td>
                                    <select class="form-control" id="id-type" name="" value="<?php echo $info->type ?>">
                                        <option value="0"><?php echo $info->type ?></option>
                                        <option value="1">admin</option>
                                        <option value="2">modérateur</option>
                                        <option value="3">citoyen_connecté</option>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
        <!--<button class="btn btn-danger" name="action" value=""><i class="fas fa-trash-alt"></i> Supprimer</button>

            <input type="submit" name="favoris" value="Ajouter aux favoris"><i class="far fa-star"></i></input>-->


    </div>
</div>