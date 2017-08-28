<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Cart_model extends MY_Model {

    public function __construct() {
        $this->table_name = 'saved_cart';
        $this->primary_key = 'id';
        parent::__construct();
        
    }
    public function getusercart($userid) { 
        $data = array();
        $this->db->where(array('user_id' => $userid));
        $Q = $this->db->get($this->table_name);

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();

        return $data;
    }
    public function getusercarttotal($userid){
        $data = array();
        $this->db->where(array('user_id' => $userid));
        $Q = $this->db->get($this->table_name);
        
        if ($Q->num_rows() > 0) {
            $data = array();
            foreach ($Q->result_array() as $row) {
                //echo "<pre>"; print_r($row); echo "</pre>"; exit;
                $data['carttotal'] += $row['qty'];
                $data['pricetotal'] += $row['total_price'];
                
            }
        }
        $Q->free_result();

        return $data;
    }
    
    public function getusercartdetails($userid) {
        $sql = "SELECT * FROM saved_cart WHERE user_id = ?";
        $this->db->query($sql, array(array(3, 6), 'live', 'Rick'));
    }
    
    public function updatecart($cid, $updateData = array()) { 
      
        $this->db->where('id',$cid);   
       if($this->db->update($this->table_name, $updateData)){
          return true; 
       }else {
           return false;
       }
    }
    public function deletecart($cid) { 
        $result = $this->db->query("DELETE FROM saved_cart WHERE id = ". $cid);
        return $result;
    }
    
    public function updateinventory($pid,$qty) { 
         $result = $this->db->query("update products set qty_at_hand=qty_at_hand-".$qty." where product_id='". $pid."'"  );
        return $result;
    }
    
    /*
     * Insert user information
     */
    public function addtocart($data = array()) {                
        //insert addtocart data to save_cart table
        $insert = $this->db->insert("saved_cart", $data);
        
        //return the status
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
}

