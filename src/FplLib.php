<?php

namespace Mormanski\FplLib;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FplLib
{
    public const BASE_URL = 'https://fantasy.premierleague.com/';

    /**
     * @var HttpClientInterface
     */
    protected $client;

    public function __construct(?HttpClientInterface $client = null, array $defaultOptions = [])
    {
        $this->client = $client ?? HttpClient::create(array_merge([
            'base_uri' => self::BASE_URL,
            'headers' => [
                'User-Agent' => 'FplLib/1.1',
            ],
        ], $defaultOptions));
    }

    public function getClient(): HttpClientInterface
    {
        return $this->client;
    }

    public function request(string $method, string $uri, array $options = []): array
    {
        $response = $this->client->request($method, $uri, $options);

        return $response->toArray();
    }

    public function bootstrapStatic(array $options = []): array
    {
        return $this->request('GET', '/api/bootstrap-static/', $options);
    }

    public function entry(int $entryId, array $options = []): array
    {
        return $this->request('GET', sprintf('/api/entry/%s/', $entryId), $options);
    }

    public function entryHistory(int $entryId, array $options = []): array
    {
        return $this->request('GET', sprintf('/api/entry/%s/history/', $entryId), $options);
    }

    public function entryPicks(int $entryId, int $eventId, array $options = []): array
    {
        return $this->request('GET', sprintf('/api/entry/%s/event/%s/picks/', $entryId, $eventId), $options);
    }

    public function elementSummary(int $elementId, array $options = []): array
    {
        return $this->request('GET', sprintf('/api/element-summary/%s/', $elementId), $options);
    }

    public function leaguesClassicStandings(string $leagueId, array $options = []): array
    {
        return $this->request('GET', sprintf('/api/leagues-classic/%s/standings/', $leagueId), $options);
    }
}
