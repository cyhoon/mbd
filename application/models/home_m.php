<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Home_m extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }
//        아쉽게도 이거는 오류남 ㅠㅠㅠㅠㅠㅠㅠㅠㅠㅠㅠㅠ 왜냐고? 신청안한에들은 데이터가 없어서 가지고 올 수가 없음...ㅠㅠㅠ
//        function Info($username)
//        {
//            $sql = "SELECT name,`group`,identi,req_state FROM users INNER JOIN night ON users.user_id = night.user_id WHERE username='".$username."'";
////            $sql = "SELECT * FROM users WHERE username='".$username."'";
//            $result = $this->db->query($sql);
//            $result = $result->result();
//            return $result;
//        }

        function users_info($username)
        {
            $sql = "SELECT name,`group`,identi FROM users WHERE username='".$username."'";
            $query = $this->db->query($sql);
            $result=$query->row();
            return $result;
        }

        function night_info($username)
        {
//            $sql = "SELECT user_id FROM users WHERE username='".$username."'";
//            $result = $this->db->query($sql);
//            $result = $result->
//            $number = $result->user_id;

            $sql1 = "SELECT user_id FROM users WHERE username='".$username."'";
            $query = $this->db->query($sql1);
            $result1 = $query->row();
            @$number = $result1 -> user_id;

            $sql = "SELECT req_state FROM night WHERE user_id='".$number."' AND req_date>=curdate()";
            $result = $this->db->query($sql);
            $result = $result->row();
            if($result){
                return $result;
            }else{
                return FALSE;
            }


        }
    }
?>