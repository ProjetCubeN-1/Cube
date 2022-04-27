<?php

class Extra
{
    static function afficher()
    {

        $afficher = json_decode(APPPATH . 'apifortest/api_test.json');


        return $afficher;
    }
}
