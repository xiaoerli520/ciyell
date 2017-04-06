<?php
/**
 * Created by PhpStorm.
 * User: GTX
 * Date: 2017/3/30
 * Time: 11:43
 */

class Cate extends CI_Model{
    public function getCateList($catlevel=0){
        $rst = $this-> db
            -> select("*")
            ->where("catlevel=".$catlevel)
            ->get('category');
        $rst = $rst->result_array();
        return $rst;
    }
    public function getTopList(){
        $rst = $this->db
            ->select("*")
            ->where("cat_pos=0 and catlevel=0")
            ->get('category');
        $rst = $rst ->result_array();
        return $rst;
    }
    public function addTop($data){
        $data['created_at'] = date("Y-m-d H:i:s");
        if($data['catpid']==0){
            $data['catlevel']= 0;
        }else{
            $data['catlevel'] = 1;
        }
        $data['cat_pos'] = 0;
        $data['catname'] = $data['cat_name'];
        unset($data['cat_name']);
        $rst = $this->db->insert('category',$data);
        if($rst){
            return true;
        }else{
            return false;
        }
    }
    public function addMid($data){
        //var_dump($data);
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['catlevel'] = 0;
        $data['cat_pos'] = 1;
        $data['catname'] = $data['cat_name'];
        unset($data['cat_name']);
        $rst = $this -> db -> insert('category',$data);
        return $rst;
    }
    public function changeCate($data){
        //var_dump($data);
        $rst = $this -> db -> update('category',array('catname'=>$data['cat_name']),"id=".$data['id']);
        return $rst;
    }
    public function getCateListIndexUp($catlevel=0,$cat_pos=0){
        $rst = $this-> db
            -> select("*")
            ->where("catlevel=".$catlevel)
            ->where("cat_pos=".$cat_pos)
            ->get('category');
        $rst = $rst->result_array();
        return $rst;
    }
    public function delCate($cateid){
        $rst = $this ->db
            ->where('id',$cateid)
            ->delete('category');
        $rst =  $this -> db
            ->where('cateid',$cateid)
            ->delete('article');
        return $rst;
    }
}