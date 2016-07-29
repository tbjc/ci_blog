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
		if ($this->input->is_ajax_request()) {
			if ($offset > 0) {
				$usuario = User::find($offset);
				header('ContentType:json');
				echo $usuario->toJson();
			}else{
				echo '';
			}
		}else{
			redirect('/');
		}
		
	}

	public function ismailuser(){
		if ($this->input->is_ajax_request()) {
			$email = $this->input->post("email");
			$username = $this->input->post("username");
			$valores;
			if (User::where('email','=',$email)->count() > 0) {
				$valor['email']=true;
			}else{
				$valor['email']=false;
			}
			if (User::where('username','=',$username)->count() > 0) {
				$valor['username']=true;
			}else{
				$valor['username']=false;
			}
			header('ContentType:json');
			echo json_encode($valor);
		}else{
			redirect('/');
		}
		
	}

	// Add a new item
	public function add()
	{
		$usuario = new User;
		$usuario->nombre = $this->input->post("nombre");
		$usuario->username = $this->input->post("username");
		$usuario->email = $this->input->post("email");
		$usuario->paswword = md5($this->input->post("paswword"));
		$usuario->save();
		header('ContentType:json');
		echo json_encode($usuario);
	}

	//Update one item
	public function update( $id = NULL )
	{
		if ($this->input->is_ajax_request()) {
			$usuario = User::find($id);
			$nombre = $this->input->post('nombre',true);
			$username = $this->input->post('username',true);
			$email = $this->input->post('email',true);
			$paswword = md5($this->input->post('paswword',true));
			if ($usuario->nombre != $nombre) {
				$usuario->nombre = $nombre;
			}	
			if ($usuario->username != $username) {
				$usuario->username = $username;
			}
			if ($usuario->email != $email) {
				$usuario->email = $email;
			}
			if ($this->input->post('cambia-password')==true) {
				$usuario->paswword = $paswword;
			}
			$usuario->save();
			header('ContentType:json');
			echo $usuario->toJson();
		}
		
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
