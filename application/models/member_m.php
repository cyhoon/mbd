<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Member_m extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }

        // 아이디 중복 검사 메서드
        function verif($verif)
        {
            // 아이디 조회로써 중복된 아이디 확인.
            $sql = "SELECT username FROM users WHERE username='".$verif['userid']."'";
            $query=$this->db->query($sql);

            if($query->num_rows()>0)
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }

        // 회원 정보 등록.
        function register($auth)
        {
            // 아이디 등록 쿼리 작성
//            $sql = "INSERT INTO users VALUES ('".$auth['userid']."', '".$auth['password']."', '".$auth['username']."', '".$auth['gender']."' ,'".$auth['group']."', ".$auth['identi'].")";
          //  $sql = "INSERT INTO users (username, password, name, gender, group, identi) VALUES ('".$auth['userid']."', '".$auth['password']."', '".$auth['username']."', '".$auth['gender']."' ,'".$auth['group']."', ".$auth['identi'].")";
            $sql = "INSERT INTO users (username, password, `name`, gender, `group`, identi) VALUES ('".$auth['userid']."', '".$auth['password']."', '".$auth['username']."', '".$auth['gender']."' ,'".$auth['group']."', ".$auth['identi'].")";
//
//            $result = $this->db->insert(users2,$auth);
            $query=$this->db->query($sql);
//            $result= $query->result();

            return $query;
        }


    }
?>