<?php

namespace NodeRed\Types\Common;

use NodeRed\Contracts\Node;

class CatchNode extends Node
{
    /** 
    * @var string 
    */
    public $type = 'catch';

    /** 
    * @var string 
    */
    public $scope = null;

    /** 
    * @var bool 
    */
    public $uncaught = false;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->scope = $data['scope'];
        $this->uncaught = $data['uncaught'];
    }
}