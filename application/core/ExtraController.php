<?php
defined('BASEPATH') or exit('No direct script access allowed');


class ExtraController extends CI_Controller
{

    var $acl = true; // access control list  // doit d'acces



    protected function  redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}
