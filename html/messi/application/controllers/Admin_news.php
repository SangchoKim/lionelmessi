<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_news extends CI_Controller {

public $row;
// public $data;

	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{
		$email = $this->session->userdata('email');
		if(!isset($email)){
			echo "<script>alert(\"잘못된경로의 접근입니다.\"); location.href='Login';</script>";
			exit;
		}
		// 어드민 news 수정 & 삭제
		$news_idx = $this->input->get('news_idx');
		$check = $this->input->get('check');
		$check_up = $this->input->post('check');
		echo "<script>console.log( 'news_idx: " . $news_idx . "' );</script>";
		echo "<script>console.log( 'check: " . $check . "' );</script>";
		echo "<script>console.log( 'check_up: " . $check_up . "' );</script>";
		if($check==1){
			// 어드민 news 수정하기전 셀렉트
			$this->load->model('News_model');
			$data = $this->News_model->news_select_admin($news_idx);
			if($data==null){
				// 에러 발생
				"<script>alert(news_admin select 에러.);</script>";
			}else {
				// 성공적으로 select

				// $data = array(
				// 		'items'=> $row
				// );
				$result['data'] = $data;
				foreach ($data as $items) {
				// 	echo "<script>console.log( 'result: " . $items . "' );</script>";
				echo "<script>console.log( 'news_result: " . $items->news_idx.$items->news_title.$items->news_ex.$items->news_date. "' );</script>";
				}

				$this->load->view('news_update',$result);
			}

		}else if($check==2) {
			// 어드민 news 삭제
			$this->load->model('News_model');
			$data = $this->News_model->news_delete($news_idx);
			if($data==1){
				// 삭제 성공
				echo "<script>alert(\"news 삭제 완료\"); location.href='News?page_no=2';</script>";
				// redirect('News?page_no=2');
			}else {
				// 삭제 실패
				echo "<script>alert(\"news 삭제 실패\"); location.href='News?page_no=2';</script>";
				// redirect('News?page_no=2');
			}

		}else if($check_up==3){

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
						 // 어드민 news 수정한 데이터 DB로 전달
						echo "<script>console.log( 'filename: " . $filename . "' );</script>";
						$datas['filename'] = $filename;
						$datas['news_title'] = $this->input->post('news_title');
			 			$datas['news_ex'] = $this->input->post('news_ex');
			 			$datas['news_idx'] = $this->input->post('news_idx');
			 			$this->load->model('News_model');
			 			$data = $this->News_model->news_update($datas);
			 			if($data==1){
			 				// 수정 성공
			 				// redirect('News?page_no=2');
			 				echo "<script>alert(\"news 수정 완료\"); location.href='News?page_no=2';</script>";
			 			}else {
			 				// 수정 실패
			 				// redirect('News?page_no=2');
			 				echo "<script>alert(\"news 수정 실패\"); location.href='News?page_no=2';</script>";
			 			}
					 }
		}
		// if($value==2){
		// 	$this->load->model('News_model');
		// 	$data = $this->News_model->news_select();
		// 	if($data==null){
		// 		// 에러 발생
		// 		"<script>alert(news select 에러.);</script>";
		// 	}else {
		// 		// 성공적으로 select
		//
		// 		// $data = array(
		// 		// 		'items'=> $row
		// 		// );
		// 		$result['data'] = $data;
		// 		foreach ($data as $items) {
		// 		// 	echo "<script>console.log( 'result: " . $items . "' );</script>";
		// 		echo "<script>console.log( 'news_result: " . $items->news_idx.$items->news_title.$items->news_ex.$items->news_date. "' );</script>";
		// 		}
		//
		// 		$this->load->view('news',$result);
		// 	}
		//
		// }else {
		// 	"<script>alert(에러가 발생하였습니다.);</script>";
		// }

	}
}
