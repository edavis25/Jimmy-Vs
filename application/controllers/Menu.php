<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    
    public function index() {
        // NOTE: This is called by AJAX to populate Menu Modal
        $this->load->model('Dish_model');
        $data = array();
        $data['appetizers'] = $this->Dish_model->getDishesByCategory('Appetizer');
        $data['salads'] = $this->Dish_model->getDishesByCategory('Salad');
        $data['soups'] = $this->Dish_model->getDishesByCategory('Soup');
        $data['gyros'] = $this->Dish_model->getDishesByCategory('Gyro');
        $data['sandwiches'] = $this->Dish_model->getDishesByCategory('Sandwich');
        $data['burgers'] = $this->Dish_model->getDishesByCategory('Burger');
        $data['paninis'] = $this->Dish_model->getDishesByCategory('Panini');
        $data['pastas'] = $this->Dish_model->getDishesByCategory('Pasta');
        $data['platters'] = $this->Dish_model->getDishesByCategory('Platter');
        $data['brunch'] = $this->Dish_model->getDishesByCategory('Brunch');
        
        $this->load->view('full_menu', $data);
    }
    
    public function edit_menu() {
        $this->load->library('session');
        ensureLoggedIn();
        
        $this->load->model('Dish_model');
        $this->load->model('Category_model', 'Category');
        $data = array();
        $data['categories'] = $this->Category->getAllCategories();
        $data['dishes'] = $this->Dish_model->getAllDishes();
        
        $this->load->view('admin_menu', $data);
    }
}
