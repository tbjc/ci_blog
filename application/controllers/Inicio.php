<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/*
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		$this->load->view('home/index');
	}

	public function dashboard(){
		$datos['seleccion']='inicio';
		$this->load->view('dashboard/index-head',$datos);
		$this->load->view('dashboard/admin-home');
		$this->load->view('dashboard/index-footer');
	}

	public function usuarios(){
		$this->load->model('User');
		$usuarios = User::all();
		$datos['seleccion']='usuarios';
		$lista['usuarios']=$usuarios;
		$this->load->view('dashboard/index-head',$datos);
		$this->load->view('dashboard/admin-users',$lista);
		$this->load->view('dashboard/index-footer');
	}

	public function publicaciones(){
		$datos['seleccion']='publicaciones';
		$this->load->view('dashboard/index-head',$datos);
		$this->load->view('dashboard/admin-publ');
		$this->load->view('dashboard/index-footer');
	}

	public function comentarios(){
		$datos['seleccion']='comentarios';
		$this->load->view('dashboard/index-head',$datos);
		$this->load->view('dashboard/admin-coment');
		$this->load->view('dashboard/index-footer');
	}

	public function login(){
		$this->load->view('home/login');
	}

	public function base(){
		$this->load->model('publicacion');
		$datos = Publicacion::find(1);
		header("Content-type:json");
		echo json_encode($datos->comentarios);
	}
}
