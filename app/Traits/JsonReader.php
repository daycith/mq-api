<?php

namespace App\Traits;

use Exception;

trait JsonReader
{

    protected function readJson($path)
    {
        try{
            $data = json_decode(file_get_contents($path));
            return $data;
        }catch(Exception $e){
            return [];
        }
    }
}
