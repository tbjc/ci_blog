<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');

	}

	public function login(){
		$this->input->post();
	}

	public function index( $offset = 0 )
	{
		if ($offset > 0) {
			$usuario = User::find($offset);
			echo $usuario->toJson();
		}else{
			echo '';
		}
	}

	// Add a new item
	public function add()
	{
		
	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{
		echo $id;
	}
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
