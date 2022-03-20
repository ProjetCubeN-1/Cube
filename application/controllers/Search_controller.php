<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_controller extends ExtraController
{

    public function searchfunction()
    {
        $search_args = $_GET['search_ressources'];
        if (isset($_GET['search_ressources']) and !empty($_GET['search_ressources'])) {
            $_search = htmlspecialchars($_GET['search_ressources']);

            $this->load->model('Recherche_model');
            $data = $this->Recherche_model->searchRecord($_search);
        } else {
            $data = false;
        }
        $this->view('/cube/recherche', ['data' => $data]);
    }
}
//$search =
//                sprintf("SELECT nom_contenu FROM t_ressources WHERE nom_contenu LIKE '%'" . $_search . "'%' ORDER BY id_ressources DESC");
//            $res_search = $this->db->query($search);
//            $this->view('/cube/recherche');