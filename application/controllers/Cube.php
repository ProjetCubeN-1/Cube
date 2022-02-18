<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cube extends ExtraController
{

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

    public function accueil()
    {
        $this->title = "Acceuil";
        $this->add_path("Accueil", '/cube/Accueil', '');
        $this->view('Cube/accueil');
    }
}
