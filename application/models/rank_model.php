<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    /*
     * 공통 게시판 모델
     */
    class Rank_model extends CI_Model{
        function __construct()
        {
            parent::__construct();
        }

        /*
         * 랭킹 따오기
         */
        function rank_list()
        {
            $sql = "SELECT * FROM my_board ORDER BY hits DESC";
            $query = $this->db->query($sql);
            $result = $query->result();
            return $result;
        }
    }
?>