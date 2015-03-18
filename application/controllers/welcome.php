<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * The admin class is basically the Bsnt Ftth customer controller 
 *
 * @author      shiva manhar
 * @copyright   Copyright (c) 2015, orbitplus.org
 * @description Welcome
 */


class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url','file'));
		$this->load->database();
		$this->load->model('basedb');
		$this->load->library('grocery_CRUD');
		$this->load->library("pagination");
		$this->load->library("form_validation");
		/*$year = $this->basedb->get_year('year');		
				
						$data = array(
							      'year'=>date('Y')
							      );
						if($this->basedb->find_data('year','year', date('Y')))
						{
						$this->basedb->record_update('year', $data, date('Y'));
						}*/
					
	}
	public function index()
	{
		$data['year'] = $this->basedb->get_year('year');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('search_page', $data);		
		$this->load->view('footer');
	}
	// Admin section
	public function admin()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->admin_home();
			//redirect(base_url(),'welcome/admin_home');
		}
		else
		{
			$this->admin_login_page();
		}
	}
	public function admin_home()
	{
		
		if($this->session->userdata('is_logged_in'))
		{
			$this->admin_page_with_data();
		}
		else
		{
			redirect(base_url().'welcome/index');
		}
	}
	private function admin_page_with_data($data = null)
	{
			$this->load->view('admin_header');
			$this->load->view('admin_menu');
			$data['msc_subject']= $this->basedb->getdata('course_id',1,'msc_subject');
			$data['phd_subject']= $this->basedb->getdata('course_id',2,'msc_subject');
			$data['year'] = $this->basedb->get_year('year');
			$this->load->view('admin_home', $data);
			$this->load->view('footer');
	}
	public function login()
	{
		if($this->session->userdata('is_logged_in'))
		{
			header('Location:admin_home');
		}
		$this->form_validation->set_rules("userid", "Email ID","trim|required|xss_clean|callback_user_validation" );
		$this->form_validation->set_rules("pass", "Password" , "trim|required|xss_clean|md5");
		if($this->form_validation->run() == false)
		{
			$this->index();
		}
		else
		{
			$data = array(
				'userid' => $this->input->post('userid'),
				'is_logged_in' => 1
				      );
			$this->session->set_userdata($data);
			$this->admin_home();
		}
	}
	public function user_validation()
	{
		if($this->basedb->can_login())
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('user_validation', 'Incurrect Username/ Password!');
			return false;
		}
	}
	public function user_check()
	{
		if($this->basedb->user_check())
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('user_check', 'User name already register!');
			return false;
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'welcome/index');
	}
	
	public function upload()
	{
		if($this->session->userdata('is_logged_in'))
		{
			//$data['msc_subject']= $this->basedb->getdata('msc_subject');
			//$data['phd_subject']= $this->basedb->getdata('phd_subject');			
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|pdf|xls|dotx|doc|docx';
			$config['max_size']	= '10000000024';
			//$config['file_name'] = "hello";			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->form_validation->set_rules('course', 'course', 'required|trim|xss_clean');
			$this->form_validation->set_rules('name','name', 'required|trim|xss_clean|strip_tags'); 
			$this->form_validation->set_rules('project_title','project title', 'required|trim|xss_clean|strip_tags');
			
			$this->form_validation->set_rules('chairman','chairman', 'required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('members','members', 'required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('keywords','keywords', 'required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('accession_no','Accession No.', 'required|trim|xss_clean|strip_tags|max_length[10]|callback_check_accession');
			$this->form_validation->set_rules('class_no','Class No.', 'required|trim|xss_clean|strip_tags|max_length[10]');
			$this->form_validation->set_rules('subject','subject', 'required|trim|xss_clean');
			$this->form_validation->set_rules('year','year', 'required|trim|xss_clean');
			if (!$this->upload->do_upload()|| $this->form_validation->run() == false)
			{
				$data['error'] =  $this->upload->display_errors();
				$this->admin_page_with_data($data);
				//$this->load->view('admin_header');
				//$this->load->view('admin_menu');				
				//$this->load->view('admin_home', $data);
				//$this->load->view('footer');
			}
			else
			{
				
				$data1 = $this->upload->data();
				$data['success'] ="Your file was successfully uploaded!";
				/*$this->load->view('admin_header');
				$this->load->view('admin_menu');				
				$this->load->view('admin_home', $data);
				$this->load->view('footer');*/
				
				if($this->input->post('year') != null)
				{
					$year_id= (int)$this->input->post('year');
					$this->upload_old_data($data);
				}
				else
				{
					$year = $this->basedb->get_year('year');
					foreach($year as $val)
					{
						if(date('Y')==$val->year)
						{
							$year_id= $val->id;
						}
					}
					$this->admin_page_with_data($data);
				}
				$record_data = array(
								     'name' => $_POST['name'],
								     'title' => $_POST['project_title'],						     
								     'path' => "upload/".$data1['file_name'],
								     
								     'chairman' => $_POST['chairman'],
								     'members' => $_POST['members'],
								     'keywords' => $_POST['keywords'],
								     'accession_no' => $_POST['accession_no'],
								     'class_no' => $_POST['class_no'],
								     'abstract' => $_POST['abstract'],
								     'year'=> $year_id,
								     'course_id' => $this->input->post('course'),
								     'subject_code' => $this->input->post('subject'),
								     );
				$this->basedb->record_upload("record", $record_data); 
				
			}
		}
		else
		{
			$this->index();
		}
		
	}
	public function check_accession()
	{
		if($this->basedb->check_unique('record', 'accession_no', $this->input->post('accession_no')))
		{
			return true;
			
		}
		else
		{
			$this->form_validation->set_message('check_accession', 'Accession No already exist!');
			return false;
		}
	}
	
	public function upload_old_data($data = null)
	{
		if($this->session->userdata('is_logged_in') == 1)
		{
			$this->load->view('admin_header');
			$this->load->view('admin_menu');
			$data['msc_subject']= $this->basedb->getdata('course_id',1,'msc_subject');
			$data['phd_subject']= $this->basedb->getdata('course_id',2,'msc_subject');
			$data['year'] = $this->basedb->get_year('year');
			$this->load->view('upload_old_data', $data);
			$this->load->view('footer');
		}
		else
		{
			$this->admin_login_page();
		}
	}
	private function admin_login_page()
	{
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('admin_login');
		$this->load->view('footer');
	}
	public function msc_page()
	{
		$data['msc_subject']= $this->basedb->getdata('course_id',1,'msc_subject');
		$this->load->view('msc_page', $data);
	}
	public function phd_page()
	{
		
			$data['phd_subject']= $this->basedb->getdata('course_id',2,'msc_subject');
		$this->load->view('phd_page', $data);
	}
	
	public function search_by_all()
	{
		if(isset($_POST['data']) && isset ($_POST['course_id']) && isset($_POST['year']))
		{		
			$query = $this->basedb->search_data_by_year((int)$_POST['course_id'], (int)$_POST['data'], (int)$_POST['year']);
			if($query == NULL)
			{
				echo "<div id='search_data_body'>";
				echo "<p>Your search  did not match any documents.</P>";
				echo "</div";
			}
			foreach($query as $val)
			{
				?>
					<div id="search_data_body">
					<?php
					echo "<p> <b> Name: </b>".strtoupper($val->name)."</p>";				       
					echo "<p> <b> Title: </b>".strtoupper($val->title)."</p>";
					echo "<p> <b> Degree: </b>".$val->course_name."<b> Subject: </b>".$val->subject_name."</p>";
					echo "<p> <b> Chairman: </b>".strtoupper($val->chairman)."<b> Members: </b>".strtoupper($val->members)."</p>";
					echo "<p> <b> Accession No.: </b>".$val->accession_no."<b> Class No.: </b>".$val->class_no."<b> Year: </b>".$val->year."</p>"; 			      
					echo "<p> <b> Download/View: </b><a href =",base_url().$val->path." target ='blank'>Click here</a> </p>";            
					?>
					</div>
					<?php
			}
			
		}
	}
	public function search()
	{
		
		$this->load->view('header');
		$this->load->view('menu');		
		
		/*if(!empty($this->input->post('search_key')))
		{
		$data = array(
			      'search_key' => trim(strip_tags($this->input->post('search_key')))		      
			      );
		$this->session->set_userdata($data);
		}*/
		$config['base_url'] = base_url().'welcome/search';
		$config['total_rows'] = $this->basedb->search_total($this->session->userdata('search_key'), $this->session->userdata('search_key'));
		$config['per_page'] = 10;
		$uri =  $this->uri->segment_array(3);
		if(empty($uri[3]))
		{
			$uri[3] = 0;
		}
		if(($this->input->post('course') != NULL) && ($this->input->post('subject') != NULL))
		{
			$data['result'] = $this->basedb->search($this->input->post('course'), $this->input->post('subject'), $this->session->userdata('search_key'), $this->session->userdata('search_key'), $config['per_page'] , $uri[3]);	
		}
		else
		{
			$data['result'] = $this->basedb->search($class=NULL, $subject =NULL, $this->session->userdata('search_key'), $this->session->userdata('search_key'), $config['per_page'] , $uri[3]);
		}
		$this->pagination->initialize($config);
		$data['link'] = $this->pagination->create_links();
		$data['year'] = $this->basedb->get_year('year');
		$this->load->view('search_page', $data);		
		$this->load->view('footer');		
		
	}
	public function accession_data()
	{
		$this->form_validation->set_rules("accession_no", "Accession No." , "trim|required|xss_clean|strip_tags");
		if($this->form_validation->run() == true)
		{
		$this->load->view('header');
		$this->load->view('menu');
		$data['result'] = $this->basedb->get_data('record', 'accession_no', $this->input->post('accession_no'));
		$data['year'] = $this->basedb->get_year('year');
		$this->load->view('search_page', $data);		
		$this->load->view('footer');
		}
		else
		{
			$this->index();
		}
	}
	
	public function all_data_edit()	
	{
		if($this->session->userdata('is_logged_in') == 1)
		{
			$this->load->view('admin_header');
			$this->load->view('admin_menu');
			$data['msc_subject']= $this->basedb->getdata('course_id',1,'msc_subject');
			$data['phd_subject']= $this->basedb->getdata('course_id',2,'msc_subject');
			$data['year'] = $this->basedb->get_year('year');
			
			$this->grocery_crud->set_table('record');
			//$this->grocery_crud->set_relation('id', 'year' ,'year');
			//$this->grocery_crud->set_relation_n_n('id', 'msc_subject' ,'record','subject_code');
			$output = $this->grocery_crud->render();
			$this->load->view( 'all_data', $output);
			$this->load->view('footer');
		}
		else
		{
			$this->index();
		}
	}
	
}

