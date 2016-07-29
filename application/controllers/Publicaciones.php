<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicaciones extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Publicacion');
		
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$datos['post'] = Publicacion::find($offset);
		if (isset($datos['post'])) {
			$this->load->view('home/post', $datos);
		}else{
			redirect('/');
		}		
	}

	// Add a new item
	public function add()
	{	
		$config['upload_path'] = './public/images';
		$config['allowed_types'] = 'jpg|png';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('imagen')){
			$error = array('error' => $this->upload->display_errors());
			echo var_dump($error);
		}
		else{
			$datoFile["datos-file"] = $this->upload->data();
			$publicacion = new Publicacion;
			$publicacion->titulo = $this->input->post('titulo');
			$publicacion->contenido = $this->input->post('contenido');
			$publicacion->imagen = $datoFile["datos-file"]["file_name"];
			$publicacion->fecha = "".date("d-m-Y");
			$publicacion->user_id = 1;
			$publicacion->save();
			$respuesta['titulo'] = $publicacion->titulo;
			$respuesta['fecha'] = $publicacion->fecha;
			$respuesta['usuario'] = $publicacion->user->nombre;
			$respuesta['id'] = $publicacion->id;

			header('ContentType:json');
			echo json_encode($respuesta);
		}
	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Publicaciones.php */
/* Location: ./application/controllers/Publicaciones.php */
