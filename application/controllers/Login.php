<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends ExtraController
{

    var $acl = false;

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('welcome_message');
    }
    public function bonjour()
    {
        $this->load->view('bonjour');
    }

    public function auth()
    {

        $this->session->login = false;
        if ($this->input->post('action') == 'Connect') {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $query = sprintf(
                "SELECT * FROM t_utilisateurs WHERE email = %s",
                $this->db->escape($email)
            );
            $obj_result = $this->db->query($query);
            while (($row = $obj_result->unbuffered_row())) {
                $hash_mail = $row->email;

                if ($email == $hash_mail) {

                    $hash = $row->mdp;

                    if ($row->email && $password) {
                        $this->session->login = true;
                        $this->redirect('/login/bonjour');
                    } else {
                        $this->redirect('/test');
                    }
                }
            }
        } else {
            $this->redirect('/login/index');
        }
    }
}
