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
}
