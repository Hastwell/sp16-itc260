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
	
	public function create()
	{
	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    $data['title'] = 'Create a news item';
	    $data['page_id'] = 'News Create';

	    $this->form_validation->set_rules('title', 'Title', 'required');
	    $this->form_validation->set_rules('text', 'Text', 'required');

	    if ($this->form_validation->run() === FALSE)
	    { // no data submitted; show form
		$this->load->view('templates/header', $data);
		$this->load->view('news/create', $data);
		$this->load->view('templates/footer', $data);

	    }
	    else
	    { // data submitted; add the new article
		$news_dta = $this->news_model->set_news();
		// TODO fix this!
		$data['news_item'] = $this->news_model->get_news();
		
		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $news_dta);
		$this->load->view('templates/footer', $data);
	    }
	}
	
	
}
