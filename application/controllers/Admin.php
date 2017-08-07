<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Testing PHP documentation
 */
class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        ensureLoggedIn();
    }
    
    public function index() {
        $this->load->view('admin_tools');
    }
    
   
}