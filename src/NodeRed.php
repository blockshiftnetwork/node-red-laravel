<?php

namespace NodeRed;

class NodeRed
{
    /** 
    * @var string 
    */
    public $id;

    /** 
    * @var string 
    */
    public $type = 'tab';

    /***
    * @var string 
    */
    public $label = '';

    /** 
    * @var bool 
    */
    public $disabled = false;

    /** 
    * @var string 
    */
    public $info = '';

    /** 
    * @var array 
    */
    public $nodes = [];

    /** 
    * @var array 
    */
    public $subflows = [];

    /** 
    * @var array 
    */
    public $env = [];

    /** 
    * @var array 
    */
    public $config = [];


    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->label = $data['label'];
        $this->disabled = $data['disabled'];
        $this->info = $data['info'];
        $this->env = $data['env'];
    }

    /**
     * @param array $nodes
     * @return void
     */
    public function addNodes($nodes)
    {
        foreach ($nodes as $node) {
            $this->nodes[] = $node;
        }
    }

    /**
     * @return array
     */
    public function serializeNodes()
    {
        return array_map(function ($node) {
            return json_decode(json_encode($node), true);
        }, $this->nodes);
    }

    /**
     * @param array $nodes
     * @return void
     */
    public function deserializeNodes($nodes)
    {
        foreach ($nodes as $node) {

            if (!is_array($node)) {
                continue;
            }

            switch($node['type'])
            {
                case 'function':
                    $instanceNode = new \NodeRed\Types\_Function\FunctionNode($node);
                    break;
                case 'switch':
                    $instanceNode = new \NodeRed\Types\_Function\SwitchNode($node);
                    break;
                case 'catch':
                    $instanceNode = new \NodeRed\Types\Common\CatchNode($node);
                    break;
                case 'http in':
                    $instanceNode = new \NodeRed\Types\Network\HttpInNode($node);
                    break;
                case 'http request':
                    $instanceNode = new \NodeRed\Types\Network\HttpRequestNode($node);
                    break;
                case 'http response':
                    $instanceNode = new \NodeRed\Types\Network\HttpResponseNode($node);
                    break;
                case 'pusher out':
                    $instanceNode = new \NodeRed\Types\Social\PusherNode($node);
                    break;
                case str_contains($node['type'], 'subflow'):
                    $instanceNode = new \NodeRed\Types\Subflow\SubflowNode($node);
                    break;
                default:
                    $instanceNode = null;
            }

            if (!is_null($instanceNode)) {

                $instanceNode->setWires($node['wires']);
                $this->addNodes([$instanceNode]);
            }
        }
    }   
}
