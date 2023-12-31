<?php

namespace Thiio\Midigator;

use Thiio\Midigator\Requests\OrderRequest;
use Thiio\Midigator\Requests\SubscriptionRequest;
use Thiio\Midigator\Requests\AuthRequest;

class Client
{
    protected $username;
    protected $password;
    protected $secret;

    protected $env;

    public function __construct($username, $password, $secret, $env="SANDBOX"){
        $this->username = $username;
        $this->password = $password;
        $this->secret   = $secret;
        $this->setEnv($env);
    }    

    private function setEnv($env){
        $this->env = $env;
        return $this;
    }

    public function subscriptionsApi(){
        return new SubscriptionRequest($this->username, $this->password, $this->secret, $this->env);
    }

    public function ordersApi(){
        return new OrderRequest($this->username, $this->password, $this->secret, $this->env);
    }

}
