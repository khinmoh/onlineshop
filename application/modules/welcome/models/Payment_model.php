<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function insert($data){
        
       $result = $this->db->insert('transactions', $data);       
       return $this->db->insert_id(); 
        
    }
    
    public function saveorderitem($data){
        $result = $this->db->insert('order_item', $data);       
        return $result; 
    }
    
    public function saveinvoice($data){
        $result = $this->db->insert('invoice', $data);       
        return $result; 
    }
    
    public function generateinvoice() {
        $query = $this->db->query("SELECT id, CONCAT( 'F-', LPAD(id+1,7,'0')) AS invoice  FROM invoice ORDER BY id DESC LIMIT 1");
        $results = $query->result_array();
        $result = $results[0];
        return $result["invoice"];        
    }
    
    public function deletecarts($data){
        $result = $this->db->query("DELETE FROM saved_cart WHERE id IN ( ". $data." )");
        return $result;        
    }
    
    
}