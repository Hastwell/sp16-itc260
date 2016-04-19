<?php
// News.php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        }

	public function index()
	{
		$data['news'] = $this->news_model->get_news();
		$data['page_id'] = 'News';
		$data['title'] = 'News archive';

		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');
	}


	public function view($slug = NULL)
	{
		$data['news_item'] = $this->news_model->get_news($slug);
		$data['page_id'] = 'News';
		$data['title'] = $data['news_item']['title'];

		if (empty($data['news_item']))
		{
		        show_404();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');
	}
}