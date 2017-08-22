<?php

require 'Untappd.php';

class UntappdLocation extends Untappd_api {

    protected $locationName;
    protected $locationId;

    // Note the location's name must match EXACTLY to the Untappd entry
    // You can call the "getLocations" method in the Untappd.php parent
    // class to get a full list of all locations associated w/ API token
    public function __construct($email, $token, $locationName, $cache) {
        parent::__construct($email, $token, $cache);

        $this->locationName = $locationName;
        $this->locationId  = $this->getLocationId();
    }

    public function getLocationByName() {
        $data = $this->getLocations();

        if (!$data || array_key_exists('error', $data)) {
            require 'UntappdException.php';
            throw new UntappdException('No user locations found');
            return;
        }

        foreach ($data['locations'] as $location) {
            //echo html_entity_decode($this->locationName); die;

            if (html_entity_decode($location['name']) == html_entity_decode($this->locationName)) {
                return $location;
            }
        }
        // Location not found
        return null;
    }

    public function getLocationId() {
        $data = $this->getLocationByName();
        if ($data) {
            return $data['id'];    
        }
        else {
            require 'UntappdException.php';
            throw new UntappdException('Location: ' . $this->locationName . ' not found');
        }
    }

    public function getMenus() {
        $url = $this->url . 'locations/' . $this->locationId . '/menus';
        return $this->get($url);
    }

    public function getMenuDetailsByName($name) {
        $menus = $this->getMenus();
        foreach ($menus['menus'] as $menu) {
            if ($menu['name'] == $name) {
                return $menu;
            }
        }
        // Menu not found
        return null;
    }

    public function getMenuByName($name) {
        $menu = $this->getMenuDetailsByName($name);
        $id = $menu['id'];
        return $this->getMenuById($menu['id']);
    }

    public function getMenuById($id) {
        $url = $this->url . 'menus/' . $id . '?full=true';
        return $this->get($url);
    }

}