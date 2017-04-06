<?php
class UserMod extends CI_Model{
    public function getUserList(){
        $rst = $this -> db
            ->select("*")
            ->get('member')
            ->result_array();
        return $rst;
    }
    public function Del($userid){
        $rst = $this -> db
            ->where('id',$userid)
            ->delete('member');
        return $rst;
    }
}