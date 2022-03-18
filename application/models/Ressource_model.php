<?php

class Ressource_model extends CI_Model
{


    public function get_ressource_menu()
    {
        $requete = sprintf("SELECT id_ressource,nom_ressources FROM t_ressources");
        $obj_result = $this->db->query($requete);
        $ressources_menu = $obj_result->result();
        return $ressources_menu;
    }

    public function get_favoris($ressource_id)
    {
        $requete_fav = sprintf("SELECT *, t_ressources.id_ressource, t_ressources.nom_ressources FROM t_favoris INNER JOIN t_ressources ON t_favoris.id_ressources=t_ressources.id_ressource WHERE t_favoris.id_ressources = %d", $ressource_id);
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
}
