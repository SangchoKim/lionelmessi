<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends CI_Controller {

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
					$mypage_update = $this->input->post('mypage_update');
			 		if($mypage_update == 1){
			 			// 마이페이지로 접속 after 정보 변경

						// 사용자가 업로드 한 파일을 /static/user/ 디렉토리에 저장한다.
						$config['upload_path'] = './static/user';
						// git,jpg,png 파일만 업로드를 허용한다.
						$config['allowed_types'] = 'jpg|jpeg|png|gif|zip|rar|avi|mov|mp3|mp4|mpeg|swf|wmv|flv|3gp|ppt|pptx|xls|xlsx|doc|docx|hwp|hwpx';
						// 허용되는 파일의 최대 사이즈
						$config['max_size'] = '0';
						// 이미지인 경우 허용되는 최대 폭
						$config['max_width']  = '15000';
						// 이미지인 경우 허용되는 최대 높이
						$config['max_height']  = '15000';
						// 이미지 가로 길이
						$config['width']  = '700';
						// 이미지 세로 길이
						$config['height']  = '400';
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
									 $url = '/static/user/'.$filename;
									 echo "<script>console.log( 'url: " . $url . "' );</script>";
									 echo "성공";
									 // var_dump($data);
									echo "<script>console.log( 'filename: " . $filename . "' );</script>";

						$data['filename'] = $filename;
				 		$data['email'] = $this->input->post('email');
				 		$data['password'] = $this->session->userdata('password');
				 		$data['name'] = $this->input->post('name');
				 		$data['intro'] = $this->input->post('intro');
				 		echo "<script>console.log( 'MypageUpdate: " .$data['email']. $data['name'].$data['intro'].$data['password']. "' );</script>";
				 		// 수정된 데이터 모델로 이동

				 		$this->load->model('Mypageupdate_model');
				 		$result = $this->Mypageupdate_model->user_update($data);
				 		if($result==1){
				 			// 수정완료
							// 수정된 값 가져오기
							$this->load->model('Mypageupdate_model');
							$results = $this->Mypageupdate_model->user_select($data);
							if($results==null){
								// 에러 발생
								"<script>alert(news select 에러.);</script>";
							}else {
								// 성공적으로 select
								$data['email_idx'] = $this->session->userdata('email_idx');

								$this->load->model('Mypageupdate_model');
								$news = $this->Mypageupdate_model->news_select($data);
								if($news!=null){
									// Saved-news 데이터 가지오기 성공
										$arr['news'] = $news;
								}
								// $data = array(
								// 		'items'=> $row
								// );
								$arr['data'] = $results;
								foreach ($data as $items) {
								// 	echo "<script>console.log( 'result: " . $items . "' );</script>";
								// echo "<script>console.log( 'news_result: " . $items->news_idx.$items->news_title.$items->news_ex.$items->news_date.$items->news_image. "' );</script>";
								}
				 			// 세션 수정 -> 저장
				 			$this->session->set_userdata($data);
				 			$this->load->view('mypage',$arr);
				 			echo "<script>alert(\"수정완료\");</script>";
						}
			 		}else {
			 			// 수정완료 X -> 에러
			 			echo "<script>alert(\"Mypage 수정이 안됨...\");</script>";
			 		}
				}
			 		}else {
			 			// 마이페이지로 접속 before 정보 변경
			 			$value = $this->input->get('page_no');
			 			echo "<script>console.log( 'value: " . $value . "' );</script>";
						// 모델 접속 -> 마이페이지 정보가져오기
						$data['email'] = $this->session->userdata('email');
						$data['email_idx'] = $this->session->userdata('email_idx');

						$this->load->model('Mypageupdate_model');
						$news = $this->Mypageupdate_model->news_select($data);
						if($news!=null){
							// Saved-news 데이터 가지오기 성공
								$result['news'] = $news;
						}
						$this->load->model('Mypageupdate_model');
						$results = $this->Mypageupdate_model->user_select($data);
						if($results==null){
							// 에러 발생
							"<script>alert(news select 에러.);</script>";
						}else {
							// 성공적으로 select

							// $data = array(
							// 		'items'=> $row
							// );
							$result['data'] = $results;
							foreach ($data as $items) {
							// 	echo "<script>console.log( 'result: " . $items . "' );</script>";
							// echo "<script>console.log( 'news_result: " . $items->news_idx.$items->news_title.$items->news_ex.$items->news_date.$items->news_image. "' );</script>";
							}
			 			$this->load->view('mypage',$result);
					}
			 		}





	}
}
