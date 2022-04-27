<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update extends ExtraController
{
    var $acl = false;


    protected function db_check_field($table, $field)
    {
        $query = $this->db->query(sprintf("SHOW COLUMNS FROM `%s` LIKE '%s'", $table, $field));
        return $query->num_rows();
    }


    function index($key = null)
    {
        if ($key == "toto") {
            $this->load->dbforge();
            foreach (glob(APPPATH . "/updates/*.php") as $filename) {
                echo "execute $filename<br>";
                include $filename;
                echo "<hr>";
            }
        }
    }
}
