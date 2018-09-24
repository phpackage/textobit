<?php

namespace Phpackage\TextoBit\Entity;

class Message
{
    private $addr;

    private $cont;

    private $type;

    public function __construct($addr, $cont, $type = null)
    {
        $this->addr = $addr;
        $this->cont = $cont;
        $this->type = $type ?: 1;
    }

    public function getAddr()
    {
        return $this->addr;
    }

    public function getCont()
    {
        return $this->cont;
    }

    public function getType()
    {
        return $this->type;
    }
}
