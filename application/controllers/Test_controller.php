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

    public function test_SC4_F07()
    {
        $this->load->model('admin_model');

        $result_util = $this->admin_model->get_type_utilisateur();

        $this->load->library('unit_test');

        foreach ($result_util->result() as $d) {


            $test =  $d->type;

            $expected_result = 'citoyen_nc';

            $test_name = 'Test type utilisateur ' . $d->id_utilisateur . ' : ' . $d->nom;

            echo $this->unit->run($test, $expected_result, $test_name);
        }
    }
}
