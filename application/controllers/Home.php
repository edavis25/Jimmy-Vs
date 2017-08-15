<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    
    public function index() {
        $this->load->model('Beer_model');
        $this->load->model('Special_model');
        $this->load->library('UntappdLibrary');
        $data = array();

        // Format beer list
        $untappd = $this->untappdlibrary->getInstance();
        $draftList = $untappd->getMenuByName('Draft List');
        $bottleList = $untappd->getMenuByName('Bottles and Cans');
        
        $data['beers'] = array(
            //'drafts'  => sortAssocArray($this->formatBeerList($draftList), 'name'),
            'drafts'  => $this->formatBeerList($draftList), 'name',
            'bottles' => $this->formatBeerList($bottleList)
        );

        //dd($data['beers']['drafts']);
        //sortAssocArray($data['beers']['drafts'], 'name');

        /*
        $data['beers']['drafts'] = array();
        
        foreach ($list['menu']['sections'][0]['items'] as $item) {
            $info = array(
                'name'     => preg_replace('$[(]{1}\d{2,4}[)]{1}$', '', $item['name']),
                'brewery'  => $item['brewery'],
                'location' => $item['brewery_location'],
                'type'    => $item['style'],
                'abv'      => $item['abv'],
                'icon'     => $item['label_image'],
                'ibu'      => $item['ibu']
            );
            array_push($data['beers']['drafts'], (object) $info);
        }
        //$data['beers'] = $this->Beer_model->getBeersByCategory('Draft');
        */

        date_default_timezone_set('America/New_York');
        $day = date("w");
        $data['special'] = $this->Special_model->getSpecialByDay($day);
        
        $this->load->view('home', $data);
    }

    private function formatBeerList($list) {
        $array = array();
        foreach ($list['menu']['sections'][0]['items'] as $item) {
            $info = array(
                'name'     => preg_replace('$[(]{1}\d{2,4}[)]{1}$', '', $item['name']),
                'brewery'  => $item['brewery'],
                'location' => $item['brewery_location'],
                'type'    => $item['style'],
                'abv'      => $item['abv'],
                'icon'     => $item['label_image'],
                'ibu'      => $item['ibu']
            );
            array_push($array, (object) $info);
        }
        return $array;
    }
}