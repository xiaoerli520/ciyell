<?php
class Admin extends CI_Controller{
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




    public function Index(){
        if($this->session->admin_username){
            $user = $this -> User -> getUser($this->session->admin_username);
            $this->session->set_userdata('admin_username',$user['username']);
            $this->session->set_userdata('admin_userid',$user['id']);
            $this->session->set_userdata('admin_created_at',$user['created_at']);
            $this->session->set_userdata('admin_name',$user['firstname'].$user['lastname']);
            $this->load->view('admin/adminlayout');
            $this->load->view('admin/index');
            $this->load->view('admin/adminlayoutfooter');
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }
    }
    public function userDetail(){
        if($this->session->admin_userid){
            $data['userdetail'] = $this -> User -> getUserDetail($this->session->admin_userid);
            $this->load->view('admin/adminlayout');
            $this -> load -> view('admin/info',$data);
            $this->load->view('admin/adminlayoutfooter');
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }
    }
    public function Menberinfo(){
        if($this -> input -> post()){
            //var_dump($this -> input -> post());
            $this->form_validation->set_rules('firstname', 'Firstname', 'required|min_length[1]|max_length[16]');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required|min_length[1]|max_length[255]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[11]|max_length[18]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[member.email]');
            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('change_info', '表单填写有误或Email已经被注册，请重新填写信息！');
                redirect(base_url()."index.php?c=Admin&m=Menberinfo");
            }
            else
            {
                $rst = $this -> User-> changeUserDetail($this->input->post());
                if($rst){
                    $this->session->set_flashdata('change_info', '更改信息成功！');
                    redirect(base_url()."index.php?c=Admin&m=Menberinfo");
                }else{
                    $this->session->set_flashdata('change_info', '更改信息失败！');
                    redirect(base_url()."index.php?c=Admin&m=Menberinfo");
                }
                //$this->session->set_flashdata('change_info', '更改信息成功！');
                //redirect(base_url()."index.php?c=Admin&m=Menberinfo");
            }
        }else{
            if($this->session->admin_userid){
                if($this->input->get("userid")){
                    $rst = $this -> User ->getUserDetail($this -> input -> get("userid"));
                    $data['userdetail'] = $rst;
                    $this->load->view('admin/adminlayout');
                    $this -> load -> view('admin/memberinfo',$data);
                    $this->load->view('admin/adminlayoutfooter');
                }else{
                    $this->session->set_flashdata('signup_success', '请重新登录');
                    redirect(base_url()."index.php?c=Member&m=login");
                }
            }else{
                $this->session->set_flashdata('signup_success', '请重新登录');
                redirect(base_url()."index.php?c=Member&m=login");
            }

        }

    }
    public function changePass(){
        if($this->input->post()){
            //var_dump($this->input->post());
            $this->form_validation->set_rules('oldpass', 'Oldpass', 'required|min_length[6]|max_length[16]');
            $this->form_validation->set_rules('newpass', 'Newpass', 'required|min_length[6]|max_length[16]');
            $this->form_validation->set_rules('repass', 'Repass', 'required|min_length[6]|max_length[16]|matches[newpass]');

            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('changepass_info', '表单填写有误，请重新填写信息！');
                redirect(base_url()."index.php?c=Admin&m=changePass");
            }
            else
            {
                $rst = $this -> User-> changeUserPass($this->input->post());
                if($rst){
                    $this->session->set_flashdata('changepass_info', '更改密码成功！');
                    redirect(base_url()."index.php?c=Admin&m=changePass");
                }else{
                    $this->session->set_flashdata('changepass_info', '更改密码失败！');
                    redirect(base_url()."index.php?c=Admin&m=changePass");
                }
            }

        }else{
            if($this->session->admin_userid){
                $data['userid'] = $this -> session-> admin_userid;
                $this->load->view('admin/adminlayout');
                $this -> load -> view('admin/changepass',$data);
                $this->load->view('admin/adminlayoutfooter');
            }else{
                $this->session->set_flashdata('signup_success', '请重新登录');
                redirect(base_url()."index.php?c=Member&m=login");
            }
        }
    }
}