<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Shelf extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library("pagination");
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('shelf_model');
	}

	function index(){
		$this->data['title'] = 'Shelf';

		$this->data['albums'] = $this->shelf_model->get_albums();

		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/nav', $this->data);
		$this->load->view('shelf/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}

	function albums(){
		$this->data['title'] = 'Shelf';

		$this->data['albums'] = $this->shelf_model->get_albums();

		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/nav', $this->data);
		$this->load->view('shelf/list_albums', $this->data);
		$this->load->view('includes/footer', $this->data);
	}

	function add_album(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('/', 'refresh');
		}
		
		$this->data['title'] = 'Shelf';

		$this->form_validation->set_rules('name', 'Album Name', 'required|xss_clean');
		$this->form_validation->set_rules('description', 'Album Description', 'required|xss_clean');

		if ($this->form_validation->run() == true)
		{
			$name = $this->input->post('name');
			$description  = $this->input->post('description');
		}
		if ($this->form_validation->run() == true && $this->shelf_model->add_album($name, $description))
		{
			$this->data['success_message'] = 'Album successfully added';
			$this->session->flashdata('success_message');
			redirect("/shelf/add_album", 'refresh');
		}
		else
		{
			$this->data['error_message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('error_message')));
			$this->data['name'] = array(
				'class' => 'form-control',
				'name'  => 'name',
				'id'    => 'name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('name'),
			);
			$this->data['description'] = array(
				'class' => 'form-control',
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'description',
				'value' => $this->form_validation->set_value('description'),
			);
			$this->load->view('includes/header', $this->data);
			$this->load->view('includes/nav', $this->data);
			$this->load->view('shelf/add_album', $this->data);
			$this->load->view('includes/footer', $this->data);
		}
	}

	function edit_album(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('/', 'refresh');
		}
		$this->data['title'] = 'Shelf';
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/nav', $this->data);
		$this->load->view('shelf/edit_album', $this->data);
		$this->load->view('includes/footer', $this->data);
	}

	function delete_album(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('/', 'refresh');
		}

		$slug = $this->uri->segment(3);

		if($this->shelf_model->delete_album($slug)){
			$data['success_message'] = 'Album Deleted';
			redirect('/shelf/albums', 'refresh');
		}
		else{
			$data['error_message'] = 'Failed to delete album';
			redirect('/shelf/albums', 'refresh');
		}
	}

	function view_album(){
		$this->data['title'] = 'Shelf';
		$slug = $this->uri->segment(2);

		$config = array();
        $config['base_url'] = base_url().'album/'.$slug;
        $config['total_rows'] = $this->shelf_model->album_photos_count($slug);
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul class="pagination pull-right">';
		$config['full_tag_close'] = '</ul>';
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['links'] = $this->pagination->create_links();
        $this->data['total'] = $this->shelf_model->album_photos_count($slug);
		$this->data['photos'] = $this->shelf_model->get_album_photos($slug,$config["per_page"],$page);

		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/nav', $this->data);
		$this->load->view('shelf/view_album', $this->data);
		$this->load->view('includes/footer', $this->data);
	}

	function upload_photos(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('/', 'refresh');
		}
		$this->data['title'] = 'Shelf';
		$this->data['album'] = 'class="album form-control" id ="album"';
		$raw_list = $this->shelf_model->get_albums();
		$raw_album_array = array();
		$raw_album_array[0] = 'Select album';
		foreach ($raw_list as $album):
			$raw_album_array[$album['id']] = $album['name'];
        endforeach;
        $this->data['albums'] = $raw_album_array;
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/nav', $this->data);
		$this->load->view('shelf/upload_photos', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
}