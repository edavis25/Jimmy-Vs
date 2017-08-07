<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->session->loggedin = false;
        $this->load->library('form_validation');
    }
    
    public function index() {
        $this->load->view('login');
    }

    public function user_login() {
        $this->load->helper('form');
        $this->load->model('Users_model');
        
        $this->form_validation->set_rules('password', 'Password', 'required');
        // Callback function checks username/password
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_login_details');     
        
        if ($this->form_validation->run() != FALSE) {
            log_message('debug', "Successful Login From IP: {$this->input->ip_address()}", false);
            $this->session->loggedin = true;
            redirect('admin');
        } 
        else {
            log_message('error', "*** FAILED LOGIN ATTEMPT *** From IP: {$this->input->ip_address()}", false);
            $this->load->view('login');
        }
    }
    
    public function check_login_details() {
        $user = $this->input->post('username', true);
        $pass = $this->input->post('password', true);
        
        $validUser = $this->Users_model->validUser($user, $pass);
        if ($validUser) {
            return true;
        }
        // Invalid user - set error message/return false
        $this->form_validation->set_message('check_login_details', 'Invalid Login Credentials.');
        return false;
    }

}
