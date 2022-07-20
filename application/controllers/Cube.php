<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Cube extends ExtraController
{
    public function accueil()
    {
        $this->title = "Accueil";
        $this->add_path("Accueil", '/cube/Accueil', '');
        $this->view('/cube/accueil');
    }

    public function mail()
    {
        $longueurkey = 15;
        $key = "";
        for ($i = 1; $i < $longueurkey; $i++)
            $key .= mt_rand(0, 9);


        $this->load->view('/cube/mail_confirm', [
            'url' => $this->config->item('base_url')
        ]);
    }

    public function ressource($ressource_id = null)
    {
        $this->load->model('ressource_model');



        if (isset($_POST['submit_commentaire'])) {
            if ((isset($_POST['contenu_commentaire'])) and !empty($_POST['contenu_commentaire'])) {

                $contenu = htmlspecialchars($_POST['contenu_commentaire']);

                $key = sprintf("SET FOREIGN_KEY_CHECKS=0;");
                $this->db->query($key);

                $insert = sprintf(
                    "INSERT INTO t_commentaires (contenu,id_utilisateur,id_ressource,date_commentaire) VALUES (%s,%s,%s,now())",
                    $this->db->escape($contenu),
                    $this->db->escape($this->session->id),
                    $this->db->escape($ressource_id),
                    $this->db->escape(date_create('Y-m-d H:i:s'))

                );
                $this->db->query($insert);

                $this->redirect('/cube/ressource/' . $ressource_id);
            } else {
            }
        }
        $result_ressource = $this->ressource_model->get_ressource($ressource_id);
        $result_util = $this->ressource_model->get_type_utilisateur();
        $favoris = $this->ressource_model->get_favoris();
        $misdecote = $this->ressource_model->get_ressources_cote();
        $result_commentaire = $this->ressource_model->get_commentaires($ressource_id);


        $this->view_portal('/cube/ressource', [
            'result' => $result_ressource,
            'get_com' => $result_commentaire,
            'user' => $result_util,
            'favoris' => $favoris,
            'misdecote' => $misdecote,

        ]);
    }

    public function statistiques()
    {
        $this->load->model('ressource_model');
        $result_ressource = $this->ressource_model->get_ressource_menu();


        $ressource_avec_id = [];
        $ressources_valide = [];
        foreach ($result_ressource as $rs) {
        }
        $ressource_avec_id[] = $rs->id_ressource;
        $ressources_valide[] = $rs->valide;
        $this->view_portal("/cube/statistiques", [
            "ressource_avec_id" => $ressource_avec_id,
            "ressource_valide" => $ressources_valide
        ]);
    }
    public function creation_ressources($ressources_menu = null, $requete = null)
    {
        $this->load->model('ressource_model');
        $this->load->model('admin_model');


        $result_ressource = $this->ressource_model->get_ressource_menu();
        $get_categorie = $this->admin_model->get_categorie();
        $get_type = $this->admin_model->get_type();


        $this->view_portal('/cube/creation_ressources', [
            'result' => $result_ressource,
            'categorie' => $get_categorie,
            'type' => $get_type
        ]);
    }

    public function mettre_cote($ressource_id = null)
    {

        $this->load->model('ressource_model');

        $this->ressource_model->get_ressource($ressource_id);
        $this->ressource_model->mettre_cote($ressource_id);


        $this->redirect('/cube/ressource/' . $ressource_id);
    }

    public function retirer_mettre_cote($ressource_id = null)
    {

        //$this->load->model('ressource_model');
        //
        //$this->ressource_model->get_ressource($ressource_id);
        //
        //$this->ressource_model->retirer_mettre_cote($ressource_id);

        $misdecote = sprintf("SELECT * FROM t_ressources WHERE id_ressource = %d", $ressource_id);
        $this->db->query($misdecote);

        $req = sprintf(
            "DELETE FROM t_misdecote WHERE id_ressources = %d AND id_utilisateurs = %s",
            $ressource_id,
            $this->db->escape($this->session->id)
        );
        $this->db->query($req);

        $this->redirect('/cube/ressource/' . $ressource_id);
    }

    public function publier_ressources()
    {
        $key = sprintf("SET FOREIGN_KEY_CHECKS=0;
        ");
        $this->db->query($key);
        $this->load->library('unit_test');

        $req = sprintf(
            "INSERT INTO t_ressources (nom_ressources,id_categorie,id_type_relation,contenu,id_type_ressource,id_utilisateur,valide) 
            VALUES (%s,%s,%s,%s,%s,%s,'true')",
            $this->db->escape($this->input->post('text_titre')),
            $this->db->escape($this->input->post('categorie')),
            $this->db->escape($this->input->post('type_relation')),
            $this->db->escape($this->input->post('text_contenu')),
            $this->db->escape($this->input->post('type_contenu')),
            $this->db->escape($this->session->id)
        );

        $test = $this->db->query($req);

        $last_res_id = $this->db->insert_id();

        $this->session->ressource_id =  $last_res_id;

        // Envoie de mail pour avertir la création d'une nouvelle ressource
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
        $mail->addAddress($conf_mail['username']);     //Add a recipient


        //Attachments

        //Content
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8"; //Set email format to HTML
        $mail->Subject = '[CUBE] Une nouvelle ressource à été créée !';
        $mail->Body = $this->load->view('/cube/mail_ressource', [
            'url' => $this->config->item('base_url') . 'login/confirmation/?email=' . urlencode($this->session->email) . '&key=' . $key
        ], true);
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if ($mail->send()) {
?>
            <div class="alert alert-info" role="alert">
                <h5>Votre catégorie a bien été créée.</h5>
            </div>
        <?php


            $this->redirect('/cube/accueil');
        }
    }

    public function ajout_favoris($ressource_id = null)
    {

        $favoris = sprintf("SELECT * FROM t_ressources WHERE id_ressource = %d", $ressource_id);
        $this->db->query($favoris);

        $req = sprintf(
            "INSERT INTO t_favoris (id_ressources,id_utilisateurs) VALUES (%d,%s)",
            $ressource_id,
            $this->db->escape($this->session->id)
        );
        $this->db->query($req);
        $this->redirect('/cube/ressource/' . $ressource_id);
    }

    public function retirer_favoris($ressource_id = null)
    {
        $favoris = sprintf("SELECT * FROM t_ressources WHERE id_ressource = %d", $ressource_id);
        $this->db->query($favoris);

        $req = sprintf(
            "DELETE FROM t_favoris WHERE id_ressources = %d AND id_utilisateurs = %s",
            $ressource_id,
            $this->db->escape($this->session->id)
        );
        $this->db->query($req);
        $this->redirect('/cube/ressource/' . $ressource_id);
    }

    public function delete_commentaire($ressource_id = null)
    {
        $this->load->model('ressource_model');


        $id_com = $_POST['com_id'];

        $this->ressource_model->get_commentaires($ressource_id);

        $req = sprintf(
            "DELETE FROM t_commentaires WHERE id_commentaire = %d AND id_ressource = %d",
            $id_com,
            $ressource_id
        );

        $this->db->query($req);
        $this->redirect('/cube/ressource/' . $ressource_id);
    }

    public function ajout_categorie()
    {
        $this->view_portal('/cube/creation_categorie');
    }

    public function nouvelle_categorie()
    {
        $this->load->model('ressource_model');

        $this->ressource_model->ajout_categorie();

        // Envoie de mail pour avertir la création d'une nouvelle catégorie
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
        $mail->addAddress($conf_mail['username']);     //Add a recipient


        //Attachments

        //Content
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8"; //Set email format to HTML
        $mail->Subject = '[CUBE] Une nouvelle catégorie à été créée !';
        $mail->Body = $this->load->view('/cube/mail_categorie', [
            'url' => $this->config->item('base_url') . 'login/confirmation/?email=' . urlencode($this->session->email) . '&key=' . $key
        ], true);
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if ($mail->send()) {
        ?>
            <div class="alert alert-info" role="alert">
                <h5>Votre catégorie a bien été créée.</h5>
            </div>
<?php
            $this->redirect('/cube/creation_ressources');
        }
    }
}
