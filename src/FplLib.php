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
                    'bootstrapStatic' => [
                        'httpMethod' => 'GET',
                        'uri' => '/drf/bootstrap-static',
                        'responseModel' => 'getResponse',
                    ],
                    'entry' => [
                        'httpMethod' => 'GET',
                        'uri' => '/drf/entry/{entryId}',
                        'responseModel' => 'getResponse',
                        'parameters' => [
                            'entryId' => [
                                'type' => 'string',
                                'location' => 'uri',
                            ],
                        ],
                    ],
                    'entryHistory' => [
                        'httpMethod' => 'GET',
                        'uri' => '/drf/entry/{entryId}/history',
                        'responseModel' => 'getResponse',
                        'parameters' => [
                            'entryId' => [
                                'type' => 'string',
                                'location' => 'uri',
                            ],
                        ],
                    ],
                    'entryPicks' => [
                        'httpMethod' => 'GET',
                        'uri' => '/drf/entry/{entryId}/event/{eventId}/picks',
                        'responseModel' => 'getResponse',
                        'parameters' => [
                            'entryId' => [
                                'type' => 'string',
                                'location' => 'uri',
                            ],
                            'eventId' => [
                                'type' => 'string',
                                'location' => 'uri',
                            ],
                        ],
                    ],
                    'elementSummary' => [
                        'httpMethod' => 'GET',
                        'uri' => '/drf/element-summary/{elementId}',
                        'responseModel' => 'getResponse',
                        'parameters' => [
                            'elementId' => [
                                'type' => 'string',
                                'location' => 'uri',
                            ],
                        ],
                    ],
                ],
                'models' => [
                    'getResponse' => [
                        'type' => 'object',
                        'additionalProperties' => ['location' => 'json'],
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
