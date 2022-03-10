<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cube extends ExtraController
{
    public function accueil()
    {
        $this->title = "Accueil";
        $this->add_path("Accueil", '/cube/Accueil', '');
        $this->view('/Cube/accueil');
    }


    public function ressource()
    {
        $requete = sprintf("SELECT * FROM t_ressources where id_ressource = 10");

        $obj_result = $this->db->query($requete);

        $aaa = null;

        if ($obj_result) {
            if ($row = $obj_result->row()) {
                $aaa = $row;
            }
        }
        $this->view('/cube/ressource1', ['result' => $aaa]);
    }



    public function info_ressource()
    {
        $requete = sprintf(
            "SELECT * FROM t_ressources where id_ressource = 1"
        );
        $res = [];

        $obj_result = $this->db->query($requete);

        if ($obj_result) {
            if ($row = $obj_result->unbuffered_row()) {
                echo $row->nom_ressources;
            }
        }
        $this->redirect('/cube/ressource');
    }

    public function compte()
    {
        $this->view_portal('/cube/compte');
    }
    public function info_compte()
    {
        if ($this->session->login = true) {
            echo 'bonjour';

            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $conf_pass = $this->input->post('confmdp');

            $query = sprintf(
                "SELECT * FROM t_utilisateurs WHERE email = %s",
                $this->db->escape($email),
                $this->db->escape($nom),
                $this->db->escape($prenom),
            );
            $this->db->query($query);
        }
        $this->redirect('/cube/accueil');
    }

    public function creation_ressources()
    {
        $this->view_portal('/cube/creation_ressources');
    }

    public function publier_ressources()
    {
        $key = sprintf("SET FOREIGN_KEY_CHECKS=0;
        ");
        $this->db->query($key);
        $req = sprintf(
            "INSERT INTO t_ressources (contenu) VALUES (%s)",
            $this->db->escape($this->input->post('texxt'))
        );
        $this->db->query($req);

        $requete = sprintf("SELECT * FROM t_ressources where id_ressource = 10");

        $obj_result = $this->db->query($requete);

        $aaa = null;

        if ($obj_result) {
            if ($row = $obj_result->row()) {
                $aaa = $row;
            }
        }
    }
}
