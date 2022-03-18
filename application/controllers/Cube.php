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


    public function ressource($ressource_id = null)
    {
        // $requete = sprintf("SELECT * FROM t_ressources where id_ressource = %d", $ressource_id);
        // $obj_result = $this->db->query($requete);
        // $result_ress = $obj_result->row();
        $video = 'Vidéo';

        if (isset($_POST['submit_commentaire'])) {
            if ((isset($_POST['contenu_commentaire'])) and !empty($_POST['contenu_commentaire'])) {

                $contenu = htmlspecialchars($_POST['contenu_commentaire']);

                $key = sprintf("SET FOREIGN_KEY_CHECKS=0;");
                $this->db->query($key);

                $insert = sprintf(
                    "INSERT INTO t_commentaires (contenu,id_utilisateur,id_ressource) VALUES (%s,%s,%s)",
                    $this->db->escape($contenu),
                    $this->db->escape($this->session->id),
                    $this->db->escape($ressource_id)
                );
                $resultat = $this->db->query($insert);

                $res = $resultat;
            } else {
            }
        }

        $this->load->model('ressource_model');

        $result_ressource = $this->ressource_model->get_ressource($ressource_id);
        $result_commentaire = $this->ressource_model->get_commentaires($ressource_id);

        $this->view_portal('/cube/ressource', [
            'result' => $result_ressource,
            'get_com' => $result_commentaire,
            'vid' => $video

        ]);
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
            "INSERT INTO t_ressources (nom_ressources,type_ressource,contenu,categorie,type_relation,id_utilisateur) VALUES (%s,%s,%s,%s,%s,%s)",
            $this->db->escape($this->input->post('text_titre')),
            $this->db->escape($this->input->post('type_contenu')),
            $this->db->escape($this->input->post('text_contenu')),
            $this->db->escape($this->input->post('text_categorie')),
            $this->db->escape($this->input->post('type_relation')),
            $this->db->escape($this->session->id),
        );
        $this->db->query($req);

        $last_res_id = $this->db->insert_id();

        $this->session->ressource_id =  $last_res_id;

        $this->redirect('/cube/accueil');
    }

    public function favoris($ressource_id = null)
    {
        $requete = sprintf("SELECT * FROM t_ressources WHERE id_ressource = %d", $ressource_id);
        $this->db->query($requete);
        
        $req = sprintf(
            "INSERT INTO t_favoris (id_ressources,id_utilisateurs) VALUES (%d,%s)",
            $ressource_id,
            $this->db->escape($this->session->id)
        );
        $favoris = $this->db->query($req);
        print_r($ressource_id);
    }
}
