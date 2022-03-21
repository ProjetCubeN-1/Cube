<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends ExtraController
{

    public function board_superadmin()
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

    public function board_admin()
    {
        $this->load->model('admin_model');

        $result_ressources = $this->admin_model->get_ressources();

        $this->view_portal('/droit/superadmin_board', [
            'result' => $result_ressources
        ]);
    }

    public function supprimer_ressources()
    {
        $this->load->model('admin_model');

        $result_ressources = $this->admin_model->get_idressources();
        $f = $result_ressources->result();

        echo '<pre>';
        print_r($f);
        echo '</pre>';

        if (isset($_POST['cocher'])) {
            $requete_ressources = sprintf("DELETE FROM t_ressources WHERE id_ressource = %s", $f->id_ressource);
            $this->db->query($requete_ressources);
        }
    }
}
