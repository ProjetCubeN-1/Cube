<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends ExtraController
{

    public function board()
    {

        $this->load->model('admin_model');

        $result_util = $this->admin_model->get_utilisateurs();


        $this->view_portal('/droit/admin_board', [
            'result' => $result_util
        ]);
    }
    public function change_type_utilisateur()
    {

        $this->load->model('admin_model');

        $result_util = $this->admin_model->get_utilisateurs();
        var_dump($result_util);

        $req = sprintf("UPDATE t_utilisateurs SET type = %s WHERE id_utilisateur= %d");
    }
}
