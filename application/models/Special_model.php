<?php

Class Special_model extends CI_Model {
    static $TABLE = 'Specials';
    
    protected $id;
    protected $day;
    protected $description;
    protected $price;
    protected $recurring;
    
    public function __construct($fields = array()) {
        $this->setId(safeParam($fields, 'ID', null));
        $this->setDay(safeParam($fields, 'Day', null));
        $this->setDescription(safeParam($fields, 'Description', null));
        $this->setPrice(safeParam($fields, 'Price', null));
        $this->setRecurring(safeParam($fields, 'Recurring', null));
        $this->load->database();
    }
    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getDay() {
        return $this->day;
    }
    public function setDay($day) {
        $this->day = $day;
    }
    
    public function getDescription() {
        return $this->description;
    }
    public function setDescription($desc) {
        $this->description = $desc;
    }
    
    public function getPrice() {
        return $this->price;
    }
    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function getRecurring() {
        return $this->recurring;
    }
    public function setRecurring($recur) {
        $this->recurring = $recur;
    }
    
    public function getAllSpecials() {
        $tbl = self::$TABLE;
        $sql = "SELECT * FROM $tbl ORDER BY ID ASC";
        $query = $this->db->query($sql);
        return self::makeObjectsFromRows($query->result_array());
    }
    
    public function getSpecialById($id) {
        $tbl = self::$TABLE;
        $sql = "SELECT * FROM $tbl WHERE ID = ?";
        $binds = array($id);
        $query = $this->db->query($sql, $binds);
        return self::makeObjectFromRow($query->row_array());
    }
    
    public function getSpecialByDay($day) {
        // Expects integer 0-6. 0=sun, 6=sat. You can use date format "w".
        $tbl = self::$TABLE;
       
        $sql = "SELECT * FROM $tbl WHERE Day = ? ORDER BY Recurring ASC, ID DESC";
        $binds = array($day);
        $query = $this->db->query($sql, $binds);
        
        return self::makeObjectFromRow($query->row_array());
    }
    
    public function deleteSpecial() {
        $tbl = self::$TABLE;
        $sql = "DELETE FROM $tbl WHERE ID = ?";
        $binds = array($this->getId());
        $this->db->query($sql, $binds);
    }
    
     public function insertSpecial() {
        $tbl = self::$TABLE;
        $sql = "INSERT INTO $tbl (Day, Description, Price, Recurring)
                VALUES (?, ?, ?, ?)";
        $binds = array(
            $this->getDay(),
            $this->getDescription(),
            $this->getPrice(),
            $this->getRecurring()
        );
        
        $this->db->query($sql, $binds);
    }
    
    public function updateSpecial() {
        $tbl = self::$TABLE;
        $sql = "UPDATE $tbl SET Day = ?, Description = ?, Price = ?, Recurring = ? WHERE ID = ?";
        $binds = array(
            $this->getDay(),
            $this->getDescription(),
            $this->getPrice(),
            $this->getRecurring(),
            $this->getId()
        );
        
        $this->db->query($sql, $binds);
    }
        
    public static function makeObjectFromRow($row) {
        $obj = new self($row);
        return $obj;
    }
    
    public static function makeObjectsFromRows($rows) {
        $objs = array();
        foreach ($rows as $row) {
            $objs[] = self::makeObjectFromRow($row);
        }
        return $objs;
    }
    
}