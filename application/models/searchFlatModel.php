<?php
	class SearchFlatModel extends CI_Model{
		
		function __construct(){
			
			parent::__construct();
		}
		
		
		function homeSearch($userInput){

			$sublocation = $userInput['sublocation'];
			$masterbed = $userInput['masterbed'];
			$bed = $userInput['bed'];
			$balcony = $userInput['balcony'];
			$washroom = $userInput['washroom'];
		
			$this->db->select('f.id,f.flat_type,f.flat_name,f.location_details,f.masterbed,f.bed,f.balcony,f.washroom,f.available_from,f.flat_price,r.total_view,l.location,s.sublocation,GROUP_CONCAT(i.image_name) as gcimages');

			$this->db->from('tbl_flat as f');

			$this->db->where('f.isPublished', '1');
			$this->db->where('f.location_id', $sublocation);
			$this->db->where('f.masterbed', $masterbed);
			$this->db->where('f.bed', $bed);
			$this->db->where('f.balcony', $balcony);
			$this->db->where('f.washroom', $washroom);


			$this->db->join('tbl_sublocation as s', 's.id = f.location_id', 'left');
			$this->db->join('tbl_location as l', 's.location_id = l.id', 'left');
			$this->db->join('tbl_rating as r', ' f.id = r.flat_id' , 'left');
			$this->db->join('tbl_images as i', ' f.id = i.flat_id' , 'left');

			$this->db->group_by('i.flat_id');

			$this->db->order_by('r.total_view', 'DESC');
			
			$query = $this->db->get();
			return $query->result_array();

		}

		function getFlatDetails($id){

		
		
			$this->db->select('f.id,f.flat_type,f.flat_name,f.location_details,f.masterbed,f.bed,f.balcony,f.washroom,f.available_from,f.flat_price,r.total_view,l.location,s.sublocation,GROUP_CONCAT(i.image_name) as gcimages,o.username,o.mobile,o.email,f.flat_details');

			$this->db->from('tbl_flat as f');

			$this->db->where('f.isPublished', '1');
			
			$this->db->where('f.id', $id);
			
			$this->db->join('tbl_sublocation as s', 's.id = f.location_id', 'left');
			$this->db->join('tbl_location as l', 's.location_id = l.id', 'left');
			$this->db->join('tbl_rating as r', ' f.id = r.flat_id' , 'left');
			$this->db->join('tbl_images as i', ' f.id = i.flat_id' , 'left');
			$this->db->join('tbl_owner as o', ' o.username = f.owner_username' , 'left');
			$this->db->group_by('i.flat_id');
			
			$query = $this->db->get();
			return $query->result_array();

		}

		function updateFlatTotalView($id){

			
    		$this->db->set('total_view', 'total_view+1', FALSE);
			$this->db->where('flat_id', $id);
			$this->db->update('tbl_rating');
		}


		function topViewedInLocation($userInput){

			$sublocation = $userInput['sublocation'];
		
			$this->db->select('f.id,f.flat_type,f.flat_name,f.location_details,f.masterbed,f.bed,f.balcony,f.washroom,f.available_from,f.flat_price,r.total_view,l.location,s.sublocation,GROUP_CONCAT(i.image_name) as gcimages');
			$this->db->from('tbl_flat as f');

			$this->db->where('f.isPublished', '1');
			$this->db->where('f.location_id', $sublocation);

			

			$this->db->join('tbl_sublocation as s', 's.id = f.location_id', 'left');
			$this->db->join('tbl_location as l', 's.location_id = l.id', 'left');
			$this->db->join('tbl_rating as r', ' f.id = r.flat_id' , 'left');
			$this->db->join('tbl_images as i', ' f.id = i.flat_id' , 'left');

			$this->db->group_by('i.flat_id');

			$this->db->order_by('r.total_view', 'DESC');

			
			$query = $this->db->get();
			return $query->result_array();

		}
		
	}

?>