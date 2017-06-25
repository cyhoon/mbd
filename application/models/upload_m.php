<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Upload_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * 이미지 업로드
     *
     * @param array $arrays 업로드 파일 정보 및 글 내용
     * @return string 글 번호
     */
    function insert_sns($arrays)
    {
        // 업로드 파일 기타 정보
        $detail = array(
            'file_size' =>(int)$arrays['file_size'],
            'image_width'=>$arrays['image_width'],
            'image_height' => $arrays['image_height'],
            'file_ext' => $arrays['file_ext']
        );

        $username = $arrays['user_name'];
        $sql = "SELECT user_id FROM users WHERE username = '".$username."'";
        $query = $this->db->query($sql);
        $user_id = $query->result();

        $insert_array = array(
            'user_id'=>$user_id,
            'user_name'=>$arrays['user_name'],
            'subject'=>$arrays['subject'],
            'contents'=>$arrays['contents'],
            'file_path'=>$arrays['file_path'],
            'file_name'=>$arrays['file_name'],
            'original_name'=>$arrays['orig_name'],
            'detail_info'=>serialize($detail)
        );
        $this->db->insert('img_files',$insert_array);
        $result = $this->db->insert_id();
        return $result;

    }

    
}

?>