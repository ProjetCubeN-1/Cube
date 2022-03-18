<?php
class Recherche_model extends CI_Model
{
    public function get_recherche($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('t_ressources');
        $this->db->limit($limit, $start);
        $this->db->order_by('id_ressource');
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function get_recherche_Count()
    {
        $this->db->select("COUNT(*) as num_row");
        $this->db->from('t_ressources');
        $this->db->order_by('id_ressource');
        $query = $this->db->get();
        $result = $query->result();
        return $result[0]->num_row;
    }
    public function searchRecord()
    {
        $this->db->select('*');
        $this->db->from('t_ressources');
        $this->db->like('nom_ressources',);
        $this->db->or_like('categorie');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }


    public function GetSearchdata()
    {
        $this->db->select("*");
        $this->db->like('tutorial_name', $this->input->get('search'));
        $query = $this->db->get("tutorial_name");
        return $query->result();
    }
}
