<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Api extends ExtraController
{

    public function inscription()
    {

        $data = json_decode(file_get_contents('php://input'));

        $longueurkey = 15;
        $key = "";
        for ($i = 1; $i < $longueurkey; $i++)
            $key .= mt_rand(0, 9);

        //préparer la requête d'insertion SQL
        $req = sprintf(
            "INSERT INTO t_utilisateurs (nom,prenom,email,date_naissance,mdp,id_type,confirmkey,date_creation,confirme)
	        VALUES (%s,%s,%s,%s,%s,'4',%s,now(),'0')",
            $this->db->escape($data->nom),
            $this->db->escape($data->prenom),
            $this->db->escape($data->email),
            $this->db->escape($data->date_naissance),
            $this->db->escape($data->pass),
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
        $mail->addAddress($data->email);     //Add a recipient


        //Attachments

        //Content
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8"; //Set email format to HTML
        $mail->Subject = '[CUBE] vérifier votre compte';
        $mail->Body = $this->load->view('/cube/mail_confirm', [
            'url' => $this->config->item('base_url') . 'login/confirmation/?email=' . urlencode($this->session->email) . '&key=' . $key
        ], true);
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    }
    function connexion()
    {
        $data = json_decode(file_get_contents('php://input'));
        $email = $data->email;
        $pass = $data->pass;


        $query = sprintf(
            "SELECT * FROM t_utilisateurs WHERE email = %s",
            $this->db->escape($email)
        );

        $obj_result = $this->db->query($query);

        while ($row = $obj_result->unbuffered_row()) {
            $hash = $row->mdp;
            //password_verify($data->pass, $hash) && $row->confirme == 1;
            if ($row->confirme == 1 && ($pass = $hash) && ($email == $row->email)) {
                $message = json_encode('Authentification reussi');
                echo $message;
            } else {
                $message = json_encode('Authentification echouee');
                echo $message;
            }
        }
    }
    public function ressources_mobile()
    {
        $this->load->model('ressource_model');

        $result_ressource = $this->ressource_model->get_ressource_menu();

        $array_json = [];
        foreach ($result_ressource as $r) {
            $array_json[] = [
                'id_ressource' => intval($r->id_ressource),
                'nom_ressources' => $r->nom_ressources,
                'contenu' => $r->contenu
            ];
            $json = json_encode($array_json);
        }
        echo $json;
    }
}
