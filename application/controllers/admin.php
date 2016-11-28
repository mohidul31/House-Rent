<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('admin')){

		}else{
			redirect(base_url().'home/login');
		}
	}

	public function index()
	{
		
		$this->load->view('adminview/view_adminHome');

	}
	public function allUser()
	{
		
	}
	public function allFlat()
	{
		$this->load->model('flatModel');
		$data['allFlat']=$this->flatModel->getAllFlatFroAdmin();
		$data['totalFound']=count($data['allFlat']);
		$this->parser->parse('adminview/view_allFlat',$data);
	}
	public function allHomeOwner()
	{
		$this->load->model('ownerModel');
		$data['allOwner']=$this->ownerModel->getOwnerDataFromAdmin();
		$data['totalFound']=count($data['allOwner']);
		$this->parser->parse('adminview/view_allHomeOwner',$data);
	}

	public function deleteFlat($id)
	{
		
		$this->load->model('flatModel');
		$this->flatModel->deleteFlatForAdmin($id);
		$this->session->set_flashdata('success', 'Selected Flat Delete Successfully');
		redirect(base_url().'admin/allFlat');
	}
	public function deleteOwner($username)
	{
		
		$this->load->model('ownerModel');
		$this->ownerModel->deleteOwnerForAdmin($username);
		$this->session->set_flashdata('success', 'Selected Owner Delete Successfully');
		redirect(base_url().'admin/allHomeOwner');
	}
	public function LogOut()
	{
		$this->session->sess_destroy();
		redirect(base_url().'home/index');
	}
	public function location()
	{
		$this->load->model('locationModel');
		$data['alllocations']=$this->locationModel->getLocationFromAdmin();
		
		$this->parser->parse('adminview/view_location',$data);
		
		
	}
	
		
	
}
