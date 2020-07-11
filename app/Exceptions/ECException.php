<?php

namespace App\Exceptions;

use Exception;

class ECException extends Exception {

	private $_key;
	private $_response;

    public function __construct($key = null , $message = null , $response = null)
    {
        
        $this->_key 	 = $key;
        $this->_response = $response;

        parent::__construct($message);
    }

    public function getKey()
    {
    	return $this->_key;
    }

    public function getResponse()
    {
    	return $this->_response;
    }

}
