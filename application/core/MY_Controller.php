<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Community Auth - MY_Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2013, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
class MY_Controller extends CI_Controller {

//  public $template_file = 'templates/main2';
    protected $data = array();

    /**
     * Class constructor
     */
    public function __construct() {

        // creación dinámica del menú
        parent::__construct();
        header('Pragma: no-cache');
        $this->data['menu_completo'] = $this->session->userdata('menu');
        $this->load->library('layout', 'layout_main');
        $this->data['user'] = $this->ion_auth->user()->row();
        if (empty($this->data['user'])) {
            redirect('auth/login', 'refresh');
        }
    
//    $this->load->view('presentacion');
}

protected function build($view = null, $data = array()) {
if (empty($view)) {
$view = 'body';
} else {
redirect(base_url('index.php/presentacion/principal'));
}
// Obtener footer
$data = array_merge($data, $this->data);


//                return $this->template->set_layout('home/home')->build($view, $data, false, 'assets');           
}

}

/* End of file MY_Controller.php */
/* Location: /application/libraries/MY_Controller.php */