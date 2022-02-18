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
        $this->view('authentification');
    }
    public function bonjour()
    {
        $this->view('bonjour');
    }

    function auth()
    {
        log_message('debug', 'Login::auth()');
        //$this->addError('coucoiu');
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
                log_message('debug', 'check candidate ' . $row->id);

                // candidat !
                $hash = $row->mdp;
                if (password_verify($pass, $hash)) {
                    $this->session->login = true;
                    //return $this->redirect('Pprofils/choix/selection');
                    return $this->redirect('/login/bonjour');
                }
            }
        } else {
            log_message('debug', '************** COMPTE non verifié ');
            return $this->redirect('/login/index');
        }
    }

    function creation()
    {
        $this->view('creation');
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


            // update t_user set prenom = substr(MD5(prenom),LENGTH(prenom),LENGTH(prenom));

            //préparer la requête d'insertion SQL
            $req = sprintf(
                "INSERT INTO t_utilisateurs (nom,prenom,email,date_naissance,mdp,confirmkey,date_creation)
	        VALUES (%s,%s,%s,%s,%s,%s,now())",
                $this->db->escape($this->input->post('nom')),
                $this->db->escape($this->input->post('prenom')),
                $this->db->escape($this->input->post('email')),
                $this->db->escape($this->input->post('date_naissance')),
                $this->db->escape($hashed_pasword),
                $this->db->escape($key),
                $this->db->escape(date_create('Y-m-d H:i:s'))
            );
            $this->db->query($req);
            $conf_mail = 'yaml_parse_file'(APPPATH . '/config/mail.yml');

            $mail = new PHPMailer(true);
            $mail->CharSet = "UTF-8";
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;   	                //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP

            $mail->Host       = $conf_mail['host'];                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $conf_mail['username'];                     //SMTP username
            $mail->Password   =  $conf_mail['password'];                               //SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = (int) $conf_mail['port'];
            //$mail->SMTPAutoTLS = false;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($conf_mail['from'], $conf_mail['from_name']);

            //echo $this->session->email;
            $mail->addAddress($this->session->email);     //Add a recipient
            // $mail->addAddress($this->session->email);     //Add a recipient


            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content

            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";
            $mail->Subject = '[PROJETCUBE2022] Vérifier votre compte';

            $mail->Body = 'CLIQUEZ ICI';
            if ($mail->send())
?>
            <div class="alert alert-info" role="alert">
                <h5>Veuillez verifier vos mails pour activer votre compte.</h5>
            </div>
<?php
        $this->view('/login/authentification');
    } else {
        $this->view('/login/create');
        die;
    }
}

function logout()
{
    $this->session->sess_destroy();
    $this->redirect('/login/authentification');
}
}
