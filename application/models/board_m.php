<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Board_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_list($table, $type='', $offset=' ',$limit=' ')
    {

        $limit_query=' ';

        if($limit!=' ' OR $offset !=' ')
        {
            // 페이징이 있을 경우의 처리
            $limit_query = ' LIMIT '.$offset.', '.$limit;

        }
        $sql = "SELECT * FROM ".$table." ORDER BY board_id DESC".$limit_query;

        $query = $this->db->query($sql);

        if( $type == 'count' )
        {
            // 리스트를 반환하는 것이 아니라 전체 게시물의 개수를 반환
            $result = $query->num_rows();

        }
        else{
            // 게시물 리스트 반환
            $result = $query->result();
        }

        return $result;
    }

    function get_view($table,$id)
    {
        // 조회수 증가
        $sql0 = "UPDATE ".$table." SET hits=hits+1 WHERE board_id='".$id."'";
        $this->db->query($sql0);

        $sql = "SELECT * FROM ".$table." WHERE board_id='".$id."'";
        $query = $this->db->query($sql);

        $result = $query->row();
        return $result;
    }

    function write_m($table,$query_list)
    {
        $user_id = $query_list[0];
        $subject = $query_list[1];
        $contents = $query_list[2];

        // 테이블에서 이름을 뽑아내기위한 작업.
        // 왜 뽑아내냐고? 테이블에다가 사용자 진짜 이름까지 넣을려고 뽑아옴.ㅇㅇㅇ
        $sql0 = "SELECT name FROM users WHERE username='".$user_id."'";
        $query = $this->db->query($sql0);

        $query = $query->row(); // 레코드를 뽑아옴.

        $user_name = $query->name;


        $sql = "INSERT INTO ".$table." ( user_id , user_name , subject , contents ) VALUES ('".$user_id."','".$user_name."','".$subject."','".$contents."')";
        $result = $this->db->query($sql);
        return $result;
    }

    // 게시물 아이디 체크
    function write_check($board_id)
    {
        $sql = "SELECT user_id FROM my_board WHERE board_id = '".$board_id."'";
        $query = $this->db->query($sql);
        $result = $query->row();

        return $result;
    }

    function write_view($board_id)
    {
        $sql = "SELECT subject, contents  FROM my_board WHERE board_id = '".$board_id."'";
        $query = $this->db->query($sql);
        $result = $query->row();

        return $result;
    }

    function write_update($table,$query_list)
    {
        $board_id = $query_list[0];
        $subject = $query_list[1];
        $contents = $query_list[2];
//
//        $sql0 = "SELECT name FROM users WHERE username='".$u_id."'";
//        $query = $this->db->query($sql0);
//
//        $query = $query->row(); // 레코드를 뽑아옴.
//
//        $user_name = $query->name;

        // board_id 로 해야함.
        $sql = "UPDATE `".$table."` SET subject='".$subject."',contents='".$contents."' WHERE board_id = '".$board_id."' ";
        $result = $this->db->query($sql);

        return $result;

    }

    function delete_m($table,$board_id)
    {
        $sql = "DELETE FROM `".$table."` WHERE board_id = '".$board_id."' ";
        $query = $this->db->query($sql);
        return $query;
    }


}

?>