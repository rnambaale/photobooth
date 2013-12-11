<?php
class Shelf_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function get_albums(){
		$query = $this->db->get_where('albums');
		return $query->result_array();
	}

	public function update_album(){
		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
		);

		return $this->db->insert('albums', $data);
	}

	public function add_album($name,$description){
		$data = array('name' => $name,'description' => $description);
		return $this->db->insert('albums', $data);
	}

	public function delete_album($id){
		if($this->db->delete('albums', array('id' => $id))){
			$this->db->delete('photos', array('album' => $id));
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function add_photo($album,$filename){
		$data = array('album' => $album, 'name' => $filename);
		return $this->db->insert('photos', $data);
	}

	public function get_album_photos($album,$limit,$start){
		$this->db->limit($limit, $start);
		$query = $this->db->get_where('photos', array('album' => $album));
		return $query->result_array();
	}

	public function album_photos_count($album){
		$this->db->where('album',$album);
		$this->db->from('photos');
		return $this->db->count_all_results();
	}
}