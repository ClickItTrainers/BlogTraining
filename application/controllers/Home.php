<?php

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Posts_model');
		$this->load->model('getDB/Users_model');
	}

	// It loads the Home page view
	public function index(){
		$data['title'] = "Three Musketeers Blog";
		$data['posts_arr'] = $this->Posts_model->posts_list();
		$data['users_arr'] = $this->Posts_model->users_list();
		$data['category_arr'] = $this->Users_model->get_category();
		$data['page'] = 'home';
		$this->load->view('templates/template', $data);
	}

	//Loads the Home page view
	public function admin_index(){
		$data['title'] = "Three Musketeers Blog";
		$data['page'] = 'admin/home';
		$this->load->view('admin/templates/template', $data);
	}

	public function admin_profile(){
		$data['title'] = "Three Musketeers Blog";
		$data['page'] = 'admin/my_profile';
		$this->load->view('admin/templates/template', $data);
	}

	// Shows the details of one post by ID
	public function posts_details($id_post){
		$id_clean = $this->security->xss_clean($id_post);
		$data['comentarios'] = $this->Posts_model->get_comments($id_clean);
		$data['username'] = $this->Users_model->get_username($id_clean);
		$data['details'] = $this->Posts_model->posts_details($id_clean);
		$data['category_arr'] = $this->Users_model->get_category();
		$data['title'] = $data['details']->title;
		$data['page'] = 'details';
		$this->load->view('templates/template', $data);
	}

	// It loads the newpost view
	public function new_post() {
		$data['title'] = "Create new post";
		$this->load->view('templates/header', $data);
		$this->load->view('newPost', $data);
		$this->load->view('templates/footer', $data);
	}

	public function insert_post(){

		$this->form_validation->set_rules('title', 'title', 'required|trim|min_length[1]|max_length[70]');
		$this->form_validation->set_rules('description', 'description', 'required|trim|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('content', 'content', 'required|trim|min_length[1]|max_length[255]');
		// Error messages
		$this->form_validation->set_message('required', '*Required field');
		$this->form_validation->set_message('min_length', '*The field %s must be at least %s characters');
		$this->form_validation->set_message('max_length', '*The field %s cant be more than %s characters');

		if($this->form_validation->run() == FALSE){
			$this->new_post();

		}else{


			$post = array(
				'id_user' => $this->Users_model->get_userID(),
				'id_category' => $this->input->post('category'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'content' => $this->input->post('content'),
				'date' => date('Y-m-d H:i:s'));

				$this->Posts_model->insert('post', $post);
				redirect(base_url());
			}

		}

		//test
		public function getcomments($id_user) {
			var_dump($this->Posts_model->get_comments($id_user));
		}
	}
