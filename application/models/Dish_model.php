<?php
require_once 'Menu_item.php';

class Dish_model extends Menu_item {
    static $TABLE = 'Dishes';
            
    protected $description;
    protected $price;
    protected $category;
    
    public function __construct($fields = array()) {
        // Index names in $fields = the database column names
        $id = safeParam($fields, 'DishID', null);
        $name = safeParam($fields, 'Name', null);
        parent::__construct($id, $name);
        $this->setDescription(safeParam($fields, 'Description', null));
        $this->setPrice(safeParam($fields, 'Price', null));
        $this->setCategory(safeParam($fields, 'Category', null));
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
    
    public function getCategory() {
        return $this->category;
    }
    public function setCategory($cat) {
        $this->category = $cat;
    }
    
    
    /*
     * BE CAREFUL NOT TO MIX UP CATEGORIES ID WITH NAME
     */
    public function getAllDishes() {
        $tbl = self::$TABLE;
        $sql = "SELECT $tbl.DishID as DishID, $tbl.Name as Name, $tbl.Description as Description, $tbl.Price as Price, Categories.Name as Category FROM $tbl
                INNER JOIN Categories ON $tbl.DishID WHERE Dishes.Category = Categories.ID
                ORDER BY Name ASC";
        $query = $this->db->query($sql);
        return self::makeObjectsFromRows($query->result_array(), get_class($this));
    }
    
    public function getDishById($id) {
        $tbl = self::$TABLE;
        
        $sql = "SELECT * FROM $tbl WHERE DishID = ?";
        $binds = array($id);
        $query = $this->db->query($sql, $binds);
        
        return self::makeObjectFromRow($query->row_array(), get_class($this));
    }
    
    public function getDishesByCategory($cat) {
        $tbl = self::$TABLE;
        
        $sql = "SELECT $tbl.* FROM $tbl, Categories WHERE $tbl.Category = Categories.ID AND Categories.Name = ?";
        $binds = array($cat);
        $query = $this->db->query($sql, $binds);
        return self::makeObjectsFromRows($query->result_array(), get_class($this));
    }
    
    public function insertDish() {
        $tbl = self::$TABLE;
        $sql = "INSERT INTO $tbl (Name, Description, Price, Category)
                VALUES (?, ?, ?, ?)";
        $binds = array(
            $this->getName(),
            $this->getDescription(),
            $this->getPrice(),
            $this->getCategory()
        );
        
        $this->db->query($sql, $binds);
    }
    
    public function updateDish() {
        $tbl = self::$TABLE;
        $sql = "UPDATE $tbl SET Name = ?, Description = ?, Price = ?, Category = ? WHERE DishID = ?";
        $binds = array(
            $this->getName(),
            $this->getDescription(),
            $this->getPrice(),
            $this->getCategory(),
            $this->getId()
        );
        
        $this->db->query($sql, $binds);
    }
    
    public function deleteDish() {
        $tbl = self::$TABLE;
        $sql = "DELETE FROM $tbl WHERE DishID = ?";
        $binds = array($this->getId());
        $this->db->query($sql, $binds);
    }

}     
        