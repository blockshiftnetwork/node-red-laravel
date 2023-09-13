<?php

namespace NodeRed\Types\_Function;

use NodeRed\Contracts\Node;

class SwitchNode extends Node
{   
    /** 
    * @var string 
    */
    public $type = 'switch';
    
    /** 
    * @var string 
    */
    public $property = '';

    /** 
    * @var string 
    */
    public $propertyType = '';

    /** 
    * @var array 
    */
    public $rules = [];

    /** 
    * @var bool 
    */
    public $checkall = true;

    /** 
    * @var bool
    */
    public $repair = false;

    /** 
    * @var int 
    */
    public $outputs = 1;
    
    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->property = $data['property'];
        $this->propertyType = $data['propertyType'];
        $this->checkall = $data['checkall'];
        $this->repair = $data['repair'];
        $this->rules = $data['rules'];
        $this->outputs = count($data['rules']);
    }
}