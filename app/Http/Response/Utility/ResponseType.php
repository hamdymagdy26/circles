<?php

namespace App\Http\Response\Utility;

/**
 *
 */
final class ResponseType
{
    /**
     * @param string $message
     * @param bool $success
     * @param array $aux
     * @return array
     */
	public static function simpleResponse(string $message, bool $success, array $aux = [])
	{
		return array_merge([   
			"data" => [], 
            "message" => $message,
            "success" => $success
        ], $aux);	
	}
}