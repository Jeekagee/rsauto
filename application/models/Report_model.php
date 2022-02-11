<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Report_model extends CI_Model 
{
    public function inventory(){
        $sql = "SELECT * FROM purchase_items";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function item_name($item_id){
        $sql = "SELECT item_name FROM int_items WHERE item_id='$item_id'";
        $query = $this->db->query($sql);
        return $row = $query->first_row();
    }
    
    public function delete_inventory($id)
    {
        $sql = "DELETE FROM purchase_items WHERE id=$id";
        $query = $this->db->query($sql);
    }

    public function edit_inventory($id)
    {
        $sql = "SELECT * FROM purchase_items WHERE id=$id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }

    public function total_qty(){
        $sql = "SELECT COUNT(item_id), item_name * FROM purchase_items GROUP BY quantity ORDER BY(item_id) DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        
        return $result;
    }                   
}


/* End of file Report_model.php and path /application/models/Report_model.php */

