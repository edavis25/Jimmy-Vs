<?php

require_once 'Admin.php';

defined('BASEPATH') OR exit('No direct script access allowed');

class Special extends Admin {
    public function __construct() {
        parent::__construct();
        $this->load->model('Special_model');
    }
    
    public function edit_specials() {
        $data = array();
        $data['specials'] = $this->Special_model->getAllSpecials();
        $this->load->view('admin_special', $data);
    }
    
    public function edit_special() {
        // Note: editing a specific special called by AJAX
        $id = $this->input->get('special-id');

        $data = array();
        $data['special'] = $this->Special_model->getSpecialById($id);
        
        $this->load->view('edit-special-form', $data);
    }
    
    public function update_add_special() {
        // Get all post data as array
        $post = $this->input->post(null, true);
        $recur = (isset($post['recurring']) && $post['recurring'] == "on") ? 1 : 0;
        // If updating
        if ($post['id']) {
            $special = $this->Special_model->getSpecialById($post['id']);
            $special->setDescription($post['description']);
            $special->setPrice($post['price']);
            $special->setDay($post['day']);
            
            $special->setRecurring($recur);
            
            $special->updateSpecial();
        }
        // Else create new special
        else {
            $arr = array(
                'ID' => null,
                'Day' => $post['day'],
                'Description' => $post['description'],
                'Price' => $post['price'],
                'Recurring' => $recur
            );
            
            $special = new Special_model($arr);
            $special->insertSpecial();
        }
        
        redirect('special/edit_specials');

    }
    
    public function delete_special() {
        $id = $this->input->post('delete-id');
        if (!$id) {
            die('Error: No special selected.');
        }

        $special = $this->Special_model->getSpecialById($id);
        $special->deleteSpecial();
        redirect('special/edit_specials');
    }
}
