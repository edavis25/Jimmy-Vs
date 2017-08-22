<?php

include (APPPATH . 'third_party/Untappd/UntappdLocation.php');

class UntappdLibrary {

    // Get Menu function from UntappdLocation class abstracted into library so it
    // can be called from multiple different controllers
    public function getMenu($menuName) {
        $api = $this->getInstance();
        return $api->getMenuByName($menuName);
    }

    public function getInstance() {
        $CI = get_instance();
        $CI->load->model('Untappd_cache_model', 'cache');
        $instance = new UntappdLocation('', '', "Jimmy V's Grill & Pub", $CI->cache);
        return $instance;
    }

}