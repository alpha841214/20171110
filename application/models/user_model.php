<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct() {		
		parent::__construct();
		$this->load->database();
		
	}

	 function select()  
      {       
      	//$sql =  "SELECT `id` FROM `users` WHERE `username`='$username' AND `password`='$password';"; 
      	$sql =  "SELECT * FROM `users`";
		$query = $this->db->query($sql);
		return $query; 
      }  

    function  resolve_only_user($username){
    	$sql =  "SELECT `id` FROM `users` WHERE `username`='$username' ;"; 
    	$query = $this->db->query($sql);
		return $query;
    }
    
       function delete_user($uid)  
      { 
      	$sql =  "DELETE FROM `users` WHERE `id`='$uid' ;";
		$query = $this->db->query($sql);
		return $query;
      }  
	

	public function insert($arr=null) {


		return $this->db->insert('users', $arr);
		
	}
		

	public function update($arr=null, $id=null) {
		$this->db->where('id', $id);
		return $this->db->update('users', $arr); 
		

		//$sql =  "UPDATE  `users` SET `username`='$arr['username']', `password`='$arr['password']' WHERE `password`='$password';"; 
		//return $this->db->query($sql);
	}
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id($username, $password) {
		
		$sql =  "SELECT `id` FROM `users` WHERE `username`='$username' AND `password`='$password';"; 
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
			return $query->row()->id;
		else 
			return 0;


		/*$this->db->select('id');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get()->row('id');
		*/
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
	public function create_user($username, $email, $password) {
		
		$data = array(
			'username'   => $username,
			'email'      => $email,
			'password'   => $password,
			
		);
		
		return $this->db->insert('users', $data);
		//return true;
	}
	
}

