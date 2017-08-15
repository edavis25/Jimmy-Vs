<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//use third_party\Untappd\Untappd as API;
//include (APPPATH . 'third_party/Untappd/UntappdLocation.php');

class Untappd extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Untappd_cache_model', 'cache');
    }

    public function index() {
        //var_dump($api->getMenuByName('Draft List'));
        $this->load->library('UntappdLibrary');
        //var_dump($this->untappdlibrary->getMenu('Bottles and Cans'));
        $untappd = $this->untappdlibrary->getInstance();
        $list = $untappd->getMenuByName('Draft List');
        
        //dd($list['menu']['sections']);
        foreach ($list['menu']['sections'][0]['items'] as $item) {
            echo $item['brewery'] . ' ';
            $name = preg_replace('$[(]{1}\d{2,4}[)]{1}$', '', $item['name']);
            echo $name;
            echo '<br>';
        }

        // Example regex to remove years = ^[(]{1}\d{2,4}[)]{1}$
    }

}