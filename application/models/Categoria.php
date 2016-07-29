<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Categoria extends Eloquent{
	protected $table = "categoria";
	protected $CI;
	public $timestamps = false;

	public function __construct()
	{
		parent::__construct();
		$this->CI = & get_instance();
	}

	public function publicaciones()
    {
    	$this->CI->load->model('Publicacion');
        return $this->belongsToMany('Publicacion','publicacion_to_categoria');
    }
	
}
