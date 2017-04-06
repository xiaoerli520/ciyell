<?php
class Category extends CI_Controller
{

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

    public function addTopCategory(){
        if($this -> session -> admin_userid){
            if($this->input->post()){
               // var_dump($this->input->post());
                $this->form_validation->set_rules('cat_name', 'Cat_name', 'required');
                if ($this->form_validation->run() == FALSE){
                    $this->session->set_flashdata('cate_addsuc', '分类名字不能为空');
                    redirect(base_url()."index.php?c=Category&m=addTopCategory");
                }else{
                    $data = $this -> input ->post();
                    $rst = $this -> Cate ->addTop($data);
                    if($rst){
                        $this->session->set_flashdata('cate_addsuc', '头部分类添加成功');
                        redirect(base_url()."index.php?c=Category&m=addTopCategory");
                    }else{
                        $this->session->set_flashdata('cate_addsuc', '头部分类添加失败');
                        redirect(base_url()."index.php?c=Category&m=addTopCategory");
                    }
                }

            }else{
                $res = $this ->Cate-> getTopList();
                $data['toplist'] = $res;
                $this->load->view('admin/adminlayout');
                $this->load -> view('category/addtop',$data);
                $this->load->view('admin/adminlayoutfooter');
            }
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }
    }



    public function addMiddleCategory(){
        if($this -> session -> admin_userid){
            if($this->input->post()){
                $this->session->set_flashdata('cate_addsuc', '分类名字不能为空');
                if ($this->form_validation->run() == FALSE){
                    $this->session->set_flashdata('cate_addsuc', '分类名字不能为空');
                    redirect(base_url()."index.php?c=Category&m=addMiddleCategory");
                }else{
                    $rst = $this -> Cate ->addMid($this->input->post());
                    if($rst){
                        $this->session->set_flashdata('cate_addsuc', '中部分类添加成功');
                        redirect(base_url()."index.php?c=Category&m=addMiddleCategory");
                    }else{
                        $this->session->set_flashdata('cate_addsuc', '中部分类添加失败');
                        redirect(base_url()."index.php?c=Category&m=addMiddleCategory");
                    }
                }
                $rst = $this -> Cate ->addMid($this->input->post());
                if($rst){
                    $this->session->set_flashdata('cate_addsuc', '中部分类添加成功');
                    redirect(base_url()."index.php?c=Category&m=addMiddleCategory");
                }else{
                    $this->session->set_flashdata('cate_addsuc', '中部分类添加失败');
                    redirect(base_url()."index.php?c=Category&m=addMiddleCategory");
                }
            }else{
                $this->load->view('admin/adminlayout');
                $this->load -> view('category/addmid');
                $this->load->view('admin/adminlayoutfooter');
            }
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }
    }
    public function catList(){
        if($this->session->admin_userid){
            $cat_data_p = $this->Cate->getCateList(0);
            $data['catlist_p'] = $cat_data_p;
            $cat_data_s = $this ->Cate->getCateList(1);
            $data['catlist_s'] = $cat_data_s;
            $this->load->view('admin/adminlayout');
            $this->load->view('category/list',$data);
            $this->load->view('admin/adminlayoutfooter');
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }
    }

    public function changeCate()
    {

        if($this->session->admin_userid){
            if($this->input->get("cateid") || $this -> input -> post("id")){
                if($this->input->post()){
                    $data = $this -> input -> post();
                    $res = $this -> Cate -> changeCate($data);
                    if($res){
                        $this->session->set_flashdata('cate_chasuc', '分类修改成功');
                        redirect(base_url()."index.php?c=Category&m=catList");
                    }else{
                        $this->session->set_flashdata('cate_chasuc', '分类修改失败');
                        redirect(base_url()."index.php?c=Category&m=catList");
                    }
                }else{
                    $data['cateid'] = $this->input->get("cateid");
                    $this->load->view('admin/adminlayout');
                    $this -> load -> view('category/change',$data);
                    $this->load->view('admin/adminlayoutfooter');
                }
            }else{
                $this->session->set_flashdata('signup_success', '请重新登录');
                redirect(base_url()."index.php?c=Member&m=login");
            }
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }

    }
    public function delCate(){
        if($this->session->admin_userid){
            if($this->input->get("cateid")){
                $rst = $this->Cate->delCate($this->input->get("cateid"));
                if($rst){
                    $this->session->set_flashdata('cate_chasuc', '分类删除成功');
                    redirect(base_url()."index.php?c=Category&m=catList");
                }else{
                    $this->session->set_flashdata('cate_chasuc', '分类删除失败');
                    redirect(base_url()."index.php?c=Category&m=catList");
                }

            }else{
                $this->session->set_flashdata('cate_chasuc', '非法操作');
                redirect(base_url()."index.php?c=Category&m=catList");
            }
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }
    }
}