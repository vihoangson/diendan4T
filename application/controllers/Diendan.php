<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diendan extends MY_Controller {
    /**
     * @url /diendan/index
     */
    public function index()
	{
        $this->load->model("Diendan_model");
        $data = ($this->Diendan_model->get_forum());
        $this->load->vars(["data"=>$data]);
		$this->load->view('homepage');
	}

    /**
     * @url /diendan/ajax_view_post
     */
    public function ajax_view_post()
    {
        $this->load->model("Diendan_model");
        $data = ($this->Diendan_model->get_forum());
        $this->load->vars(["data"=>$data]);
        $this->load->view('ajax_view_post');
    }

    /**
     * @param $forumid
     *
     * @url /diendan/cat/***
     */
    public function cat($forumid)
    {

        $this->load->model(["Forum_model","Thread_model"]);

        $data = $this->Thread_model->where(["forumid"=>$forumid])->get_all();
        $this->load->vars(["data"=>$data]);

        $forum_data = $this->Forum_model->get($forumid);
        $this->breadcrumbs->push($forum_data->title, '#');

        $this->load->view('cat');
    }

    /**
     * @param $forumid
     *
     * @url /diendan/detail/***
     */
    public function detail($threadid)
    {
        $this->load->helper("common");
        $this->load->model(["Forum_model","Thread_model","Post_model"]);

        $this->load->model("Diendan_model");

        $data_thread = $this->Thread_model->get($threadid);
        $data = $this->Post_model->where(["threadid"=>$threadid])->get_all();

        $forum_data = $this->Forum_model->get($data_thread->forumid);
        $this->breadcrumbs->push($forum_data->title, "/diendan/cat/".$forum_data->forumid);

        $this->load->vars(["data"=>$data]);
        $this->breadcrumbs->push($data[0]->title, '#');
        $this->load->view('detail');
    }

}
