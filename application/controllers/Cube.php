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
        $result_util = $this->ressource_model->get_utilisateurs();
        $favoris = $this->ressource_model->get_favoris();
        $result_commentaire = $this->ressource_model->get_commentaires($ressource_id);

        $this->view_portal('/cube/ressource', [
            'result' => $result_ressource,
            'get_com' => $result_commentaire,
            'user' => $result_util,
            'favoris' => $favoris,
        ]);
    }

    public function creation_ressources()
    {
        $this->load->model('ressource_model');

        $result_ressource = $this->ressource_model->get_ressources_all();

        $this->view_portal('/cube/creation_ressources', [
            'result' => $result_ressource,

        ]);
    }

    public function mettre_cote($ressource_id = null)
    {

        $this->load->model('ressource_model');

        $result_ressource = $this->ressource_model->get_ressource($ressource_id);

        $req = sprintf("UPDATE t_ressources SET mis_de_cote = '1' WHERE id_ressource = %d", $ressource_id);
        $this->db->query($req);
        //$req = sprintf(
        //    "INSERT INTO t_ressources (id_ressource,id_utilisateur,mis_de_cote) VALUES (%d,%d,'1')",
        //    $this->db->escape($ressource_id),
        //    $this->db->escape($this->session->id)
        //);
        $this->db->query($req);

        $this->redirect('/cube/ressource/' . $ressource_id);
    }

    public function retirer_mettre_cote($ressource_id = null)
    {

        $this->load->model('ressource_model');

        $result_ressource = $this->ressource_model->get_ressource($ressource_id);

        $req = sprintf("UPDATE t_ressources SET mis_de_cote = '0' WHERE id_ressource = %d", $ressource_id);
        $this->db->query($req);


        $this->redirect('/cube/ressource/' . $ressource_id);
    }

    public function publier_ressources()
    {
        $key = sprintf("SET FOREIGN_KEY_CHECKS=0;
        ");
        $this->db->query($key);

        $req = sprintf(
            "INSERT INTO t_ressources (nom_ressources,type_ressource,contenu,categorie,type_relation,id_utilisateur,valide) 
            VALUES (%s,%s,%s,%s,%s,%s,'false')",
            $this->db->escape($this->input->post('text_titre')),
            $this->db->escape($this->input->post('type_contenu')),
            $this->db->escape($this->input->post('text_contenu')),
            $this->db->escape($this->input->post('text_categorie')),
            $this->db->escape($this->input->post('type_relation')),
            $this->db->escape($this->session->id)
        );
        $this->db->query($req);

        $last_res_id = $this->db->insert_id();

        $this->session->ressource_id =  $last_res_id;

        $this->redirect('/cube/accueil');
    }

    public function ajout_favoris($ressource_id = null)
    {

        $favoris = sprintf("SELECT * FROM t_ressources WHERE id_ressource = %d", $ressource_id);
        $this->db->query($favoris);

        $req = sprintf(
            "INSERT INTO t_favoris (id_ressources,id_utilisateurs) VALUES (%d,%s)",
            $ressource_id,
            $this->db->escape($this->session->id)
        );
        $this->db->query($req);
        $this->redirect('/cube/ressource/' . $ressource_id);
    }

    public function retirer_favoris($ressource_id = null)
    {
        $favoris = sprintf("SELECT * FROM t_ressources WHERE id_ressource = %d", $ressource_id);
        $this->db->query($favoris);

        $req = sprintf(
            "DELETE FROM t_favoris WHERE id_ressources = %d AND id_utilisateurs = %s",
            $ressource_id,
            $this->db->escape($this->session->id)
        );
        $this->db->query($req);
        $this->redirect('/cube/ressource/' . $ressource_id);
    }
}
