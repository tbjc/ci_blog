<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Publicacion extends Eloquent {
	protected $table = "publicacion";
	protected $CI;

	public function __construct()
	{
		parent::__construct();
		$this->CI = & get_instance();
	}

	public function user()
    {
    	$this->CI->load->model('User');
        return $this->belongsTo('User');
    }

    public function comentarios()
    {
    	$this->CI->load->model('Comentario');
        return $this->hasMany('Comentario');
    }

}

/* End of file Publicacion.php */
/* Location: ./application/models/Publicacion.php */