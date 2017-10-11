<?php

namespace Mormanski\FplLib;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;

class FplLib
{

    CONST BASE_URL = 'https://fantasy.premierleague.com/';

    protected $client;

    public function __construct()
    {
        $client = new Client();
        $this->client = new GuzzleClient($client, self::getServiceDescription());
    }

    public static function getServiceDescription()
    {

        $description = new Description(
            [
                'baseUri' => self::BASE_URL,
                'operations' => [
                    'testing' => [
                        'httpMethod' => 'GET',
                        'uri' => '/drf/entry{?foo}',
                        'responseModel' => 'getResponse',
                        'parameters' => [
                            'foo' => [
                                'type' => 'string',
                                'location' => 'uri',
                            ],
                            'bar' => [
                                'type' => 'string',
                                'location' => 'query',
                            ],
                        ],
                    ],
                    'playerHistory' => [
                        'httpMethod' => 'GET',
                        'uri' => '/drf/entry/{id}/history',
                        'responseModel' => 'getResponse',
                        'parameters' => [
                            'id' => [
                                'type' => 'string',
                                'location' => 'uri',
                            ],
                        ],
                    ],
                ],
                'models' => [
                    'getResponse' => [
                        'type' => 'object',
                    ],
                ],
            ]
        );

        return $description;
    }

    public function getClient()
    {
        return $this->client;
    }

}
