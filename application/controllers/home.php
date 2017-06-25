<?php if(!defined('BASEPATH')) exit('No direct Script access allowed');

    class Home extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            // home 모델을 만들어서 데이터 정보 뽑아오자
            $this->load->database();
            $this->load->model('home_m');
        }

        function index()
        {
            $this->lists();
        }

//        public function _remap($method)
//        {
//            // 헤더 include
//            $this->load->view('home/inc/header_view');
//            if( method_exists($this,$method))
//            {
//                $this->{"{$method}"}();
//            }
//            $this->load->view('footer_v');
//        }

        function lists()
        {
            // 다시정의
            $username = $this->session->userdata('username');
            $data['users_info'] = $this->home_m->users_info($username);
            $data['night_info'] = $this->home_m->night_info($username);
            if(@$data['night_info']->req_state!='yes'){
                @$data['night_info']->req_state='no';
            }
//            print_r($data);
//            exit;

            $this->load->view('home/home_v',$data);
        }
    }
?>