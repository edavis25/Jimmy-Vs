<?php

Class Users_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function validUser($username, $pass) {
        $sql = "SELECT * FROM Users WHERE Username = ?";
        
        $binds = array($username);
        $query = $this->db->query($sql, $binds);
        $user = $query->row_array();
        
        if ($user) {
            // Use password_hash('<password-string>', PASSWORD_BCRYPT) to encrypt
            if (password_verify($pass, $user['Password'])) {
                return true;
            }
        }
        return false;
        
    }
}
