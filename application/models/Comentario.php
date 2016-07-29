<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Comentario extends Eloquent{
	protected $table = "comentario";
	protected $CI;
	public $timestamps = false;

	public function __construct()
	{
		parent::__construct();
		$this->CI = & get_instance();
	}

	public function Publicacion()
    {
    	$this->CI->load->model('Publicacion');
        return $this->belongsTo('Publicacion');
    }
	
}