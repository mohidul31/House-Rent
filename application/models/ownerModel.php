<?php
	class OwnerModel extends CI_Model{
		
		function __construct(){
			
			parent::__construct();
		}
		
		function ownerInsert($data){

			$this->db->insert('tbl_owner', $data);

		}
		function getOwnerData(){

			$username=$this->session->userdata('ownerUsername');
			$this->db->where('username', $username);
			$this->db->where('user_role', '0');
			$query = $this->db->get('tbl_owner');
			return $query->result_array();

		}
		function getOwnerDataFromAdmin(){

			
			$this->db->select('o.id,o.username,o.mobile,o.email,COUNT(f.owner_username) as totalFlat');
			$this->db->from('tbl_owner as o');

			$this->db->where('o.user_role', '0');
			
			$this->db->join('tbl_flat as f', ' f.owner_username = o.username' , 'left');

			$this->db->group_by('o.username');

			$query = $this->db->get();
			return $query->result_array();

		}
		function deleteOwnerForAdmin($username){

			
			$this->db->where('tbl_owner.username', $username);
			$this->db->delete('tbl_owner');

			$this->db->where('tbl_flat.owner_username', $username);
			$this->db->delete('tbl_flat');


		}

		function updateOwner($data){

			$username=$this->session->userdata('ownerUsername');
			$this->db->where('username', $username);
			 $this->db->update('tbl_owner',$data);

		}

		function updatePW($data){

			$username=$this->session->userdata('ownerUsername');
			$newPW=$data['newPW'];
			$oldPW=$data['oldPW'];

			$this->db->where('username', $username);
			$this->db->where('password', $oldPW);
			$query = $this->db->get('tbl_owner'); 

			if($query -> num_rows() == 1)
			{
			 	$dataNew = array('password' => $newPW, );

			 	$this->db->where('username', $username);
			 	$this->db->update('tbl_owner',$dataNew);

			 	return true;
			        
			}
			else
			{
			 	return false;
			}
			
		}

		function ownerLoginCheck($data){

			$username=$data['username'];
			$password=$data['password'];

			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$query = $this->db->get('tbl_owner'); 

			if($query -> num_rows() == 1)
			{
			 	return $query->row();
				
			}
			else
			{
			 	return false;
			}
		}

	}

?>