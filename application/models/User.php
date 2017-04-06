<?php
class User extends CI_Model{
    public function reg($data){
        //var_dump($data);
        $data['created_at'] = time();
        $data['password'] = md5($data['password']);
        $data['phone'] = '123123';
        unset($data['repass']);
        unset($data['mysubmit']);
        $this->db->trans_start();
        $this->db->insert('member', $data);
        $rst = $this->db->trans_complete();
        if($rst){
            return true;
        }else{
            return false;
        }

    }

    public function login($data){
        $username = $data['username'];
        $password = $data['password'];

        $password_fetched = '';
        $rst = $this -> db
            -> where('username',$username)
            ->where('password',md5($password))
            ->get('member');

        if($rst->num_rows > 0){
            
            return true;
        }else{
            return false;
        }
    }
    public function getUser($data){
        //var_dump($data);
        $rst = $this ->db
            ->where('username',$data)
            ->get('member');
        $rst = $rst -> result_array();
        $user = $rst[0];
        return $user;
    }
    public function getUserDetail($userid){
        $rst = $this -> db
            ->select("*")
            ->where('id='.$userid)
            ->get('member');
        $rst = $rst->result_array();
        return $rst[0];
    }
    public function changeUserDetail($data){
        var_dump($data);
        $rst = $this -> db
            ->update('member',$data,"id=".$data['id']);
        return $rst;
    }
    public function changeUserPass($data){
        //var_dump($data);
        $res = $this -> db
            ->select("*")
            ->where('id='.$data['id'])
            ->get('member');
        $res = $res -> result_array();
        $res = $res[0];
        //var_dump($res);
        $rst = ($res['password']==md5($data['oldpass']));
        if($rst){
            $result = $this -> db
                ->update('member',array('password'=>md5($data['newpass'])),'id='.$data['id']);
            if($result){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}