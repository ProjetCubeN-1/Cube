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
        $this->db->set('type', $hashed_pasword);
        $this->db->where('id_utilisateur', $user_id);
        $this->db->update('t_user');
    }
}
