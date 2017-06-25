<?php if(!defined('BASEPATH')) exit('No direct Script access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('member_m');
        $this->load->helper('form');
    }

    public function index()
    {
        $this->join();
    }

//    function _remap($method)
//    {
//        $this->load->view('');
//
//    }

    public function join()
    {
        $this->load->library('form_validation');
        $this->load->helper('alert');

//        <!--   아이디 : userid 비밀번호 : password 이름 : username , 성별 : gender , 학년::반 : group  번호 : identi  -->

        $this->form_validation->set_rules('userid', '아이디', 'required');
        $this->form_validation->set_rules('password', '비밀번호', 'required');
        $this->form_validation->set_rules('username', '이름', 'required');
        $this->form_validation->set_rules('gender', '성별을 선택해주세요', 'required');
        $this->form_validation->set_rules('group','그룹을 선택해주세요','required');
        $this->form_validation->set_rules('identi', '번호', 'required');

        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        if ($this->form_validation->run() == TRUE) {
            $auth_data = array(
                'userid' => $this->input->post('userid', TRUE),
                'password' => $this->input->post('password', TRUE),
                'username' => $this->input->post('username', TRUE),
                'gender' => $this->input->post('gender', TRUE),
                'group' => $this->input->post('group',TRUE),
                'identi' => $this->input->post('identi', TRUE)
            );

            // userid , password 를 따로 가지고 와서 중복된 아이디와 비밀번호가 있는지 검증함.
            $verif = array(
                'userid' => $this->input->post('userid', TRUE)
            );

            // 중복된 아이디와 비밀번호 검증을 위해 모델 이용.
            $result = $this->member_m->verif($verif);

            if ($result) {

                $data_result = $this->member_m->register($auth_data);

                if($data_result)
                {
                    alert('회원가입이 정상적으로 처리되었습니다. 로그인 해주세요:)) ^^* ','/mbd/auth');
                    exit;
                }
                else{
                    alert('회원가입이 정상적으로 처리되지 않았습니다.','/mbd/auth');
                    exit;
                }


            } else {
                alert('입력하신 아이디가 이미 사용 중입니다. 다른 아이디를 입력해 주세요.','/mbd/member');
                exit;
            }


        } else {
            $this->load->view('join/join_view');
        }
    }

}
?>