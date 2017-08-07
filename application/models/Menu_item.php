<?php

class Menu_item extends CI_Model {
    protected $id;
    protected $name;
    
    public function __construct($id, $name) {
        $this->setId($id);
        $this->setName($name);
        $this->load->database();
    }
    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    
    public static function makeObjectFromRow($row, $objType) {
        $obj = new $objType($row);
        return $obj;
    }
    
    public static function makeObjectsFromRows($rows, $objType) {
        $objs = array();
        foreach ($rows as $row) {
            $objs[] = self::makeObjectFromRow($row, $objType);
        }
        return $objs;
    }
}
