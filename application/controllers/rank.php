<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 랭킹 순위 컨트롤러
 */
    class Rank extends CI_Controller {

        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model('rank_model');
            $this->load->helper(array('url','date'));
        }

        /*
         * 주소에서 메서드가 생략되었을 때 실행되는 기본 메서드
         */
        public function index()
        {
            $this->lists();
        }

        /*
         * 사이트 헤더, 푸터가 자동으로 추가됨.
         */
        public function _remap($method)
        {
            // 헤더 include
            $this->load->view('rank/inc/header_view');
            if( method_exists($this,$method))
            {
                $this->{"{$method}"}();
            }
            // 푸터 include
            $this->load->view('footer_v');
        }

        /*
         * 랭킹 불러오기
         */
        public function lists()
        {
            $data['list'] = $this->rank_model->rank_list();
            $this->load->view('rank/rank_view',$data);
        }
    }

?>