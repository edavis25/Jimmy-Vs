<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Testing PHP documentation
 */
class Mail extends CI_Controller {

    private $fromEmailAddress = 'feedback@jimmyvspub.com';
    private $fromEmailName    = 'Event Request';
    private $toEmailAddress   = 'brian@jimmyvspub.com';

    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->library('email');

        $config = array(
            'mailtype'  => 'html'
        );
        $this->email->initialize($config);
    }

    public function event_email() {
        //var_dump($_REQUEST);
        $email   = $this->input->post('email');
        $phone   = $this->input->post('phone');
        $name    = $this->input->post('name');
        $details = $this->input->post('details');

        $message = $this->load->view('email/event_request', compact('email', 'phone', 'name', 'details'), true);

        $this->email->from($this->fromEmailAddress, $this->fromEmailName);
        $this->email->to($this->toEmailAddress);
        $this->email->subject('New Event Request');
        $this->email->message($message);

        $email_success = $this->email->send();

        $this->session->set_flashdata('email_success', $email_success);

        return redirect(base_url('/#book-event'));
    }

}