<?php


class Users extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->model("Uni_model");
        //$this->load->model("User_model");
        //$this->load->model("Security_model");
        $this->load->model('User');
        $this->load->model('UserMod');
        $this->load->model('Cate');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->database();
    }

    public function UserList(){
        if($this->session->admin_userid){
            $rst = $this -> UserMod ->getUserList();
            //var_dump($rst);
            $data['user_list'] = $rst;
            $this->load->view('admin/adminlayout');
            $this->load -> view('Users/userlist',$data);
            $this->load->view('admin/adminlayoutfooter');
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }
    }
    public function DelUser(){
        if($this->session->admin_userid){
            $rst = $this->UserMod->Del($this->input->get("userid"));
            if($rst){
                $this->session->set_flashdata('change_info', '删除成功');
                redirect(base_url()."index.php?c=Users&m=UserList");
            }else{
                $this->session->set_flashdata('change_info', '删除失败');
                redirect(base_url()."index.php?c=Users&m=UserList");
            }
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }
    }

}