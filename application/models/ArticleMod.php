<?php
class ArticleMod extends CI_Model{
    public function getList($userid){//使用链表查询
        $rst = $this->db
            ->select("*")
            ->from("article")
            ->join('category','article.cateid=category.id')
            ->get();
        if($rst->num_rows<1){
            return false;
        }else{
            $rst = $rst -> result_array();
            return $rst;
        }
    }
    public function addArticle($data){

        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        $data['userid'] = $this -> session -> admin_userid;
        $rst = $this -> db -> insert('article',$data);
        return $rst;


    }
    public function getDetail($articleid){
        $rst = $this->db
            ->select("*")
            ->from('article')
            ->where("article.aid",$articleid)
            ->join('category','article.cateid=category.id')
            ->get();
        if($rst->num_rows<1){
            return false;
        }else{
            $rst = $rst -> result_array();
            $rst = $rst[0];
            if($rst['catlevel']==0){
                return $rst;
            }else{
                $cat_p = $this->db
                    ->select("*")
                    ->where("id",$rst['catpid'])
                    ->get('category');
                $cat_p = $cat_p->result_array();
                $cat_p = $cat_p[0];
                //var_dump($cat_p);
                $rst["cat_p_name"] = $cat_p['catname'];
                return $rst;
            }

        }
    }
    public function delArticle($articleid){
        $rst = $this -> db
            ->where('aid',$articleid)
            ->delete('article');
        return $rst;
    }
    public function changeArticle($data){
        $data['updated_at'] = date("Y-m-d H:i:s");
        $data['aid'] = $data['articleid'];
        unset($data['articleid']);
        $rst = $this -> db
            ->where('aid',$data['aid'])
            ->update('article',$data);
        return $rst;
    }
    public function GetArticleByCate($cateid,$catelev){

        if($catelev==1){
            $rst = $this -> db
                ->select("*")
                ->where('cateid',$cateid)
                ->get('article')
                ->result_array();
            return $rst;
        }else if($catelev==0){
            $rst = array();
            //顶级分类查询所有子分类的信息
            $cat_sid = $this -> db
                ->select("*")
                ->where('catpid',$cateid)
                ->get('category')
                ->result_array();
            foreach ($cat_sid as $item){

                $temp = $this -> db
                    ->select("*")
                    ->where('cateid',$item['id'])
                    ->get('article')
                    ->result_array();
                $rst = array_merge($rst,$temp);
            }
            return $rst;
        }else{
            return false;
        }

    }
    public function getArticleCateName($cateid){
        $rst = $this -> db
            ->select("*")
            ->where('id',$cateid)
            ->get('category')
            ->result_array();
        $catname = $rst[0]['catname'];
        return $catname;
    }
}