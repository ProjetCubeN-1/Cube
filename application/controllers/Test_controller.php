<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_controller extends ExtraController
{
    public function index()

    {

        $afficher =  file_get_contents(APPPATH . 'apifortest/api_test.json');
        $afficher_decode = json_decode($afficher);

        $this->view_portal('view_test/dashboard_test', ['afficher_test' => $afficher_decode]);
    }


    // public function test($uuid_test = null)
    // {
    //     echo 'coucou';
    //     $afficher =  file_get_contents(APPPATH . 'apifortest/api_test.json');
    //     $afficher_decode = json_decode($afficher);
    //     foreach ($afficher_decode as $key => $value) {
    //     }
    //     $uuid_test = $value->uuid;
    // }
    public function test_SC4_F02()
    {
        $this->load->model('admin_model');

        $result_info_utilisateurs = $this->admin_model->get_all_utilisateurs();

        $this->load->library('unit_test');

        $expected_result = $result_info_utilisateurs->nom . "&" . $result_info_utilisateurs->prenom; // ici pour changer le type de l'utilisateur pour le test

        echo '<h3>';
        echo "Avoir des info sur utilisateurs : ", $expected_result;
        echo '</h3>';

        foreach ($result_info_utilisateurs as $d) {


            $test =  $d->nom . "&" . $d->prenom . "&" . $d->email;

            $expected_result = $d->nom . "&" . $d->prenom . "&" . $d->email; // ici pour changer le type de l'utilisateur pour le test

            $test_name = 'Information sur l‘utilisateur n°' . $d->id_utilisateur . '. et son nom est  : ' . $d->nom . '. Son prénom est : ' . $d->prenom;

            echo $this->unit->run($test, $expected_result, $test_name);
?><br>
        <?php
        }
    }

    public function test_SC4_F07()
    {
        $this->load->model('admin_model');

        $result_type_utilisateurs = $this->admin_model->get_type_utilisateur();

        $this->load->library('unit_test');

        $expected_result = 'citoyen_non_connecte'; // ici pour changer le type de l'utilisateur pour le test

        echo '<h3>';
        echo "Savoir si un utilisateur est : ", $expected_result;
        echo '</h3>';
        foreach ($result_type_utilisateurs->result() as $d) {


            $test =  $d->type;


            $test_name = 'Tester type utilisateur avec l‘id n°' . $d->id_utilisateur . '. Il est de type : ' . $d->type;

            echo $this->unit->run($test, $expected_result, $test_name);
        ?><br>
<?php
        }
    }
}
