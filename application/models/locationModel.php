<?php
	class LocationModel extends CI_Model{
		
		function __construct(){
			
			parent::__construct();
		}
		
		function getLocation(){

			$query = $this->db->get('tbl_location'); 
			return $query->result_array();

		}
		function getLocationFromAdmin(){

			$this->db->select('l.location,GROUP_CONCAT(s.sublocation) as sub');

			$this->db->from('tbl_location as l');

			
			$this->db->join('tbl_sublocation as s', 'l.id = s.location_id', 'left');

			$this->db->group_by('l.id');
			
			$query = $this->db->get();
			return $query->result_array();


		}
		function getSearchedLocation($id){
			$this->db->where('id', $id);
			$query = $this->db->get('tbl_location'); 
			return $query->result_array();

		}

		function getSubLocation(){
			
			$query = $this->db->get('tbl_sublocation'); 
			return $query->result_array();
		}

		function getSearchedSubLocation($id){
			$this->db->where('id', $id);
			$query = $this->db->get('tbl_sublocation'); 
			return $query->result_array();

		}
		
	}

?>