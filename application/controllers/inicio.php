<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->data['user'] = $this->ion_auth->user()->row();
    }

    public function index () {
       if($this->ion_auth->logged_in()) :
           $this->build("inicio");
       else :
           redirect("auth/login");
       endif;
    }


}
