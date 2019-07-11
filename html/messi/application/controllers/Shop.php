<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	private $cAdminKey = '3d1cdeb27e6f453b76c18584c4d926fb'; // 카카오 어드민 키
	private $cTestStoreKey = 'TC0ONETIME'; // 테스트 키
	private $cStoreKey = 'TC0ONETIME'; // 상점 아이디
	private $cServiceUrl = 'https://kapi.kakao.com'; // 서비스 URL
	private $aPayPostUrl = Array();
	private $cApprovalUrl = 'http://localhost/messi/Shop/pay_done'; // 결제 성공 URL
	private $cFailUrl = 'http://localhost/messi/Shop/fail'; // 결제 실패 URL
	private $cCancelUrl = 'http://localhost/messi/Login'; // 결제 취소 URL
	private $cHeaderInfo = Array();




	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Shop_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('pagination');
		$this->load->helper('array');
		$this->load->helper('cookie');
		$this->load->model('Indexs_model');
		$this->load->helper('array');
		// $this->load->library('curl');

	}

	public function pay_done(){

		$req_auth = "Authorization: KakaoAK c4bdf3b332b84d750c9584bef3a1253d";
		$req_cont = "Content-type: application/x-www-form-urlencoded;charset=utf-8";
		$kakao_header = array($req_auth,$req_cont);
		$pay_url = "https://kapi.kakao.com/v1/payment/approve";
		$kakao_params = array(
            'cid'               => 'TC0ONETIME',                            // 가맹점코드 10자
            'tid'               => get_cookie('tid'),         // 결제 고유번호. 결제준비 API의 응답에서 얻을 수 있음
            'partner_order_id'  => 'wjdrms1919@nate.com',    // 가맹점 주문번호. 결제준비 API에서 요청한 값과 일치해야 함
            'partner_user_id'   => 'wjdrms1919@nate.com',           // 가맹점 회원 id. 결제준비 API에서 요청한 값과 일치해야 함
            'pg_token'          => $this->input->get('pg_token')    // 결제승인 요청을 인증하는 토큰. 사용자가 결제수단 선택 완료시 approval_url로 redirection해줄 때 pg_token을 query string으로 넘겨줌
            //'payload'           => ,                              // 해당 Request와 매핑해서 저장하고 싶은 값. 최대 200자
        );

				// var_dump($kakao_params);
				$cu = curl_init();

				curl_setopt($cu, CURLOPT_URL, $pay_url);

				curl_setopt($cu, CURLOPT_POST, true);

				curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query($kakao_params));

				curl_setopt($cu, CURLOPT_CONNECTTIMEOUT, 30);

				curl_setopt($cu, CURLOPT_TIMEOUT, 30);

				curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);

				curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, 0);

				curl_setopt($cu, CURLOPT_HTTPHEADER, $kakao_header);

				curl_setopt($cu, CURLOPT_HEADER,false);

				$output = curl_exec($cu);

				$status_code = curl_getinfo($cu, CURLINFO_HTTP_CODE);

				curl_close($cu);

		// $strArrResult = request_curl('https://kapi.kakao.com/v1/payment/approve', 1, http_build_query($kakao_params), $kakao_header);


		if( $status_code != '200' ) {
            echo "<script>";
            echo "alert('에러입니다. 관리자에게 문의하세요.');";
            echo "window.parent.close();";
            echo "</script>";
            return;
        }

		$strArrResult = json_decode($output);

		// LGD 로 쓰는 이유는 기존 table를 활용해서 같이쓰기위함.
        $paymentResultArr = Array (
             'LGD_TID'                => $strArrResult->tid,                     // kakao 거래 고유 번호
             'LGD_MID'                => $strArrResult->cid,                     // 상점아이디
             'LGD_OID'                => $strArrResult->partner_order_id,        // 상점주문번호
             'LGD_AMOUNT'             => $strArrResult->amount->total,           // 결제금액
             'LGD_RESPCODE'           => '0000',                                 // 결과코드
             'LGD_RESPMSG'            => '결제성공',                                       // 결과메세지

             'LGD_FINANCENAME'        => '신한은행',         // 은행명
             'LGD_FINANCECODE'        => '123456789',    // 은행코드

             'LGD_PAYTYPE'            => $strArrResult->payment_method_type,              // 결제 방법 ( CARD, MONEY )

             'LGD_PAYDATE'            => $strArrResult->approved_at,                      // 승인시간 (모든 결제 수단 공통)
             'LGD_FINANCEAUTHNUM'     => '123456789',           // 신용카드 승인번호
             'LGD_CARDNOINTYN'        => 'N', // 신용카드 무이자 여부 ( Y: 무이자,  N : 일반)
             'LGD_CARDINSTALLMONTH'   => "3",         // 신용카드 할부개월
        );

    delete_cookie("tid");


		echo "<script>alert(\"결제를 성공하였습니다.\");location.href='../Shop?page_no=3';</script>";
	}


	public function check_review(){

		$shop_idx = $this->input->post('shop_idx');
		$email_idx = $this->session->userdata('email_idx');
		$stauss = $this->Shop_model->check_review($email_idx,$shop_idx);
		// var_dump($stauss);
		if($stauss==null){
			echo json_encode(2);
		}else {
			// code...
			echo json_encode($stauss);
		}

	}

	public function change_basic(){
		$basic_adress = $this->input->post('basic_adress');
		$po_adress = $this->input->post('adress_postcard_1');
		$bsadress = $this->input->post('adress_1');
		$adress_add = $this->input->post('adress_add_1');
		$adress = $po_adress.'&'.$bsadress.'&'.$adress_add;
		if($basic_adress==1){
			// first_adress 체크박스
			echo "<script>alert(\"기본배송지 수정 완료.\");location.href='../Shop/order_form?check=1';</script>";
		}elseif ($basic_adress==2) {
			// second_adress 체크박스
			// 순서 select -> update
			$email_idx = $this->session->userdata('email_idx');
			$second = $this->Shop_model->get_adress($email_idx,$basic_adress);
			if($second==null){
				echo "<script>alert(\"second 주소 셀렉트 실패.\");location.href='../Shop?page_no=3';</script>";
			}else {
				// update
				$result = $this->Shop_model->update_adress($email_idx,$adress,$second,null);
				if($result==1){
					// 수정 완료
						echo "<script>alert(\"기본배송지 수정 완료.\");location.href='../Shop/order_form?check=1';</script>";
				}else {
					// 수정 실패
					echo "<script>alert(\"second 주소 수정 실패.\");location.href='../Shop?page_no=3';</script>";
				}
			}

		}else {
			// third_adress 체크박스
			// 순서 select -> update
			$email_idx = $this->session->userdata('email_idx');
			$third = $this->Shop_model->get_adress($email_idx,$basic_adress);
			if($third==null){
				echo "<script>alert(\"second 주소 셀렉트 실패.\");location.href='../Shop?page_no=3';</script>";
			}else {
				// update
				$result = $this->Shop_model->update_adress($email_idx,$adress,null,$third);
				if($result==1){
					// 수정 완료
						echo "<script>alert(\"기본배송지 수정 완료.\");location.href='../Shop/order_form?check=1';</script>";
				}else {
					// 수정 실패
					echo "<script>alert(\"second 주소 수정 실패.\");location.href='../Shop?page_no=3';</script>";
				}
			}
		}




	}

	public function order_confirm(){

		$email_idx = $this->session->userdata('email_idx');
		$firstAdress = $this->input->post('firstAdress');
		$po_adress = $this->input->post('adress_postcard');
		$bsadress = $this->input->post('adress');
		$adress_add = $this->input->post('adress_add');
		$adress = $po_adress.'&'.$bsadress.'&'.$adress_add;
		$ordering_memo = $this->input->post('ordering_memo');
		// 장바구니에 들어가 있는 물건들 삭제
		$results = $this->Shop_model->delete_allcart($email_idx);
		if($results==1){
			// 장바구니 삭제 성공
			delete_cookie('shop_idx');
			// 메모 저장 & 주문 완료 표시
			$result = $this->Shop_model->update_memo($email_idx,$ordering_memo);
			if($result==1){
				// 메모 수정 성공
				// 주소도 저장 (배송지목록에 추가 버튼이 클릭될 때 새롭게 저장)
				if($firstAdress==1){
					// 배송지 추가시 값이 있는 지 확인 -> first adress 확인
					$first = $this->Shop_model->check_address($email_idx,1);
					if($first==1){
						// 배송지 추가시 값이 있는 지 확인 -> second adress 확인
						$second = $this->Shop_model->check_address($email_idx,2);
						if($second==1){
							// 배송지 추가시 값이 있는 지 확인 -> third adress 확인
							$third = $this->Shop_model->check_address($email_idx,3);
							if($third==1){
								// DB에 꽉찼다. 더 이상 추가가 불가능 하다라는 알럿창 띄우기
								echo "<script>alert(\"더이상 배송지 추가가 불가능 합니다.\");location.href='../Shop?page_no=3';</script>";
							}else {
									// 배송지 추가 -> third address
									$check = $this->Shop_model->insert_address($email_idx,$adress,3);
									if($check==1){
										// 배송지 추가 완료
										echo "<script>alert(\"주문이 완료되었습니다.\");location.href='../Shop?page_no=3';</script>";
									}else {
										// 배송지 추가 실패
										echo "<script>alert(\"주문을 실패하였습니다.\");location.href='../Shop?page_no=3';</script>";
									}
							}
						}else {
								// 배송지 추가 -> second address
							$check = $this->Shop_model->insert_address($email_idx,$adress,2);
							if($check==1){
								// 배송지 추가 완료
								$this->kakao();
								echo "<script>alert(\"주문이 완료되었습니다.\");location.href='../Shop?page_no=3';</script>";
							}else {
								// 배송지 추가 실패
								echo "<script>alert(\"주문을 실패하였습니다.\");location.href='../Shop?page_no=3';</script>";
							}
						}
					}else {
						// 배송지 추가 -> first address
						$check = $this->Shop_model->insert_address($email_idx,$adress,1);
						if($check==1){
							// 배송지 추가 완료
							$this->kakao();
							echo "<script>alert(\"주문이 완료되었습니다.\");location.href='../Shop?page_no=3';</script>";
						}else {
							// 배송지 추가 실패
							echo "<script>alert(\"주문을 실패하였습니다.\");location.href='../Shop?page_no=3';</script>";
						}
					}

				}else {
					// 배송 추가 안할 시
					// 카카오 페이 결제
					$this->kakao();
					// echo "<script>alert(\"주문이 완료되었습니다.\");location.href='../Shop?page_no=3';</script>";
				}

			}else {
				// 메모 수정 실패
				echo "<script>alert(\"메모 수정 실패\");location.href='../Shop?page_no=3';</script>";
			}
		}else {
			// 장바구니 삭제 실패
			echo "<script>alert(\"장바구니 비우기 실패\");location.href='../Shop?page_no=3';</script>";
		}
	}

	public function kakao(){

		$adminkey = 'c4bdf3b332b84d750c9584bef3a1253d'; // admin

		$cid = 'TC0ONETIME';// cid

		$req_auth = "Authorization: KakaoAK c4bdf3b332b84d750c9584bef3a1253d";

		$req_cont = "Content-type: application/x-www-form-urlencoded;charset=utf-8";

		$kakao_header = array($req_auth,$req_cont);

		$approval_url = "http://localhost/messi/Login";

		$cancel_url = "http://localhost/messi/about?page_no=1";

		$fail_url = "http://localhost/messi/Indexs";

		$pay_url = "https://kapi.kakao.com/v1/payment/ready";

		$cu = curl_init();

		$kakao_arr = array(
			'cid'=>'TC0ONETIME',
			'partner_order_id'=>'wjdrms1919@nate.com',
			'partner_user_id'=>'wjdrms1919@nate.com',
			'item_name'=>'초코파이',
			'quantity'=>'1',
			'total_amount'=>'1000',
			'vat_amount'=>'10',
			'tax_free_amount'=>'0',
			'approval_url'=>$this->cApprovalUrl,
			'cancel_url'=>$this->cCancelUrl,
			'fail_url'=>$this->cFailUrl
		);


		curl_setopt($cu, CURLOPT_URL, $pay_url);

		curl_setopt($cu, CURLOPT_POST, true);

		curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query($kakao_arr));

		curl_setopt($cu, CURLOPT_CONNECTTIMEOUT, 30);

		curl_setopt($cu, CURLOPT_TIMEOUT, 30);

		curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt($cu, CURLOPT_HTTPHEADER,$kakao_header);

		curl_setopt($cu, CURLOPT_HEADER,false);

		$output = curl_exec($cu);

		$status_code = curl_getinfo($cu, CURLINFO_HTTP_CODE);

		curl_close($cu);

		if($status_code == 200) {

		// echo $output;
		$outputs = json_decode($output);
		$tid = $outputs->tid;
		$next_redirect_pc_url = $outputs->next_redirect_pc_url;
		// var_dump($data_result);
		set_cookie('tid',$tid,time()+3600);
		redirect($next_redirect_pc_url);
		} else {

		echo "Error 내용:".$output;

		}
	}


	public function order_form(){

		if($this->input->get('check')==1){
			// 기본배송지 수정 후
			$data['email_idx'] = $this->session->userdata('email_idx');
			$result['shop'] = $this->Shop_model->select_ordering($data);
			$result['mypage'] = $this->Shop_model->select_ordering_user($data);
			$result['adress'] = $this->Shop_model->getadress($data);
			$result['amount'] = $this->Shop_model->select_ordering_amount($data);
			if($result==null){
				// 셀렉트 실패
				echo "<script>alert(\"주문 폼 이동 실패\");location.href='../Shop?page_no=3';</script>";
			}else {
				// 셀렉트 성공
				$this->load->view('shop_orderform',$result);
			}
		}else {
			// 주문 버튼 누른 후
			$result[] = null;
			$c = count($this->input->post('shop_idx'));
			for ($i=0; $i < $c; $i++) {
				// 주문한 상품 DB에 저장
				$data['email_idx'] = $this->session->userdata('email_idx');
				$data['shop_idx'] = $this->input->post('shop_idx')[$i];
				$data['amount_idx'] = $this->input->post('amount_idx')[$i];
				$results = $this->Shop_model->insert_ordering($data);
				if($results==1){
					// 성공
					$result['shop'] = $this->Shop_model->select_ordering($data);
				}else {
					// 실패
					echo "<script>alert(\"주문 폼 이동 실패\");location.href='../Shop?page_no=3';</script>";
				}
				}
					// 셀렉트 하기
					// var_dump($result['shop']);
					$result['mypage'] = $this->Shop_model->select_ordering_user($data);
					$result['adress'] = $this->Shop_model->getadress($data);
					$result['amount'] = $this->Shop_model->select_ordering_amount($data);
					// $result['amount'] = $data['amount_idx'];
					if($result==null){
						// 셀렉트 실패
						echo "<script>alert(\"주문 폼 이동 실패\");location.href='../Shop?page_no=3';</script>";
					}else {
						// 셀렉트 성공
						$this->load->view('shop_orderform',$result);
					}
		}

	}




	public function delete_cookie(){

		$email_idx = $this->session->userdata('email_idx');
		$results = $this->Shop_model->delete_allcart($email_idx);
		if($results==1){
			// 삭제 성공
			delete_cookie('shop_idx');
			echo "<script>alert(\"전체삭제를 하였습니다.\");location.href='../Shop?page_no=3';</script>";
		}else {
			// 삭제 실패
			echo "<script>alert(\"카트 전체 삭제 실패\");location.href='../Shop?page_no=3';</script>";
		}
	}

	public function delete_eachstuff(){

		$email_idx = $this->session->userdata('email_idx');
		$shop_idx = $this->input->get('shop_idx');
		// var_dump($shop_idx);
		$results = $this->Shop_model->delete_eachcart($email_idx,$shop_idx);
		if($results==1){
			// 삭제 성공
			// $array = array();
			$id = explode(',',get_cookie('shop_idx'));
			// for ($i=0; $i < $id; $i++) {
			// 	$array[] = $id[$i];
			// }
			unset($id[0]);
			$c = count($id);
			// var_dump($id);

		// 	var_dump($c);
			$d = null;
			for ($i=0; $i <= $c ; $i++) {

		// 		if($id[$i]==$shop_idx){
		// 		unset($id[$i]);
				// var_dump($id);
				$d = implode($id,",");

			}
				var_dump($d);
				set_cookie('shop_idx',$d,time()+3600);
		// 		// delete_cookie('shop_idx');
		// };

			echo "<script>alert(\"삭제를 하였습니다.\");location.href='../Shop/cart?cart=20';</script>";
		}else {
			// 삭제 실패
			echo "<script>alert(\"카트 개별 삭제 실패\");location.href='../Shop/cart?cart=20';</script>";
		}
	}

	public function cart(){
		$compare = $this->input->post('compare');
		$cart = $this->input->get('cart');
		if($compare==1){
			// 장바구니
			$size_idx = $this->input->post('size_idx');
			$size = explode('[',$size_idx);
			$data['size_idx'] = $size[0];
			$data['arr'] = $this->input->post('arr');
			// shop_idx 찾아내기
			$shop_idx = $this->Shop_model->select_shop_idx($data);
			$data['shop_idx'] = $shop_idx->shop_idx;

			// var_dump($data['shop_idx']);
			// var_dump($data['shop_idx'],$data['size_idx'],$data['arr']);
			$data['email_idx'] = $this->session->userdata('email_idx');
			$data['amount'] = $this->input->post('amount_idx');
			// 장바구니에 이미 담겨있는지 확인
			$c = $this->Shop_model->check_cart($data);
			if($c==1){
				// 경고창
				$shop_idx = $data['shop_idx'];
				echo "<script>alert(\"이미 상품이 카트에 담겨있습니다.\");location.href='../Shop/stuff_detail?shop_idx=$shop_idx';</script>";
				return;
			}
			$results = $this->Shop_model->insert_cart($data);
			if($results==1){
				// 인설트 성공
				$result['data'] = $this->Shop_model->select_cart($data);
				// var_dump($result['data']);
				$result['amounts'] = $this->Shop_model->select_amount($data);
				if(isset($result['data'])){
					// 셀렉트 성공
					if(get_cookie('shop_idx')){
						set_cookie('shop_idx',$_COOKIE['shop_idx'].','.$data['shop_idx'],time()+3600);

					}else {
						set_cookie('shop_idx',$data['shop_idx'],time()+3600);
					}

					$this->load->view('shop_cart',$result);
				}else {
					// 셀렉트 실패
						echo "<script>alert(\"카트 불러오기 실패\");location.href='../Shop/stuff_detail?shop_idx=$shop_idx';</script>";
				}
			}else {
				// 인설트 실패
				$shop_idx=$data['shop_idx'];
				echo "<script>alert(\"카트 저장 실패\");location.href='../Shop/stuff_detail?shop_idx=$shop_idx';</script>";
			}




		}else if($cart==20){
			// 카트 저장 안하고 바로 들어온 경우
			// $data['shop_idx'] = $this->input->cookie('shop_idx');
			// var_dump($data['shop_idx']);
			$data['email_idx'] = $this->session->userdata('email_idx');
			$result['amounts'] = $this->Shop_model->select_amount($data);
			// var_dump($result['amount']);
			$result['data'] = $this->Shop_model->select_cart($data);
			$this->load->view('shop_cart',$result);
		}else {
			// 바로 구매.
		}
	}





	public function insert_review(){

		$data['shop_idx'] = $this->input->post('shop_idx');
		$data['shop_review'] = $this->input->post('shop_review');
		$data['star'] = $this->input->post('star');
		$data['email_idx'] = $this->session->userdata('email_idx');
		$result = $this->Shop_model->insert_review($data);
		if($result==1){
			// 성공
			$shop_idx=$data['shop_idx'];
			echo "<script>alert(\"저장 완료\");location.href='../Shop/stuff_detail?shop_idx=$shop_idx';</script>";
		}else {
			// 실패
			echo "<script>alert(\"저장 실패\");location.href='../Shop/stuff_detail?shop_idx=$shop_idx';</script>";
		}


	}

	public function index()
	{
		$email = $this->session->userdata('email');
		if(!isset($email)){
			echo "<script>alert(\"잘못된경로의 접근입니다.\"); location.href='Login';</script>";
			exit;
		}
		// 화면 Select
			// 페이징 하기
			// 페이징 주소
			$config['base_url'] = 'http://localhost/messi/Shop?page_no=3';
			// 게시물 전체 개수
			// $this->load->model('News_model');
			$config['total_rows'] = $this->Shop_model->get_list($this->uri->segment(3),'count');
			// 한 페이지에 표시할 게시물 수
			$config['per_page'] = 10;
			// 페이지 번호가 위치한 세그먼트
			$config['uri_segment'] = 10;
			// 페이지네이션 맨 왼쪽에 위치할 "처음으로" 링크 글을 설정
			$config['first_link'] = 'First';
			// 페이지네이션 맨 오른쪽에 위치할 "끝으로" 링크 글을 설정
			$config['last_link'] = 'Last';
			//"이전" 링크 글을 설정합니다.
			$config['prev_link'] = '◀이전&nbsp&nbsp';
			//"다음" 링크 글을 설정합니다.
			$config['next_link'] = '&nbsp&nbsp다음▶';
			//기본값으로, URI 새그먼트는 페이징하는 아이템들의 시작 인덱스를 사용합니다. 실제 페이지 번호를 보여주고 싶다면, TRUE로 설정하세요.
			$config['use_page_numbers'] = TRUE;
			//선택된 페이지번호 좌우로 몇개의 숫자링크를 보여줄지 설정
			$config['num_links'] = 5;

			$config['page_query_string'] = TRUE;

			$this->pagination->initialize($config);
			$result['pagination'] = $this->pagination->create_links();
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

				$limit = $config['per_page'];
				$idx = $this->input->get('stuff_idx');
				// var_dump($idx);
				if(!isset($idx)){$idx=1;}
				$admin_page = $this->input->get('admin_page');

				// $result['reviewall'] = $this->Shop_model->get_allreview();

				$result['data'] = $this->Shop_model->get_list($this->uri->segment(3),'', $start, $limit, $idx,$admin_page);
				// var_dump($result['data']);
			}

			if($this->input->get('admin_page')==3){
				// Admin SHOP
				$this->load->view('admin_shop',$result);
			}else {
				// 일반 SHOP
				$this->load->view('shop_top',$result);
			}

		}

		public function update_picture(){
			// sub imge 업데이트
			$this->load->library('upload');
			$this->upload->initialize($this->set_upload_options());
			$c = $this->input->post('check');
			if($c==1){
				// first_image
				if (!$this->upload->do_upload('first_image')){
					$err =$this->upload->display_errors();
					echo "<script>console.log( 'Err: " . $err . "' );</script>";
				}else {
					$data = $this->upload->data();
					$filename = $data['file_name'];
					echo "<script>console.log( 'filename: " . $filename . "' );</script>";
					$datas['filename'] = $filename;
					$datas['shop_idx'] = $this->input->post('shop_idx');
					$datas['check'] = $this->input->post('check');

					$result = $this->Shop_model->subPic_update($datas);
					if($result==1){
						// 성공
						$shop_idx = $datas['shop_idx'];
						$arr = $this->input->post('arr');
						echo "<script>console.log( 'shop_idx: " . $shop_idx . "' );</script>";
						echo "<script>console.log( 'arr: " . $arr . "' );</script>";
						echo "<script>alert(\"사진 수정 완료\");location.href='../Shop/stuff_detail?admin_page=3&shop_idx=$shop_idx&arr=$arr';</script>";
					}else {
						// 실패
						echo "<script>alert(\"사진 수정 실패\");location.href='../Shop/stuff_detail?admin_page=3&shop_idx=$shop_idx&arr=$arr';</script>";
					}

				}
			}elseif ($c==2) {
				// second_image.
				if (!$this->upload->do_upload('second_image')){
					$err =$this->upload->display_errors();
					echo "<script>console.log( 'Err: " . $err . "' );</script>";
				}else {
					$data = $this->upload->data();
					$filename = $data['file_name'];
					echo "<script>console.log( 'filename: " . $filename . "' );</script>";
					$datas['filename'] = $filename;
					$datas['shop_idx'] = $this->input->post('shop_idx');
					$datas['check'] = $this->input->post('check');

					$result = $this->Shop_model->subPic_update($datas);
					if($result==1){
						// 성공
						$shop_idx = $datas['shop_idx'];
						$arr = $this->input->post('arr');
						echo "<script>console.log( 'shop_idx: " . $shop_idx . "' );</script>";
						echo "<script>console.log( 'arr: " . $arr . "' );</script>";
						echo "<script>alert(\"사진 수정 완료\");location.href='../Shop/stuff_detail?admin_page=3&shop_idx=$shop_idx&arr=$arr';</script>";
					}else {
						// 실패
						echo "<script>alert(\"사진 수정 실패\");location.href='../Shop/stuff_detail?admin_page=3&shop_idx=$shop_idx&arr=$arr';</script>";
					}

				}
			}else {
				// third_image.
				if (!$this->upload->do_upload('third_image')){
					$err =$this->upload->display_errors();
					echo "<script>console.log( 'Err: " . $err . "' );</script>";
				}else {
					$data = $this->upload->data();
					$filename = $data['file_name'];
					echo "<script>console.log( 'filename: " . $filename . "' );</script>";
					$datas['filename'] = $filename;
					$datas['shop_idx'] = $this->input->post('shop_idx');
					$datas['check'] = $this->input->post('check');

					$result = $this->Shop_model->subPic_update($datas);
					if($result==1){
						// 성공
						$shop_idx = $datas['shop_idx'];
						$arr = $this->input->post('arr');
						echo "<script>console.log( 'shop_idx: " . $shop_idx . "' );</script>";
						echo "<script>console.log( 'arr: " . $arr . "' );</script>";
						echo "<script>alert(\"사진 수정 완료\");location.href='../Shop/stuff_detail?admin_page=3&shop_idx=$shop_idx&arr=$arr';</script>";
					}else {
						// 실패
						echo "<script>alert(\"사진 수정 실패\");location.href='../Shop/stuff_detail?admin_page=3&shop_idx=$shop_idx&arr=$arr';</script>";
					}

				}
			}

		}

		public function update_stuff(){

			$this->load->library('upload');
			$this->upload->initialize($this->set_upload_options());
			if (!$this->upload->do_upload('title_image')){
				$err =$this->upload->display_errors();
				echo "<script>console.log( 'Err: " . $err . "' );</script>";
			}else {
				$data = $this->upload->data();
				$filename = $data['file_name'];
				echo "<script>console.log( 'filename: " . $filename . "' );</script>";
				$datas['filename'] = $filename;

				$datas['size_idx']= $this->input->post('size_idx');
				$datas['stuff_amount']  = $this->input->post('stuff_amount');
				$datas['stuff_ex'] = $this->input->post('stuff_ex');
				$datas['stuff_price'] = $this->input->post('stuff_price');
				$datas['shop_idx'] = $this->input->post('shop_idx');
				$datas['stuff_name'] = $this->input->post('stuff_name');
				$datas['email_idx'] = $this->session->userdata('email_idx');
				$datas['stuff_idx'] = $this->input->post('stuff_idx');
				// var_dump($datas);
				$result = $this->Shop_model->shop_update($datas);
				if($result==1){
					// 성공
					$shop_idx = $datas['shop_idx'];
					echo "<script>console.log( 'shop_idx: " . $shop_idx . "' );</script>";
					echo "<script>alert(\"수정 완료\");location.href='../Shop?admin_page=3';</script>";
				}else {
					// 실패
					echo "<script>alert(\"수정 실패\");location.href='../Shop?admin_page=3';</script>";
				}

			}






		}

		private function set_upload_options(){

			// 사용자가 업로드 한 파일을 /static/user/ 디렉토리에 저장한다.
			$config['upload_path'] = './static/shop';
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

			return $config;
		}


	public function shop_insert(){

		$this->load->library('upload');

		$files = $_FILES;
		$cpt = count($_FILES['stuff_image']['name']);
		for($i=0; $i<$cpt; $i++){
				$_FILES['userfile']['name']= $files['stuff_image']['name'][$i];
			 $_FILES['userfile']['type']= $files['stuff_image']['type'][$i];
			 $_FILES['userfile']['tmp_name']= $files['stuff_image']['tmp_name'][$i];
			 $_FILES['userfile']['error']= $files['stuff_image']['error'][$i];
			 $_FILES['userfile']['size']= $files['stuff_image']['size'][$i];
			 $this->upload->initialize($this->set_upload_options());
			 $this->upload->do_upload();


	 				if (!$this->upload->do_upload()){
	 							$err =$this->upload->display_errors();
	 							echo "<script>console.log( 'stuff_image: " . $err . "' );</script>";
	 							// 파일 이미지 없음
	 					}else{
	 					 $datas = $this->upload->data();

	 					 $filename = $datas['file_name'];
	 					 $url = '/static/shop/'.$filename;
	 					 echo "<script>console.log( 'url: " . $url . "' );</script>";
	 					 // echo "성공";
						 if($i==0){
							 $data['first'] = $filename;
							 echo "<script>console.log( 'data: " . $data['first'] . "' );</script>";
						 }elseif ($i==1) {
						 	// code...
							$data['second'] = $filename;
							echo "<script>console.log( 'data: " . $data['second'] . "' );</script>";
						}elseif ($i==2) {
							// code...
							$data['third'] = $filename;
							echo "<script>console.log( 'data: " . $data['third'] . "' );</script>";
						}else{
							// code...
							$data['forth'] = $filename;
							echo "<script>console.log( 'data: " . $data['forth'] . "' );</script>";
						}
					}
				}

			$c = count($this->input->post('stuff_idx'));
			$code = $this->_GenerateString();
			for($i=0; $i<$c; $i++){
			$data['size_idx'] = $this->input->post('size_idx')[$i];// 복수로 가지고 와야함
			$data['stuff_amount'] = $this->input->post('stuff_amount')[$i]; // 복수로 가지고 와야함
			$data['admin_arr'] = $this->input->post('admin_arr');
			$data['stuff_name'] = $this->input->post('stuff_name');
			$data['stuff_idx'] = $this->input->post('stuff_idx')[$i];
			$data['stuff_price'] = $this->input->post('stuff_price');
			$data['stuff_ex'] = $this->input->post('stuff_ex');
			$data['email_idx'] = $this->session->userdata('email_idx');
			$data['arr'] = $code;
			$result = $this->Shop_model->shop_insert($data);
			if($result==1){
				// 성공
				if($this->input->post('admin_page')==10){
					// 어드민 Shop
					echo "<script>alert(\"상품 저장 완료\");location.href='../Shop?admin_page=3';</script>";
				}else {
					// 일반 Shop
					echo "<script>alert(\"상품 저장 완료\");location.href='../Shop?page_no=3';</script>";
				}

			}else {
				// 실패
				if($this->input->post('admin_page')==10){
					// 어드민 Shop
						echo "<script>alert(\"상품 저장 완료\");location.href='../Shop?admin_page=3';</script>";
				}else {
					// 일반 Shop
					echo "<script>alert(\"상품 저장 실패\");location.href='../Shop?page_no=3';</script>";
				}

			}
		}


	}

	public function stuff_detail(){

		if($this->input->get('admin_page')==3){
			// 어드민 Shop
			$shop_idx = $this->input->get('shop_idx');
			// $arr = $this->input->get('arr');
			$result['data'] = $this->Shop_model->shop_detail($shop_idx,null);
			$this->load->view('admin_shop_detail',$result);
		}else {
			// 그냥 Shop
			$shop_idx = $this->input->get('shop_idx');
			$arr = $this->input->get('arr');
			$result['datas'] = $this->Shop_model->shop_detail($shop_idx,$arr);
			$result['data'] = $this->Shop_model->shop_detail($shop_idx,null);
			$result['review'] = $this->Shop_model->get_review($shop_idx);
			$result['user'] = $this->Indexs_model->select_user();
			$result['total'] = $this->Shop_model->get_review_total($shop_idx);
			// var_dump($result['total']);
			$this->load->view('shop_detail',$result);
		}
	}

	public function stuff_delete(){
		$shop_idx = $this->input->get('shop_idx');
		$result = $this->Shop_model->shop_delete($shop_idx);
		if($result==1){
			// 상품 삭제 완료
			echo "<script>alert(\"상품 삭제 완료\");location.href='../Shop?admin_page=3';</script>";
		}else {
			// 상품 삭제 실패
			echo "<script>alert(\"상품 삭제 실패\");location.href='../Shop?admin_page=3';</script>";
		}


	}

	public function amount(){
		$compare = $this->input->post('compare');
		$data['shop_idx'] = $this->input->post('shop_idx');
		$data['size'] = $this->input->post('size');
		// echo "<script>console.log( 'data: " . $data['shop_idx'] . "' );</script>";
		// echo "<script>console.log( 'data: " . $data['size'] . "' );</script>";
		if($compare==1){
			// up
			$data['compare'] = $compare;
			$result = $this->Shop_model->amount_update($data);
			if($result==1){
				// 업데이트 성공
				echo json_encode($result);
			}else {
				// 업데이트 실패
				echo json_encode(2);
			}

		}else {
			// Down
			$data['compare'] = $compare;
			$result = $this->Shop_model->amount_update($data);
			if($result==1){
				// 업데이트 성공
				echo json_encode($result);
			}else {
				// 업데이트 실패
				echo json_encode(2);
			}
		}



	}

	public function _GenerateString($length=10) {
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$char .= 'abcdefghijklmnopqrstuvwxyz';
		$char .= '0123456789';
		$char .= '!@#%^&*-_+=';
		$result = '';
		for($i = 0; $i <= $length; $i++) {
				$result .= $char[mt_rand(0, $length)];
		}
		return($result);
}
}
