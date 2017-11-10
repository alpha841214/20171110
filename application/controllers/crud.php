<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		
	}



	public function index()
	{	
		$this->select();
	}

	public function select()
	{
		  
        $data["select_data"] = $this->user_model->select();  
		$data['pagename'] = 'select page';
		$this->load->view('crud/select', $data);	
	}

	public function delete($username=null)
	{
		$data['pagename'] = 'delete page<br><br>';
		$data['message'] = 'welcome';
		if($this->user_model->delete($username)) {
			$data['message'] ='delete OK';
		}else {
			$data['message'] ='delete not OK';
		}
		
		$this->load->view('crud/delete', $data);
	}

	public function insert()
	{
		$data['pagename'] = 'insert page<br><br>';
		$data['message'] ='wlecome';
		$arr =  array(
			'username'   => '111',
			'email'      => '111@111',
			'password'   => '111'
		);

		if($this->user_model->insert($arr)) {
			$data['message'] ='insert OK';
		}else {
			$data['message'] ='insert not OK';
		}
		$this->load->view('crud/insert', $data);	
	}

	public function update()
	{
		$data['pagename'] = 'update page<br><br>';
		$data['message'] ='wlecome';
		$arr =  array(
			'username'   => '222',
			'email'      => '111@111',
			'password'   => '111'
		);
		$id = 7;
		if($this->user_model->update($arr, $id)) {
			$data['message'] ='update OK';
		}else {
			$data['message'] ='update not OK';
		}
		$this->load->view('crud/update', $data);
	}

}
