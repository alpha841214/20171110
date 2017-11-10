<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();		
	}

	function fetch_all()
 {
  $query = $this->db->get("users");
  return $query->result();
 }
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_user($username, $email, $password, $active=0) {
		
		
				$data = array(
					'username'   => $username,
					'email'      => $email,
					'password'   => $password,
					'active'	 => $active
					//'created_at' => date('Y-m-j H:i:s'),
				);
		
		return $this->db->insert('users', $data);		
	}

	public function update_user($id, $username, $email, $password, $active=0) {
		
		
				$data = array(
					'username'   => $username,
					'email'      => $email,
					'password'   => $password,
					'active'	 => $active
					//'created_at' => date('Y-m-j H:i:s'),
				);
		$this->db->where('id', $id);
		return $this->db->update('users', $data); 
			
	}
	
	
	public function resolve_user_login($username, $password) {
		$query = $this->db->query("SELECT * FROM users where username='$username' AND password='$password' ; ");
		
		return $query;
	}

	public function resolve_only_user($username) {
		$query = $this->db->query("SELECT * FROM users where username='$username' ; ");
		
		return $query  ;
	}
	
	
	public function get_user_id_from_username($username) {
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('username', $username);

		return $this->db->get()->row('id');
		
	}
	
	
	public function get_user($user_id) {
		
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}

	public function delete_user() {
		$user_id = intval($this->input->post('id'));
		$this->db->where('id', $user_id);
		if(  $this -> db -> delete('users') ){
		   return true;
		}else {
			return false;
		}
		
	}
	
	
	public function edit_user($id) {  
    	$user_id = intval($id);
    	$this->db->where('id', $user_id);
    	$query = $this->db->get('users');
    	//print_r($query) ;
    	return $query->result();
 
  }
}

