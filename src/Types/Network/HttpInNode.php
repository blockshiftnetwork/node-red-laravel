<?php

namespace NodeRed\Types\Network;

use NodeRed\Contracts\Node;

class HttpInNode extends Node
{
    /** 
    * @var string 
    */
    public $type = 'http in';

    /** 
    * @var string 
    */
    public $url = '';

    /** 
    * @var string 
    */
    public $method = 'post';

    /** 
    * @var bool 
    */
    public $upload = false;

    /** 
    * @var string 
    */
    public $swaggerDoc = '';

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->url = $data['url'];
        $this->method = $data['method'];
        $this->upload = $data['upload'];
        $this->swaggerDoc = $data['swaggerDoc'];
    }
}