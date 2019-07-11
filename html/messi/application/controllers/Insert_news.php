<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert_news extends CI_Controller {

	public $filename;
	public $url;

	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('url', 'form');

	}


	public function index()
	{
		// 사용자가 업로드 한 파일을 /static/user/ 디렉토리에 저장한다.
		$config['upload_path'] = './static/news';
		// git,jpg,png 파일만 업로드를 허용한다.
		$config['allowed_types'] = 'jpg|jpeg|png|gif|zip|rar|avi|mov|mp3|mp4|mpeg|swf|wmv|flv|3gp|ppt|pptx|xls|xlsx|doc|docx|hwp|hwpx';
		// 허용되는 파일의 최대 사이즈
		$config['max_size'] = '0';
		// 이미지인 경우 허용되는 최대 폭
		$config['max_width']  = '15000';
		// 이미지인 경우 허용되는 최대 높이
		$config['max_height']  = '15000';
		// 이미지 가로 길이
		$config['width']  = '1350';
		// 이미지 세로 길이
		$config['height']  = '890';
		// 파일명에 공백이 있을 경우 밑줄(_)로 변경
		$config['remove_spaces'] = TRUE;
		// 파일이름은 랜덤하게 암호화된 문져열로 변동
		// $config['encrypt_name'] = TRUE;




		$this->load->library('upload', $config);


		if (!$this->upload->do_upload('news_image')){
					$err =$this->upload->display_errors();
					echo "<script>console.log( 'Err: " . $err . "' );</script>";
		      }else{
		       $data = $this->upload->data();
					 $filename = $data['file_name'];
					 $url = '/static/news/'.$filename;
					 echo "<script>console.log( 'url: " . $url . "' );</script>";
					 echo "성공";
					 // var_dump($data);
					 $check =$this->input->post('check');
					 if($check==20){
						 echo "<script>console.log( 'news-insert: " . $check . "' );</script>";
						 echo "<script>console.log( 'filename: " . $filename . "' );</script>";
						 // echo "<script>console.log( 'url: " . $this->$url . "' );</script>";
						 $data['filename'] = $filename;
						 // $data['url'] = $this->$url;
						 $data['news_title'] = $this->input->post('news_title');
						 $data['news_ex'] = $this->input->post('news_ex');
						 $data['email_idx'] = $this->session->userdata('email_idx');
						 $this->load->model('News_model');
						 $result = $this->News_model->news_insert($data);
						 if($result==1){
							 echo "<script>alert(\"news 저장 완료\"); location.href='News?page_no=2';</script>";
							 // redirect('News?page_no=2');
						 }else {
							 echo "<script>alert(\"news 저장 실패\"); location.href='News?page_no=2';</script>";
							 // redirect('News?page_no=2');
						 }
					 }else {
						 $this->load->view('insert_news');
					 }
		     }
	}
}
