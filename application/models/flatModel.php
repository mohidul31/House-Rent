<?php
	class FlatModel extends CI_Model{
		
		function __construct(){
			
			parent::__construct();
		}
		
		function addNewFlat($data){

			$this->db->insert('tbl_flat', $data);
			$insert_id = $this->db->insert_id();

			$data1 = array(
			        
			        'flat_id' => $insert_id,
			        'total_view' => '0',
			        'rating' => '0',
			        
			);
			$this->db->insert('tbl_rating', $data1);

		}
		function insertIntrest($data){

			$this->db->insert('tbl_user_intrest', $data);

		}
		function insertImageInfo($data){

			$this->db->insert('tbl_images', $data);

		}

		function editFlat($data){

			$username=$this->session->userdata('ownerUsername');
			$this->db->where('owner_username', $username);
			$this->db->where('id', $data['id']);
			$this->db->update('tbl_flat', $data);
		

		}

		function detailsFlat($id){

			
			$this->db->select('*');
			$this->db->from('tbl_flat');

			$this->db->where('tbl_flat.id', $id);

			$this->db->join('tbl_sublocation', 'tbl_sublocation.id = tbl_flat.location_id', 'left');
			$this->db->join('tbl_location', 'tbl_sublocation.location_id = tbl_location.id', 'left');
			$this->db->join('tbl_rating', ' tbl_flat.id = tbl_rating.flat_id' , 'left');

			$query = $this->db->get();
			return $query->result_array();
		

		}

		function userIntrest(){

			$username=$this->session->userdata('ownerUsername');

			$this->db->select('f.flat_name,i.name,i.mobile,i.comment,i.createdat,i.id');
			$this->db->from('tbl_user_intrest as i');
			$this->db->where('f.owner_username', $username);
			$this->db->where('f.isPublished', '1');


			$this->db->join('tbl_flat as f', ' f.id = i.flat_id' , 'left');

			$query = $this->db->get();
			return $query->result_array();
		

		}

		function getOneFlatInfoToPublish($id){

			$this->db->where('id', $id);
			$this->db->where('isPublished', '0');
			$query = $this->db->get('tbl_flat'); 
			return $query->result_array();

		}

		function published(){

			$username=$this->session->userdata('ownerUsername');

			$this->db->select('f.id,f.flat_name,f.available_from,f.flat_price ,r.total_view ');

			$this->db->where('f.owner_username', $username);
			$this->db->where('f.isPublished', '1');

			$this->db->join('tbl_rating as r', ' f.id = r.flat_id' , 'left');

			$query = $this->db->get('tbl_flat as f'); 
			return $query->result_array();

		}

		function getAllFlat(){

			$username=$this->session->userdata('ownerUsername');

			$this->db->where('owner_username', $username);
			$query = $this->db->get('tbl_flat'); 
			return $query->result_array();

		}
		function getAllFlatFroAdmin(){

			$query = $this->db->get('tbl_flat'); 
			return $query->result_array();

		}
		function getFlatImageFromOwner(){

			
			$username=$this->session->userdata('ownerUsername');

			$this->db->select('f.id as fid,f.flat_name, i.image_name , i.id as iid');
			$this->db->from('tbl_flat as f');

			

			$this->db->where('f.owner_username', $username);

			$this->db->join('tbl_images as i', ' f.id = i.flat_id' , 'left');

			$this->db->order_by('f.flat_name', 'ASC');
			
			$query = $this->db->get();
			return $query->result_array();

		}

		function getOneFlat($id){

			$username=$this->session->userdata('ownerUsername');

			$this->db->where('owner_username', $username);
			$this->db->where('id', $id);
			
			$query = $this->db->get('tbl_flat'); 
			return $query->result_array();

		}

		function deleteFlat($id){

			$username=$this->session->userdata('ownerUsername');

			$this->db->where('tbl_flat.id', $id);
			$this->db->where('tbl_flat.owner_username', $username);
			$this->db->delete('tbl_flat');

			$this->db->where('tbl_rating.flat_id', $id);
			$this->db->delete('tbl_rating');

		}
		function deleteFlatForAdmin($id){

			$this->db->where('tbl_flat.id', $id);
			$this->db->delete('tbl_flat');

			$this->db->where('tbl_rating.flat_id', $id);
			$this->db->delete('tbl_rating');

		}

		function deleteImages($id){

			$username=$this->session->userdata('ownerUsername');
			
			$this->db->where('tbl_images.image_name', $id);
			$this->db->delete('tbl_images');

		}

		function publishIt($updateData){

			
			$data = array(
			        'available_from' => $updateData['available_from'],
			        'isPublished' => '1'
			);
			$username=$this->session->userdata('ownerUsername');
			
			$this->db->where('id', $updateData['id']);
			$this->db->where('owner_username', $username);
			$this->db->update('tbl_flat', $data);


		}

		function unPublishIt($id){

		
			$data = array(
			        'available_from' => 'unpublished',
			        'isPublished' => '0'
			);

			$username=$this->session->userdata('ownerUsername');
			$this->db->where('id', $id);
			$this->db->where('owner_username', $username);
			$this->db->update('tbl_flat', $data);

			$data = array(
			        'total_view' => '0'
			);
			$this->db->where('tbl_rating.flat_id', $id);
			$this->db->update('tbl_rating', $data);
		}

		function deleteIntrest($id){

		
			$this->db->where('id', $id);
			$this->db->delete('tbl_user_intrest');

		}

		function unpublished(){

			$username=$this->session->userdata('ownerUsername');

			$this->db->where('owner_username', $username);
			$this->db->where('isPublished', '0');

			$query = $this->db->get('tbl_flat'); 
			return $query->result_array();

		}
		

	}

?>