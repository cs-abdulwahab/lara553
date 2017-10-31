<?php
/**
 * Created by PhpStorm.
 * User: Abdul-Wahab
 * Date: 10/31/2017
 * Time: 10:26 AM
 */

namespace App\Http\Controllers;

use Exception;

class CustomException extends Exception
{


    protected $message;

    /**
     * CustomException constructor.
     * @param string $getMessage
     */
    public function __construct($getMessage)
    {
        $this->message = $getMessage;

    }


}