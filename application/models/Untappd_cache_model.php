<?php

class Untappd_cache_model extends CI_Model {
    private static $db;
    public static $table = 'Untappd_Cache';
    public $id;
    public $url;
    public $json;
    public $updated_at;

    public function __construct($fields = array()) {
        parent::__construct();
        $this->load->database();
        $this->id = safeParam($fields, 'CacheID', null);
        $this->url = safeParam($fields, 'URL', null);
        $this->json = safeParam($fields, 'JSON', null);
        $this->updated_at = safeParam($fields, 'Updated_At', null);
        self::$db = &get_instance()->db;
    }

    public function lastUpdated($url) {
        $tbl = self::$table;
        $sql = "SELECT Updated_At FROM $tbl WHERE URL = ? ORDER BY Updated_At ASC";
        $binds = array(
            $url
        );
        return $this->db->query($sql, $binds)->row_array();
    }

    public function insertOrUpdate() {
        $tbl = self::$table;

        if ($this->selectByUrl($this->url, true)) {
            $this->update();
        }
        else {
            $this->insert();
        }
    }

    public function update() {
        $tbl = self::$table;
        $sql = "UPDATE $tbl SET URL = ?, JSON = ?, Updated_At = ? WHERE URL = ?";
        $binds = array(
            $this->url,
            html_entity_decode($this->json),
            $this->updated_at,
            $this->url
        );
        $this->db->query($sql, $binds);
    }

    public function insert() {
        $tbl = self::$table;
        //$json = html_entity_decode($this->json);
        $sql = "INSERT INTO $tbl (URL, JSON, Updated_At)
                 VALUES (?, ?, ?)";
        $binds = array(
            $this->url,
            html_entity_decode($this->json),
            $this->updated_at
        );
        $this->db->query($sql, $binds);
    }

    public function selectByUrl($url, $asArray = false) {
        $tbl = self::$table;
        $data = $this->db->get_where($tbl, array(
                'URL' => $url
            )
        )->row_array();

        if ($asArray) {
            return $data;
        }

        return new self($data);
    }

    public function delete() {

    }
}