<?php

class Category_model extends Menu_item {
    static $TABLE = 'Categories';
    
    public function __construct($fields = array()) {
        $id = safeParam($fields, 'ID', null);
        $name = safeParam($fields, 'Name', null);
        parent::__construct($id, $name);
    }
    
    public function getAllCategories() {
        $tbl = self::$TABLE;
        $sql = "SELECT * FROM $tbl ORDER BY Name";
        $query = $this->db->query($sql);
        return self::makeObjectsFromRows($query->result_array(), get_class($this));
    }
    
    public function getCategoryById($id) {
        $tbl = self::$TABLE;
        $sql = "SELECT * FROM $tbl WHERE ID = ?";
        $binds = array($id);
        $query = $this->db->query($sql, $binds);
        return self::makeObjectFromRow($query->row_array(), get_class($this));
    }
    
    public function getCategoriesIn($arr) {
        $tbl = self::$TABLE;
        $sql = "SELECT * FROM $tbl WHERE Name IN ('". implode('\',\'',$arr) ."')";
        //$binds = implode(', ', $arr);
        $query = $this->db->query($sql);
        return self::makeObjectsFromRows($query->result_array(), get_class($this));
    }
}