<?php

namespace Phpackage\TextoBit;

use Phpackage\TextoBit\Api\MassMessage;

class Client
{
    private $session;

    private $url = 'https://textobit.com/';

    private $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ];

    public function __construct($token)
    {
        $this->session = new \Requests_Session($this->url, $this->headers);
        $this->session->headers['Authorization'] = 'Bearer ' . $token;
    }

    public function getSession()
    {
        return $this->session;
    }

    public function massMessage()
    {
        return new MassMessage($this);
    }
}
