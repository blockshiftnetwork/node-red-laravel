<?php

namespace NodeRed\Types\Network;

use NodeRed\Contracts\Node;

class HttpRequestNode extends Node
{
    /** 
    * @var string 
    */
    public $type = 'http request';

    /** 
    * @var string 
    */
    public $method = 'post';

    /** 
    * @var string 
    */
    public $ret = 'obj';

    /** 
    * @var string 
    */
    public $paytoqs = 'ignore';

    /** 
    * @var string 
    */
    public $url = '';

    /** 
    * @var string 
    */
    public $tls = '';

    /** 
    * @var bool 
    */
    public $persist = false;

    /** 
    * @var string 
    */
    public $proxy = '';

    /** 
    * @var bool 
    */
    public $insecureHTTPParser = false;

    /** 
    * @var string 
    */
    public $authType = '';

    /** 
    * @var bool 
    */
    public $senderr = false;

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

        $this->method = $data['method'];
        $this->ret = $data['ret'];
        $this->paytoqs = $data['paytoqs'];
        $this->url = $data['url'];
        $this->tls = $data['tls'];
        $this->persist = $data['persist'];
        $this->proxy = $data['proxy'];
        $this->insecureHTTPParser = $data['insecureHTTPParser'];
        $this->authType = $data['authType'];
        $this->senderr = $data['senderr'];
        $this->headers = $data['headers'];
    }
}