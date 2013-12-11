<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->helper(array('url', 'form'));
	   $this->load->library(array('session', 'encrypt'));
	   $this->load->model('shelf_model');
	}

	public function upload_photos()
	{
		$config['upload_path'] = "./uploads/";
		$config['allowed_types'] = '*';
		$config['max_size'] = 0;
		$this->load->library('upload', $config);
		$databunk = $this->upload->data();
		$album  = $this->input->post('album');

		if ( ! $this->upload->do_upload("photofile"))
		{
			$error = $this->upload->display_errors();
			var_dump($this->upload->data());
			var_dump($error);
		}
		else
		{
			$data = $this->upload->data();
			$filename = $data['file_name'];
			$fullpath = '/uploads/';
			$this->shelf_model->add_photo($album,$filename);
			echo $fullpath."".$filename;
		}
	}
}