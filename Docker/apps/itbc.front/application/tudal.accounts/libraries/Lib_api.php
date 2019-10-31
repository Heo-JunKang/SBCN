<?php
/**
 * Lib_session
 *
 * 세션 라이브러리
 *
 * Created on 2016.04.08
 * @package      front
 * @subpackage   libraries
 * @category     front
 * @author       Lee Jun Hyung <lzhqwBest@zen9.co.kr>
 * @version      0.1
 */
class Lib_api {

	private $__ci;

    /**
     * 생성자
     *
     * @access private : public
     * @return : void
     */
	public function __construct()
	{
        $this->__ci   = &get_instance();
	}

    /**
     * 회원 고유키 가져오기
     *
     * @access private : public
     * @return Integer : 회원 고유키
     */

	// method get
	public function get($url) {
		$url	= $this->get_url($url);

		$form_datas	= $this->__ciinput->get();

		$result	= $this->call(__FUNCTION__,$url, $form_datas);

		echo $result;
	}

	// method post
	public function post($url) {
		$url	= $this->get_url($url);

		$form_datas	= $this->__ciinput->post();

		$result	= $this->call(__FUNCTION__,$url, $form_datas);

		echo $result;
	}

	// method put
	public function put($url) {
		$url	= $this->get_url($url);

		parse_str(file_get_contents("php://input"),$form_datas);

		$result	= $this->call(__FUNCTION__,$url, $form_datas);

		echo $result;
	}

	// method delete
	public function delete($url) {
		$url	= $this->get_url($url);

		parse_str(file_get_contents("php://input"),$form_datas);

		$result	= $this->call(__FUNCTION__,$url, $form_datas);

		echo $result;
	}

	// call api
	public function call($type, $url, $params) {
		// s3
		if(strpos($url,'s3') !== false) {
			$url	= $url;
			$headers	= ['Domain'=>config_item('domain')];
			//Unirest\Request::defaultHeader('Domain', config_item('domain'));
		}
		else {
			$url	= config_item('api_url').$url;
			$headers	= ['token'=>$this->__ci->lib_accounts->api_key(),'Domain'=>config_item('domain_header_api')];
		}
		switch(strtoupper($type)) {
			case 'POST' :
				$query_string	= http_build_query($params);
				$response		= Unirest\Request::post($url, $headers, $query_string);
				break;
			case 'GET' :
				$response	= Unirest\Request::get($url, $headers, $params);
				break;
			case 'PUT' :
				$query_string	= http_build_query($params);
				// debug_val($query_string);
				$response		= Unirest\Request::put($url, $headers, $query_string);
				break;
			case 'DELETE' :
				$query_string	= http_build_query($params);
				$response		= Unirest\Request::delete($url, $headers, $query_string);
				break;
		}

		if(isset($response->headers['Content-Disposition'])) {
			$file_name	= str_replace('"','',$response->headers['Content-Disposition']);
			$file_name	= str_replace('attachment;filename=','',$file_name);
			header('FileName: '.$file_name);
		}
		return $response->raw_body;
	}


	// get response code curl
	public function get_headers_from_curl_response($response)
	{
		$headers = array();

		$header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

		foreach (explode("\r\n", $header_text) as $i => $line)
			if ($i === 0)
				$headers['http_code'] = $line;
			else
			{
				list ($key, $value) = explode(': ', $line);

				$headers[$key] = $value;
			}

		return $headers;
	}


	// make api url
	public function get_url($url) {
		$api_url	= '';
		foreach (explode('::',$url) as $v) {
			$api_url	.= '/'.$v;
		}

		return $api_url;
	}

	public function get_items($datas) {
		$datas	= json_decode($datas);

		return $datas->contents->items;
	}
}
?>
