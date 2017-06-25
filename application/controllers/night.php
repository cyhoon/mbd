<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Night extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model('night_m');
        }

        function index()
        {
            $this->night_list();
        }

        // 신청자 리스트 보여주는 부분
        function night_list()
        {
            $this->load->helper('alert');
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

            $this->load->view('night/inc/header_list_view');
            $data['list'] = $this->night_m->lists();

            if(!$data['list']){ // 신청자가 아무도 없을때.
                $this->load->view('/night/list_no_view');
            }else {
                $this->load->view('/night/list_view', $data);
            }
            $this->load->view('footer_v');
        }
        // 신청
        function night_request()
        {
            $this->load->library('form_validation');
            $this->load->helper('alert');
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

            $this->load->view('night/inc/header_view');
            $this->load->view('night/request_view');
            $this->load->view('footer_v');
        }

        function request()
        {
            $this->load->helper('alert');

            if (@$this->session->userdata('logged_in') == TRUE) {

                $req_string = $this->input->post('night_study', TRUE);
                $req_string = "yes";
                if($req_string=="yes"){

                    $id = $this->session->userdata('username');

                    $result = $this->night_m->user_req($req_string,$id);

                    if($result){
                        alert("신청 완료!",'/mbd/night');
                        exit;
                    }else{
                        alert("이미 신청하셨습니다!",'/mbd/night/night_request');
                        exit;
                    }
                }else{
                    alert('신청 여부를 체크하세요 :)) ^^* ', '/mbd/night');
                    exit;
                }

            }

            else { // 비로그인 신청 방지
                alert('로그인부터 하시고 신청해 주세요 :)) ^^* ', '/mbd/auth');
                exit;
            }
        }

    }

?>