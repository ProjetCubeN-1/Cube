<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends ExtraController
{

    public function board()
    {
        $this->view_portal('/droit/admin_board');
    }
}
