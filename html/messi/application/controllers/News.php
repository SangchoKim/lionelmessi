<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

public $row;
// public $data;

	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper(array('form', 'url'));
		$this->load->library('pagination');
		$this->load->model('News_model');
		$this->load->model('Indexs_model');
	}

	public function index()
	{

			$value = $this->input->get('news_idx');
		if(isset($value)){
			// 공유0

			$data = $this->News_model->news_select_share($value);
			if($data==null){
				// 에러 발생
				"<script>alert(news select 에러.);</script>";
			}else {
				// 댓글 모두 가져오기
				$comment = $this->News_model->comment_select();
				// 유저 모두 가져오기
				$user = $this->Indexs_model->select_user();

				$result['user'] = $user;
				$result['data'] = $data;
				$result['comment'] = $data;

				$this->load->view('share_news',$result);
			}


		}else{
			// 공유X
			$email = $this->session->userdata('email');
			if(!isset($email)){
				echo "<script>alert(\"잘못된경로의 접근입니다.\"); location.href='Login';</script>";
				exit;
			}
			$value = $this->input->get('page_no');
			$value1 = $this->input->get('admin_page');
			echo "<script>console.log( 'value: " . $value . "' );</script>";
			if($value==2||$value1==2){
				$this->load->model('News_model');
				$data = $this->News_model->news_select();
				if($data==null){
					// 에러 발생
					"<script>alert(news select 에러.);</script>";
				}else {
					// 성공적으로 select
					// 댓글 모두 가져오기
					$this->load->model('News_model');
					$comment = $this->News_model->comment_select();
					// 유저 모두 가져오기
					$this->load->model('Indexs_model');
					$user = $this->Indexs_model->select_user();
					// $data = array(
					// 		'items'=> $row
					// );
					// 좋아요 순 랭킹 가져오기
					$this->load->model('Indexs_model');
					$ranking = $this->Indexs_model->select_ranking();


					// 페이징 하기
					// 페이징 주소
					// $config['base_url'] = 'http://localhost/messi/News?page_no=2';
					// $config['check'] =1;
					$config['base_url'] = 'http://localhost/messi/News?page_no=2';
					// $conig['check'] =2;
					// 게시물 전체 개수
					$this->load->model('News_model');
	        $config['total_rows'] = $this->News_model->get_list($this->uri->segment(3),'count');
					// $config['total_row'] = $this->News_model->get_list_comment($this->uri->segment(3),'count');
	        // 한 페이지에 표시할 게시물 수
	        // $config['per_page'] = 10;
					$config['per_page'] = 10;
	        // 페이지 번호가 위치한 세그먼트
	        // $config['uri_segment'] = 10;
					$config['uri_segment'] = 10;
					// 페이지네이션 맨 왼쪽에 위치할 "처음으로" 링크 글을 설정
					$config['first_link'] = 'First';
					// 페이지네이션 맨 오른쪽에 위치할 "끝으로" 링크 글을 설정
					$config['last_link'] = 'Last';
					//"이전" 링크 글을 설정합니다.
					// $config['prev_link'] = '◀이전&nbsp&nbsp';
					$config['prev_link'] = '댓글더보기';
					//"다음" 링크 글을 설정합니다.
					// $config['next_link'] = '&nbsp&nbsp다음▶';
					$config['next_link'] = '댓글더보기';
					//기본값으로, URI 새그먼트는 페이징하는 아이템들의 시작 인덱스를 사용합니다. 실제 페이지 번호를 보여주고 싶다면, TRUE로 설정하세요.
					// $config['use_page_numbers'] = TRUE;
					$config['use_page_numbers'] = TRUE;
					//선택된 페이지번호 좌우로 몇개의 숫자링크를 보여줄지 설정
					// $config['num_links'] = 5;
					$config['num_links'] = 5;

					$config['display_pages'] = FALSE;

					// $config['page_query_string'] = TRUE;
					$config['page_query_string'] = TRUE;

					// if($config['check']==1){
					// 	$this->pagination->initialize($config);
					// 	$result['pagination'] = $this->pagination->create_links();
					// 	echo "<script>console.log( 'd: " .$this->News_model->get_list($this->uri->segment(3),'count'). "' );</script>";
					// 	echo "<script>console.log( 's: " .$this->pagination->create_links(). "' );</script>";
					// 	// 게시물 목록을 불러오기 위한 offset, limit 값 가져오기
					// 	$pages = $this->input->get('per_page');
					// 	if(isset($pages)){
					// 		if($pages > 1){
					// 				$page = $this->uri->segment(10,($pages-1)*10);
					// 				$start = (($page / $config['per_page'])) * $config['per_page'];
					// 		}else{
					// 				$start = ($page - 1) * $config['per_page'];
					// 		}
					// 	}else {
					// 		$page = $this->uri->segment(10,1);
					// 		if($page > 1){
			    //         $start = (($page / $config['per_page'])) * $config['per_page'];
			    //     }else{
			    //         $start = ($page - 1) * $config['per_page'];
			    //     }
					//
					// 	}
					// 	$limit = $config['per_page'];
					// 	$result['ranking'] = $this->News_model->get_list($this->uri->segment(3),'', $start, $limit);
					// }

					// if($conig['check']==2) {
						$this->pagination->initialize($config);
						$result['pagination'] = $this->pagination->create_links();
						// 게시물 목록을 불러오기 위한 offset, limit 값 가져오기
						$pages = $this->input->get('per_page');
						if(isset($pages)){
							if($pages > 1){
									$page = $this->uri->segment(10,($pages-1)*10);
									$start = (($page / $config['per_page'])) * $config['per_page'];
							}else{
									$start = ($page - 1) * $config['per_page'];
							}
						}else {
							$page = $this->uri->segment(10,1);
							if($page > 1){
			            $start = (($page / $config['per_page'])) * $config['per_page'];
			        }else{
			            $start = ($page - 1) * $config['per_page'];
			        }

					}
					$limit = $config['per_page'];
					$result['comment'] = $this->News_model->get_list_comment($this->uri->segment(3),'', $start, $limit);
				// }


					// 페이지 링크를 생성하여 view에서 사용하기 위해 변수에 할당

					$result['user'] = $user;
					$result['data'] = $data;
					$result['ranking'] = $ranking;


					// if(get_cookie('test')!=null){
					// 	$result['cookie'] = get_cookie('test');
					// }



					foreach ($user as $items) {
					// 	echo "<script>console.log( 'result: " . $items . "' );</script>";
					echo "<script>console.log( 'news_result: " . $items->email_idx.$items->user_email.$items->user_name.$items->user_intro.$items->auto_login. "' );</script>";
					}

					foreach ($comment as $items) {
					// 	echo "<script>console.log( 'result: " . $items . "' );</script>";
					echo "<script>console.log( 'news_result: " . $items->comment_idx.$items->comment.$items->comment_date.$items->news_idx.$items->email_idx. "' );</script>";
					}

					foreach ($data as $items) {
					// 	echo "<script>console.log( 'result: " . $items . "' );</script>";
					echo "<script>console.log( 'news_result: " . $items->news_idx.$items->news_title.$items->news_ex.$items->news_date.$items->news_image. "' );</script>";
					}

					if($value1==2){
						// 어드민 뉴스
						$this->load->view('admin_news',$result);
					}else {
						// user 뉴스
						$this->load->view('news',$result);
					}


				}

			}else {
				"<script>alert(에러가 발생하였습니다.);</script>";
			}


		}



	}
}
