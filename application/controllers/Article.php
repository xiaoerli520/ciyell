<?php
class Article extends CI_Controller{

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
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->database();
    }

    //只能看到 并且编辑自己的文章  前段显示全部文章
    public function Showlist(){
        if($this -> session -> admin_userid){
            $rst = $this -> ArticleMod -> getList($this -> session -> admin_userid);
            if($rst){
                $data['atricle_list'] = $rst;
                $this->load->view('admin/adminlayout');
                $this -> load -> view('article/list',$data);
                $this->load->view('admin/adminlayoutfooter');


            }else{
                $this->session->set_flashdata('article_list', '您没有添加文章，请重新添加文章');
                redirect(base_url()."index.php?c=Article&m=AddArticle");
            }
            //var_dump($rst);
            
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }
    }

    public function AddArticle()
    {

        if($this -> session ->admin_userid){
            if($this->input->post()){
                $this->form_validation->set_rules('title', 'Title', 'required');
                if ($this->form_validation->run() == FALSE){
                    $this->session->set_flashdata('article_addsuc', '文章题目不能为空');
                    redirect(base_url()."index.php?c=Article&m=AddArticle");
                }else{
                    $rst = $this -> ArticleMod -> addArticle($this->input->post());
                    if($rst){
                        $this->session->set_flashdata('article_addsuc', '文章添加成功');
                        redirect(base_url()."index.php?c=Article&m=AddArticle");
                    }else{
                        $this->session->set_flashdata('article_addsuc', '文章添加失败');
                        redirect(base_url()."index.php?c=Article&m=AddArticle");
                    }
                }
                //var_dump($this -> input -> post());
            }else{
                //不是所有全部取到，上部仅取二级分类
                $data['catelist_up_p'] = $this->Cate->getCateListIndexUp(0,0);
                $data['catelist_up_s'] = $this->Cate->getCateListIndexUp(1,0);
                $data['catelist_mid'] = $this->Cate->getCateListIndexUp(0,1);
                $this->load->view('admin/adminlayout');
                $this -> load -> view('article/add',$data);
                $this->load->view('admin/adminlayoutfooter');
            }
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }


    }

    public function showDetail(){
        //跳转到页面之中，不在admin中进行查看，所以不判断
        if($this->input->get("articleid")){
            $rst = $this->ArticleMod->getDetail($this->input->get("articleid"));
            if($rst){
                //获得顶部分类信息

                $cat_data_p = $this->Cate->getCateListIndexUp(0,0);
                $data['catlist_p'] = $cat_data_p;
                $cat_data_s = $this ->Cate->getCateListIndexUp(1,0);
                $data['catlist_s'] = $cat_data_s;

                //查询分类的位置，注意分类层级


                $data['content'] = $rst;

                $this->load->view('article/showdetail_layout',$data);
                $this -> load -> view('article/showdetail',$data);
                $this->load->view('article/showdetail_layout_down');
            }else{
                redirect(base_url()."index.php?c=Member&m=login");
            }
        }else{
            redirect(base_url()."index.php");
        }
    }
    public function DeleteArticle(){
        if($this -> session -> admin_userid){
            if($this->input->get("articleid")){
                $rst = $this -> ArticleMod -> delArticle($this->input->get("articleid"));
                if($rst){
                    $this->session->set_flashdata('article_list', '文章删除成功');
                    redirect(base_url()."index.php?c=Article&m=Showlist");
                }else{
                    $this->session->set_flashdata('article_list', '文章删除失败');
                    redirect(base_url()."index.php?c=Article&m=Showlist");
                }
            }else{
                $this->session->set_flashdata('article_list', '非法操作');
                redirect(base_url()."index.php?c=Article&m=Showlist");
            }
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }
    }
    public function EditArticle(){
        if($this->session->admin_userid){
            if($this->input->get("articleid")|| $this->input->post()){
                if($this->input->post()){
                    //var_dump($this->input->post());
                    $data = $this->input->post();
                    $rst = $this -> ArticleMod -> changeArticle($this->input->post());
                    if($rst){
                        $this->session->set_flashdata('article_list', '文章修改成功');
                        redirect(base_url()."index.php?c=Article&m=Showlist");
                    }else{
                        $this->session->set_flashdata('article_list', '文章修改失败');
                        redirect(base_url()."index.php?c=Article&m=Showlist");
                    }
                }else{
                    $data['catelist_up_p'] = $this->Cate->getCateListIndexUp(0,0);
                    $data['catelist_up_s'] = $this->Cate->getCateListIndexUp(1,0);
                    $data['catelist_mid'] = $this->Cate->getCateListIndexUp(0,1);


                    $rst = $this->ArticleMod->getDetail($this->input->get("articleid"));
                    $data['content'] = $rst;
                    $this->load->view('admin/adminlayout');
                    $this -> load -> view('article/edit',$data);
                    $this->load->view('admin/adminlayoutfooter');
                }
            }else{
                $this->session->set_flashdata('article_list', '非法操作');
                redirect(base_url()."index.php?c=Article&m=Showlist");
            }
        }else{
            $this->session->set_flashdata('signup_success', '请重新登录');
            redirect(base_url()."index.php?c=Member&m=login");
        }
    }
    public function CateArticleList(){
        if($this->input->get("cateid") || $this->input->get("catelev")){
            $rst = $this->ArticleMod->GetArticleByCate($this->input->get("cateid"),$this->input->get("catelev"));
            $cat_name = $this -> ArticleMod -> getArticleCateName($this->input->get("cateid"));
            $data['cate_name'] = $cat_name;
            if($rst){
                //var_dump($rst);
                $data['article_list'] = $rst;
                $cat_data_p = $this->Cate->getCateListIndexUp(0,0);
                $data['catlist_p'] = $cat_data_p;
                $cat_data_s = $this ->Cate->getCateListIndexUp(1,0);
                $data['catlist_s'] = $cat_data_s;
                $this->load->view('article/cated_list',$data);
                $this -> load -> view('article/showcatedlist',$data);
                $this->load->view('article/cated_list_foot');
            }else{
                redirect(base_url()."index.php");
            }
        }else{
            redirect(base_url()."index.php");
        }

    }
}