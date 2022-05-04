<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends ExtraController
{
    public function tab_board()
    {
        $this->load->model('admin_model');

        $result_util = $this->admin_model->get_type_utilisateur();
        $res_citoyen = $this->admin_model->get_utilisateur_for_citoyen();

        $result_ressources = $this->admin_model->get_ressources_by_relation_type();

        $categorie = $this->admin_model->get_categorie();

        $this->view_portal('/droit/tab_board', [
            'uid' => $result_util,
            'ressources' => $result_ressources,
            'citoyen' => $res_citoyen,
            'categorie' => $categorie
        ]);
    }

    public function supprimer_ressources()
    {
        if ($this->input->post('action') == 'Supprimer') {
            $idRessources = (isset($_POST['ressource_id']) && is_array($_POST['ressource_id'])) ? implode(",", $_POST['ressource_id']) : $_POST['ressource_id'];
            $requete_ressources = sprintf("DELETE FROM t_ressources WHERE id_ressource IN (%d)", $idRessources);
            $this->db->query($requete_ressources);
        }
        $this->redirect('/admin/tab_board');
    }

    public function change_type()
    {
        $type = $_POST['type'];

        $user_id = $_POST['user_id'];

        $this->load->model('admin_model');
        //$requete_utilisateurs = sprintf("SELECT * FROM t_type INNER JOIN t_utilisateurs ON t_type.id_type = t_utilisateurs.id_type WHERE t_utilisateurs.id_utilisateur = t_utilisateurs.id_utilisateur");

        //$requete_change = sprintf("UPDATE t_utilisateurs SET t_utilisateurs.id_type = %s WHERE id_utilisateur = %d", $type, $user_id);
        $requete_change = sprintf("UPDATE t_type.type FROM t_type INNER JOIN t_utilisateurs ON t_type.id_type = t_utilisateurs.id_type SET t_utilisateurs.id_type = %s WHERE id_utilisateur = %d", $type, $user_id);

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

    public function supprimer_categorie()
    {
        if ($this->input->post('action') == 'Supprimer') {

            $idCategorie = (isset($_POST['categorie_id']) && is_array($_POST['categorie_id'])) ? implode(",", $_POST['categorie_id']) : $_POST['categorie_id'];

            $requete_categorie = sprintf("DELETE FROM t_categorie WHERE id_categorie IN (%d)", $idCategorie);
            $this->db->query($requete_categorie);
        }
        $this->redirect('/admin/tab_board');
    }
}
