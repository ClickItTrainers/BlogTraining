s<?php

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Posts_model');
		$this->load->model('Comment_model');
		$this->load->model('getDB/Users_model');
		$this->load->helper(array('my_date', 'details'));
	}

	//Select the posts by category
	public function select_bycategory($category){
		$data['By_category'] = $this->Posts_model->get_post_category($category);
		$data['title'] = "Posts by category";
		$datestring = 'l, F d, o - h:i A';
		$time = mysqldatetime_to_timestamp($this->Posts_model->get_date());
		$data['category_arr'] = $this->Users_model->get_category();
		$data['page'] = 'by_category';
		$data['date'] = timestamp_to_date($time, $datestring);
		$this->load->view('templates/template', $data);
		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar', $data);
		// $this->load->view('templates/footer', $data);
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

		//$data['users_arr'] = $this->Posts_model->users_list();
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
	public function posts_details($url_post){
		$url_clean = $this->security->xss_clean($url_post);
		$data['details'] = $this->Posts_model->posts_details($url_clean);

		if ($data['details'] != null){
		$data['comentarios'] = $this->Posts_model->get_comments($data['details']->id_post);
		$data['username'] = $this->Users_model->get_username($data['details']->id_post);
		$data['category_arr'] = $this->Users_model->get_category();
		$data['title'] = $data['details']->title;
		$data['page'] = 'details';
		$datestring = 'l, F d, o - h:i A';
		$time = mysqldatetime_to_timestamp($this->Posts_model->get_date());
		$data['date'] = timestamp_to_date($time, $datestring);
		$times = mysqldatetime_to_timestamp($this->Comment_model->get_date());
		$data['dates'] = timestamp_to_date($times, $datestring);
		$this->load->view('templates/template', $data);
	}else{
		show_404();
	}
	}

	// It loads the newpost view
	public function new_post() {
		$data['title'] = "Create new post";
		$data['category_arr'] = $this->Users_model->get_category();
		$this->load->view('templates/header', $data);
		$this->load->view('newPost', $data);
		$this->load->view('templates/footer', $data);
	}

	public function update_post($past_url){

		$this->form_validation->set_rules('title', 'title', 'required|trim|min_length[10]|max_length[150]|htmlspecialchars|callback_characters_validation');
		$this->form_validation->set_rules('description', 'description', 'required|trim|min_length[10]|max_length[250]|htmlspecialchars');
		$this->form_validation->set_rules('content', 'content', 'required|trim|min_length[30]|htmlspecialchars');
		// Error messages
		$this->form_validation->set_message('required', '*Required field');
		$this->form_validation->set_message('min_length', '* The field %s must be at least %s characters');
		$this->form_validation->set_message('max_length', "* The field %s can't be more than %s characters");

		if($this->form_validation->run() == FALSE){
			$this->posts_details($past_url);
			/*echo json_encode(array('title' => form_error('title'),
			'description' => form_error('description'),
			'content' => form_error('content')));*/

		}else{

			//$url_post = $this->input->post('url_post');
			$title = $this->input->post('title');
			$desc = $this->input->post('description');
			$cont = $this->input->post('content');
			$url_post = url_details($this->input->post('title'));


			$update = $this->Posts_model->update_post($past_url,$url_post, $title, $desc, $cont);

			if($update){
				/*$url = base_url().'post/' . $url_post;
				echo json_encode(array('st' => 1,
				'msg' => "¡Post updated!",
				'url' => $url));*/
				$url = 'post/' . $url_post;
				echo "<script> alert('¡Post updated!');
				window.location.href='$url';
				</script>";
			}
		}
	}

	public function insert_post(){

		$this->form_validation->set_rules('title', 'title', 'required|trim|min_length[10]|max_length[150]|htmlspecialchars|callback_characters_validation');
		$this->form_validation->set_rules('description', 'description', 'required|trim|min_length[10]|max_length[250]|htmlspecialchars');
		$this->form_validation->set_rules('content', 'content', 'required|trim|min_length[30]');
		$this->form_validation->set_rules('category', 'category', 'required');
		// Error messages
		$this->form_validation->set_message('required', '*Required field');
		$this->form_validation->set_message('min_length', '* The field %s must be at least %s characters');
		$this->form_validation->set_message('max_length', "* The field %s can't be more than %s characters");

		if($this->form_validation->run() == FALSE){
			$this->new_post();
			/*echo json_encode(array(
				'title' => form_error('title'),
				'description' => form_error('description'),
				'category' => form_error('category'),
				'content' => form_error('content')
			));*/
		}else{


			$post = array(
				'id_user' => $this->Users_model->get_userID(),
				'id_category' => $this->input->post('category'),
				'url_post' => url_details($this->input->post('title', TRUE)),
				'title' =>$this->input->post('title'),
				'description' => $this->input->post('description'),
				'content' => $this->input->post('content'),
				'date' => date('Y-m-d H:i:s'));

				$insert = $this->Posts_model->insert('posts', $post);
				if($insert)
				{

					$url = base_url();
					echo "<script> alert ('Saved!');
					window.location.href = '$url';
					</script>";
				}else {
					$url = base_url();
					echo "<script> alert ('Sorry, we have problems!');
					window.location.href = '$url';
					</script>";
				}
			}

		}

		public function characters_validation($title)
		{
			if(preg_match('/[\W]{3}/', $title))
			{
				$this->form_validation->set_message('characters_validation','The {field} can not accept more especial characters');
				return FALSE;
			}else {
				return TRUE;
			}
		}

		public function delete_comments($id_comment)
		{
			$url_post = $this->input->post('url_post');
			$delete = $this->Posts_model->delete_comment($id_comment);

			if($delete)
			{
				$url = base_url().'post/' . $url_post;
				echo "<script> alert('¡Deleted!');
				window.location.href='$url';
				</script>";
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
