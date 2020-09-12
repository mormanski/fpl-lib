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
        $client = new Client([
            'headers' => ['User-Agent' => 'FplLib/1.1']
        ]);
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
                        'uri' => '/api/bootstrap-static/',
                        'responseModel' => 'getResponse',
                    ],
                    'entry' => [
                        'httpMethod' => 'GET',
                        'uri' => '/api/entry/{entryId}/',
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
                        'uri' => '/api/entry/{entryId}/history/',
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
                        'uri' => '/api/entry/{entryId}/event/{eventId}/picks/',
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
                        'uri' => '/api/element-summary/{elementId}/',
                        'responseModel' => 'getResponse',
                        'parameters' => [
                            'elementId' => [
                                'type' => 'string',
                                'location' => 'uri',
                            ],
                        ],
                    ],
                    'leaguesClassicStandings' => [
                        'httpMethod' => 'GET',
                        'uri' => '/api/leagues-classic/{leagueId}/standings',
                        'responseModel' => 'getResponse',
                        'parameters' => [
                            'leagueId' => [
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
