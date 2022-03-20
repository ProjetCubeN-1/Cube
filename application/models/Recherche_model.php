<?php
class Recherche_model extends CI_Model
{
    public function searchRecord($_search)
    {
        $this->db->select('id_ressource, nom_ressources');
        $this->db->from('t_ressources');
        $this->db->like('nom_ressources', $_search);
        //$this->db->or_like('categorie');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
}
