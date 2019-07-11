<?php
	class Simplepagination{
		function __construct(){

		}

		function getPagination($configure = false){
			if(is_array($configure) && ($configure['last_page'] >= $configure['current_page'])) {

				$configure['last_page'] = (int)$configure['last_page'];

				$html_return_string = '<ul class="core pagination">';
				$page = (int)(($configure['current_page']-1) / 10)*10;

				if(($page != 0) && ($configure['last_page'] > 10)){
					if(($configure['last_page'] > 20) && ($configure['current_page'] > 20)) {
						$html_return_string .= '<li><a href="' . site_url($configure['url'] . '/1' . $configure['suffix']) . '" class="firstpage">&laquo;</a></li>';
					}
					$html_return_string .= '<li><a href="' . site_url($configure['url'] . '/' . ($page-9) . $configure['suffix']) . '" class="prevpage">&lt;</a></li>';
				}

				$loop_page_count = (($configure['last_page'] - $page) >= 10) ? 10 : $configure['last_page']-$page;

				for($i=$page+1; $i<=$page+$loop_page_count; $i++){
					if($i == $configure['current_page']){
						$html_return_string .= '<li><span class="active">' . $i . '</span></li>';
					} else {
						$html_return_string .= '<li><a href="' . site_url($configure['url'] . '/' . $i . $configure['suffix']) . '">' . $i . '</a></li>';
					}
				}

				if(($configure['last_page'] > 10) && ( $page+10 < $configure['last_page'])) {
					$html_return_string .= '<li><a href="' . site_url($configure['url'] . '/' . ($page+11) . $configure['suffix']) . '" class="nextpage">&gt;</a></li>';
					if(($configure['last_page'] - $page) > 20){
						if(is_int($configure['last_page'] / 10)) {
							$html_return_string .= '<li><a href="' . site_url($configure['url'] . '/' . (((int)($configure['last_page'] / 10))*10) . $configure['suffix']) . '" class="lastpage">&raquo;</a></li>';
						} else {
							$html_return_string .= '<li><a href="' . site_url($configure['url'] . '/' . (((int)($configure['last_page'] / 10))*10 + 1) . $configure['suffix']) . '" class="lastpage">&raquo;</a></li>';
						}
					}
				}

				$html_return_string .= '</ul>';

				return $html_return_string;
			} else {
				return false;
			}
		}
	}
