<?php

namespace NodeRed\Types\Network;

use NodeRed\Contracts\Node;

class HttpResponseNode extends Node
{
    /** 
    * @var string 
    */
    public $type = 'http response';

    /** 
    * @var int 
    */
    public $statusCode = 200;

    /** 
    * @var array 
    */
    public $headers = [];

    /** 
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->statusCode = $data['statusCode'];
        $this->headers = $data['headers'];
    }
}