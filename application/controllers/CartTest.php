<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartTest extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	function add1() {
		
		$data = array(
			'id' => '42',
			'name' => 'Pants',
			'qty' => 1,
			'price' => 19.99,
			'options' => array('Size' => 'medium')
		);
		
		$this->cart->insert($data);
		echo "add1() called";
	}

	function show() {
		
		$cart = $this->cart->contents();
		
		echo "<pre>";
		print_r($cart);
	}

	function add2() {
		
		$data = array(
			'id' => '12',
			'name' => 'T-shirt',
			'qty' => 2,
			'price' => 7.99,
			'options' => array('Size' => 'large')
		);
		
		$this->cart->insert($data);
		echo "add2() called";
		
	}

		function add3() {
		
		$data = array(
			'id' => '13',
			'name' => 'shirt',
			'qty' => 5,
			'price' => 9.99,
			'options' => array('Size' => 'small')
		);
		
		$this->cart->insert($data);
		echo "add2() called";
		
	}

	function update() {
		
		$data = array(
			'rowid' => 'bfe34ab652c71a236995a9640c51b5b2',
			'qty' => '1'
		);
		
		$this->cart->update($data);
		echo "update() called";
	}

	function total() {
		
		echo $this->cart->total();
		
	}

	
	function remove() {
		
		$data = array(
			'rowid' => 'bfe34ab652c71a236995a9640c51b5b2',
			'qty' => '0'
		);
		
		$this->cart->update($data);
		echo "remove() called";
	}
	
	function destroy() {
		
		$this->cart->destroy();
		echo "destroy() called";
	}



}
