<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->model("Uni_model");
		//$this->load->model("User_model");
		//$this->load->model("Security_model");
		$this->load->model('User');
		$this->load->model('Cate');
		$this->load->model('ArticleMod');
		$this->load->helper('form');
		$this -> load -> library('session');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->database();
	}


	public function index()
	{
		$cat_data_p = $this->Cate->getCateListIndexUp(0,0);
		$data['catlist_p'] = $cat_data_p;
		$cat_data_s = $this ->Cate->getCateListIndexUp(1,0);
		$data['catlist_s'] = $cat_data_s;
		$cat_data_m = $this ->Cate->getCateListIndexUp(0,1);
		$data['catlist_m'] = $cat_data_m;
		$article_list = $this -> ArticleMod -> getList(0);
		$data['article_list'] = $article_list;


		//var_dump($data['article_list']);
		$this->load->view('indexlayout',$data);
		$this->load->view('index',$data);
		$this->load->view('indexlayoutfooter');
	}
}
