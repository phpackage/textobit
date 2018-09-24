<?php

namespace Phpackage\TextoBit\Api;

use Phpackage\TextoBit\Client;
use Phpackage\TextoBit\Entity\Message;

class MassMessage
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $profile = 'api';

    /**
     * @var Message[]
     */
    private $messages = [];

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public static function fromToken($token)
    {
        return new self(new Client($token));
    }

    public function send()
    {
        return $this->client
            ->getSession()
            ->post(
                '/api/massmessage',
                [],
                json_encode($this->toArray())
            );
    }

    public function addMessage(Message $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    public function addRawMessage($addr, $cont)
    {
        return $this->addMessage(new Message($addr, $cont));
    }

    public function toArray()
    {
        $messages = [];

        foreach ($this->messages as $message) {
            $messages[] = [
                'addr' => (string)$message->getAddr(),
                'cont' => (string)$message->getCont(),
                'type' => (int)$message->getType(),
            ];
        }

        return [
            'profile' => $this->profile,
            'messages' => $messages,
        ];
    }
}
