<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cube extends ExtraController
{
    protected function setRessource($uid = null)
    {
        ///$this->object_uuid = $uid;
        $this->setData('ressource', $this->ressource);
    }

    public function accueil()
    {
        $this->title = "Accueil";
        $this->add_path("Accueil", '/cube/Accueil', '');
        $this->view('/Cube/accueil');
    }


    public function ressource1($com1 = null)
    {
        $id_res = 3;
        $requete = sprintf("SELECT * FROM t_ressources where id_ressource = %d", $id_res);
        $obj_result = $this->db->query($requete);

        $res = null;

        $com = $res;
        if ($obj_result) {
            if ($row = $obj_result->row()) {
                $res = $row;
            }
        }

        $com = sprintf("SELECT * FROM t_commentaires where id_ressource = %d", $id_res);
        $obj_result = $this->db->query($com);
        $com1 = null;

        if ($obj_result) {
            if ($row = $obj_result->row()) {
                $com1 = $row;
            }
        }
        $this->view_portal('/cube/ressource1', ['result' => $res, 'com' => $com1]);
    }
    public function ressource2()
    {
        // RECUPERER session = $this->session->userdata('user_id');


        $requete = sprintf("SELECT * FROM t_ressources where id_ressource = 1");
        $obj_result = $this->db->query($requete);

        $res = null;

        if ($obj_result) {
            if ($row = $obj_result->row()) {
                $res = $row;
            }
        }

        $this->view('/cube/ressource2', ['result' => $res]);

        if (isset($_POST['submit_commentaire'])) {
            if ((isset($_POST['titre_commentaire'], $_POST['contenu_commentaire'])) and !empty($_POST['titre_commentaire'] and !empty($_POST['contenu_commentaire']))) {

                $titre = htmlspecialchars($_POST['titre_commentaire']);
                $contenu = htmlspecialchars($_POST['contenu_commentaire']);

                $insert = sprintf(
                    "INSERT INTO t_ressources (contenu,id_utilisateur) VALUES (%s,%s)",
                    $this->db->escape($contenu),
                    $this->db->escape($this->session->userdata('user_id'))
                );
                $resultat = $this->db->query($insert);
                $c_erreur = "c'est good";
            } else {
                $c_erreur = 'Tous les champs doivent etre completés';
            }
        }
    }
    public function create_ressource()
    {
        $this->view_portal('/cube/ressource3');
        if (isset($_POST['titre_ressource'], $_POST['contenu_ressource'])) {
            if (!empty($_POST['titre_ressource'] and $_POST['contenu_ressource'])) {

                $titre_ressource = htmlspecialchars($_POST['titre_ressource']);
                $contenu_ressource = htmlspecialchars($_POST['contenu_ressource']);
                $insert = sprintf(
                    "INSERT INTO t_ressources (nom_ressources,contenu,id_user)
                 VALUES (%s,%s,%d)",
                    $this->db->escape($titre_ressource),
                    $this->db->escape($contenu_ressource),
                    $this->db->escape($this->session->set_userdata('user_id'))
                );
                $this->db->query($insert);
                $message = 'votre ressource est good;';
            } else {
                $message = 'Veuiller remplir la ressource';
            }
        }
    }
    public function commentaire()
    {
        $commentaire = $this->input->post('commentaire');
        $insert_com = sprintf(
            "INSERT INTO t_commentaires (contenu)
        VALUES (%s)",
            $this->db->escape($commentaire)
        );
        $this->db->query($insert_com);
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
