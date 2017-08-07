<?php

require_once 'Admin.php';

defined('BASEPATH') OR exit('No direct script access allowed');

class Dish extends Admin {
        
    public function edit_dish() {
        // Edit a specific dish
        $this->load->model('Dish_model');
        $this->load->model('Category_model', 'Category');
        
        $id = $this->input->get('dish-id');
        
        $data = array();
        $data['categories'] = $this->Category->getAllCategories();
        $data['dish'] = $this->Dish_model->getDishById($id);
        
        $this->load->view('edit-menu-form', $data);
    }
    
    public function update_add_dish() {
        $this->load->model('Dish_model');
        
         // Get all post data as array
        $post = $this->input->post(null, true);

         // If updating (has an ID already)
        if ($post['id']) {
            $dish = $this->Dish_model->getDishById($post['id']);
            $dish->setName($post['name']);
            $dish->setDescription($post['description']);
            $dish->setPrice($post['price']);    
            $dish->setCategory($post['category']);
            
            $dish->updateDish();
        }
        // Else create new dish
        else {
            $arr = array(
                'DishID' => null,
                'Name' => $post['name'],
                'Description' => $post['description'],
                'Price' => $post['price'],
                'Category' => $post['category']
            );
            
            $dish = new Dish_model($arr);
            $dish -> insertDish();
        }
        
        redirect('menu/edit_menu');
     }
    
     
    public function delete_dish() {
        $id = $this->input->post('delete-id');
        if (!$id) {
            die('Error: No beer selected.');
        }
        
        $this->load->model('Dish_model');
        $dish = $this->Dish_model->getDishById($id);
        $dish->deleteDish();
        
        redirect('menu/edit_menu');
    }
    
}