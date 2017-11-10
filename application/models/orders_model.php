<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {

 public function fetch_all()
 {
  $query = $this->db->get("orders");
  return $query;
 }

 public function create_order($uid, $cartstring, $total=0) {
				$date_time = new DateTime();
				$data = array(
					'uid'   => $uid,
					'cartstring'    => $cartstring,
					'createtime'	=> $date_time->format('Y-m-d H:i:s'),
					'totprice'		=> $total
				);
		
		return $this->db->insert('orders', $data);
		//return '1' ;		
	}

public function getInfo($uid) {
		//echo 'uid='.$uid . '<br>' ;
		$theid = intval($uid); //echo 'theid='.$theid . '<br>' ;
		
		$query = $this->db->query("SELECT * FROM orders where uid='$theid' ; ");

		return $query;
	}

public function getCart($oid) {
		//echo 'uid='.$uid . '<br>' ;
		$theoid = intval($oid); //echo 'theid='.$theid . '<br>' ;
		
		$query = $this->db->query("SELECT cartstring FROM orders where oid='$theoid' ; ");

		return $query->result() ;
	}

public function delete_order() {
    $oid = intval($this->input->post('oid'));
    $this->db->where('oid', $oid);
    if(  $this -> db -> delete('orders') ){
       return true;
    }else {
      return false;
    }
    
  }
  
  public function edit_order($id) {  
      $oid = intval($id);
      $this->db->where('oid', $oid);
      $query = $this->db->get('orders');
      //print_r($query) ;
      return $query->result();
  }

  public function update_order($oid, $uid, $createtime, $totprice) {
    
        $data = array(
          'oid'   => $oid,
          'uid'      => $uid,
          'createtime'   => $createtime,
          'totprice'  => $totprice
        );
    $this->db->where('oid', $oid);
    return $this->db->update('orders', $data); 
      
  }
   
      
}

?>