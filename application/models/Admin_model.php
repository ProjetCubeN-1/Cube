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

    public function type_utilisateur($user_id)
    {
        $this->db->set('type',);
        $this->db->where('id_utilisateur', $user_id);
        $this->db->update('t_user');
    }

    public function get_ressources($id_ressource = null)
    {
        $requete_ressources = sprintf("SELECT * FROM t_ressources");
        $obj_result_ressources = $this->db->query($requete_ressources);
        $result_ressources = $obj_result_ressources;
        return $result_ressources;
    }

    public function get_idressources($id_ressource = null)
    {
        $requete_ressources = sprintf("SELECT id_ressource FROM t_ressources");
        $obj_result_ressources = $this->db->query($requete_ressources);
        $result_ressources = $obj_result_ressources;
        return $result_ressources;
    }


}
