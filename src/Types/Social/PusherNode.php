<?php

namespace NodeRed\Types\Social;

use NodeRed\Contracts\Node;

class PusherNode extends Node
{
    /** 
    * @var string 
    */
    public $type = 'pusher out';
    
    /** 
    * @var string 
    */
    public $channel = '';

    /** 
    * @var string 
    */
    public $cluster = '';

    /** 
    * @var string 
    */
    public $eventname = '';

    /** 
    * @var array 
    */
    public $credentials = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->channel = $data['channel'];
        $this->cluster = $data['cluster'];
        $this->eventname = $data['eventname'];
        $this->cluster = $data['cluster'];
        $this->credentials = $data['credentials'] ?? [];
    }

    /**
     * @param array
     * @return void
    */
    public function setCredentials($credentials)
    {
        $this->credentials = $credentials;
    }
}