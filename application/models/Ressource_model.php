<?php

class Ressource_model extends CI_Model
{

    public function get_ressource_menu()
    {
        $requete = sprintf("SELECT * FROM t_ressources");
        $obj_result = $this->db->query($requete);
        $ressources_menu = $obj_result->result();
        return $ressources_menu;
    }

    public function get_ressources_cote()
    {
        $requete = sprintf("SELECT *,id_ressources FROM t_misdecote INNER JOIN t_ressources ON t_misdecote.id_ressources = t_ressources.id_ressource WHERE t_misdecote.id_utilisateurs = %d", $this->session->id);
        $obj_result = $this->db->query($requete);
        $ressources_menu = $obj_result->result();
        return $ressources_menu;
    }

    public function get_favoris()
    {
        $requete_fav = sprintf("SELECT id_ressources, t_ressources.nom_ressources FROM t_favoris INNER JOIN t_ressources ON t_favoris.id_ressources = t_ressources.id_ressource WHERE t_favoris.id_utilisateurs = %d", $this->session->id);
        $obj_result_fav = $this->db->query($requete_fav);
        $result_favoris = $obj_result_fav->result();
        return $result_favoris;
    }

    public function get_ressource($ressource_id)
    {
        $requete_ressource = sprintf("SELECT * FROM t_ressources where id_ressource = %d", $ressource_id);
        $obj_result = $this->db->query($requete_ressource);
        $result_ress = $obj_result->row();
        return $result_ress;
    }

    public function get_commentaires($ressource_id)
    {
        $requete_com = sprintf("SELECT *, t_utilisateurs.nom FROM t_commentaires INNER JOIN t_utilisateurs ON t_commentaires.id_utilisateur=t_utilisateurs.id_utilisateur WHERE t_commentaires.id_ressource = %d ORDER BY t_commentaires.date_commentaire DESC", $ressource_id);
        $obj_result_com = $this->db->query($requete_com);
        $result_commentaire = $obj_result_com->result();
        return $result_commentaire;
    }

    public function get_utilisateurs()
    {
        $requete_utilisateurs = sprintf("SELECT * FROM t_utilisateurs where id_utilisateur = %d", $this->session->id_user);
        $obj_result_util = $this->db->query($requete_utilisateurs);
        $result_util = $obj_result_util->row();
        return $result_util;
    }

    public function get_type_utilisateur()
    {
        $requete_utilisateurs = sprintf("SELECT t_type.type,t_utilisateurs.id_type FROM t_type INNER JOIN t_utilisateurs ON t_type.id_type = t_utilisateurs.id_type WHERE t_utilisateurs.id_utilisateur = %d", $this->session->id);
        $obj_result_util = $this->db->query($requete_utilisateurs);
        $result_util = $obj_result_util->row();
        return $result_util;
    }

    public function mettre_cote($ressource_id)
    {
        $req = sprintf(
            " INSERT INTO t_misdecote (id_ressources,id_utilisateurs) VALUES (%d,%s)",
            $ressource_id,
            $this->db->escape($this->session->id)
        );
        $obj_mc = $this->db->query($req);
        return $obj_mc;
    }

    public function retirer_mettre_cote($ressource_id)
    {

        $req = sprintf(
            "DELETE FROM t_misdecote WHERE id_ressources = %d AND id_utilisateurs = %s",
            $ressource_id,
            $this->db->escape($this->session->id)
        );
        $obj_mc = $this->db->query($req);
        return $obj_mc;
    }

    public function get_com_id($ressource_id)
    {
        $res = sprintf("SELECT id_commentaire FROM t_commentaires WHERE id_ressource = %d", $ressource_id);
        $obj_com = $this->db->query($res);
        $result_com = $obj_com->result();
        return $result_com;
    }

    public function get_type_ressource()
    {
        $requete_type_ressource = sprintf("SELECT * FROM t_type_ressource");
        $obj_type_ressource = $this->db->query($requete_type_ressource);
        $result_type_ressource = $obj_type_ressource->result();
        return $result_type_ressource;
    }
    public function get_categorie()
    {
        $requete_categorie = sprintf("SELECT * FROM t_categorie");
        $obj_categorie = $this->db->query($requete_categorie);
        $result_categorie = $obj_categorie->result();
        return $result_categorie;
    }
    public function get_type_relation()
    {
        $requete_type_relation = sprintf("SELECT * FROM t_type_relation");
        $obj_type_relation = $this->db->query($requete_type_relation);
        $result_type_relation = $obj_type_relation->result();
        return $result_type_relation;
    }
}
