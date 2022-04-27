<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ExtraController extends CI_Controller
{
    var $title = 'Accueil';
    var $path = [["text" => "Accueil", 'url' => '/cube/accueil', 'title' => "Retour à l'accueil"]];
    var $acl = false; // access control list  // doit d'acces
    var $localdatas = [];


    protected function  redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
    function __construct()
    {
        parent::__construct();

        if (!$this->session->login && $this->acl) {
            $this->redirect('/login');
            die();
        }
    }
    protected function json($data)
    {
        header('Content-type: application/json');
        echo json_encode($data);
    }

    protected function userWithId($id)
    {
        $query = sprintf("SELECT * FROM t_utilisateurs WHERE id_utilisateur = %d", $id);
        $obj_result = $this->db->query($query);
        return $obj_result->unbuffered_row();
    }
    public function user()
    {

        if ($id = $this->session->user_id) {
            return $this->userWithId($id);
        }
        return null;
    }


    protected function setData($key, $value)
    {
        $this->localdatas[$key] = $value;
    }

    protected function add_path($text, $url, $title = null)
    {
        $this->path[] = ['text' => $text, 'url' => $url, 'title' => $title];
    }

    protected function is_connected()
    {
        return $this->session->login;
    }
    protected function view_portal($view = null, $datas = null, $ressource_id = null) // avec les favoris, juste pour l'accueil
    {
        if ($this->localdatas)
            $datas = array($this->localdatas, $datas);
        $this->load->view('/templates/header', ['title' => $this->title]);

        $this->load->model('ressource_model');
        $ressources_menu = $this->ressource_model->get_ressource_menu();
        $result_util = $this->ressource_model->get_utilisateurs();
        $favoris_menu = $this->ressource_model->get_favoris($ressource_id);

        $this->load->view('/templates/sidebar',  [
            'ressources_menu' => $ressources_menu,
            'id_result' => $result_util,
            'favoris_menu' => $favoris_menu
        ]);
        $this->load->view('/templates/wrapper', []);

        $this->load->view('/templates/topbar_connect', [
            'title' => $this->title,
            'path' => $this->path,
            'id_result' => $result_util
        ]);

        if ($view)
            $this->load->view($view, $datas);

        $this->load->view('/templates/footer');
    }
    protected function view_login($view = null, $datas = null, $ressource_id = null) // pour la page de login
    {
        if ($this->localdatas)
            $datas = array($this->localdatas, $datas);

        $this->load->view('/templates/header', ['title' => $this->title]);

        $this->load->view('/templates/wrapper', []);


        $this->load->view('/templates/topbar', ['title' => $this->title, 'path' => $this->path]);

        if ($view)
            $this->load->view($view, $datas);

        $this->load->view('/templates/footer');
    }

    protected function view($view = null, $datas = null, $ressource_id = null) // pour les ressources
    {
        if ($this->localdatas)
            $datas = array($this->localdatas, $datas);
        $this->load->view('/templates/header', ['title' => $this->title]);


        $this->load->model('ressource_model');
        $ressources_menu = $this->ressource_model->get_ressource_menu();
        $result_util = $this->ressource_model->get_utilisateurs();
        $favoris_menu = $this->ressource_model->get_favoris($ressource_id);

        $this->load->view('/templates/sidebar',  [
            'ressources_menu' => $ressources_menu,
            'id_result' => $result_util,
            'favoris_menu' => $favoris_menu,
        ]);


        $this->load->view('/templates/wrapper', []);
        $this->load->view('/templates/topbar_connect', [
            'title' => $this->title,
            'path' => $this->path,
            'id_result' => $result_util,
        ]);


        $this->load->model('ressource_model');
        $favoris_menu = $this->ressource_model->get_favoris($ressource_id);
        $cote = $this->ressource_model->get_ressources_cote();

        $this->load->view(
            '/templates/menu_start',
            [
                'favoris_menu' => $favoris_menu,
                'mcote' => $cote
            ]
        );

        if ($view)
            $this->load->view($view, $datas);

        $this->load->view('/templates/menu_end');


        $this->load->view('/templates/footer');
    }
}
