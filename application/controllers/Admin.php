<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends ExtraController
{
    public function tab_board()
    {
        $post = $this->input->post('type');

        $this->load->model('admin_model');

        $result_util = $this->admin_model->get_utilisateurs();
        $res_citoyen = $this->admin_model->get_utilisateur_for_citoyen();

        $result_ressources = $this->admin_model->get_ressources();


        $this->view_portal('/droit/tab_board', [
            'uid' => $result_util,
            'ressources' => $result_ressources,
            'citoyen' => $res_citoyen
        ]);
    }

    public function supprimer_ressources()
    {
        $this->load->model('admin_model');

        //if ($this->input->post('action') == 'Supprimer') {

        $idRessources = (isset($_POST['ressource_id']) && is_array($_POST['ressource_id'])) ? implode(",", $_POST['ressource_id']) : $_POST['ressource_id'];

        $requete_ressources = sprintf("DELETE FROM t_ressources WHERE id_ressource IN (%s)", $idRessources);
        $this->db->query($requete_ressources);

        $this->redirect('/admin/tab_board');
    }

    public function change_type()
    {
        $type = $_POST['type'];

        $user_id = $_POST['user_id'];

        $this->load->model('admin_model');

        $requete_change = sprintf("UPDATE t_utilisateurs SET t_utilisateurs.type = '%s' WHERE id_utilisateur = %d", $type, $user_id);
        $obj_result = $this->db->query($requete_change);

        $this->redirect('/admin/tab_board');
    }

    public function desactive_citoyen()
    {

        $conf_citoyen = $_POST['confirme'];

        $id_user = $_POST['id_user'];

        $requete_change = sprintf("UPDATE t_utilisateurs SET confirme = '%s' WHERE id_utilisateur = %d", $conf_citoyen, $id_user);
        $obj_result = $this->db->query($requete_change);

        $this->redirect('/admin/tab_board');
    }

    public function ressource_valide()
    {
        $valide = $_POST['valide'];

        $ressource_id = $_POST['ressource_id'];

        $requete_change = sprintf("UPDATE t_ressources SET valide = '%s' WHERE id_ressource = %d", $valide, $ressource_id);
        $obj_result = $this->db->query($requete_change);

        $this->redirect('/admin/tab_board');
    }
}
