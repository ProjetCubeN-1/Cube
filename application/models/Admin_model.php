<?php

class Admin_model extends CI_Model
{
    public function get_utilisateurs()
    {
        $requete_utilisateurs = sprintf("SELECT * FROM t_utilisateurs");
        $obj_result_util = $this->db->query($requete_utilisateurs);
        $result_util = $obj_result_util;
        return $result_util;
    }

    public function get_utilisateur_for_citoyen()
    {
        $requete_utilisateurs = sprintf("SELECT * FROM t_utilisateurs WHERE t_utilisateurs.type='citoyen_connecté' ");
        $obj_result_util = $this->db->query($requete_utilisateurs);
        $result_util = $obj_result_util;
        return $result_util;
    }

    public function get_ressources()
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
    public function delete_categorie()
    {
    }
    public function ajouter_categorie()
    {
    }
}
