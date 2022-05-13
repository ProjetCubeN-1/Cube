<?php

class Admin_model extends CI_Model
{
    public function get_type_utilisateur()
    {
        $requete_utilisateurs = sprintf("SELECT * FROM t_type INNER JOIN t_utilisateurs ON t_type.id_type = t_utilisateurs.id_type WHERE t_utilisateurs.id_utilisateur = t_utilisateurs.id_utilisateur");
        $obj_result_util = $this->db->query($requete_utilisateurs);

        return $obj_result_util;
    }

    public function get_utilisateur_for_citoyen()
    {
        $requete_utilisateurs = sprintf("SELECT * FROM t_utilisateurs WHERE t_utilisateurs.id_type='5' ");
        $obj_result_util = $this->db->query($requete_utilisateurs);
        $result_util = $obj_result_util;
        return $result_util;
    }

    public function get_ressources_by_relation_type()
    {
        $requete_ressource = sprintf("SELECT *,t_type_relation.type_relation,t_type_ressource.type_ressource FROM t_type_relation INNER JOIN t_ressources ON t_type_relation.id_type_relation = t_ressources.id_type_relation INNER JOIN t_type_ressource ON t_type_ressource.id_type_ressource = t_ressources.id_type_ressource WHERE t_ressources.id_ressource = t_ressources.id_ressource ");
        $obj_result = $this->db->query($requete_ressource);
        $result_ress = $obj_result;
        return $result_ress;
    }
    public function get_ressource()
    {
        $requete_ressources = sprintf("SELECT * FROM t_ressources");
        $obj_result_ressources = $this->db->query($requete_ressources);
        $result_ressources = $obj_result_ressources;
        return $result_ressources;
    }

    public function get_ressource_id($ressource_id)
    {
        $requete_ressource = sprintf("SELECT * FROM t_ressources where id_ressource = %d", $ressource_id);
        $obj_result = $this->db->query($requete_ressource);
        $result_ress = $obj_result->row();
        return $result_ress;
    }

    public function delete_ressources($idRessources)
    {
        $requete_ressources = sprintf("DELETE FROM t_ressources WHERE id_ressource IN (%s)", $idRessources);
        $obj_delete = $this->db->query($requete_ressources);
        return $obj_delete;
    }

    public function change_type_all($type, $user_id)
    {
        $requete_change = sprintf("UPDATE t_utilisateurs SET t_utilisateurs.type = '%s' WHERE id_utilisateur = %d", $type, $user_id);
        $obj_type = $this->db->query($requete_change);
        return $obj_type;
    }

    public function get_categorie()
    {
        $requete_categorie = sprintf("SELECT * FROM t_categorie");
        $obj_result_categorie = $this->db->query($requete_categorie);
        $result_categorie = $obj_result_categorie;
        return $result_categorie;
    }

    public function delete_categorie()
    {
    }
    public function ajouter_categorie()
    {
    }
}
