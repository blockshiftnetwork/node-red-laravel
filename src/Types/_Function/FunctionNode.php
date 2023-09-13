<?php

namespace NodeRed\Types\_Function;

use NodeRed\Contracts\Node;

class FunctionNode extends Node
{
    /** 
    * @var string 
    */
    public $type = 'function';

    /** 
    * @var string 
    */
    public $func = '';

    /** 
    * @var int 
    */
    public $outputs = 1;

    /** 
    * @var int 
    */
    public $noerr = 0;

    /** 
    * @var string 
    */
    public $initialize = '';

    /** 
    * @var string 
    */
    public $finalize = '';

    /** 
    * @var array 
    */
    public $libs = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->func = $data['func'];
        $this->outputs = $data['outputs'];
        $this->noerr = $data['noerr'];
        $this->initialize = $data['initialize'];
        $this->finalize = $data['finalize'];
    }
}