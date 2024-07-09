<?php

/**
 * Envato Validator
 *
 * @author  Anthony Pillos <dev.anthonypillos@gmail.com>
 * @copyright Copyright (c) 2017
 * @version v1
 */
require 'api.php';

if(isset($_POST))
{	
	if(isset($enapi) && isset($enpur) )
	{
		$envato     = new EnvatoApi();
		$apiKey       = $enapi;
		$purchaseCode = $enpur;

		if($apiKey == null || $purchaseCode == null)
		{
			echo json_encode(['data' => 'No Api Key or Purchase code found, Please try again']);
			exit;
		}

		$response     = $envato->validate($apiKey,$purchaseCode);
		
		$result = json_decode($response);
		echo json_encode(['data' => $result]);
		
		
		
		
		
		exit;
	}
	echo json_encode(['data' => 'No Api Key or Purchase code found, Please try again']);
	exit;
}