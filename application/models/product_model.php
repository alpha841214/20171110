<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

 public function fetch_all()
 {
  $query = $this->db->get("product");
  return $query->result();
 }

 public function fetch_3()
 {
  $query = $this->db->get("product", 3, 1);
  return $query->result();
 }

 public function get_product($id=null) {  
    	//$user_id = intval($id);
    	$this->db->where('p_id', $id);
    	$query = $this->db->get('product');
    	//print_r($query) ;
    	return $query->result();
 
  }

  public function create_product($cat_id, $p_name, $p_price, $p_image) {
		
				$data = array(
					'cat_id'   => $cat_id,
					'p_name'      => $p_name,
					'p_price'   => $p_price,
					'p_image'	 => $p_image
					//'created_at' => date('Y-m-j H:i:s'),
				);
		
		return $this->db->insert('product', $data);		
	}


  public function delete_product() {
		$p_id = intval($this->input->post('p_id'));
		$this->db->where('p_id', $p_id);
		if(  $this -> db -> delete('product') ){
		   return true;
		}else {
			return false;
		}
		
	}

	public function edit_product($id) {  
    	$p_id = intval($id);
    	$this->db->where('p_id', $p_id);
    	$query = $this->db->get('product');
    	//print_r($query) ;
    	return $query->result();
  }

  public function update_product($p_id, $cat_id, $p_name, $p_price, $p_image) {
		
				$data = array(
					'p_id'   => $p_id,
					'cat_id'      => $cat_id,
					'p_name'   => $p_name,
					'p_price'	 => $p_price,
					'p_image'	 => $p_image
				);
		$this->db->where('p_id', $p_id);
		return $this->db->update('product', $data); 
			
	}


}

?>