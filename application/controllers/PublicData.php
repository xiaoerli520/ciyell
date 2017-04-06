<?php
class PublicData extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->model("Uni_model");
        //$this->load->model("User_model");
        //$this->load->model("Security_model");
        $this->load->model('User');
        $this->load->model('Cate');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->database();
    }
    public function Calendar(){

        if($this->session->admin_userid){
            $this->load->view('admin/adminlayout');
            $this -> load -> view('Public/calendar');
            $this->load->view('admin/adminlayoutfooter');
        }
    }
}