<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->input->post('search')==FALSE)
		{
			$this->load->model('locationModel');
			$data['locations']=$this->locationModel->getLocation();
			$data['sublocations']=$this->locationModel->getSubLocation();
			$this->load->view('homeview/view_home',$data);

		}else{

			//===================================Home Form validation for search
			if ($this->form_validation->run('searchValidation') == FALSE)
            {
                    $this->load->model('locationModel');
					$data['locations']=$this->locationModel->getLocation();
					$data['sublocations']=$this->locationModel->getSubLocation();
					$this->load->view('homeview/view_home',$data);
            }
            else
            {
                    $data = array(
                    	'location' => $this->input->post('location'),
						'sublocation' => $this->input->post('sublocation'),
						'masterbed' => $this->input->post('masterbed'),
						'bed' => $this->input->post('bed'),
						'balcony' => $this->input->post('balcony'),
						'washroom' => $this->input->post('washroom'),
					);

                    $this->load->model('searchFlatModel');
                    $data['accurateSearch']=$this->searchFlatModel->homeSearch($data);
                    $data['total']=count($data['accurateSearch']);

                    $this->load->model('locationModel');
                    $data['searchLocations']=$this->locationModel->getSearchedLocation($data['location']);
					$data['SearchSublocations']=$this->locationModel->getSearchedSubLocation($data['sublocation']);

					$data['topViewed']=$this->searchFlatModel->topViewedInLocation($data);
                    $data['totalTopViewed']=count($data['topViewed']);

                   // print_r($data['topViewed']);
					$this->parser->parse('homeview/view_searchResult',$data);
					
            }
		}
		
	}
	public function flatDetails($id)
	{

		if($this->input->post('submitIntrest')==FALSE)
		{
			$this->load->model('searchFlatModel');
			$this->searchFlatModel->updateFlatTotalView($id);
	        $data['flatDetails']=$this->searchFlatModel->getFlatDetails($id);
	      	
			$this->parser->parse('homeview/view_flatDetails',$data);

		}else{

			//===================================Home Form validation 
			if ($this->form_validation->run('userIntrestValidation') == FALSE)
            {
                    $this->load->model('searchFlatModel');
					$this->searchFlatModel->updateFlatTotalView($id);
			        $data['flatDetails']=$this->searchFlatModel->getFlatDetails($id);
			      	
					$this->parser->parse('homeview/view_flatDetails',$data);
            }
            else
            {
                    $dataIntrest = array(
                    	'name' => $this->input->post('name'),
						'mobile' => $this->input->post('mobile'),
						'comment' => $this->input->post('comment'),
						'flat_id' => $id
						
					);

                    $this->load->model('FlatModel');
                    $this->FlatModel->insertIntrest($dataIntrest);
                    
                    $this->load->view('homeview/view_IntrestSuccess');
					
            }
		}
		

	}


	public function ownerRegistration()
	{
		if($this->input->post('register')==FALSE)
		{
			$this->load->view('homeview/view_ownerRegistration');
		}else{

			//===================================Form validation
			if ($this->form_validation->run('ownerValidation') == FALSE)
            {
                    $this->load->view('homeview/view_ownerRegistration');
            }
            else
            {
                    $data = array(

						'username' => $this->input->post('username'),
						'password' => $this->input->post('matchPassword'),
						'email' => $this->input->post('email'),
						'mobile' => $this->input->post('mobile'),
						'user_role' => '0'
					);

                    $this->load->model('ownerModel');
                    $this->ownerModel->ownerInsert($data);
					$this->load->view('homeview/view_resistrationSuccess');

            }

		}
	}

	public function oops()
	{

			$this->load->view('homeview/view_oopsError');

	}

	public function Login()
	{
		if($this->session->userdata('ownerUsername')){
			redirect(base_url().'owner/index');
		}else if($this->session->userdata('admin')){
			redirect(base_url().'admin/index');
		}else{
			
			if($this->input->post('login')==FALSE)
			{
				$this->load->view('homeview/view_LogIn');

			}else{
				//=========================================login Validation
				if ($this->form_validation->run('loginValidation') == FALSE)
	            {
	                    $this->load->view('homeview/view_LogIn');
	            }
	            else
	            {
	                    $data = array(
							'username' => $this->input->post('username'),
							'password' => $this->input->post('password')
						);

	                    $this->load->model('ownerModel');
	                    $loginOK=$this->ownerModel->ownerLoginCheck($data);

						if($loginOK==TRUE && $loginOK->user_role=='0'){

							$this->session->set_userdata('ownerUsername', $loginOK->username);
							redirect(base_url().'owner/index');

						}else if($loginOK==TRUE && $loginOK->user_role=='1'){

							$this->session->set_userdata('admin', $loginOK->username);
							redirect(base_url().'admin/index');
							
							
						}
						else{
							$this->session->set_flashdata('loginError', 'Login Failed');
							$this->load->view('homeview/view_LogIn');
						}

	            }
			}

		}
		
		
	}
}
