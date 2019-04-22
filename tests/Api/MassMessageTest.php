<?php

namespace Phpackage\TextoBit\Tests;

use Phpackage\TextoBit\Api\MassMessage;
use Phpackage\TextoBit\Client;
use PHPUnit\Framework\TestCase;

final class MassMessageTest extends TestCase
{
    public function testCanBeCreatedManually()
    {
        $api = new MassMessage(new Client('token'), 'profile');

        $this->assertInstanceOf(MassMessage::class, $api);
    }
}
