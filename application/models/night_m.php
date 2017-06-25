<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Night_m extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }

        function user_req($str,$name)
        {

            // users 테이블의 primary key 인 id 를 가져오기 위한 검사
            $sql1 = "SELECT user_id FROM users WHERE username='".$name."'";
            $query = $this->db->query($sql1);
            $result1 = $query->row();
            $number = $result1 -> user_id;

            // 오늘 날짜의 등록된 테이블이 존재하면 FALSE ( 이거 수정 해야함. )
            $cur_date =  "SELECT * FROM night WHERE req_date >= current_date AND user_id='".$number."' ";
            $res_date = $this->db->query($cur_date);
            $res_date = $res_date->num_rows();
            if($res_date){
                return FALSE;
            }

            // 중복이 되어있는 테이블 검사
            $overlap = "SELECT * FROM night WHERE user_id='".$number."' AND req_state='".$str."'";
            $result2 = $this->db->query($overlap);
            $result2 = $result2->num_rows();
            // 중복되어 있는 테이블이 있다면 업데이트.
            if($result2){
//                $update_sql = "UPDATE night SET `req_date`=CURRENT_TIMESTAMP WHERE user_id='".$number."' ";
                $update_sql = "UPDATE `night` SET req_date=CURRENT_TIMESTAMP WHERE `night`.`user_id`=$number";
                $result = $this->db->query($update_sql);
                return $result;
            }else {
                // 중복되지 않아있으면 테이블의 데이터 등록
                $sql = "INSERT INTO night (user_id,req_state) VALUES ($number,'" . $str . "')";
                $result = $this->db->query($sql);
                return $result;
            }
        }

        function lists()
        {

//            $sql = "SELECT * FROM night WHERE req_date >= curdate()"; 이거는 niht 에 데이터만 가져오는거임.
            $sql = "SELECT name,gender,`group`,identi,req_state,req_date FROM users INNER JOIN night ON users.user_id = night.user_id WHERE night.req_date >= curdate()";
            $query = $this->db->query($sql);
            $data_null = $query->num_rows();
            // 아무 데이터가 없으면 FALSE 반환
            if(!$data_null) {
                return $data_null;
            }
            else {
                $result = $query->result();
                return $result;
            }
        }

    }

?>