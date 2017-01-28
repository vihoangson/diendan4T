<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH."libraries/REST_Controller.php";

class Diendan extends CI_Controller {
	public function index()
	{
        $this->load->model("Diendan_model");
        $data = ($this->Diendan_model->get_forum());
        $this->load->vars(["data"=>$data]);
		$this->load->view('welcome_message');
	}
}
