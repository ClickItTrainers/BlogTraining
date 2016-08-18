<?php

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Posts_model');
		$this->load->model('Comment_model');
		$this->load->model('getDB/Users_model');
		$this->load->helper('my_date');
	}

	//Select the posts by category
	public function select_bycategory($id_category){
		$data['By_category'] = $this->Posts_model->get_post_category($id_category);
		$data['title'] = "Posts by category";
		$data['users_arr'] = $this->Posts_model->users_list();
		$datestring = 'l, F d, o - h:i A';
		$time = mysqldatetime_to_timestamp($this->Posts_model->get_date());
		$data['page'] = 'by_category';
		$data['date'] = timestamp_to_date($time, $datestring);
		$this->load->view('templates/template', $data);
	}

	// It loads the Home page view
	public function index($page=false){
		$this->output->enable_profiler(FALSE);
		$this->load->library('pagination');
		$init = 0;
		$limit = 3;
		if($page)
		{
			$init = ($page - 1) * $limit;
		}
		
		$config['base_url'] = base_url();
		$config['total_rows'] = count($this->Posts_model->posts_list());
		$config['per_page'] = $limit;
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);

		$data['users_arr'] = $this->Posts_model->users_list();
		$datestring = 'l, F d, o - h:i A';
		$time = mysqldatetime_to_timestamp($this->Posts_model->get_date());
		$data['date'] = timestamp_to_date($time, $datestring);
		$data['category_arr'] = $this->Users_model->get_category();


		
		if ($this->input->post('search')) {

			$q = $this->security->xss_clean($this->input->post('search'));
			$data['title'] = "Related Posts";
			$data['posts_arr'] = $this->Posts_model->search_posts($q);
			$data['page'] = 'home';

			if (empty($data['posts_arr'])) {
				$data['page'] = 'message';
			}

		}else{

			$data['page'] = 'home';
			$data['title'] = "Three Musketeers Blog";
			$data['posts_arr'] = $this->Posts_model->posts_list($init, $limit);

		}

		
		$this->load->view('templates/template', $data);

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
		$datestring = 'l, F d, o - h:i A';
		$time = mysqldatetime_to_timestamp($this->Posts_model->get_date());
		$data['date'] = timestamp_to_date($time, $datestring);
		$times = mysqldatetime_to_timestamp($this->Comment_model->get_date());
		$data['dates'] = timestamp_to_date($times, $datestring);
		$this->load->view('templates/template', $data);
	}

	// It loads the newpost view
	public function new_post() {
		$data['title'] = "Create new post";
		$data['category_arr'] = $this->Users_model->get_category();
		$this->load->view('templates/header', $data);
		$this->load->view('newPost', $data);
		$this->load->view('templates/footer', $data);
	}

	public function insert_post(){

		$this->form_validation->set_rules('title', 'title', 'required|trim|min_length[10]|max_length[150]|htmlspecialchars');
		$this->form_validation->set_rules('description', 'description', 'required|trim|min_length[10]|max_length[250]|htmlspecialchars');
		$this->form_validation->set_rules('content', 'content', 'required|trim|min_length[30]|htmlspecialchars');
		$this->form_validation->set_rules('category', 'category', 'required');
		// Error messages
		$this->form_validation->set_message('required', '*Required field');
		$this->form_validation->set_message('min_length', '* The field %s must be at least %s characters');
		$this->form_validation->set_message('max_length', "* The field %s can't be more than %s characters");

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

				$this->Posts_model->insert('posts', $post);
				redirect(base_url());
			}

		}

		public function delete_comments()
		{
			$id_comment = $this->input->post('id_comm');
			$id_post = $this->input->post('red');

			$delete = $this->Posts_model->delete_comment($id_comment);

			if($delete)
			{
				$this->posts_details($id_post);
			}
			else
			{
				echo "<script> alert('It can't posible to delete); </script>";
			}
		}

		//test
		public function getcomments($id_user) {
			var_dump($this->Posts_model->get_comments($id_user));
		}
	}
