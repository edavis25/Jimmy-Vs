<?php
require_once 'Menu_item.php';

class Beer_model extends Menu_item {
    static $TABLE = 'Beers';
            
    protected $abv;
    protected $type;
    protected $price;
    protected $category;
    
    public function __construct($fields = array()) {
        // Index names in $fields = the database column names
        $id = safeParam($fields, 'BeerID', null);
        $name = safeParam($fields, 'Name', null);
        parent::__construct($id, $name);
        $this->setAbv(safeParam($fields, 'ABV', null));
        $this->setType(safeParam($fields, 'Type', null));
        $this->setPrice(safeParam($fields, 'Price', null));
        $this->setCategory(safeParam($fields, 'Category', null));
    }
    
    public function getAbv() {
        return $this->abv;
    }
    public function setAbv($abv) {
        $this->abv = $abv;
    }
    
    public function getType() {
        return $this->type;
    }
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getPrice() {
        return $this->price;
    }
    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function getCategory() {
        return $this->category;
    }
    public function setCategory($cat) {
        $this->category = $cat;
    }
    
    public function getAllBeers() {
        $tbl = self::$TABLE;
        $sql = "SELECT $tbl.BeerID AS BeerID, $tbl.Name AS Name, $tbl.Type AS Type, $tbl.ABV AS ABV, $tbl.Price AS Price, Categories.Name AS Category
                FROM $tbl INNER JOIN Categories ON $tbl.Category = Categories.ID";
        $query = $this->db->query($sql);
        return self::makeObjectsFromRows($query->result_array(), get_class($this));
    }
    
    public function getBeerById($id) {
        $tbl = self::$TABLE;
        $sql = "SELECT $tbl.BeerID AS BeerID, $tbl.Name AS Name, $tbl.Type AS Type, $tbl.ABV AS ABV, $tbl.Price AS Price, Categories.Name AS Category
                FROM $tbl INNER JOIN Categories ON $tbl.Category = Categories.ID WHERE BeerID = ?";
        
        $binds = array($id);
        $query = $this->db->query($sql, $binds);
        return self::makeObjectFromRow($query->row_array(), get_class($this));
    }
    
    public function getBeersByCategory($cat) {
        $tbl = self::$TABLE;
        $sql = "SELECT $tbl.BeerID AS BeerID, $tbl.Name AS Name, $tbl.Type AS Type, $tbl.ABV AS ABV, $tbl.Price AS Price, Categories.Name AS Category
                FROM $tbl, Categories WHERE $tbl.Category = Categories.ID AND Categories.Name = ?";
        
        $binds = array($cat);
        $query = $this->db->query($sql, $binds);
        return self::makeObjectsFromRows($query->result_array(), get_class($this));
    }
    
    public function updateBeer() {
        $tbl = self::$TABLE;
        $sql = "UPDATE $tbl SET Name = ?, Type = ?, ABV = ?, Price = ?, Category = ? WHERE BeerID = ?";
        $binds = array(
            $this->getName(),
            $this->getType(),
            $this->getAbv(),
            $this->getPrice(),
            $this->getCategory(),
            $this->getId()
        );
        
        $this->db->query($sql, $binds);
    }
    
    public function insertBeer() {
        $tbl = self::$TABLE;
        $sql = "INSERT INTO $tbl (Name, Type, ABV, Price, Category)
                VALUES (?, ?, ?, ?, ?)";
        
        $binds = array(
            $this->getName(),
            $this->getType(),
            $this->getAbv(),
            $this->getPrice(),
            $this->getCategory()
        );
        
        $this->db->query($sql, $binds);
    }  
    
    public function deleteBeer() {
        $tbl = self::$TABLE;
        $sql = "DELETE FROM $tbl WHERE BeerID = ?";
        $binds = array($this->getId());
        $this->db->query($sql, $binds);
    }

}
