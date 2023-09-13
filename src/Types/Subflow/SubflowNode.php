<?php

namespace NodeRed\Types\Subflow;

use NodeRed\Contracts\Node;

class SubflowNode extends Node
{
    /** 
    * @var string 
    */
    public $type = 'subflow';
    
    /** 
    * @var string 
    */
    public $subflow;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->type .= ':'.$data['subflow'];
        $this->subflow = $data['subflow'];
    }
}