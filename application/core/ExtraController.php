<?php
defined('BASEPATH') or exit('No direct script access allowed');


class ExtraController extends CI_Controller
{

    var $acl = true; // access control list  // doit d'acces
    var $localdatas = [];

    protected function  redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }

    protected function view($view = null, $datas = null)
    {
        if ($this->localdatas)
            $datas = array($this->localdatas, $datas);

        $this->load->view('/templates/header');

        if ($view)
            $this->load->view($view, $datas);

        $this->load->view('/templates/footer');
    }
}
