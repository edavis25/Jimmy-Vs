<?php

require_once 'Admin.php';

defined('BASEPATH') OR exit('No direct script access allowed');

class Beer extends Admin {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Beer_model');
    }
    
    public function edit_beers() {
        // Show admin page for editing beer
        $this->load->model('Category_model', 'Category');
        
        $data = array();
        $data['beers'] = $this->Beer_model->getAllBeers();
        $data['categories'] = $this->Category->getCategoriesIn(array('Draft', 'Bottle', 'Can'));
        
        $this->load->view('admin_beers', $data);
    }
    
    public function delete_beer() {
        $id = $this->input->post('delete-id');
        if (!$id) {
            die('Error: No beer selected.');
        }
        
        $beer = $this->Beer_model->getBeerById($id);
        $beer->deleteBeer();
        redirect('beer/edit_beers');
    }
    
    public function edit_beer() {
        // Note: editing a specific beer called by AJAX
        $this->load->model('Category_model', 'Category');
        $id = $this->input->get('beer-id');

        $data = array();
        $data['beer'] = $this->Beer_model->getBeerById($id);
        $data['categories'] = $this->Category->getCategoriesIn(array('Draft', 'Bottle', 'Can'));
        $this->load->view('edit-beer-form', $data);
    }
    
    public function update_add_beer() {        
        // Get all post data as array
        $post = $this->input->post(null, true);
        
        // If updating
        if ($post['id']) {
            $beer = $this->Beer_model->getBeerById($post['id']);
            $beer->setName($post['name']);
            $beer->setType($post['type']);
            $beer->setPrice($post['price']);
            $beer->setAbv($post['abv']);
            $beer->setCategory($post['category']);
        
            $beer->updateBeer();
        }
        // Else create new beer
        else {
            $arr = array(
                'BeerID' => null,
                'Name' => $post['name'],
                'Type' => $post['type'],
                'ABV' => $post['abv'],
                'Price' => $post['price'],
                'Category' => $post['category']
            );
            $beer = new Beer_model($arr);
            $beer->insertBeer();
        }
        
        redirect('beer/edit_beers');
    }
    
    public function print_list() {
        $data['draft'] = $this->Beer_model->getBeersByCategory('Draft');
        $data['bottles'] = $this->Beer_model->getBeersByCategory('Bottle');
        $data['cans'] = $this->Beer_model->getBeersByCategory('Can');

        $this->load->view('print_beer_list', $data);
    }
    
}