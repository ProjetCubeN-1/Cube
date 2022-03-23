<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends ExtraController
{

    public function board_superadmin()
    {
        $post = $this->input->post('type');

        $this->load->model('admin_model');

        $result_util = $this->admin_model->get_utilisateurs();

        $this->view_portal('/droit/superadmin_board', [
            'result' => $result_util
        ]);
    }

    public function board_admin()
    {
        $this->load->model('admin_model');

        $result_ressources = $this->admin_model->get_ressources();
        $this->view_portal('/droit/admin_board', [
            'result' => $result_ressources
        ]);
    }

    public function supprimer_ressources()
    {
        $idRessources = (isset($_POST['ressource_id']) && is_array($_POST['ressource_id'])) ? implode(",", $_POST['ressource_id']) : $_POST['ressource_id'];

        $requete_ressources = sprintf("DELETE FROM t_ressources WHERE id_ressource IN (%s)", $idRessources);
        $this->db->query($requete_ressources);

        $this->redirect('/admin/board_admin');
    }

    public function change_type()
    {
        $type = $_POST['type'];

        $user_id = $_POST['user_id'];

        $this->load->model('admin_model');


        $requete_change = sprintf("UPDATE t_utilisateurs SET t_utilisateurs.type = '%s' WHERE id_utilisateur = %d", $type, $user_id);
        $obj_result = $this->db->query($requete_change);
        $this->redirect('/admin/board_superadmin');
    }
}
