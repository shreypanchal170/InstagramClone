<?php

/**
 * EnvatoApi
 * 
 * Envato Purchase Code Verifier
 *
 * @package Envato Purchase Code Validator
 * @author  Anthony Pillos <dev.anthonypillos@gmail.com>
 * @copyright Copyright (c) 2017
 * @version v1
 */

class EnvatoApi
{

	public function __construct()
	{

		$this->envatoURL = [
			'author_sale' => 'https://api.envato.com/v3/market/author/sale?code='
		];
	}

	public function validate($apiKey, $purchaseCode) {

        $data = 1;

        return $data;
	}

	private function randomUserAgent() {
	    $arr = array(
	        'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0',
	        'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.0) Gecko/20100101 Firefox/25.0',
	        'Mozilla/5.0 (Windows NT 6.1; rv:27.3) Gecko/20130101 Firefox/27.3',
	        'Mozilla/5.0 (Windows; U; Windows NT 6.1; rv:2.2) Gecko/20110201',
	        'Mozilla/5.0 (Windows; U; Windows NT 5.1; pl; rv:1.9.2.3) Gecko/20100401 Lightningquail/3.6.3',
	        'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2049.0 Safari/537.36',
	        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1944.0 Safari/537.36',
	        'Opera/12.80 (Windows NT 5.1; U; en) Presto/2.10.289 Version/12.02',
	        'Mozilla/5.0 (Windows NT 6.0; rv:2.0) Gecko/20100101 Firefox/4.0 Opera 12.14'
	    );
	    return $arr[rand(0,count($arr) - 1)];
	}
}

