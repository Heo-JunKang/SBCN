<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
	if ( ! function_exists('qry_log')) {
		function qry_log($msg, $err_type='DEBUG') {
			$CI = & get_instance();
			log_message(
				$err_type, 
					'메서드명  : '.$CI->uri->rsegment(2). ' '.' uri->segment : '.$CI->uri->segment(2). ' '.
					$msg.' 쿼리는 :'.chr(13).chr(10).$CI->db->last_query() );
		}
	}
	
	if ( ! function_exists('cmn_format_date_str')) {
		/**
		 * 날짜 문자열을 받아서, 표준 날짜 포맷 문자열 형태로 반환.
		 * mysql 날짜형식 변환시, TIMESTAMP('2018-03-04 23:47:00.0'), 형식으로 변환.
		 * 
		 * @param $date_str			: 2018-7-12
		 * @return string					: yyyy-mm-dd hh:mi:ss.ms
		 */
		function cmn_format_date_str($date_str) {
			$date_str = trim($date_str);
			$result = $date_str;
			if(!empty($result)){
				$date_str_len = strlen($date_str);
				if($date_str_len==10){
					$result.= " 00:00:00.0";
				} else if($date_str_len > 10) {
					$date_str1 = substr($date_str, 0, 10);
					$date_str2 = substr($date_str, 11);
					
					$date_str2_arr1 = explode(":", $date_str2);
					$date_str2_arr2 = explode(".", empty($date_str2_arr1[2]) ? "." : $date_str2_arr1[2]);
					
					$date_str2_arr3 = [];
					$date_str2_arr3[] = empty($date_str2_arr1[0]) ? "00" : $date_str2_arr1[0];
					$date_str2_arr3[] = empty($date_str2_arr1[1]) ? "00" : $date_str2_arr1[1];
					$date_str2_arr3[] = empty($date_str2_arr1[2]) ? "00" : $date_str2_arr1[2];
					$date_str2_arr3[] = empty($date_str2_arr2[1]) ? "0" : $date_str2_arr2[1];
					
					$date_str2_arr3[0] = strlen($date_str2_arr3[0])==1 ? "0".$date_str2_arr3[0] : $date_str2_arr3[0];
					$date_str2_arr3[1] = strlen($date_str2_arr3[1])==1 ? "0".$date_str2_arr3[1] : $date_str2_arr3[1];
					$date_str2_arr3[2] = strlen($date_str2_arr3[2])==1 ? "0".$date_str2_arr3[2] : $date_str2_arr3[2];
					
					$result = $date_str1." ".$date_str2_arr3[0].":".$date_str2_arr3[1].":".$date_str2_arr3[2].".".$date_str2_arr3[3];
				}
			}
			return $result;
		}
	}
	
	if ( ! function_exists('cmn_check_phone')) {
		/**
		 * 전화번호를 받아서, 형식이 맞는지 체크.
		 *
		 * @param $phone			: 010-1111-2222
		 * @return string					: 유효한 형식이면, true, 아니면 false.
		 */
		function cmn_check_phone($phone) {
			$result = FALSE;
			
			$phone_org = trim($phone);
			$phone = str_replace("-", "", $phone_org);
			$len = strlen($phone);
			$allow_phone_sizes = [10,11];	# 허용 전화번호 길이.
			
			if($len > 0){
				$phone_first_no = substr($phone,0,3);
				$phone_last_no = substr($phone,0,-4);
				
				if( !in_array($phone_first_no, ['010','011','016','017','018','019'])){
					return FALSE;
				}
				
				if($phone_last_no=="1111" or $phone_last_no=="1234"){
					return FALSE;
				}
				
				if( !in_array(strlen($phone), $allow_phone_sizes) ){
					return FALSE;
				}
				
				$charCnt = 0;
				for($i=0;$i<$len;$i++){
					$char = substr($phone,$i,1);
					if(!is_numeric($char)){
						$charCnt++;
					}
				}

				if($charCnt == 0 and in_array($len,$allow_phone_sizes)){
					$result = TRUE;
				}
			}
			
			return $result;
		}
	}
	
	if ( ! function_exists('cmn_check_name')) {
		/**
		 * 이름을 받아서, 형식이 맞는지 체크.
		 *
		 * @param $name				: 홍길동
		 * @return string					: 유효한 형식이면, true, 아니면 false.
		 */
		function cmn_check_name($name) {
			$result = FALSE;
			
			$name_org = trim($name);
			$name = str_replace(" ", "", $name_org);
			$len = strlen($name);
			
			if($len > 0){
				$chk = preg_match("/^[가-힣a-zA-Z]+$/", $name);
				$result = $chk;
			}
			
			return $result;
		}
	}
	
	if ( ! function_exists('cmn_file_delete')) {
		/**
		 * 파일경로를 존재여부 및 파일여부를 체크해서 삭제처리
		 *
		 * @param $file_path				: /path/file.ext
		 * @return void
		 */
		function cmn_file_delete($file_path) {
			if(!empty($file_path) and file_exists($file_path) and is_file($file_path)){
				unlink($file_path);
			}
		}
	}
	
	if ( ! function_exists('cmn_array_wrap_prefix')) {
		/**
		 * 배열항목들을 특정 배열묶음으로 셋팅. sets 등.
		 * 등록 수정시에 sets 등의 배열규칙으로 묶음.
		 * 배열값 항목 배제.
		 *
		 * @param $params				: ["parName1"=>"1", "parName2" =>"2"]
		 * @return 								: [sets["parName1"]=>"1", sets["parName2"] =>"2"]
		 */
		function cmn_array_wrap_prefix($params, $prefix="sets") {
			if($params!=null and is_array($params) and count($params) > 0){
				foreach($params as $key=>$val){
					if(!is_array($val)){
						$params[$prefix][$key] = $val;
					}
				}
			}
			return $params;
		}
	}
	
	if ( ! function_exists('cmn_array_wrap_prefix2')) {
		/**
		 * 배열항목들을 특정 배열묶음으로 셋팅. sets 등.
		 * 등록 수정시에 sets 등의 배열규칙으로 묶음.
		 * 배열값 항목 배제 안함.
		 *
		 * @param $params				: ["parName1"=>"1", "parName2" =>"2"]
		 * @return 								: [sets["parName1"]=>"1", sets["parName2"] =>"2"]
		 */
		function cmn_array_wrap_prefix2($params, $prefix="sets") {
			if($params!=null and is_array($params) and count($params) > 0){
				foreach($params as $key=>$val){
					$params[$prefix][$key] = $val;
				}
			}
			return $params;
		}
	}
	
	if ( ! function_exists('cmn_set_params')) {
		/**
		 * 파라미터 배열에, 공통 값들을 저장.
		 * 사이트 코드, 관리자 아이디 등
		 * 
		 * cmn_set_params($param['sets'],FALSE);
		 * cmn_set_params($param);
		 */
		function cmn_set_params(&$params, $is_set = TRUE) {
			$CI = & get_instance();
			
			if($params==null or !is_array($params) ){
				$params = [];
			}
			
			$params['site_code'] = $CI->admin_info['site_code'];
			$params['reg_user_no'] = $CI->admin_info['user_no'];

			if($is_set){
				$params['sets']['site_code'] = $CI->admin_info['site_code'];
				$params['sets']['reg_user_no'] = $CI->admin_info['user_no'];
			}
			
			return $params;
		}
	}

	if ( ! function_exists('cmn_filter_params')) {
		/**
		 * 파라미터 배열에서, 허용된 키값만 제외하고, 나머지 항목들은 모두 삭제처리.
		 * 업데이트 처리시에, 허용된 컬럼에 대해서만 업데이트를 허용하게 하기 위한 함수
		 * 
		 * $request['sets'] = cmn_filter_params($request['sets'], ['title','contents']);
		 */
		function cmn_filter_params($params, $allow_keys) {
			$CI = & get_instance();
			
			if($params==null or !is_array($params) or $allow_keys==null or !is_array($allow_keys) or count($allow_keys)==0){
				return $params;
			}
			
			foreach ($params as $key=>$value) {
				if( !in_array($key, $allow_keys) ){
					unset($params[$key]);
				}
			}
			
			return $params;
		}
	}
	
	if ( ! function_exists('cmn_array_copy_items')) {
		/**
		 * 배열에서, 값을 복사할 키값배열을 받아서,
		 * 해당 키값의 항목만 복사해서 배열을 반환.
		 *
		 * $param = [];
		 * $param['sets'] = cmn_array_copy_items($request['sets'], ['title','contents']);
		 */
		function cmn_array_copy_items($arr, $allow_keys) {
			$CI = & get_instance();
			
			$arr_result = [];
			
			if($arr==null or !is_array($arr) or count($arr)==0 or $allow_keys==null or !is_array($allow_keys) or count($allow_keys)==0){
				return $arr_result;
			}
			
			foreach ($arr as $key=>$value) {
				if( in_array($key, $allow_keys) and !empty($value) ){
					$arr_result[$key] = $value;
				}
			}
			
			return $arr_result;
		}
	}
	
	if ( ! function_exists('get_infos')) {
		/**
		 * admin_info값을 가지고 온다.
		 *
		 * @param Mixed $params : 배열로 가지고 오거나 단일값을으로 호출
		 */
		function get_infos($params) {
			$CI = & get_instance();
			
			if(is_array($params)) {
				$result = [];
				foreach ($params as $value) {
					$result[$value] = $CI->admin_info[$value];
				}
				return $result;
			} else {
				return $CI->admin_info[$params];
			}
		}
	}

	if ( ! function_exists('cmn_debug_map')) {
		/**
		 * 맵정보를 로그로 출력처리.
		 * 일반변수를 넘겨도 출력됨.
		 */
		function cmn_debug_map($map, $key=null) {
			$CI = & get_instance();
			
			$key_def = "★★★★★ 맵 디버그 정보";
			
			$key = $key==null ? $key_def: $key_def." (".$key.")";
			
			if(is_array($map)){
				log_message("info", $key." ::: ".print_r($map,true));
			} else {
				log_message("info", $key." ::: ".$map);
			}
		}
	}
	
	if ( ! function_exists('create_token')) {
		/**
		 * 액세스 토큰 생성
		 *
		 */
		function create_token() {
			$char = "bcdfghjkmnpqrstvzBCDFGHJKLMNPQRSTVWXZaeiouyAEIOUY!@#%";
			$token = '';
			for ($i = 0; $i < 47; $i++)
				$token .= $char[(rand() % strlen($char))];
			return $token;
		}
	}
	
	if ( ! function_exists('cmn_array_column')) {
		/**
		 * 연관배열 리스트에서 특정 컬럼값들을 1차원배열([]) 반환.
		 *
		 * @param $arr				: [["col1"=>"",], ["col1"=>"",], ...]
		 * 
		 * @return void
		 */
		function cmn_array_column($arr, $col) {
			$result = [];
			
			if(is_array($arr) and count($arr) > 0 and !empty($col)){
				foreach($arr as $row){
					$result[] = $row[$col];
				}
			}
			
			return $result;
		}
	}
	
	if ( ! function_exists('cmn_is_assoc')) {
		/**
		 * 배열이 연관배열인지 여부 반환
		 */
		function cmn_is_assoc($arr) {
			return ($arr !== array_values($arr));
		}
	}
	
	if ( ! function_exists('cmn_array_null_to_str')) {
		/**
		 * 연관배열의 값이 널인 값들을 모두 빈값("")으로 변환처리
		 */
		function cmn_array_null_to_str(&$arr) {
			if(is_array($arr) or is_object($arr)){
				if(cmn_is_assoc($arr) or is_object($arr)){
					foreach($arr as $key => $value) {
						if(is_string($value) || is_null($value)){
							if(is_object($arr)){
								$arr->$key = is_null($value) ? "" : $value;
							} else {
								$arr[$key] = is_null($value) ? "" : $value;
							}
					    }
					}
				} else {
					foreach($arr as &$row){
						if(is_array($row) or is_object($row)){
					        foreach($row as $key => $value) {
					        	if(is_string($value) || is_null($value)){
					                if(is_object($row)){
					                	$row->$key = is_null($value) ? "" : $value;
					                } else {
					                	$row[$key] = is_null($value) ? "" : $value;
					                }
					            }
					        }
					    }
					}
				}
			}
			return $arr;
		}
	}
	
	if ( ! function_exists('cmn_array_value')) {
		/**
		 * 배열의 값을 가져옴.
		 */
		function cmn_array_value($arr, $key) {
			$val = null;
			
			$key = trim($key);
			
			if(is_array($arr) and !empty($key)){
				if( isset($arr[$key]) ) {
					$val = $arr[$key];
				}
			}
			
			return $val;
		}
	}
	
	if ( ! function_exists('cmn_random_number')) {
		/**
		 * 지정된 길이만큼의 랜덤 숫자를 생성
		 *
		 */
		function cmn_random_number_str($size) {
			$return_val = "";
			$size = intval($size);
			if($size > 0){
				$char = "0123456789";
				$char2 = "123456789";
				
				$return_val= '';
				$return_val.= $char2[(rand() % strlen($char2))];
				
				for ($i = 1; $i < $size; $i++)
					$return_val.= $char[(rand() % strlen($char))];
			}
			
			return $return_val;
		}
	}
	
	if ( ! function_exists('cmn_array_empty')) {
		/**
		 * 배열이 항목이 비어있는지 체크
		 * 비어있으면 true, 한개이상 항목이 존재하면 false
		 */
		function cmn_array_empty(&$arr) {
			if($arr and is_array($arr) and count($arr) > 0){
				return false;
			} else {
				return true;
			}
		}
	}
	
	if ( ! function_exists('cmn_object_to_array')) {
		/**
		 * php 객체를 연관배열로 변환 반환
		 */
		function cmn_object_to_array($obj) {
			if($obj and is_object($obj)){
				return json_decode(json_encode($obj), true);
			} else {
				return null;
			}
		}
	}