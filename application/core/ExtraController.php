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

    protected function add_path($text, $url, $title = null)
    {
        $this->path[] = ['text' => $text, 'url' => $url, 'title' => $title];
    }

    protected function is_connected()
    {
        return $this->session->login;
    }
    protected function view_portal($view = null, $datas = null)
    {
        if ($this->localdatas)
            $datas = array($this->localdatas, $datas);
        $this->load->view('/templates/header', ['title' => $this->title]);
        if ($this->is_connected())
            $this->load->view('/templates/topbar_cn', ['title' => $this->title, 'path' => $this->path]);
        else
            $this->load->view('/templates/topbar');

        if ($view)
            $this->load->view($view, $datas);

        $this->load->view('/templates/footer');
    }

    protected function view($view = null, $datas = null)
    {
        if ($this->localdatas)
            $datas = array($this->localdatas, $datas);
        $this->load->view('/templates/header', ['title' => $this->title]);

        if ($this->is_connected())
            $this->load->view('/templates/topbar_cn', ['title' => $this->title, 'path' => $this->path]);
        else
            $this->load->view('/templates/topbar');
        $this->load->view('/templates/menu_start');

        if ($view)
            $this->load->view($view, $datas);

        $this->load->view('/templates/menu_end');


        $this->load->view('/templates/footer');
    }
}
