<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_controller extends ExtraController
{
    public function index()
    {
        var_dump('kk');
    }
    public function search()
    {
        $this->load->model('Recherche_model');
        $search_args = $_GET['search_ressources'];
        if (isset($_GET['search_ressources']) and !empty($_GET['search_ressources'])) {
            $_search = htmlspecialchars($_GET['search_ressources']);
            $search =
                sprintf("SELECT nom_contenu FROM t_ressources WHERE nom_contenu LIKE '%'" . $_search . "'%' ORDER BY id_ressources DESC");
            $res_search = $this->db->query($search);
            $this->view('/cube/recherche');
        }
    }

    public function searchfunction()
    {
        $this->load->model('Recherche_model');
        $data['searchdata'] = $this->Recherche_model->searchRecord();
        $this->view('/cube/recherche', $data);
    }


    public function search_name()
    {

        $key = $this->input->get('search_ressources');

        if (isset($key) and !empty($key)) {
            $data['records'] = $this->Recherche_model->searchRecord($key);
            $data['link'] = '';
            $data['message'] = 'Search Results';
            $this->load->view('cube/recherche', $data);
        } else {
            //redirect('Search') ;
        }
    }
}
