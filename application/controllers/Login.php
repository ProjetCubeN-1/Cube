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
        log_message('debug', 'login::index');

        if (!$this->session->login) {
            // $this->view('login/index');
            $this->view_portal('login/authentification');
        } else $this->redirect('/login/logout');
    }
    public function index_nc()
    {

        $this->redirect('/cube/accueil');
    }


    function auth()
    {
        log_message('debug', 'Login::auth()');
        $this->session->login = false;
        $this->session->user_id = null;

        if ($this->input->post('action') == 'Connect') {
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');

            $query = sprintf(
                "SELECT * FROM t_utilisateurs WHERE email = %s",
                $this->db->escape($email)
            );

            $obj_result = $this->db->query($query);

            while ($row = $obj_result->unbuffered_row()) {
                $hash = $row->mdp;
                if (password_verify($pass, $hash)) {
                    $this->session->login = true;
                    return $this->view('/cube/accueil');
                }
            }
        } else {
            log_message('debug', '************** COMPTE non verifié ');
            return $this->redirect('/login/index');
        }
    }

    function creation()
    {
        $this->view_portal('/login/creation');
    }

    /* Creation de compte de l'utilisateur */
    function create()
    {

        if ($this->input->post('pass') == $this->input->post('confmdp')) {

            $longueurkey = 15;
            $key = "";
            for ($i = 1; $i < $longueurkey; $i++)
                $key .= mt_rand(0, 9);

            $this->session->set_userdata('nom', $this->input->post('nom'));
            $this->session->set_userdata('prenom', $this->input->post('prenom'));
            $this->session->set_userdata('email', $this->input->post('email'));
            $this->session->set_userdata('datenaissance', $this->input->post('datenaissance'));
            $this->session->set_userdata('pass', $this->input->post('pass'));

            $new_pass = $this->input->post('pass');
            $hashed_pasword = password_hash($new_pass, PASSWORD_DEFAULT);
            $date = date('Y-m-d H:i:s');

            //préparer la requête d'insertion SQL
            $req = sprintf(
                "INSERT INTO t_utilisateurs (nom,prenom,email,date_naissance,mdp,confirmkey,date_creation)
	        VALUES (%s,%s,%s,%s,%s,%s,now())",
                $this->db->escape($this->input->post('nom')),
                $this->db->escape($this->input->post('prenom')),
                $this->db->escape($this->input->post('email')),
                $this->db->escape($this->input->post('datenaissance')),
                $this->db->escape($hashed_pasword),
                $this->db->escape($key),
                $this->db->escape(date_create('Y-m-d H:i:s'))
            );
            $this->db->query($req);
            $this->redirect('/login/index');
        } else {
            $this->redirect('/login/create');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        return $this->redirect('/login/index');
    }
}
