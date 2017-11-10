<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
	
	function index() {
		
		$this->load->model('product_model');
		
		$data['products'] = $this->product_model->fetch_3();
		//print_r($data['products']);
		$this->load->view('products', $data);
	}

	
	function add() {
		
		$this->load->model('product_model');
		
		$product = $this->product_model->get_product(intval($this->input->post('id')));
		
		$insert = array(
			'id' => $this->input->post('id'),
			'qty' => 1,
			'price' => $product[0]->p_price,
			'name' => $product[0]->p_name
		);
		
		$this->cart->insert($insert);
	
		redirect('shop');
		
	}
	
	function remove($rowid) {
		
		$this->cart->update(array(
			'rowid' => $rowid,
			'qty' => 0
		));
		
		redirect('shop');
		
	}
	
}
