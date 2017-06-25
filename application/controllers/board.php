<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Board extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model('board_m');
            $this->load->helper(array('url','date'));
            $this->load->helper('form');
        }

//        주소에서 메서드가 생략되었을 때 실행되는 기본 메서드
        function index()
        {
            $this->lists();
        }

        public function _remap($method)
        {
            // 헤더 include
            $this->load->view('board/header_v');

            if( method_exists($this,$method))
            {
                $this->{"{$method}"}();
            }

            // 푸터 include
            $this->load->view('footer_v');
        }

        public function lists()
        {
            $this->load->library('pagination');

            $config['base_url'] = '/mbd/board/lists/my_board/page';
            $config['total_rows'] = $this->board_m->get_list('my_board','count');
            $config['per_page']=10; // 한 페이지에 표시한 게시물 수
            $config['uri_segment']=5; // 페이지 번호가 위치한 세그먼트
            /*
             * 내가 개빡쳐서 적는다 ㅠㅠㅠ
             * uri_segment 가 뭐냐면 5로 설정한게 urisegment 5를 페이지네이션 기준으로 잡겠다라는 의미임 ㅠㅠㅠ
             * ㅅㅂ 만약에 잘보셈
             * /mbd/board/lists/my_board/page/10 
             *  0 1 2 3 4 5 
             * 마지막 숫자가 10이잖아 이게 urisegment 로는 5임 ㅅㅂ 그래서 저거 5를 해줘야함 ㅠㅠㅠㅠㅠㅠㅠㅠㅠ 만약에 4로 하고싶으면 my_board 를 없에서 uri_segment가 정상적인 값을 가르키도록 하면 됨.
             */

            // 페이지 네이션 초기화
            $this->pagination->initialize($config);
            // 페이징 링크를 생성하여 view에서 사용할 변수에 할당
            $data['pagination'] = $this->pagination->create_links();

            // 게시물 목록을 불러오기 위한 offset, limit 값 가져오기
            $page = $this->uri->segment(5,1);

            if($page>1) { $start = (($page/$config['per_page'])) * $config['per_page']; }
            else {
                $start = ($page-1);
                if($start<0)    { $start = 0; } // url에 음수가 나올 경우 데이터베이스 오류가 노출됨 . 이를 막기 위해 $start 를 0으로 초기화함.
            }

            $limit = $config['per_page'];

            $data['list'] = $this->board_m->get_list('my_board',' ',$start,$limit);

            $this->load->view('board/list_v',$data);
        }

        // 내용 보기 기능 구현
        public function view()
        {
            // 게시판 이름과 게시물 번호에 해당하는 게시물 가져오기
            $data['views'] = $this->board_m->get_view('my_board',$this->uri->segment(4));

            // view 호출
            $this->load->view('board/view_v',$data);
        }

        public function write()
        {
            $this->load->library('form_validation');
            $this->load->helper('alert');

            if (@$this->session->userdata('logged_in') == TRUE) {

                if ($_POST) {
                    $this->form_validation->set_rules('subject', '제목', 'required');
                    $this->form_validation->set_rules('contents', '글', 'required');

                    if ($this->form_validation->run() == TRUE) {

                        $query_list = array(
                            $user_id = $this->session->userdata('username'),
                            $subject = $this->input->post('subject', TRUE),
                            $contents = $this->input->post('contents', TRUE)
                        );

                        $result = $this->board_m->write_m('my_board',$query_list);

                        if (!$result) {
                            alert('글이 입력되지 않았습니다.', '/mbd/board/');
                            exit;
                        }
                        redirect('http://localhost/mbd/board');

                    }
                }

                $this->load->view('board/write_v');

            }
            else { // 비로그인 신청 방지
                alert('로그인 하시고 작성해주세요', '/mbd/auth');
                exit;
            }
        }

        public function modify()
        {
            $this->load->library('form_validation');
            $this->load->helper('alert');

            if (@$this->session->userdata('logged_in') == TRUE) {

                // 본인이 맞는지 아이디 확인
                $user_id = @$this->session->userdata('username');

                $result = $this->board_m->write_check($this->uri->segment(3));
                $board_user_id = $result->user_id;

                if( $user_id == $board_user_id )
                {
                    $data['list'] = $this->board_m->write_view($this->uri->segment(3));
                    // 맞다면 수정에 들어가서 수정할 내용들을 전부 뿌려줌
                    if ($_POST) {
                        $this->form_validation->set_rules('subject', '제목', 'required');
                        $this->form_validation->set_rules('contents', '글', 'required');

                        if ($this->form_validation->run() == TRUE) {

                            $query_list = array(
//                                $user_id = $this->session->userdata('username'),
                                $board_id = $this->uri->segment(3),
                                $subject = $this->input->post('subject', TRUE),
                                $contents = $this->input->post('contents', TRUE)
                            );

                            $result = $this->board_m->write_update('my_board',$query_list);

                            if (!$result) {
                                alert('글이 입력되지 않았습니다.', '/mbd/board/');
                                exit;
                            }
                            redirect('http://localhost/mbd/board');
                            exit;

                        }
                    }

                    $this->load->view('board/modify_v',$data);

                    // 수정을 하고 제출하면 controller 이 database 를 호출해서 update 를 하고 수정이됨.

                }else{
                    alert('자신이 쓴 게시물만 수정해주세요!', '/mbd/board');
                    exit;
                }

            }
            else { // 비로그인 신청 방지
                alert('로그인 하시고 수정해주세요', '/mbd/auth');
                exit;
            }
        }

        public function delete()
        {
            // 폼 검증 라이브러리와 alert 헬퍼를 가지고옴.
            $this->load->library('form_validation');
            $this->load->helper('alert');

            /*
             * 삭제를 위해서는 단계가 있을거 같음.
             * 그 단계가 뭔지 나도 잘 몰르겠음. 지금부터 정의해봄.
             * 첫 번째, 제일먼저 해야할 상황은 삭제를 하기위해서는 사용자가 로그인했는지 안했는지를 판단해야함. ( 구현 완료 )
             * 두 번째, 로그인되었다면 그 사람이 작성한 게시물인지 확인하고 삭제 처리한다.
             */
            if(@$this->session->userdata('logged_in')==TRUE){

                $query_list = array(
                    // user_id : ex) admin , board_id : ex) 1
                    $user_id = $this->session->userdata('username'),
                    $board_id = $this->uri->segment(3)
                );

                $user_id = @$this->session->userdata('username');
                /*
                 * 객체 배열 형태로 반환함..
                 * stdClass Object ( [user_id] => admin )
                 */
                $board_id = $this->board_m->write_check($query_list[1]);
                $board_id = $board_id->user_id;

                if( $user_id != $board_id){
                    alert('본인이 작성한 게시물이 아닙니다.','/mbd/board');
                    exit;
                }

                /*
                 * delete_m 에 table 이름과 query_list 배열을 넘겨줌.
                 */
                $result = $this->board_m->delete_m('my_board',$query_list[1]);
                if(!$result){
                    alert('삭제 오류','/mbd/board');
                }else{
                    alert('삭제 완료','/mbd/board');
                }
                exit;

            }else{
                alert('로그인 해주시고 삭제 해주세요','/mbd/auth');
                exit;
            }
        }


    }

?>