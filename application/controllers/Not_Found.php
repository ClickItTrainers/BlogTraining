<?php

class Not_Found extends CI_Controller
{
  public function index()
  {
  	$data['title']="Error 404 Not Found";
    $data['page'] = '404_view';
    $this->load->view('templates/template_404', $data);
  }
}
