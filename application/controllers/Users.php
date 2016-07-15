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
			header('ContentType:json');
			echo $usuario->toJson();
		}else{
			echo '';
		}
	}

	// Add a new item
	public function add()
	{
		$usuario = new User;
		$usuario->nombre = $this->input->post("nombre");
		$usuario->username = $this->input->post("username");
		$usuario->email = $this->input->post("email");
		$usuario->paswword = $this->input->post("paswword");
		$usuario->save();
		header('ContentType:json');
		echo json_encode($usuario);
	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{
		if($id != NULL){
			$usuario = User::find($id);
			$usuario->delete();
			echo $id;
		}else{
			echo "error";
		}
		
	}
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
