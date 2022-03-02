<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cube extends ExtraController
{
    public function accueil()
    {
        $this->title = "Acceuil";
        $this->add_path("Accueil", '/cube/Accueil', '');
        $this->view('/Cube/accueil');
    }
    public function ressource()
    {
        $this->view('/cube/ressource1');
    }
    public function compte()
    {

        $this->view('/cube/compte');
    }
}
