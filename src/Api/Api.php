<?php

namespace Phpackage\TextoBit\Api;

use Phpackage\TextoBit\Client;

abstract class Api
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $profile;

    public function __construct(Client $client, $profile = 'api')
    {
        $this->client = $client;
        $this->profile = $profile;
    }

    public static function fromToken($token)
    {
        return new static(new Client($token));
    }
}
