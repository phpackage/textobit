<?php

namespace Phpackage\TextoBit\Api;

use Phpackage\TextoBit\Entity\Message;

class MassMessage extends Api
{
    /**
     * @var Message[]
     */
    private $messages = [];

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

    public function addRawMessage($addr, $cont, $type = null)
    {
        return $this->addMessage(new Message($addr, $cont, $type));
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

        $this->messages = [];

        return [
            'profile' => $this->profile,
            'messages' => $messages,
        ];
    }
}
