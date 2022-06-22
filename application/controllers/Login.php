<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


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
        if (!$this->session->login) {
            /// $this->view('login/index');
            $this->view_login('login/authentification');
        } else $this->redirect('/login/logout');
    }
    public function index_nc()
    {
        $this->session->login = false;

        if ($this->input->post('action') == 'nc_connect') {
            $query = sprintf("SELECT t_type.type,t_utilisateurs.id_utilisateur,t_utilisateurs.id_type FROM t_type INNER JOIN t_utilisateurs ON t_type.id_type = t_utilisateurs.id_type WHERE t_utilisateurs.id_type = '4'");

            //$query = sprintf(
            //    "SELECT * FROM t_utilisateurs WHERE t_utilisateurs.type= 'citoyen_nc'",
            //);
            $obj_result = $this->db->query($query);

            while ($row = $obj_result->unbuffered_row()) {
                $this->session->login = false;
                $this->session->id = $row->id_utilisateur;
?>
                <div class="alert alert-info" role="alert">
                    <h5>Veuillez-vous inscrire pour accéder aux différentes fonctionnalitées.<a href="/login/creation"> Cliquez-ici</a></h5>
                </div>
            <?php

                return $this->view('/cube/accueil');
            }
        }
    }


    function auth()
    {
        $this->session->login = false;
        $this->session->id = null;

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
                //if (password_verify($pass, $hash) && $row->confirme == 1) {
                if (($pass = $hash) && $row->confirme == 1) {
                    $this->session->login = true;
                    $this->session->id = $row->id_utilisateur;
                    return $this->view('/cube/accueil');
                } else {
                    return $this->redirect('/login/index');
                }
            }
        } else {
            return $this->view_login('/login/index');
        }
        return $this->view_login('/login/authentification');
    }

    function creation()
    {
        $this->view_login('/login/creation');
    }

    /* Creation de compte de l'utilisateur */
    function create()
    {

        $this->load->model('ressource_model');
        $result_utilisateurs = $this->ressource_model->get_utilisateurs();

        $this->session->set_userdata('nom', $this->input->post('nom'));
        $this->session->set_userdata('prenom', $this->input->post('prenom'));
        $this->session->set_userdata('email', $this->input->post('email'));
        $this->session->set_userdata('datenaissance', $this->input->post('datenaissance'));
        $this->session->set_userdata('pass', $this->input->post('pass'));

        $email = $this->input->post('email');

        $new_pass = $this->input->post('pass');

        $requete = sprintf(
            "SELECT email FROM t_utilisateurs WHERE email = %s",
            $this->db->escape($email)
        );
        $obj_result_util = $this->db->query($requete);
        $result_util = $obj_result_util->row();


        if (isset($result_util)) {
            ?>
            <div class="alert alert-danger" role="alert">
                <h5>Compte déjà existant <a href="/login/index">Connectez-vous</a></h5>
            </div>
            <?php
            return $this->view_login("/login/creation");
        }


        if ($this->input->post('pass') == $this->input->post('confmdp')) {


            $longueurkey = 15;
            $key = "";
            for ($i = 1; $i < $longueurkey; $i++)
                $key .= mt_rand(0, 9);


            //$hashed_pasword = password_hash($new_pass, PASSWORD_DEFAULT);
            $hashed_pasword = hash('sha256', $new_pass);


            //préparer la requête d'insertion SQL
            $req = sprintf(
                "INSERT INTO t_utilisateurs (nom,prenom,email,date_naissance,mdp,id_type,confirmkey,date_creation,confirme)
	        VALUES (%s,%s,%s,%s,%s,'4',%s,now(),'0')",
                $this->db->escape($this->input->post('nom')),
                $this->db->escape($this->input->post('prenom')),
                $this->db->escape($this->input->post('email')),
                $this->db->escape($this->input->post('datenaissance')),
                $this->db->escape($hashed_pasword),
                $this->db->escape($key),
                $this->db->escape(date_create('Y-m-d H:i:s'))
            );
            $this->db->query($req);

            $conf_mail = yaml_parse_file(APPPATH . '/config/mail.yml');

            $mail = new PHPMailer;
            //Server settings

            //$mail->SMTPDebug = 2;                      //Enable verbose debug output
            $mail->isSMTP();
            $mail->Host       = $conf_mail['host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $conf_mail['username'];       //cesicube.noreply@gmail.com       
            $mail->Password   = $conf_mail['password'];    //CubeCESI17 mdp de la vrai @mail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = (int) $conf_mail['port'];                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($conf_mail['from'], $conf_mail['from_name']);
            $mail->addAddress($email);     //Add a recipient


            //Attachments

            //Content
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8"; //Set email format to HTML
            $mail->Subject = '[CUBE] vérifier votre compte';
            $mail->Body = $this->load->view('/cube/mail_confirm', [
                'url' => $this->config->item('base_url') . 'login/confirmation/?email=' . urlencode($this->session->email) . '&key=' . $key
            ], true);
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if ($mail->send()) {
            ?>
                <div class="alert alert-info" role="alert">
                    <h5>Veuillez verifier vos mails pour activer votre compte.</h5>
                </div>
        <?php
                $this->view_login('/login/authentification');
            }
        } else {
            $this->redirect('/login/creation');
        }
    }

    function pass_verif_oublie()
    {
        $this->view('login/pass_oublie');
    }

    function logout()
    {
        $this->session->sess_destroy();
        return $this->redirect('/login/index');
    }
    function confirmation()
    {
        $email = $this->input->get('email');
        $key = (int)$this->input->get('key');

        if ($email && $key) {
            $res = $this->db->query(
                sprintf(
                    "SELECT * FROM t_utilisateurs WHERE email = %s AND confirmkey = %s",
                    $this->db->escape($email),
                    $this->db->escape($key)
                )
            );
            $user = $res->unbuffered_row();
            if ($user) {
                if ($user->confirme == 0) {
                    $this->db->query(
                        sprintf("UPDATE t_utilisateurs SET confirme = 1 WHERE id_utilisateur= %d", $user->id_utilisateur)
                    );
                } else {
                }
            } else {
            }
        } ?>
        <div class="alert alert-success" role="alert">
            <h5>Votre compte a bien été activé.</h5>
        </div>
<?php
        return $this->view_login('/login/authentification');
    }
}
