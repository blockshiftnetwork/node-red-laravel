<?php

namespace NodeRed\Contracts;

use Illuminate\Support\Str;

abstract class Node {

    /** 
    * @var string 
    */
    public $id;

    /** 
    * @var string 
    */
    public $z;

    /** 
    * @var string 
    */
    public $type;

    /** 
    * @var string 
    */
    public $name;

    /** 
    * @var string 
    */
    public $x;

    /** 
    * @var string 
    */
    public $y;

    /** 
    * @var array 
    */
    public $wires = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->z = $data['z'];
        $this->x = $data['x'];
        $this->y = $data['y'];
        $this->id = $data['id'] ?? Str::uuid()->toString();
        $this->name = $data['name'] ?? $this->id.'-'.$this->type;
    }

    /**
     * @param array $nodes
     * @return void
     * 
     */
    public function setWires(array $nodes)
    {
        $this->wires = array_filter($this->wires);

        foreach ($nodes as $node) {

            $this->wires[] = (is_array($node)) ? $node : [$node];
        }
    }
}