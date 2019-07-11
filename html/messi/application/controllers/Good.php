<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Good extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('cookie');

	}

	public function index()
	{
		if($this->input->post('comment')==2){
			$data['state'] = $this->input->post('state');
			$data['news_idx'] = $this->input->post('news_idx');
			$data['email_idx'] = $this->session->userdata('email_idx');
			$this->load->model('News_model');
			$result = $this->News_model->comment_insert($data);
			if($result==1){
				// 댓글 저장 성공...
				$email = $this->session->userdata('email');
				$id = explode('@',$email);
				echo $id[0].":"."".$data['state'];
				// 셀렉트 필요
					// $this->load->model('News_model');
					// $result = $this->News_model->comment_select($data);

				// redirect('Good?re=2&news_idx='.$data['news_idx']);
			}else {
				// 댓글 저장 실패...
				"<script>alert(댓글 에러.);</script>";
			}

		}else if($this->input->post('comment')==1){
			$data['count'] = $this->input->post('comment');
			$data['num'] = $this->input->post('num');
			$data['news_idx'] = $this->input->post('news_idx');
			$data['email_idx'] = $this->session->userdata('email_idx');
			if($this->input->post('check')==1){
				// 좋아요 상승
				// echo "<script>console.log( 'count: " .$data['count']. "' );</script>";
				// echo "<script>console.log( 'news_idx: " .$data['news_idx']. "' );</script>";
				// echo "<script>console.log( 'email_idx: " .$data['email_idx']. "' );</script>";
				$this->load->model('News_model');
				$result = $this->News_model->like_update($data);
				if($result==1){
					// 좋아요 수정 성공...
					// 리다이렉트 필요..
					set_cookie($data['news_idx'],$data['news_idx'], 3600);
					redirect('Good?re=1&news_idx='.$data['news_idx']);
				}else {
					// 좋아요 수정 실패...
					"<script>alert(Like 에러.);</script>";
				}
			}else {
				// 좋아요 하강
				$this->load->model('News_model');
				$result = $this->News_model->like_minus($data);
				if($result==1){
					// 좋아요 수정 성공...
					// 리다이렉트 필요..
					delete_cookie($data['news_idx']);
					redirect('Good?re=1&news_idx='.$data['news_idx']);
				}else {
					// 좋아요 수정 실패...
					"<script>alert(Like 에러.);</script>";
				}
			}
		}else if($this->input->get('re')==1){
			// 리다이렉트 받은 곳
			$news_idx = $this->input->get('news_idx');
			// echo "<script>console.log( 'result: " .$news_idx. "' );</script>";
			$this->load->model('News_model');
			$data = $this->News_model->like_slect($news_idx);
			$result['data'] = $data;
			foreach ($data as $items) {
				// echo "<script>console.log( 'result2: " .$items->new_like. "' );</script>";
			}

			echo json_encode($items);
		}elseif ($this->input->post('comment')==5) {
			// Save Insert
			$data['news_idx'] = $this->input->post('news_idx');
			$data['email_idx'] = $this->session->userdata('email_idx');
			if($this->input->post('check')==1){
					// Save 등록
					// 이미 등록되어 있는지 체크
					// $this->load->model('News_model');
					// $check = $this->News_model->save_check($data);
					// if($check==1){
						// 등록된 save 있음
						// echo "<script>console.log( 'check: " . $check . "' );</script>";
						// $result = 2;
						// echo json_encode($result);
					// }else {
						// 등록된 save 없음
						// 데이터 삽입
						// echo "<script>console.log( 'check: " . $check . "' );</script>";
						$this->load->model('News_model');
						$result = $this->News_model->save_insert($data);
						if($result==1){
							// 데이터 저장 성공
							// echo "<script>alert(데이터를 저장함);</script>";
							set_cookie($data['news_idx'].'1000',$data['news_idx'], 3600);
							echo json_encode($result);
							// echo "1";
						}else {
							// c데이터 저장 실패
							"<script>alert('저장 실패'); location.href='News?page_no=2';</script>";
						}
					// }
			}else {
					// Save 해제
					// 이미 등록되어 있는지 체크
					// $this->load->model('News_model');
					// $check = $this->News_model->save_check($data);
					// if($check==1){
						// 등록된 save 있음
						// echo "<script>console.log( 'check: " . $check . "' );</script>";
						// $result = 2;
						// echo json_encode($result);
					// }else {
						// 등록된 save 없음
						// 데이터 해제
						// echo "<script>console.log( 'check: " . $check . "' );</script>";
						$this->load->model('News_model');
						$result = $this->News_model->save_delete($data);
						if($result==1){
							// 데이터 삭제 성공
							// echo "<script>alert(데이터를 저장함);</script>";
							delete_cookie($data['news_idx'].'1000');
							echo json_encode($result);
							// echo "1";
						}else {
							// 데이터 삭제 실패
							"<script>alert('삭제 실패.'); location.href='News?page_no=2';</script>";
						}
					// }
			}
		}
	}
}
