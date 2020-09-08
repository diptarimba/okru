<?php

	function curl($url, $fields = null, $headers = null, $custreq = null){
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_ENCODING , "gzip");
				curl_setopt($ch, CURLOPT_HEADER, true);
				if ($fields !== null) {
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
				}
				if ($headers !== null) {
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				}
				if ($custreq !== null) {
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $custreq);
				}else{
					curl_setopt($ch, CURLOPT_POST, 1);
				}
				$result   = curl_exec($ch);
				$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
				$header = substr($result, 0, $header_size );
				$body = substr($result, $header_size );
				curl_close($ch);
				
				return array(
					$result,
					$httpcode,
					$header,
					$body,
				);
	}
	
	function getCookie($source) {
			preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $source, $matches);
			$cookies = array();
			foreach($matches[1] as $item) {
				parse_str($item, $cookie);
				$cookies = array_merge($cookies, $cookie);
			}
			return $cookies;
	}
	
	function nama(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://ninjaname.horseridersupply.com/indonesian_name.php");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$ex = curl_exec($ch);
		// $rand = json_decode($rnd_get, true);
		preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);
		return $name[2][mt_rand(0, 14) ];
	}