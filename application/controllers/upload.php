<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('upload_m');
        $this->load->helper(array('form','date','url'));
        $this->load->library('session');
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        $this->load->helper('alert');
    }

    public function index()
    {
        $this->upload_photo();
    }

    public function _remap($method)
    {
        $this->load->view('upload/header_view');

        if( method_exists($this,$method))
        {
            $this->{"{$method}"}();
        }

        $this->load->view('footer_v');
    }

    public function upload_photo()
    {
        if(@$this->session->userdata['logged_in'] == TRUE)
        {
            // 폼 검증 라이브러리 로드
            $this->load->library('form_validation');

            // 폼 검증할 필드와 규칙 사전 정의
            $this->form_validation->set_rules('subject','제목','required');
            $this->form_validation->set_rules('content','내용','required');

            if( $this->form_validation->run() == FALSE )
            {
                $this->load->view('upload/photo_v.php');
            }else {
                // upload 설정
                $config = array(
                    'upload' => 'uploads/',
                    'allowed_types' => 'gif|jpg|png',
                    'encrypt_name' => TRUE,
                    'max_size' => '1000'
                );

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()) {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('upload/photo_v', $data);
                } else {
                    $upload_data = $this->upload->data();
                    $upload_data['subject'] = $this->input->post('subject', true);
                    $Uupload_data['contents'] = $this->input->post('contents', true);
                    $upload_data['user_name'] = $this->session->userdata('username');

                    $result = $this->upload_m->insert_img($upload_data);

                    redirect('/upload/lists');
                    exit;
                }
            }
        }
        else{
            alert('로그인하지 않았습니다.!','/mbd/home');
            exit;
        }
    }

    public function lists()
    {

    }

}

?>