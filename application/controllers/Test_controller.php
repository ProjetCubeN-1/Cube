<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_controller extends ExtraController
{
    public function index()
    {
        $this->view('view_test/dashboard_test');
    }
}
