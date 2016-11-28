<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('ownerUsername')){

		}else{
			redirect(base_url().'home/login');
		}
	}

	public function index()
	{
		
		$this->load->model('flatModel');
		$data['publishedFlat']=$this->flatModel->published();
		$data['totalFound']=count($data['publishedFlat']);
		$this->parser->parse('houseownerview/view_ownerHome',$data);



	}
	public function userIntrest()
	{
		
		$this->load->model('flatModel');
		$data['userIntrest']=$this->flatModel->userIntrest();
		$data['totalFound']=count($data['userIntrest']);
		$this->parser->parse('houseownerview/view_userIntrest',$data);



	}
	public function addFlat()
	{

		if($this->input->post('addFlat')==FALSE)
		{
			$this->load->model('locationModel');
			$data['locations']=$this->locationModel->getLocation();
			$data['sublocations']=$this->locationModel->getSubLocation();
			$this->load->view('houseownerview/view_addFlat',$data);

		}else{

			//===================================addFlat Form validation
			if ($this->form_validation->run('addFlatValidation') == FALSE)
            {
                    $this->load->model('locationModel');
					$data['locations']=$this->locationModel->getLocation();
					$data['sublocations']=$this->locationModel->getSubLocation();
					$this->load->view('houseownerview/view_addFlat',$data);
            }
            else
            {
                    $addFlatdata = array(

						'flat_name' => $this->input->post('flatname'),
						'owner_username' => $this->session->userdata('ownerUsername'),
						'location_details' => $this->input->post('locationDetails'),
						'location_id' => $this->input->post('sublocation'),
						'flat_type' => $this->input->post('flattype'),
						'masterbed' => $this->input->post('masterbed'),
						'bed' => $this->input->post('bed'),
						'balcony' => $this->input->post('balcony'),
						'washroom' => $this->input->post('washroom'),
						'flat_details' => $this->input->post('flatDetails'),
						'flat_price' => $this->input->post('price'),
						'isPublished' => '0'
						
					);

                    $this->load->model('flatModel');
                    $this->flatModel->addNewFlat($addFlatdata);

                    $this->session->set_flashdata('addSuccessMessage', ' ');

					$this->load->model('locationModel');
					$data['locations']=$this->locationModel->getLocation();
					$data['sublocations']=$this->locationModel->getSubLocation();
					$this->load->view('houseownerview/view_addFlat',$data);

            }

		}
		


	}
	public function LogOut()
	{
		
		$this->session->sess_destroy();
		redirect(base_url().'home/index');


	}
	public function allFlat()
	{
		
		$this->load->model('flatModel');
		$data['allFlat']=$this->flatModel->getAllFlat();
		$data['totalFound']=count($data['allFlat']);
		$data['username']=$this->session->userdata('ownerUsername');
		$this->parser->parse('houseownerview/view_allFlat',$data);
	}
	public function editFlat($id)
	{

		if($this->input->post('editFlat')==FALSE)
		{
			$this->load->model('locationModel');
			$data['locations']=$this->locationModel->getLocation();
			$data['sublocations']=$this->locationModel->getSubLocation();
			$this->load->model('flatModel');
			$data['myFlat']=$this->flatModel->getOneFlat($id);
			$this->parser->parse('houseownerview/view_editFlat',$data);

		}else{

			//===================================addFlat Form validation
			if ($this->form_validation->run('addFlatValidation') == FALSE)
            {
                    $this->load->model('locationModel');
					$data['locations']=$this->locationModel->getLocation();
					$data['sublocations']=$this->locationModel->getSubLocation();
					$this->load->model('flatModel');
					$data['myFlat']=$this->flatModel->getOneFlat($id);
					$this->parser->parse('houseownerview/view_editFlat',$data);
            }
            else
            {
                    $editFlatdata = array(
                    	'id'=>$this->input->post('id'),
						'flat_name' => $this->input->post('flatname'),
						'location_details' => $this->input->post('locationDetails'),
						'location_id' => $this->input->post('sublocation'),
						'flat_type' => $this->input->post('flattype'),
						'masterbed' => $this->input->post('masterbed'),
						'bed' => $this->input->post('bed'),
						'balcony' => $this->input->post('balcony'),
						'washroom' => $this->input->post('washroom'),
						'flat_details' => $this->input->post('flatDetails'),
						'flat_price' => $this->input->post('price')
						
					);

                    $this->load->model('flatModel');
                    $this->flatModel->editFlat($editFlatdata);

                    $this->session->set_flashdata('addSuccessMessage', ' ');

					$this->load->model('locationModel');
					$data['locations']=$this->locationModel->getLocation();
					$data['sublocations']=$this->locationModel->getSubLocation();
					$this->load->view('houseownerview/view_addFlat',$data);
					$this->session->set_flashdata('success', 'Selected Flat Edit Successfully');
					redirect(base_url().'owner/allFlat');

            }

		}
		


	}

	public function detailsFlat($id)
	{
		
		$this->load->model('flatModel');
		$data['flatDetails']=$this->flatModel->detailsFlat($id);
		$this->parser->parse('houseownerview/view_detailsFlat_byOwner',$data);

	}

	public function deleteFlat($id)
	{
		
		$this->load->model('flatModel');
		$this->flatModel->deleteFlat($id);
		$this->session->set_flashdata('success', 'Selected Flat Delete Successfully');
		redirect(base_url().'owner/allFlat');
	}
	public function deleteImages($id)
	{
		
		$this->load->model('flatModel');
		$this->flatModel->deleteImages($id);
		@unlink("./public/uploads/".$id);
		$this->session->set_flashdata('upload_message', 'File Deleted Successfully' );
		redirect(base_url().'owner/uploads');
	}

	public function publishedFlat()
	{
		
		$this->load->model('flatModel');
		$data['publishedFlat']=$this->flatModel->published();
		$data['totalFound']=count($data['publishedFlat']);
		$this->parser->parse('houseownerview/view_publishedFlat',$data);


	}
	public function publishIt($id)
	{
		if($this->input->post('publishSubmit')==FALSE)
		{
			$this->load->model('flatModel');
			$data['getFlat']=$this->flatModel->getOneFlatInfoToPublish($id);
			$this->parser->parse('houseownerview/view_publishIt',$data);
			

		}else{


			//===================================addFlat Form validation
			if ($this->form_validation->run('dateValidation') == FALSE)
            {
             	$this->load->model('flatModel');
				$data['getFlat']=$this->flatModel->getOneFlatInfoToPublish($id);
				$this->parser->parse('houseownerview/view_publishIt',$data);
            }   
            else
            {
                    $updateData = array(
                    	'id' => $this->input->post('faltid'),
						'available_from' => $this->input->post('available_from'),
						
					);
                    
                    $this->load->model('flatModel');
                    $this->flatModel->publishIt($updateData);
                    $this->session->set_flashdata('unPublishItSuccess', 'Flat Published Successfully');
                  	redirect(base_url().'owner/publishedFlat');

            }

		}


		
	}




	public function unpublishedFlat()
	{
		
		$this->load->model('flatModel');
		$data['unpublishedFlat']=$this->flatModel->unpublished();
		$data['totalFound']=count($data['unpublishedFlat']);
		$this->parser->parse('houseownerview/view_unpublishedFlat',$data);
	}
	public function unPublishIt($id)
	{
		
		$this->load->model('flatModel');
		$this->flatModel->unPublishIt($id);
		$this->session->set_flashdata('unPublishItSuccess', 'Flat Unpublished Successfully');
		redirect(base_url().'owner/publishedFlat');

	}

	public function deleteIntrest($id)
	{
		
		$this->load->model('flatModel');
		$this->flatModel->deleteIntrest($id);
		//$this->session->set_flashdata('unPublishItSuccess', 'Flat Unpublished Successfully');
		redirect(base_url().'owner/userIntrest');

	}

	public function account()
	{
		
		$this->load->model('ownerModel');
		$data['ownerInfo']=$this->ownerModel->getOwnerData();
		$this->parser->parse('houseownerview/view_ownerAccount',$data);

	}
	public function accountUpdate()
	{
		if($this->input->post('editOwner')==FALSE)
		{
			$this->load->model('ownerModel');
			$data['ownerInfo']=$this->ownerModel->getOwnerData();
			$this->parser->parse('houseownerview/view_ownerAccountUpdate',$data);
			

		}else{


			//===================================edit Owner Form validation
			if ($this->form_validation->run('ownerUpdateValidation') == FALSE)
            {
             	$this->load->model('ownerModel');
				$data['ownerInfo']=$this->ownerModel->getOwnerData();
				$this->parser->parse('houseownerview/view_ownerAccountUpdate',$data);
            }   
            else
            {
                    $updateData = array(
                    	'mobile' => $this->input->post('mobile'),
						'email' => $this->input->post('email')
						
					);
                    
                    $this->load->model('ownerModel');
                    $this->ownerModel->updateOwner($updateData);
                  	redirect(base_url().'owner/account');

            }

		}
		
	

	}
	public function changePassword()
	{
		if($this->input->post('updatePass')==FALSE)
		{
			$this->load->view('houseownerview/view_ownerPasswordChange');
			

		}else{


			//===================================edit Owner Form validation
			if ($this->form_validation->run('ownerUpdatePWValidation') == FALSE)
            {
             	$this->load->view('houseownerview/view_ownerPasswordChange');

            }   
            else
            {
                    $updateData = array(
                    	'oldPW' => $this->input->post('oldPW'),
                    	'newPW' => $this->input->post('cPW')
						
					);
                    
                    $this->load->model('ownerModel');
                    $result=$this->ownerModel->updatePW($updateData);

                    if($result==FALSE){
                    	$this->session->set_flashdata('message', 'Password Change Failed');
                    	
                    }else{
                    	$this->session->set_flashdata('message', 'Password  Change Successfully');
                    }

                  	redirect(base_url().'owner/account');

            }

		}
	
		

	}

	public function uploads()
	{

		if($this->input->post('uploadImages')==FALSE)
		{
			$this->load->model('flatModel');
			$data['myFlat']=$this->flatModel->getAllFlat();
			$data['allFlat']=$this->flatModel->getFlatImageFromOwner();
			$this->parser->parse('houseownerview/view_upload',$data);
			

		}else{


			//===================================file Upload Form validation
			if ($this->form_validation->run('fileValidation') == FALSE)
            {
             	$this->load->model('flatModel');
             	$data['myFlat']=$this->flatModel->getAllFlat();
				$data['allFlat']=$this->flatModel->getFlatImageFromOwner();
				$this->parser->parse('houseownerview/view_upload',$data);

            }   
            else
            {
            	$flatid['id'] =  $this->input->post('selectedFlat');

            	$config = array(
		    		    'upload_path'   => './public/uploads/',
		    		    'allowed_types' => 'gif|jpg|png',
		    		    'file_name' => time(),
		    		    'max_size'  => '6000'	//kb
		    		    //'max_width' => '2068',
		    		    //'max_height'    => '1032',
		    		    //'encrypt_name'  => true,
		    		    //'overwrite' => true
		    	);
		    	$this->load->library('upload', $config);

		    	
		    	if ($this->upload->do_upload('userfile')==FALSE)
		        {
					$this->session->set_flashdata('upload_message', 'Error!! '.$this->upload->display_errors() );
		            $this->load->model('flatModel');
		            $data['myFlat']=$this->flatModel->getAllFlat();
					$data['allFlat']=$this->flatModel->getFlatImageFromOwner();
					$this->parser->parse('houseownerview/view_upload',$data);
		            
		        }
		        else
		        {
		        	$uploadData = $this->upload->data();
		        	

		        	$dataInsert = array(
					        'flat_id' => $flatid['id'],
					        'image_name' => $uploadData['file_name']
					);

		            $this->session->set_flashdata('upload_message', 'File Uploaded Successfully' );
		            $this->load->model('flatModel');

		            $this->flatModel->insertImageInfo($dataInsert);
		            $data['myFlat']=$this->flatModel->getAllFlat();
					$data['allFlat']=$this->flatModel->getFlatImageFromOwner();
					$this->parser->parse('houseownerview/view_upload',$data);
		        }
                    

            }
		
		

		
          

        

        


		}
		
	
	}
}
