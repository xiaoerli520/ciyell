<?php



class Member extends  CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->model("Uni_model");
        //$this->load->model("User_model");
        //$this->load->model("Security_model");
        $this->load->model('User');
        $this->load->helper('form');
        $this -> load -> library('session');
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->database();
    }

    public function signup(){

        if($this->input->post()){

            $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[16]|is_unique[member.username]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[255]');
            $this->form_validation->set_rules('repass', 'Password Confirmation', 'required|min_length[6]|max_length[255]|matches[password]');

            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_userdata('signup_error', '表单填写有误或者用户名已经被注册，请重新填写信息！');
                redirect(base_url()."index.php?c=Member&m=signup");
            }
            else
            {
                $this -> session->unset_userdata('signup_error');
                $this -> User-> reg($this->input->post());
                $this->session->set_flashdata('signup_success', '注册成功！请使用之前的账户密码登录');
                redirect(base_url()."index.php?c=Member&m=login");
            }

        }else{
            $this -> load -> view('Member/signup');
            $this -> session->unset_userdata('signup_error');
        }

    }
    public function login(){
        if($this->input->post()){
                $data = $this->input->post();
                unset($data['mysubmit']);
                if($this -> User -> login($data)){
                    $this->session->set_userdata('admin_username',$data['username']);
                    $user = $this -> User -> getUser($this->session->admin_username);
                    $this->session->set_userdata('admin_username',$user['username']);
                    $this->session->set_userdata('admin_userid',$user['id']);
                    $this->session->set_userdata('admin_created_at',$user['created_at']);
                    $this->session->set_userdata('admin_name',$user['firstname'].$user['lastname']);
                    redirect(base_url()."index.php");
                }else{
                    $this->session->set_flashdata('signup_success', '登录失败，账号或者密码错误');
                    redirect(base_url()."index.php?c=Member&m=login");
                }
        }else{
            if(isset($this->session->admin_userid)){
                redirect(base_url()."index.php?c=Admin&m=Index");
            }
            $this -> load -> view('Member/login');
        }

    }

    public function logout(){
        $this -> session->unset_userdata('admin_username');
        $this->session->unset_userdata('admin_userid');
        $this->session->unset_userdata('admin_created_at');
        $this->session->unset_userdata('admin_name');
        redirect(base_url()."index.php");
    }
    public function checksess(){
        var_dump($this->session->signup_error);
    }
}