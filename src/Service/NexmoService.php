<?php

namespace App\Service;

use Nexmo\Client;

class NexmoService
{
    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function makeCall(string $message, string $receiverNumber)
    {
        $this->client->calls()->create([
            'to' => [[
                'type' => 'phone',
                'number' => $_ENV['DEFAULT_RECEIVER_NUMBER'],
            ]],
            'from' => [
                'type' => 'phone',
                'number' => $receiverNumber,
            ],
            'ncco' => [
                [
                    'action' => 'talk',
                    'text' => $message,
                ]
            ]
        ]);
    }

    public function sendSMS(string $message)
    {
        $this->client->message()->send([
            'to' => $_ENV['DEFAULT_RECEIVER_NUMBER'],
            'from' => 'Phone Debugger',
            'text' => $message
        ]);
    }
}